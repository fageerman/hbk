<?php

namespace Redstar\SecurityBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Form\FormError;

class DefaultController extends Controller
{
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }
        
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        return $this->render(
            'RedstarSecurityBundle:Default:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
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
           // var_dump($user);
            if(empty($user))
            {
                $error = 'Please fill in a valid username.';
            }
            elseif ($user[0]->getEmail() === null) {
                $error = "The user does not have a registered email. Please contact the system administrator.";
            
            }
            else{
            $password = $this->randomPassword();
            $user[0]->setPassword(password_hash($password, PASSWORD_BCRYPT, array('cost'=>12)));
            $em->flush();
            
            $message = \Swift_Message::newInstance()
            ->setSubject('serlEDGE Password reset')
            ->setFrom('serledge@serlimar.aw')
            ->setTo($user[0]->getEmail())
            ->setBody(
                $this->renderView(
                    'RedstarSecurityBundle:Default:_email_password_reset.html.twig',
                    array(
                        'user' => $user[0],
                        'password' => $password
                    )
                ),
                'text/html'
            );
            $this->get('mailer')->send($message);
            
            $this->addFlash('notice', 'A new password has been send to ' .$user[0]->getEmail() . '.');
            
            return $this->redirectToRoute('redstar_security_login');
            }
        }
        
        return $this->render('RedstarSecurityBundle:Default:forgot-password.html.twig',
                array(
                    'form' =>$form->createView(),
                    'error' => $error
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
    
}
