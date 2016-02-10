<?php

namespace Exceptions;

final class NotImplementedException extends \Exception {
    
    public function __construct() {
        parent::__construct("Not implemented.");
    }
    
}
