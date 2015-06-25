<?php

namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SerlimarSerlEdgeBundle:Default:index.html.twig', array('name' => $name));
    }
}
