<?php

namespace Serlimar\SerlEdgeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Serlimar\SerlEdgeBundle\Form\RoleCollectionType;
use Serlimar\SerlEdgeBundle\Entity\Tblusers;
use Serlimar\SerlEdgeBundle\Entity\Tblroles;
use \Serlimar\SerlEdgeBundle\Entity\TblroleCollection;
use Serlimar\SerlEdgeBundle\Entity\TblroleCollectionRoles;

class RoleController extends Controller
{
    /*
     * 
     * List all users from the database 
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
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
         * If form is submitted: Handle request, validate the form submitted  
         * formfields and persist if form is valid.
         */
        if($request->getMethod() == Request::METHOD_POST)
        {
            $role = new TblroleCollection();
            $form = $this->createForm(new RoleCollectionType($em),$role);
            
            $form->handleRequest($request);
            
            $data = $form->getData();

            if ($form->isValid()){
               
                $em->persist($role);
                $em->flush();
                
                $this->insertRolesinDb($data->getPayment(), $role->getId());
                $this->insertRolesinDb($data->getCustomer(), $role->getId());
                $this->insertRolesinDb($data->getUser(), $role->getId());
                $this->insertRolesinDb($data->getRoleCollection(), $role->getId());
                     //  die;         
                $this->addFlash(
                    'notice',
                    'Your changes were saved!'
                );
                return new Response('saved',200);
            }
            return $this->render('SerlimarSerlEdgeBundle:Role:_create-role.html.twig', array(
           'form'=>$form->createView()));
        }
        $form = $this->createForm(new RoleCollectionType($em));
        return $this->render('SerlimarSerlEdgeBundle:Role:_create-role.html.twig', array(
            'form'=>$form->createView() 
        ));
    }
    
    private function insertRolesinDb($entityArray, $roleId)
    {
        $em = $this->getDoctrine()->getManager();
        
        if(is_array($entityArray) || sizeof($entityArray) !== 0 || $entity !== null)
        {
             foreach($entityArray as $r)
             {
                 $role = new TblroleCollectionRoles();
                 $role->setRoleId($r);
                 $role->setRoleCollectionId($roleId);
                 $em->persist($role);
             }
        }
        $em->flush();
       
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
        $roleResults = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\TblroleCollection')->findBy(array('id'=> $id));
        $roleObject = $roleResults[0];
        
        $entityArrays = $this->getPermissionByRoleCollectionId($id);
       
        $roleObject->setPayment($entityArrays['payment']);
        $roleObject->setUser($entityArrays['user']);
        $roleObject->setCustomer($entityArrays['customer']);
        $roleObject->setRoleCollection($entityArrays['role']);
        
        $form = $this->createForm(new RoleCollectionType($em),$roleObject);
        
        /*
         * If form is submitted: Handle request, validate the form submitted  
         * formfields and persist if form is valid.
         */
        if($request->getMethod() == Request::METHOD_POST)
        {
            $form->handleRequest($request);
            
            $data = $form->getData();

            if ($form->isValid()){
//                
//                $paymentSubmit = $data->getPayment();
//                $customerSubmit = $data->getCustomer();
//                $userSubmit = $data->getUser();
//                $roleSubmit = $data->getRoleCollection();
                
                $submittedArrays = array(
                    'payment' => $data->getPayment(),
                    'customer' => $data->getCustomer(),
                    'user' => $data->getUser(),
                    'role' => $data->getRoleCollection()
                );
                      
                $this->updatePermissions($submittedArrays, $id);
                
                $this->addFlash(
                    'notice',
                    'Your changes were saved!'
                );
                return new Response('saved',200);
            }
            return $this->render('SerlimarSerlEdgeBundle:Role:_create-role.html.twig', array(
           'form'=>$form->createView()));
        }
        
        return $this->render('SerlimarSerlEdgeBundle:Role:_edit-role.html.twig', array(
            'role'=>$roleObject,
            'form'=>$form->createView() 
        ));
    }
    
    
    private function updatePermissions($submittedArrays, $id)
    {
        $em = $this->getDoctrine()->getManager(); 
        
        $query = $em->createQuery(
        'SELECT rc.roleId from SerlimarSerlEdgeBundle:TblroleCollectionRoles rc where '
                . 'rc.roleCollectionId = :id group by rc.roleId')->setParameter('id',$id);
        
        $query->execute();
        $permissions = $query->getResult();
        $p = array();
        foreach($permissions as $permission)
        {
            array_push($p, $permission['roleId']);
        }
        $s = array();
        foreach ($submittedArrays as $key => $value)
        {
            foreach($value as $v){
                array_push($s,$v);
            }
        }
        
        $toDelete=array_diff($p,$s);
        $toAdd = array_diff($s, $p);
       
        foreach($toAdd as $a)
        {
            $role = new TblroleCollectionRoles();
            $role->setRoleId($a);
            $role->setRoleCollectionId($id);
            $em->persist($role);
        }
        
        foreach($toDelete as $d)
        {
            $roleResults = $em->getRepository('Serlimar\SerlEdgeBundle\Entity\TblroleCollectionRoles')->findBy(array('roleCollectionId'=> $id,'roleId'=> $d ));
            $role = $roleResults[0];
            $em->remove($role);
        }
   
       
        $em->flush();

    }
    
    private function getPermissionByRoleCollectionId($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQuery(
        'SELECT r.id, r.entity FROM SerlimarSerlEdgeBundle:Tblroles r where r.id in'
        . '(select rc.roleId from SerlimarSerlEdgeBundle:TblroleCollectionRoles rc where '
        . 'rc.roleCollectionId = :id)')->setParameter('id',$id);
        
        $query->execute();
        $permissions = $query->getResult();
        
        $paymentArray = array();
        $userArray = array();
        $customerArray = array();
        $roleArray = array();
        
        foreach($permissions as $permission)
        {
            switch($permission['entity']):
                case 'Payment':
                    array_push($paymentArray, $permission['id']);
                    break;
                case 'Customer':
                    array_push($customerArray, $permission['id']);
                    break;
                case 'User':
                    array_push($userArray, $permission['id']);
                    break;
                case 'Role':
                    array_push($roleArray, $permission['id']);
                    break;
            endswitch;
        }
        
        return array(
            'payment' => $paymentArray,
            'user' => $userArray,
            'customer' => $customerArray,
            'role' => $roleArray,
            );
    }
}
