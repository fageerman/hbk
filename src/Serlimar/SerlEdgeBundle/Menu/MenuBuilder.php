<?php
namespace Serlimar\SerlEdgeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class MenuBuilder extends ContainerAware
{
    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->factory = $factory;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');
        if($this->authorizationChecker->isGranted('ROLE_CREATE_PAYMENT')){
            $menu->addChild('Add Payment', array('route' => 'serlimar_serledge_create_payment'));
        }
        if($this->authorizationChecker->isGranted('ROLE_LIST_PAYMENT')){
            $menu->addChild('Payment Overview', array('route' => 'serlimar_serledge_payment'));
        }
        if($this->authorizationChecker->isGranted('ROLE_LIST_CUSTOMER')){
            $menu->addChild('Customer', array('route' => 'serlimar_serledge_customer'));
        }
        if($this->authorizationChecker->isGranted('ROLE_LIST_USER')){
            $menu->addChild('User Overview', array('route' => 'serlimar_serledge_user'));
        }
        if($this->authorizationChecker->isGranted('ROLE_LIST_ROLE')){
            $menu->addChild('Role Management', array('route' => 'serlimar_serledge_role'));
        } 
        return $menu;
    }
}