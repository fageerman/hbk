<?php

namespace Serlimar\SerlEdgeBundle\Utilities;

use Symfony\Component\Security\Core\Util\SecureRandom;

/**
 * Description of TokenGenerator
 *
 * @author Ferdinand Geerman
 */
class TokenGenerator {

    public function generateToken()
    {
        $generator= new SecureRandom();
        $random = $generator->nextBytes(16);
        
        return md5($random);
    }
}
