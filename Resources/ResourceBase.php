<?php

namespace Resources;

class ResourceBase implements IResource {
    
    public function ObjectToArray() {
        $reflect = new \ReflectionClass($this);
        
        $properties = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);

        $parameters = array();
        foreach ($properties as $property) {
            if($this->{$property->name} !== null) {
                $parameters[$property->name] = $this->{$property->name};
            }
        }
        
        return $parameters;
    }

    public function StdClassToObject(\stdClass $stdClass) {
        $reflect = new \ReflectionClass($this);
        
        $properties = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        
        foreach ($properties as $property) {
            if(isset($stdClass->{$property->name})) {
                $this->{$property->name} = $stdClass->{$property->name};
            }
        }
    }

}
