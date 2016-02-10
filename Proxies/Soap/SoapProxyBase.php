<?php

namespace Proxies\Soap;

use Proxies\IProxy;

abstract class SoapProxyBase implements IProxy {
    
    private $context;
    
    /**
     * 
     * @return \Context\SoapContext
     */
    public function GetContext() {
        if ($this->context === null) {
            $this->context = new \Context\SoapContext();
        }
        
        return $this->context;
    }
    
}
