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
        $query = $this->em->getConnection()->prepare('select u.id, u.Username, u.Password, u.role_collection_id , r.role from tblusers u inner join tblrole_collection r where u.role_collection_id = r.id and u.Username=' . "'$username'");
        $query->execute();
        $result = $query->fetch();
        
        if(empty($result))
        {
            throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
            );
        }
      
        $roles = array();
        $whiteListUri = array();
        $query2 = $this->em->getConnection()->prepare('select name, uri from tblroles where id in(select role_id from tblrole_collection_roles where role_collection_id = ' . $result['role_collection_id'] . ')');
        $query2->execute();
        $result2 = $query2->fetchAll();
        
        //Get the role names in the roles array
        //Get the access granted uri in the whitelistUri array. So now you have the role and the uri
        //in the SerlimarUser object
        foreach($result2 as $res ){
            array_push($roles, $res['name']);
            array_push($whiteListUri, $res['uri']);
        }
        
        return new SerlimarUser($result['id'], $result['Username'], $result['Password'], $result['role'], $roles, $whiteListUri);
      
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
