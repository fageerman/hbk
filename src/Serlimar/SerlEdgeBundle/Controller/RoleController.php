<?php

namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Serlimar\SerlEdgeBundle\Form\RoleCollectionType;
use Serlimar\SerlEdgeBundle\Entity\Tblusers;
use Serlimar\SerlEdgeBundle\Entity\Tblroles;
use \Serlimar\SerlEdgeBundle\Entity\TblroleCollection;

class RoleController extends Controller
{
    /*
     * 
     * List all users from the database 
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
//        $query =$em->createQuery(
//                ' select rc.role, r.name, r.entity, r.operation from '
//              . ' SerlimarSerlEdgeBundle:Tblroles r join '
//              . ' SerlimarSerlEdgeBundle:TblroleCollectionRoles  cr with r.id = cr.roleId join '
//              . ' SerlimarSerlEdgeBundle:TblroleCollection rc with cr.roleCollectionId = rc.id '
//            );
//        
//        $query = $this->em->getConnection()->prepare('select rc.role, r.name, r.entity, r.operation from tblroles r inner join  tblrole_collection_roles cr on r.id = cr.role_id right join tblrole_collection rc on cr.role_collection_id = rc.id');
//        $query->execute();
//        $result = $query->fetch();
        
        
          
         $query =$em->createQuery(
                ' select rc.id, rc.role from '
              . ' SerlimarSerlEdgeBundle:TblroleCollection rc'
            );
         
             
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                    $query,
                    $request->query->getInt('page',1),
                    10
                );
        
        $roles = $query->getResult();
        $sizeRoles = sizeof($roles);
        $count = 0;
        foreach($roles as $role){
         $query =$em->createQuery(
                ' select r.entity, r.operation from '
              . ' SerlimarSerlEdgeBundle:Tblroles r join SerlimarSerlEdgeBundle:TblroleCollectionRoles cr '
              . ' with cr.roleId = r.id where cr.roleCollectionId= ' . $role['id']
            );
            $temp = array();
            $roles[$count]['roles'] = $query->getResult();
            $count++;  
        }
//        echo "<pre>";
//        var_dump($roles);
//        echo "</pre>";die;
        
        return $this->render('SerlimarSerlEdgeBundle:Role:index.html.twig', array(
            'roles' => $roles,
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
            
            $role = new TblroleCollection();
            $form = $this->createForm(new RoleCollectionType($em),$role);
            
            $form->handleRequest($request);
            
            
            
            if ($form->isValid()){
               
                $em->persist($role);
                $em->flush();

                $this->addFlash(
                    'notice',
                    'Your changes were saved!'
                );
                return new Response('saved',200);
            }
            return $this->render('SerlimarSerlEdgeBundle:Role:_create-role.html.twig', array(
           'form'=>$form->createView()));
        }
        $form = $this->createForm(new RoleCollectionType($this->getDoctrine()->getManager()));
        return $this->render('SerlimarSerlEdgeBundle:Role:_create-role.html.twig', array(
            'form'=>$form->createView() 
        ));
    }
    
    
    public function deleteAction(Request $request,$id)
    {
        //To go back where you were.
        $referer = $request->headers->get('referer');
        
        //The superadmin or the admin is to be deleted, don't let it happen.
        if($id === 1 || $id === 2)
        {
            $this->addFlash(
                    'warning',
                    'You can not delete this role with id :' . $id . '!'
            );
            return $this->redirect($referer);
        }
        
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
                'DELETE FROM SerlimarSerlEdgeBundle:TblroleCollection r WHERE r.id = :id'
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
        $logger = $this->get('logger');
        $form = $this->createForm(new UpdateUserType($logger, true), $user);
       
        if($request->getMethod() == "POST")
        {
            $form->handleRequest($request);
            $password = $form->getData()->getPassword();
                
            if ($form->isValid()) {
                if($password !== null){
                    
                    $user->setPassword(password_hash($password, PASSWORD_BCRYPT, array('cost'=>12)));
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
