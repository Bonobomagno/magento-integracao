<?php

namespace Proxies\Soap;

use Proxies\IProxy;
use Filters\IFilter;
use Filters\SoapFilterMgr;

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
    
    public function GetFilterValues(IFilter $filter) {
        if ($filter != null) {
            $filterMgr = new SoapFilterMgr();
            $filter->SetFilterMgr($filterMgr);
            return $filter->GetFilterValues();
        }
        
        return null;
    }
    
}
