<?php
namespace Serlimar\SerlEdgeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder extends ContainerAware
{
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Add payement', array('route' => 'serlimar_serl_edge_create_payment'));
        $menu->addChild('Payment Overview', array('route' => 'serlimar_serl_edge_payment'));
//        $menu->addChild('Customer', array('route' => 'serlimar_serl_edge_payment'));
//        $menu->addChild('User Management', array('route' => 'serlimar_serl_edge_payment'));

        return $menu;
    }
}