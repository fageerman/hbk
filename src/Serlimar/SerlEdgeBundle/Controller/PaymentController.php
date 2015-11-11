<?php

/**
 * Description of PaymentController
 * Handles the payement registration requests and reposponses for the SerlEdge App.
 * 
 * @author Ferdinand Geerman
 */

namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Serlimar\SerlEdgeBundle\Form\PaymentType;
use Serlimar\SerlEdgeBundle\Form\UpdatePaymentType;
use Serlimar\SerlEdgeBundle\Entity\Tblpayments;
use Serlimar\SerlEdgeBundle\Entity\PaymentFilter;
use Serlimar\SerlEdgeBundle\Form\PaymentFilterType;

class PaymentController extends Controller
{
    
    /**
     *  Show the payment registration records.
     */
    public function indexAction(Request $request)
    {
      
        $em = $this->getDoctrine()->getManager();
        $today = (new \DateTime('now'))->setTime(0,0);
        $roleUser = $this->getUser()->getRoleCollectionName();
        
        //List payments with selected dates or just 'today'
        //Display payments of all users or just a selection, or just 1?
        $dateQuery = '';
        $insertuserQuery ='';
        
        //Check the role of the user, and prepare the subquery for the specific role.
        if($roleUser === 'Cashier'){
            $dateQuery = ' and p.paymentdate = \'' . $today->format('Y-m-d H:i:s') . '\'';
            $insertuserQuery = ' and p.insertuser = \'' . $this->getUser()->getUsername() . '\'';
        }
        elseif($roleUser === 'Manager'){
            $manager = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblusers')->findBy(array('username'=> $this->getUser()->getUsername()));
            $managerLocation = $manager[0]->getLocation();
            $dateQuery = ' and p.paymentdate = \'' . $today->format('Y-m-d H:i:s') . '\'';
            $insertuserQuery = ' and p.insertuser IN(Select u.username from SerlimarSerlEdgeBundle:Tblusers u where u.location =\'' . $managerLocation . '\')';
            
        }
        elseif($roleUser === 'Superadmin') {
            $dateQuery = ' and p.paymentdate = \'' . $today->format('Y-m-d H:i:s') . '\'';
        }
           
        $filter = new PaymentFilter();
        $filter->setStartDate($this->get('session')->get('filterStartDate'));
        $filter->setEndDate($this->get('session')->get('filterEndDate'));
        $form = $this->createForm(new PaymentFilterType(),$filter);
        
        if($this->get('session')->get('filterQueryInSession') !== null)
        {
            $dateQuery = $this->get('session')->get('filterQueryInSession');
        }

        //filter is submitted
        if($request->getMethod() == Request::METHOD_POST){
            
            $form->handleRequest($request);
            $data = $form->getData();

            if($form->isValid()){
                $startDate = $data->getStartDate()->format('Y-m-d H:i:s');
                $endDate = ($data->getEndDate())? $data->getEndDate()->format('Y-m-d H:i:s'): null;
                
                
                //Build the datequery from the submitted start/enddate from the filter.
                $dateQuery = ($endDate !== null)? ' and p.paymentdate BETWEEN \'' 
                                . $startDate . '\' and \'' . $endDate . '\'' : ' and p.paymentdate = \'' 
                                . $startDate . '\'';
                
                $this->get('session')->set('filterQueryInSession', $dateQuery);  
                $this->get('session')->set('filterStartDate', $data->getStartDate());  
                $this->get('session')->set('filterEndDate', $data->getEndDate());  
            }

        }
        $mainQuery =  'Select p.paymentsid, p.paymentdate, l.lookup as paymentmethod, p.amount, c.firstname, c.name, p.insertuser from SerlimarSerlEdgeBundle:Tblpayments p '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = p.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = p.paymentmethod '
                . ' WHERE p.paymentsid is not null '
                .   $insertuserQuery 
                .   $dateQuery             
                . '  ORDER BY p.paymentdate DESC ';
        
         //The same query as mainQuery but with only the sum of total amount.
         $sumQuery =  'Select SUM(p.amount) as  totalAmount , l.lookup as paymentmethod from SerlimarSerlEdgeBundle:Tblpayments p '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = p.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = p.paymentmethod '
                . ' WHERE p.paymentsid is not null '
                .   $insertuserQuery 
                .   $dateQuery             
                . '  GROUP BY p.paymentmethod ORDER BY p.paymentdate DESC ';
         
        $query = $em->createQuery($mainQuery);
        $sumquery = $em->createQuery($sumQuery);
        
        
        //Save the main/sum query in a session, so the 'print all' function can generate the list.
        //This session var must be removed when the filter is cleared. It is done in clearfilter action.
        $this->get('session')->set('mainQueryInSession', $mainQuery);  
        $this->get('session')->set('sumQueryInSession', $sumQuery);  
       

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                    $query,
                    $request->query->getInt('page',1),
                    10
                );

