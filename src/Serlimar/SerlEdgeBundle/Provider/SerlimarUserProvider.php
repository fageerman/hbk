<?php
/**
 * Description of SerlimarUserProvider
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\Provider;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Serlimar\SerlEdgeBundle\Entity\SerlimarUser;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAware;

class SerlimarUserProvider extends ContainerAware implements UserProviderInterface
{
    private $em;

    
    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
        
    }
  

    public function loadUserByUsername($username) 
    {
        //Retrieve user from database with an mysql query.
        $query = $this->em->getConnection()->prepare('select Username, Password from tblusers where Username=' . "'$username'");
        $query->execute();
        $result = $query->fetch();
        
        if(empty($result))
        {
            throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
            );
        }
        //Return a new SerlimarUser Object with the right credentials. This is going to be compared
        //with the user provided credentials.
        return new SerlimarUser($result['Username'], $result['Password'], array('ROLE_ADMIN'));
      
    }
    
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof SerlimarUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }
    
    public function supportsClass($class)
    {
        return $class === 'Redstar\UserBundle\Entity\SerlimarUser';
    }
    
    
}
