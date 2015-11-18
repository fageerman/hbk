<?php

namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Serlimar\SerlEdgeBundle\Form\UserType;
use Serlimar\SerlEdgeBundle\Form\UserFilterType;
use Serlimar\SerlEdgeBundle\Entity\Tblusers;
use Serlimar\SerlEdgeBundle\Entity\UserFilter;


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
                'SELECT u.id, u.username, u.firstname, u.lastname, u.password, u.location, r.role FROM '
              . 'SerlimarSerlEdgeBundle:Tblusers u LEFT JOIN SerlimarSerlEdgeBundle:TblroleCollection r '
              . 'WITH u.role_collection_id = r.id ORDER BY u.id DESC');
        
        
        $filter = new UserFilter();
        $form = $this->createForm(new UserFilterType(),$filter);
        
        $usernameFilter = '';
        $locationFilter = '';
        
         //If filter is submitted
        if($request->getMethod() == Request::METHOD_POST){
            
            $form->handleRequest($request);
            $data = $form->getData();

            if($form->isValid()){
               if($data->getUsername()){
                  $usernameFilter = " AND u.username ='" . $data->getUsername() . "'";
               }if ($data->getLocation()) {
                  $locationFilter = " AND u.location = '" . $data->getLocation() . "'";
               }
            }
        }
        
        $query = $em->createQuery(
                'SELECT u.id, u.username, u.firstname, u.lastname, u.password, u.location, r.role FROM '
              . 'SerlimarSerlEdgeBundle:Tblusers u LEFT JOIN SerlimarSerlEdgeBundle:TblroleCollection r '
              . 'WITH u.role_collection_id = r.id '
              . 'WHERE 1 =1 '
              . $usernameFilter
              . $locationFilter
              . ' ORDER  BY u.id DESC');
        
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                    $query,
                    $request->query->getInt('page',1),
                    10
                );
        
        $users = $query->getResult();
        
        return $this->render('SerlimarSerlEdgeBundle:User:index.html.twig', array(
            'users' => $users,
            'pagination' => $pagination,
            'form'=>$form->createView()
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
            $plainPassword = $this->randomPassword(); //generate pass
            
            if ($form->isValid())
            {
                $user->setPassword(password_hash($plainPassword, PASSWORD_BCRYPT, array('cost'=>12)));
                
                $em->persist($user);
                $em->flush();
                
                $this->sendPasswordMail($plainPassword, $form->get('username')->getData(),$form->get('firstname')->getData(), $form->get('email')->getData());
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
    private function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    
    private function sendPasswordMail($password,$username, $name, $email)
    {
        $message = \Swift_Message::newInstance()
        ->setSubject('serlEDGE Login')
        ->setFrom('serledge@serlimar.aw')
        ->setTo($email)
        ->setBody(
            $this->renderView(
                'SerlimarSerlEdgeBundle:User:_email_user_password.html.twig',
                array(
                    'password' => $password,
                    'name' => $name,
                    'username' => $username
                )
            ),
            'text/html'
        );
        $this->get('mailer')->send($message);
    }
    
    
    public function resetPasswordAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userResult = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblusers')->findBy(array('id'=> $id));
        $user = $userResult[0];
        $password = $this->randomPassword();
        $user->setPassword(password_hash($password, PASSWORD_BCRYPT, array('cost'=>12)));
        $em->flush();
        
        $this->sendPasswordMail($password, $user->getUsername(), $user->getFirstname(), $user->getEmail());
        $this->addFlash(
                    'notice',
                    'A new password has been sent to ' . $user->getEmail() . '.'
                );
        return $this->redirectToRoute('serlimar_serledge_user');
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