        $result = $query->getResult();
        $sumAmount = $sumquery->getResult();
        $dates = [$this->get('session')->get('filterStartDate'), $this->get('session')->get('filterEndDate')];  
       
        return $this->render('SerlimarSerlEdgeBundle:Payment:index.html.twig', array(
            'payments' => $result,
            'sumAmount' => $sumAmount,
            'dates' => $dates,
            'filterOption' => ($roleUser === 'Cashier')?false:true,
            'pagination' => $pagination,
            'form' => $form->createView()
            ));
    }
    
    /**
     *  Create a new payment registration record.
     */
    public function createAction(Request $request, $customerid = null)
    {   
        
        $em = $this->getDoctrine()->getManager();
        /*
         * If form is submitted: Handle request , validate the form submitted  
         * formfields and persist if form is valid.
         */
        if($request->getMethod() == Request::METHOD_POST)
        {
            
            $payment = new Tblpayments();
            $form = $this->createForm(new PaymentType($em), $payment);
            $paymentId = null;
            $form->handleRequest($request);
            
            if ($form->isValid()){
                $payment->setPaymentsId($this->generatePaymentsId());
                $payment->setInsertUser($this->getUser()->getUsername());
                $payment->setPaymentDate((new \DateTime('now'))->setTime(0,0));
                $payment->setTimestamp(new \DateTime('now'));
               // $payment->setReference($payment->getInvoicenr());
                $paymentId = $payment->getPaymentId();
                $em->persist($payment);
                $em->flush();

                return $this->redirectToRoute('serlimar_serledge_receipt_payment', array('id'=>$paymentId));
            }
            return $this->render('SerlimarSerlEdgeBundle:Payment:create.html.twig', array(
           'form'=>$form->createView()));
        }
        
        $customerGuid = $this->get('session')->get('customerIdPayment');  
       
        $form = $this->createForm(new PaymentType($em, $customerGuid));
        $this->get('session')->remove('customerIdPayment');  
       // $this->get('session')->remove('customerIdForPayment');
        return $this->render('SerlimarSerlEdgeBundle:Payment:create.html.twig', array(
            'form'=>$form->createView() 
        ));
    }
    
    /**
     *  Edit a payment registration record.
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $paymentResult = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblpayments')->findBy(array('paymentsid'=> $id));
        $payment = $paymentResult[0];
       //var_dump($payment);die;
        $form = $this->createForm(new UpdatePaymentType($em), $payment);
        
        if($request->getMethod() == Request::METHOD_POST)
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // Save the username and datetime of the updated payment, and then flush.
                $payment->setUserActionDate(new \DateTime('now'));
                $payment->setUsername($this->getUser()->getUsername());
                $em->flush();

                $this->addFlash(
                    'notice',
                    'Your changes were saved!'
                );
                /*
                 * Return the string  "saved" to the ajaxcall. The function.js script will know
                 * that the data has been saved so it can close the modal window and reload the page
                 * to display the flash message.
                 * Todo: Refactor ideas: return a json response, its nicier I guess.
                 */
                return new Response('saved',200);
            }
            
            return $this->render(
            'SerlimarSerlEdgeBundle:Payment:_edit-payment.html.twig', array(
                'payment' => $payment,
                'form' => $form->createView()
                )
        );
            
        }
        return $this->render(
            'SerlimarSerlEdgeBundle:Payment:_edit-payment.html.twig', array(
                'payment' => $payment,
                'form' => $form->createView()
                )
        );
    }
    /*
     * Show the payment with the requested id
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('Select p.paymentsid, p.paymentdate, l.lookup as paymentmethod, p.amount, c.firstname, c.name, p.insertuser, p.note from SerlimarSerlEdgeBundle:Tblpayments p '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = p.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = p.paymentmethod '
                . ' WHERE p.paymentsid = :paymentsid'
               )->setParameter('paymentsid', $id);
        $payment = $query->getResult();
        
        return $this->render(
            'SerlimarSerlEdgeBundle:Payment:_show-payment.html.twig', array(
                'payment' => $payment[0],
                )
        );
    }
    
    
    /**
     *  Delete a payment registration record.
     */
    public function deleteAction(Request $request,$id)
    {
        $referer = $request->headers->get('referer');
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                'DELETE FROM SerlimarSerlEdgeBundle:Tblpayments p WHERE p.paymentsid = :paymentsid'
                )->setParameter('paymentsid',$id);
        if($query->execute())
        {
            $this->addFlash(
                    'notice',
                    'Payment record with id ' . $id . ' has been removed!'
                );
        }
        
        return $this->redirect($referer);
    }
    
    /*
     * Get a new paymentsId by increase the last paymentsId in the database by 1.
     */
    private function generatePaymentsId()
    {
        $lastPaymentsId = $this->getDoctrine()->getManager()->createQuery('SELECT p.paymentsid FROM Serlimar\SerlEdgeBundle\Entity\Tblpayments p ORDER BY p.paymentsid DESC')->setMaxResults(1)->getResult();
        return $lastPaymentsId[0]["paymentsid"] + 1;
        
    }
    
    public function receiptAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('Select p.paymentsid,  p.amount, p.paymentdate, p.insertuser, l.lookup as paymentmethod, '
                . 'p.amount, c.customerno, c.firstname, c.name, c.address, p.insertuser, p.note, p.reference, s.region from SerlimarSerlEdgeBundle:Tblpayments p '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = p.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = p.paymentmethod '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbladdresses a WITH c.addressid = a.addressid'
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblstreetnames s WITH a.streetnameid= s.streetnameid'
                . ' WHERE p.paymentsid = :paymentsid'
               )->setParameter('paymentsid', $id);
        $payment = $query->getResult();
        
       
        return $this->render(
            'SerlimarSerlEdgeBundle:Payment:payment-receipt.html.twig', array(
                'payment' => $payment[0],
                )
        );
    }
    public function printAllAction()
    {
        $printQuery = $this->get('session')->get('mainQueryInSession');
        $sumQuery = $this->get('session')->get('sumQueryInSession');
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery($printQuery);
        $sumQuery = $em->createQuery($sumQuery);
        
        $payments = $query->getResult();
        $sumAmount = $sumQuery->getResult();
        $dates = [$this->get('session')->get('filterStartDate'), $this->get('session')->get('filterEndDate')];  
        return $this->render(
            'SerlimarSerlEdgeBundle:Payment:printall.html.twig', array(
                'payments' => $payments,
                'dates' => $dates,
                'sumAmount' => $sumAmount,
                )
        );
        
    }
    
    
    public function clearFilterAction()
    {
        $this->get('session')->remove('mainQueryInSession');  
        $this->get('session')->remove('QueryInSession');  
        $this->get('session')->remove('filterQueryInSession');  
        $this->get('session')->remove('filterStartDate');  
        $this->get('session')->remove('filterEndDate');  
        return $this->redirectToRoute('serlimar_serledge_payment');
    }
}
