<?php

namespace App\Taxes;

use Psr\Log\LoggerInterface;

class Detector{

    protected $logger;
    protected $seuil;

    public function __construct(LoggerInterface $logger , $seuil)
    {
        $this->seuil = $seuil;
    }


    public function detect(float $amount) : bool{
        if ($amount > $this->seuil){
            return true; 
        }
        return false;
    }
}