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
use Symfony\Component\HttpFoundation\Session\Session;

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
    
    public function nameAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $customer = $em->getRepository('SerlimarSerlEdgeBundle:Tblcustomers')->findBy(array(
            'customerid' => $id
        ));
        
        if(sizeof($customer) === 0)
        {
            return new Response('Unknown',200);
        }
        
        $fullName = $customer[0]->getFirstName() . " " . $customer[0]->getName();
        return new Response($fullName,200);
    }
    
    /*
    *  I needed to pass a dynamic variable to a request. This is done using a
    *  session to temporarly store the variable. This variable is being called
    *  in the payment/create route. The value is inserted in de customerguid form element. And then removed.
    */
    public function proxyPaymentAction($customerid)
    {
        $this->get('session')->set('customerIdPayment',$customerid);
        //die($this->get('session')->get('customerIdPayment'));
        return $this->redirectToRoute('serlimar_serledge_create_payment', array(),302);
    }

}
