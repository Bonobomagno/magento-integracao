<?php

namespace Resources;

interface IResource {
    
    public function ObjectToArray();
    public function StdClassToObject(\stdClass $stdClass);
    
}
