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

class PaymentController extends Controller
{
    
    /**
     *  Show the payment registration records.
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        /*
         * Predefined role "Cashier" must list only the payments for the day.
         */
        $today = (new \DateTime('now'))->setTime(0,0);
        $dateCashierRole = ($this->getUser()->getRoleCollectionName() == "Cashier")? ' and p.paymentdate = \'' . $today->format('Y-m-d H:i:s') . '\'' :'';
        
        $query = $em->createQuery(
                'Select p.paymentsid, p.paymentdate, l.lookup as paymentmethod, p.amount, c.firstname, c.name, p.insertuser from SerlimarSerlEdgeBundle:Tblpayments p '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = p.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = p.paymentmethod '
                . ' WHERE p.insertuser = :insertuser' . $dateCashierRole 
                . ' AND p.paymentsid is not null'
                . ' ORDER BY p.timestamp DESC'
                )->setParameter('insertuser', $this->getUser()->getUsername());
      
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                    $query,
                    $request->query->getInt('page',1),
                    10
                );
        $result = $query->getResult();
        return $this->render('SerlimarSerlEdgeBundle:Payment:index.html.twig', array(
            'payments' => $result,
            'pagination' => $pagination
            ));
    }
    
    /**
     *  Create a new payment registration record.
     */
    public function createAction(Request $request)
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

                $this->addFlash(
                    'notice',
                    'Your changes were saved!'
                );
                return $this->redirectToRoute('serlimar_serledge_payment_receipt', array('id'=>$paymentId));
            }
            return $this->render('SerlimarSerlEdgeBundle:Payment:create.html.twig', array(
           'form'=>$form->createView()));
        }
        $form = $this->createForm(new PaymentType($em));
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
        $form = $this->createForm(new UpdatePaymentType($em), $payment);
        
        if($request->getMethod() == "POST")
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
}
