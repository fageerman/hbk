<?php
/**
 * Description of CustomerNrToGuidTransformer
 *
 * @author Ferdinand Geerman
 */
namespace Serlimar\SerlEdgeBundle\DataTransformer;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CustomerNrToGuidTransformer implements DataTransformerInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Transforms a customerguid to customernr
     *
     * @param  customerguid
     * @return string
     */
    public function transform($customerguid)
    {
        //die('transform');
        if (!$customerguid) {
            return null;
        }

        $customerguidResult = $this->em->createQuery('SELECT c.customerid FROM SerlimarSerlEdgeBundle:Tblcustomers c WHERE c.guid = :guid')
            ->setParameter('guid',$customerguid)->getResult();
        $customerId = (empty($customerguidResult))? null: $customerguidResult[0]['customerid'];
        return $customerId;
    }

    /**
     * Transforms a customernr to a customerguid if its a valid one.
     *
     * @param  string customernr
     * @return string
     */
    public function reverseTransform($customerid)
    {
        die('reverseTransform');
        if (null === $customerid) {
            return null;
        }
        
        $customerguidResult = $this->em->createQuery('SELECT c.guid FROM SerlimarSerlEdgeBundle:Tblcustomers c WHERE c.customerid = :customerid')
                ->setParameter('customerid',$customerid)->getResult();
        $customerGuid = (empty($customerguidResult))? null: $customerguidResult[0]['guid'];
        return $customerGuid;

    }
}