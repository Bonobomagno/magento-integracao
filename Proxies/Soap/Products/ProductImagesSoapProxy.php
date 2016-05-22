<?php

namespace Proxies\Soap\Products;

use Proxies\Soap\SoapProxyBase;
use Proxies\IProductsImagesProxy;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class ProductImagesSoapProxy extends SoapProxyBase implements IProductsImagesProxy {

    private $product_id;
    
    public function SetProductId($product_id) {
        $this->product_id = $product_id;
    }

    /**
     * Allows you to retrieve information about all images of a specified product.
     * SOAP Method: catalogProductAttributeMediaList
     * @return ProxyResultBase
     */
    public function Index(IFilter $filter) {
        return $this->IndexByStoreId(null);
    }

    /**
     * Allows you to retrieve information about product images for a specified store view.
     * SOAP Method: catalogProductAttributeMediaList
     * @param int $store_id
     * @return ProxyResultBase
     */
    public function IndexByStoreId($store_id) {
        try {
            $this->ValidateProductId();
            $result = $this->GetContext()->GetClient()
                    ->catalogProductAttributeMediaList($this->GetContext()->GetSession(), $this->product_id, $store_id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Allows you to add an image for the required product.
     * SOAP Method: catalogProductAttributeMediaCreate
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Store(IResource $resource) {
        return $this->StoreByStoreId(null, $resource);
    }

    /**
     * Allows you to add an image for the required product with image settings for a specific store.
     * SOAP Method: catalogProductAttributeMediaCreate
     * @param int $store_id
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function StoreByStoreId($store_id, IResource $resource) {
        try {
            $this->ValidateProductId();
            
            $file = array(
                'content' => $resource->file_content,
                'mime' => $resource->file_mime_type,
                'name' => $resource->file_name
            );
            
            $data = array(
                'file' => $file,
                'label' => $resource->label,
                'position' => '', 
                'types' => array('thumbnail'), 
                'exclude' => 0
            );
            
            $result = $this->GetContext()->GetClient()
                    ->catalogProductAttributeMediaCreate($this->GetContext()->GetSession(), $this->product_id, $data, $store_id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Allows you to retrieve information about a specified product image.
     * SOAP Method: catalogProductAttributeMediaInfo
     * @param int $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        return $this->ShowByStoreId(null, $id);
    }

    /**
     * Allows you to retrieve information about the specified product image from a specified store.
     * SOAP Method: catalogProductAttributeMediaInfo
     * @param int $store_id
     * @param int $id
     * @return ProxyResultBase
     */
    public function ShowByStoreId($store_id, $id) {
        try {
            $this->ValidateProductId();
            $result = $this->GetContext()->GetClient()
                    ->catalogProductAttributeMediaInfo($this->GetContext()->GetSession(), $this->product_id, $id, $store_id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Allows you to update information for the specified product image.
     * SOAP Method: catalogProductAttributeMediaUpdate
     * @param int $id
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Update($id, IResource $resource) {
        return $this->UpdateByStoreId(null, $id, $resource);
    }

    /**
     * Allows you to update the specified product image information for s specified store.
     * SOAP Method: catalogProductAttributeMediaUpdate
     * @param int $store_id
     * @param int $id
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function UpdateByStoreId($store_id, $id, IResource $resource) {
        try {
            $this->ValidateProductId();
            $result = $this->GetContext()->GetClient()
                    ->catalogProductAttributeMediaUpdate($this->GetContext()->GetSession(), $this->product_id, $id, $resource, $store_id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Allows you to remove the specified image from a product.
     * SOAP Method: catalogProductAttributeMediaRemove
     * @param int $id
     * @return ProxyResultBase
     */
    public function Destroy($id) {
        return $this->DestroyByStoreId(null, $id);
    }

    /**
     * Allows you to remove an image from the required product in the specified store.
     * SOAP Method: catalogProductAttributeMediaRemove
     * @param int $store_id
     * @param int $id
     * @return ProxyResultBase
     */
    public function DestroyByStoreId($store_id, $id) {
        try {
            $this->ValidateProductId();
            $result = $this->GetContext()->GetClient()
                    ->catalogProductAttributeMediaRemove($this->GetContext()->GetSession(), $this->product_id, $id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Validate if product ID was specified.
     * @throws Exception
     */
    private function ValidateProductId() {
        if (!isset($this->product_id)) {
            throw new Exception('The product ID was not specified.');
        }
    }

}
