<?php

namespace Proxies;

use Resources\IResource;

interface IProxy {
    
    /**
     * Allows you to retrieve a list of resources with detailed information.
     */
    public function Index();
    
    /**
     * Allows you to create a new resource.
     * @param IResource $resource
     */
    public function Store(IResource $resource);
    
    /**
     * Allows you to retrieve information on a required resource.
     * @param int $id
     */
    public function Show($id);
    
    /**
     * Allows you to update an existing resource.
     * @param int $id
     * @param IResource $resource
     */
    public function Update($id, IResource $resource);
    
    /**
     * Allows you to delete an existing resource.
     * @param int $id
     */
    public function Destroy($id);
    
    /**
     * Retrieve an instance of a context class.
     * return \Context\IContext
     */
    public function GetContext();
    
}
