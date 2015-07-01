<?php

/**
 * Description of CustomerController
 * Search for customers record in the SerlEdge App.
 *
 * @author Ferdinand Geerman
 */


namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Serlimar\SerlEdgeBundle\Form\CustomerType;


class CustomerController extends Controller
{

    /**
     *  Show the payment registration records.
     */
    public function indexAction()
    {

        $form = $this->createForm(new CustomerType());
        return $this->render('SerlimarSerlEdgeBundle:Customer:customer.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
