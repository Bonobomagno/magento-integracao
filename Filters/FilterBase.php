<?php

namespace Filters;

abstract class FilterBase implements IFilter {
    
    /**
     *
     * @var IFilterMgr
     */
    private $filterMgr;
    
    public function SetFilterMgr(IFilterMgr $filterMgr) {
        $this->filterMgr = $filterMgr;
    }
    
    public function GetFilterValues() {
        $this->ValidateFilterManager();
        return $this->filterMgr->GetFilter($this);
    }
    
    private function ValidateFilterManager() {
        if ($this->filterMgr == null) {
            throw new \integracao\Magento\Exceptions\FilterMgrNotFoundException;
        }
    }

}
