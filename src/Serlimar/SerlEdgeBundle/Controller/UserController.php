<?php

namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Serlimar\SerlEdgeBundle\Form\UserType;
use Serlimar\SerlEdgeBundle\Form\UpdateUserType;
use Serlimar\SerlEdgeBundle\Entity\Tblusers;
use Serlimar\SerlEdgeBundle\Entity\Tblrole_collection;


class UserController extends Controller
{
    /*
     * 
     * List all users from the database 
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
                'SELECT u.id, u.username, u.firstname, u.lastname, u.password, r.role FROM '
              . 'SerlimarSerlEdgeBundle:Tblusers u LEFT JOIN SerlimarSerlEdgeBundle:TblroleCollection r '
              . 'WITH u.role_collection_id = r.id ORDER BY u.id DESC');
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                    $query,
                    $request->query->getInt('page',1),
                    10
                );
        
        $users = $query->getResult();
        
        return $this->render('SerlimarSerlEdgeBundle:User:index.html.twig', array(
            'users' => $users,
            'pagination' => $pagination
        ));
    }
    
    
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
                'SELECT u.id, u.username, u.firstname, u.lastname, u.password, u.shortname, u.computername FROM '
              . 'SerlimarSerlEdgeBundle:Tblusers u WHERE u.id=:id')->setParameter('id',$id);
        
        $user = $query->getResult();
        
        return $this->render(
            'SerlimarSerlEdgeBundle:User:_show-user.html.twig', array(
                'user' => $user[0],
                )
        );
    }
    

    public function createAction(Request $request)
    {   
        
        $em = $this->getDoctrine()->getManager();
        /*
         * If form is submitted: Handle request , validate the form submitted  
         * formfields and persist if form is valid.
         */
        if($request->getMethod() == Request::METHOD_POST)
        {
            
            $user = new Tblusers();
            $form = $this->createForm(new UserType($em), $user);
            
            $form->handleRequest($request);
            $plainPassword = $form->getData()->getPlainPassword();
            
            if ($form->isValid()){
                if($plainPassword != null){
                    $user->setPassword(password_hash($plainPassword, PASSWORD_BCRYPT, array('cost'=>12)));
                }
                
                $em->persist($user);
                $em->flush();

                $this->addFlash(
                    'notice',
                    'Your changes were saved!'
                );
                return new Response('saved',200);
            }
            return $this->render('SerlimarSerlEdgeBundle:User:_create-user.html.twig', array(
           'form'=>$form->createView()));
        }
        $form = $this->createForm(new UserType($em));
        return $this->render('SerlimarSerlEdgeBundle:User:_create-user.html.twig', array(
            'form'=>$form->createView() 
        ));
    }
    
    public function deleteAction(Request $request,$id)
    {
        //To go back where you were.
        $referer = $request->headers->get('referer');
        
        if($this->getUser()->getId() === $id)
        {
            $this->addFlash(
                    'warning',
                    'You can not delete your user account with id:' . $id . '!'
            );
            return $this->redirect($referer);
        }
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
                'DELETE FROM SerlimarSerlEdgeBundle:Tblusers u WHERE u.id = :id'
                )->setParameter('id',$id);
        if($query->execute())
        {
            $this->addFlash(
                    'notice',
                    'User with id ' . $id . ' has been removed!'
                );
        }
        return $this->redirect($referer);
    }
    

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $userResult = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblusers')->findBy(array('id'=> $id));
        $user = $userResult[0];
       
        $form = $this->createForm(new UserType($em), $user);
       
        if($request->getMethod() == "POST")
        {
            $form->handleRequest($request);
            $plainPassword = $form->getData()->getPlainPassword();
            
            if ($form->isValid()) {
                if($plainPassword != null){
                    $user->setPassword(password_hash($plainPassword, PASSWORD_BCRYPT, array('cost'=>12)));
                }
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
            'SerlimarSerlEdgeBundle:User:_edit-user.html.twig', array(
                'user' => $user,
                'form' => $form->createView()
                )
        );
    }
}
