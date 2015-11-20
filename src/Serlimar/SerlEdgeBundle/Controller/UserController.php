<?php

namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Serlimar\SerlEdgeBundle\Form\UserType;
use Serlimar\SerlEdgeBundle\Form\UpdateUserType;
use Serlimar\SerlEdgeBundle\Form\UserFilterType;
use Serlimar\SerlEdgeBundle\Entity\Tblusers;
use Serlimar\SerlEdgeBundle\Entity\UserFilter;
use Serlimar\SerlEdgeBundle\Form\ResetPasswordType;
use Serlimar\SerlEdgeBundle\Utilities\TokenGenerator;


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
            
            if ($form->isValid())
            {
                $user->setResetPasswordToken($this->get('serlimar_serledge_generate_token')->generateToken());
                $em->persist($user);
                $em->flush();
                
                $this->sendPasswordMail($user);
                $this->addFlash(
                    'notice',
                    'User ' . $user->getUsername() . ' is created. A link to enter '
                        . 'a password has been send to ' . $user->getEmail()
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
    
    private function sendPasswordMail($user)
    {
        $message = \Swift_Message::newInstance()
        ->setSubject('serlEDGE Login')
        ->setFrom('serledge@serlimar.aw')
        ->setTo($user->getEmail())
        ->setBody(
            $this->renderView(
                'SerlimarSerlEdgeBundle:User:_email_user_password.html.twig',
                array(
                    'token' => $user->getResetPasswordToken(),
                    'name' => $user->getFirstName(),
                    'username' => $user->getUsername()
                )
            )
        )
        ->setContentType("text/html");
        $this->get('mailer')->send($message);
    }
    
    
    public function resetPasswordAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();
        $userResult = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblusers')->findBy(array('resetPasswordToken'=> $token));
        
        if(empty($userResult[0]))
        {
            return new Response('This link is invalid. Please contact the serlEDGE helpdesk (+297 5946461)');
        }
        
        $user = $userResult[0];
        $form = $this->createForm(new ResetPasswordType(), $user);
        $token= $form->get('token')->getData();
        
        if($request->getMethod() == Request::METHOD_POST)
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
                $user->setPassword(password_hash($form->get('plainPassword')->getData(), PASSWORD_BCRYPT, array('cost'=>12)));
                $user->setResetPasswordToken(null);
                $em->flush();
                
                $this->addFlash(
                    'notice',
                    'Your password reset is successful.'
                );
        
                return $this->redirectToRoute('redstar_security_login');
            }
        }
        
        return $this->render('SerlimarSerlEdgeBundle:User:reset_password.html.twig', array(
            'form'=>$form->createView()
        ));
       

    }

    public function forgotPasswordAction(Request $request)
    {
        $form = $this->createFormBuilder()
                ->add('username','text', array('attr'=>array(
                    'placeholder'=> 'username'
                )))
                ->add('Request New Password', 'submit')
                ->getForm();
        $error = null;
        
        if($request->getMethod() == Request::METHOD_POST)
        {
            $form->handleRequest($request);
            $username = $form->get('username')->getData();
            
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository('SerlimarSerlEdgeBundle:Tblusers');
            $user = $repo->findBy(array('username'=>$username));
           
            if(empty($user))
            {
                $error = 'Please fill in a valid username.';
            }
            elseif ($user[0]->getEmail() === null) {
                $error = "The user does not have a registered email. Please contact the system administrator.";
            }
            else{
                $user[0]->setResetPasswordToken($this->get('serlimar_serledge_generate_token')->generateToken());
                //$user[0]->setPasswordRequestedAt(new \DateTime());
                $em->flush();
                $this->sendPasswordMail($user[0]);
            
            $this->addFlash('notice', 'A link for resetting your password has been send to ' .$user[0]->getEmail() . '.');
            
            return $this->redirectToRoute('redstar_security_login');
            }
        }
        
        return $this->render('SerlimarSerlEdgeBundle:User:forgot-password.html.twig',
                array(
                    'form' =>$form->createView(),
                    'error' => $error
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
       
        $form = $this->createForm(new UpdateUserType($em), $user);
       
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
    
    public function testMailAction()
    {
        $em = $this->getDoctrine()->getManager();
        $userResult = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\Tblusers')->findBy(array('id'=> 4));
        $user = $userResult[0];
        
        $message = \Swift_Message::newInstance()
        ->setSubject('serlEDGE Login')
        ->setFrom('serledge@serlimar.aw')
        ->setTo('f.a.geerman@gmail.com')
        ->setBody(
            $this->renderView(
                'SerlimarSerlEdgeBundle:User:_email_user_password.html.twig',
                array(
                    'token' => 'asdfasdf',//$user->getResetPasswordToken(),
                    'name' => $user->getFirstName(),
                    'username' => $user->getUsername()
                ),
                'text/html'
            )
        )->setContentType("text/html");
        $this->get('mailer')->send($message);
        
        return new Response('see email', 200);
    }
}
