<?php

/**
 * Description of PaymentController
 * Handles the payement registration requests and reposponses for the SerlEdge App.
 * 
 * @author Ferdinand Geerman
 */


namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Serlimar\SerlEdgeBundle\Entity\Payment;
use Serlimar\SerlEdgeBundle\Form\PaymentType;

class PaymentController extends Controller
{
    
    /**
     *  Show the payment registration records.
     */
    public function indexAction()
    {
        return $this->render('SerlimarSerlEdgeBundle:Payment:index.html.twig');
    }
    
    /**
     *  Create a new payment registration record.
     */
    public function createAction()
    {   
        $form = $this->createForm(new PaymentType());
        return $this->render('SerlimarSerlEdgeBundle:Payment:create.html.twig');
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
