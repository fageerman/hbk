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
        if (!$customerguid) {
            return "";
        }

        $customerguidResult = $this->em->createQuery('SELECT c.customerno FROM SerlimarSerlEdgeBundle:Tblcustomers c WHERE c.guid = :guid')
            ->setParameter('guid',$customerguid)->getResult();
        $customerNr = (empty($customerguidResult))? "": $customerguidResult[0]['customerno'];
       // echo $customerNr;
        return $customerNr;
    }

    /**
     * Transforms a customernr to a customerguid if its a valid one.
     *
     * @param  string customernr
     * @return string
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($customernr)
    {
       
        if (null === $customernr) {
            return "";
        }
        
        $customerguidResult = $this->em->createQuery('SELECT c.guid FROM SerlimarSerlEdgeBundle:Tblcustomers c WHERE c.customerno = :customerNo')
                ->setParameter('customerNo',$customernr)->getResult();
        $customerGuid = (empty($customerguidResult))? null: $customerguidResult[0]['guid'];
        return $customerGuid;

    }
}