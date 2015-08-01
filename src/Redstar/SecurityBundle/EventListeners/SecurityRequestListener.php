<?php

namespace Redstar\SecurityBundle\EventListeners;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class SecurityRequestListener
{
    private $securityContext = null;
    private $user = null;
    private $em;
    
    public function __construct(SecurityContext $securityContext, EntityManager $em) {
        $this->securityContext = $securityContext;
        $this->em = $em;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            // don't do anything if it's not the master request
            return;
        }
        $request = $event->getRequest();
        
        $token = $this->securityContext->getToken();
        if($token instanceof AnonymousToken){
            echo "user not logged in";
        }elseif($token instanceof UsernamePasswordToken){

           $uri = $request->getRequestUri();

           $whitelistUri = $token->getUser()->getWhiteListUri();
           $isGranted = false;
           
           foreach($whitelistUri as $whiteUri)
           {
                if(preg_match($whiteUri, $uri)){
                    $isGranted = true;
                    continue;
                }
           }
           if(!$isGranted){
               throw new AccessDeniedException();
           }
        }
    }
}