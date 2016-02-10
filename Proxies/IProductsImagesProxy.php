<?php

namespace Proxies;

use Resources\IResource;

interface IProductsImagesProxy {
    
    /**
     * Allows you to retrieve a list of resources with detailed information.
     * @param int $store_id
     */
    public function IndexByStoreId($store_id);
    
    /**
     * Allows you to create a new resource.
     * @param int $store_id
     * @param IResource $resource
     */
    public function StoreByStoreId($store_id, IResource $resource);
    
    /**
     * Allows you to retrieve information on a required resource.
     * @param int $store_id
     * @param int $id
     */
    public function ShowByStoreId($store_id, $id);
    
    /**
     * Allows you to update an existing resource.
     * @param int $store_id
     * @param int $id
     * @param IResource $resource
     */
    public function UpdateByStoreId($store_id, $id, IResource $resource);
    
    /**
     * Allows you to delete an existing resource.
     * @param int $store_id
     * @param int $id
     */
    public function DestroyByStoreId($store_id, $id);
    
}
