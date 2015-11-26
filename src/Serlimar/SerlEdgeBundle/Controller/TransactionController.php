<?php

/**
 * Description of TransactionController
 * Handles the transacation registration requests and reposponses for the SerlEdge App.
 * 
 * @author Ferdinand Geerman
 */

namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Serlimar\SerlEdgeBundle\Form\TransactionType;
use Serlimar\SerlEdgeBundle\Form\UpdateTransactionType;
use Serlimar\SerlEdgeBundle\Entity\Tbltransactionsqueue;
use Serlimar\SerlEdgeBundle\Entity\TransactionFilter;
use Serlimar\SerlEdgeBundle\Form\TransactionFilterType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TransactionController extends Controller
{
    
    /**
     *  Show the tranaction registration records.
     */
    public function indexAction(Request $request)
    {
      
        $em = $this->getDoctrine()->getManager();
        $today = (new \DateTime('now'))->setTime(0,0);
        $user = $this->getUser();
        $roleUser = $user->getRoleCollectionName();
        
        //List transactions with selected dates or just 'today'
        //Display transaction of all users or just a selection, or just 1?
        $dateQuery = '';
        $insertuserQuery ='';
        
        //Check the role of the user, and prepare the subquery for the specific role.
        if($roleUser === 'Cashier'){
            $dateQuery = ' and t.transactiondate = \'' . $today->format('Y-m-d H:i:s') . '\'';
            $insertuserQuery = ' and t.insertuser = \'' . $this->getUser()->getUsername() . '\'';
        }
        elseif($roleUser === 'Manager'){
            $manager = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblusers')->findBy(array('username'=> $this->getUser()->getUsername()));
            $managerLocation = $manager[0]->getLocation();
            $dateQuery = ' and t.transactiondate = \'' . $today->format('Y-m-d H:i:s') . '\'';
            $insertuserQuery = ' and t.insertuser IN(Select us.username from SerlimarSerlEdgeBundle:Tblusers us where us.location =\'' . $managerLocation . '\')';
            
        }
        elseif($roleUser === 'Superadmin') {
            $dateQuery = ' and t.transactiondate = \'' . $today->format('Y-m-d H:i:s') . '\'';
        }
           
        $filter = new TransactionFilter();
        $filter->setStartDate($this->get('session')->get('filterStartDate'));
        $filter->setEndDate($this->get('session')->get('filterEndDate'));
        $filter->setInsertedBy($this->get('session')->get('filterInsertedBy'));
        $form = $this->createForm(new TransactionFilterType(),$filter);
        
        if($this->get('session')->get('filterQueryInSession') !== null)
        {
            $dateQuery = $this->get('session')->get('filterQueryInSession');
        }

        //filter is submitted
        if($request->getMethod() == Request::METHOD_POST){
            
            $form->handleRequest($request);
            $data = $form->getData();
            if($form->isValid()){
              //  die($data->getStartDate());
                $startDate = ($data->getStartDate())?$data->getStartDate()->format('Y-m-d H:i:s'):null;
                $endDate = ($data->getEndDate())? $data->getEndDate()->format('Y-m-d H:i:s'): null;
                $insertedBy = $data->getInsertedBy();
               
                
                //Build the datequery from the submitted start/enddate from the filter.
                if($startDate !== null){
                    $dateQuery = ($endDate !== null)? ' and t.transactiondate BETWEEN \'' 
                                    . $startDate . '\' and \'' . $endDate . '\'' : ' and t.transactiondate = \'' 
                                    . $startDate . '\'';
                }
                else{
                    //$dateQuery = '';
                }
                $dateQuery .= ($insertedBy != null)?' and t.insertuser = \'' . $insertedBy . '\'':'';
               //  die($dateQuery);
                $this->get('session')->set('filterQueryInSession', $dateQuery);  
                $this->get('session')->set('filterStartDate', $data->getStartDate());  
                $this->get('session')->set('filterEndDate', $data->getEndDate());  
                $this->get('session')->set('filterInsertedBy', $data->getInsertedBy());  
            }

        }
        $mainQuery =  'Select t.id, t.transactiondate, t.voiddate, t.executed , l.lookup as transactionmethod, t.amount,t.reference, c.firstname, c.name, t.insertuser, u.location from SerlimarSerlEdgeBundle:Tbltransactionsqueue t '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = t.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = t.locationmethodguid '
                . 'LEFT JOIN SerlimarSerlEdgeBundle:Tblusers u WITH u.username=t.insertuser'
                . ' WHERE t.id is not null '
                .   $insertuserQuery 
                .   $dateQuery             
                . ' ORDER BY t.timestamp DESC ';
        
         //The same query as mainQuery but with only the sum of total amount.
         $sumQuery =  'Select SUM(t.amount) as  totalAmount , l.lookup as transactionmethod from SerlimarSerlEdgeBundle:Tbltransactionsqueue t '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = t.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = t.locationmethodguid'
                . ' WHERE t.id is not null '
                .   $insertuserQuery 
                .   $dateQuery             
                . '  GROUP BY t.locationmethodguid ORDER BY t.transactiondate DESC ';
         
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
       // var_dump($result);
       // die;
        return $this->render('SerlimarSerlEdgeBundle:Transaction:index.html.twig', array(
            'transactions' => $result,
            'sumAmount' => $sumAmount,
            'dates' => $dates,
            'filterOption' => ($roleUser === 'Cashier')?false:true,
            'pagination' => $pagination,
            'form' => $form->createView()
            ));
    }
    
    /**
     *  Create a new transaction registration record.
     */
    public function createAction(Request $request, $customerid = null)
    {   
        $em = $this->getDoctrine()->getManager();
        /*
         * If form is submitted: Handle request , validate the form submitted  
         * formfields and persist if form is valid.
         */
        $transaction = new Tbltransactionsqueue();
        $form = $this->createForm(new TransactionType($em), $transaction);
        $transactionId = null;
        
        if($request->getMethod() == Request::METHOD_POST)
        {
            $form->handleRequest($request);
            $data = $form->getData();
            
            if ($form->isValid()){
                $customer = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblcustomers')->find($data->getCustomerid());
                $transaction->setCustomerguid($customer->getGuid());
                $transaction->setCustomer($customer->getFirstname() . ' ' . $customer->getName());
                $transaction->setAddress($customer->getAddress());
                $transaction->setId($this->generateTransactionId());
                $transaction->setInsertUser($this->getUser()->getUsername());
                $transaction->setTransactiondate((new \DateTime('now'))->setTime(0,0));
                $transaction->setTimestamp(new \DateTime('now'));
               // $transaction->setReference($transaction->getInvoicenr());
                $transactionId = $transaction->getId();
                $em->persist($transaction);
                $em->flush();

                return $this->redirectToRoute('serlimar_serledge_receipt_transaction', array('id'=>$transactionId));
            }
            return $this->render('SerlimarSerlEdgeBundle:Transaction:create.html.twig', array(
           'form'=>$form->createView()));
        }
        
        $customerID = $this->get('session')->get('customerIdTransaction');  
        
        $form = $this->createForm(new TransactionType($em, $customerID));
        $this->get('session')->remove('customerIdTransaction');  
       // $this->get('session')->remove('customerIdForTransaction');
        return $this->render('SerlimarSerlEdgeBundle:Transaction:create.html.twig', array(
            'form'=>$form->createView() 
        ));
    }
    
    /**
     *  Edit a transaction registration record.
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $transactionResult = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tbltransactionsqueue')->findBy(array('id'=> $id));
        $transaction = $transactionResult[0];
       //var_dump($transaction);die;
        $form = $this->createForm(new UpdateTransactionType($em), $transaction);
        
        if($request->getMethod() == Request::METHOD_POST)
        {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // Save the username and datetime of the updated transaction, and then flush.
                $transaction->setUserActionDate(new \DateTime('now'));
                $transaction->setUsername($this->getUser()->getUsername());
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
            'SerlimarSerlEdgeBundle:Transaction:_edit-transaction.html.twig', array(
                'transaction' => $transaction,
                'form' => $form->createView()
                )
        );
            
        }
        return $this->render(
            'SerlimarSerlEdgeBundle:Transaction:_edit-transaction.html.twig', array(
                'transaction' => $transaction,
                'form' => $form->createView()
                )
        );
    }
    /*
     * Show the transaction with the requested id
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('Select t.id, t.transactiondate, l.lookup as transactionmethod, t.amount, c.firstname, c.name, t.insertuser, t.note from SerlimarSerlEdgeBundle:Tbltransactionsqueue t '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = t.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = t.locationmethodguid '
                . ' WHERE t.id = :id'
               )->setParameter('id', $id);
        $transaction = $query->getResult();
        
        return $this->render(
            'SerlimarSerlEdgeBundle:Transaction:_show-transaction.html.twig', array(
                'transaction' => $transaction[0],
                )
        );
    }
    
    
    /**
     *  Delete a transaction registration record.
     */
    public function deleteAction(Request $request,$id)
    {
        $referer = $request->headers->get('referer');
        $em = $this->getDoctrine()->getManager();
        $transaction = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tbltransactionsqueue')->findBy(array('id'=>$id));
        if(!empty($transaction))
        {
            $transaction = $transaction[0];
            if($transaction->getExecuted() !== 1)
            {
                $transaction->setAmount(0);
                $transaction->setVoiddate(new \DateTime());
                $transaction->setVoidby($this->getUser()->getUsername());
                $em->flush();
                    $this->addFlash(
                            'notice',
                            'Transaction record with id ' . $id . ' has been voided!'
                        );

                return $this->redirect($referer);
                }
        }
        
        return new NotFoundHttpException('Transaction with id ' . $id . ' does not exist', 200);
    }
    
    /*
     * Get a new transactionId by increase the last transactionID in the database by 1.
     */
    private function generateTransactionId()
    {
        $lastTransactionId = $this->getDoctrine()->getManager()->createQuery('SELECT t.id FROM Serlimar\SerlEdgeBundle\Entity\Tbltransactionsqueue t ORDER BY t.id DESC')->setMaxResults(1)->getResult();
        return $lastTransactionId[0]["id"] + 1;
        
    }
    
    public function receiptAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('Select t.id , t.amount, t.transactiondate, t.insertuser, l.lookup as transactionmethod, '
                . 't.amount, c.customerid, c.firstname, c.name, c.address, t.insertuser, t.note, t.reference, s.region from SerlimarSerlEdgeBundle:Tbltransactionsqueue t '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = t.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = t.locationmethodguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbladdresses a WITH c.addressid = a.addressid'
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblstreetnames s WITH a.streetnameid= s.streetnameid'
                . ' WHERE t.id = :transactionsid'
               )->setParameter('transactionsid', $id);
        $transaction = $query->getResult();
        
       
        return $this->render(
            'SerlimarSerlEdgeBundle:Transaction:transaction-receipt.html.twig', array(
                'transaction' => $transaction[0],
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
        
        $transactions = $query->getResult();
        $sumAmount = $sumQuery->getResult();
        $dates = [$this->get('session')->get('filterStartDate'), $this->get('session')->get('filterEndDate')];  
        return $this->render(
            'SerlimarSerlEdgeBundle:Transaction:printall.html.twig', array(
                'transactions' => $transactions,
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
        $this->get('session')->remove('filterInsertedBy');  
        return $this->redirectToRoute('serlimar_serledge_transaction');
    }
}
