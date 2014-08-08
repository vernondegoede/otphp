<?php

namespace OTPHP;

use OTPHP\OTP;

abstract class HOTP extends OTP implements HOTPInterface
{
    /**
     * {@inheritdoc}
     */
    public function getProvisioningUri()
    {
        return $this->generateURI('hotp', array('counter'=>$this->getInitialCount()));
    }
    
    public function verify($otp, $counter)
    {
        if($counter < $this->getCounter()
        {
            throw new \Exception("Invalid counter. Must be at least ".$this->getCounter());
        }
        $this->counter = $counter+1;
        return parent::verify($otp, $counter);
    }
}
