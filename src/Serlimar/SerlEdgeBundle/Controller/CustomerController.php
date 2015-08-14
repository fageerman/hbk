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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Serlimar\SerlEdgeBundle\Entity\Tblcustomers;

class CustomerController extends Controller
{

    /**
     *  Show the payment registration records.
     */
    public function indexAction(Request $request)
    {   
        $customer = new Tblcustomers();
        $form = $this->createForm(new CustomerType(),$customer);
        $form->handleRequest($request);
        if($request->getMethod() == 'POST')
        {
            if($form->isValid())
            {
                $birthdate = $form->getData()->getBirthdate();
                $repo = $this->getDoctrine()->getManager()->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblcustomers');
                $result = $repo->findBy(array('birthdate' => $birthdate));
                
                return $this->render('SerlimarSerlEdgeBundle:Customer:customer.html.twig', array(
                'form' => $form->createView(),'customers' => $result
                ));
            }
            return $this->render('SerlimarSerlEdgeBundle:Customer:customer.html.twig', array(
            'form' => $form->createView(),
            ));
        }
        
        return $this->render('SerlimarSerlEdgeBundle:Customer:customer.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function nameAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $customer = $em->getRepository('SerlimarSerlEdgeBundle:Tblcustomers')->findBy(array(
            'customerid' => $id
        ));
        if(sizeof($customer) === 0)
        {
            return new Response('Unknown',200);
        }
       // var_dump($customer);die;
        $fullName = $customer[0]->getFirstName() . " " . $customer[0]->getName();
        return new Response($fullName,200);
    }

}
