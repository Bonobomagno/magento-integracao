<?php

namespace Filters;

use Filters\IFilterMgr;

interface IFilter {
    
    public function SetFilterMgr(IFilterMgr $filterMgr);
    public function GetFilterValues();
    
}
