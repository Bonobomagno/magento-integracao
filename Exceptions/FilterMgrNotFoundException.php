<?php

namespace Exceptions;

final class FilterMgrNotFoundException extends \Exception {
    
    public function __construct() {
        parent::__construct('FilterMgr not found.');
    }
    
}
