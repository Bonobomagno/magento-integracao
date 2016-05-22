<?php

namespace Proxies;

use Resources\IResource;
use Filters\IFilter;

interface IProxy {
    
    /**
     * Allows you to retrieve a list of resources with detailed information.
     */
    public function Index(IFilter $filter);
    
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
    
    /**
     * Formats filters for context
     * @param IFilter $filter
     * @return string Formatted string values
     */
    public function GetFilterValues(IFilter $filter);
    
}
