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
use Serlimar\SerlEdgeBundle\Entity\Payment;
use Serlimar\SerlEdgeBundle\Form\PaymentType;

class PaymentController extends Controller
{
    
    /**
     *  Show the payment registration records.
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblpayments');

        $query = $em->createQuery(
                'Select p.paymentdate, l.lookup as paymentmethod, p.amount, c.firstname, c.name, p.insertuser from SerlimarSerlEdgeBundle:Tblpayments p '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tblcustomers c WITH c.guid = p.customerguid '
                . ' LEFT JOIN SerlimarSerlEdgeBundle:Tbllookups l WITH l.guid = p.paymentmethod '
                . ' WHERE p.insertuser = :insertuser'
                . ' ORDER BY p.paymentsid DESC'
                )->setParameter('insertuser','johnny');
                 //->setMaxResults(50);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                    $query,
                    $request->query->getInt('page',1),
                    15
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
    public function createAction()
    {   
        $form = $this->createForm(new PaymentType());
        return $this->render('SerlimarSerlEdgeBundle:Payment:create.html.twig', array(
            'form'=>$form->createView() 
        ));
    }
    
    /**
     *  Edit a payment registration record
     */
    public function updateAction()
    {
        return $this->render('SerlimarSerlEdgeBundle:Payment:blank.html.twig');
    }
    
    
    /**
     *  Delete a payment registration record.
     */
    public function deleteAction()
    {
        return new Response('delete payment', 200);
    }
    
    
}
