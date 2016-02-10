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
    
    public function Destroy($id) {
        return $this->DestroyByStoreId(null, $id);
    }

    public function Index() {
        return $this->IndexByStoreId(null);
    }

    public function Show($id) {
        return $this->ShowByStoreId(null, $id);
    }

    public function Store(IResource $resource) {
        return $this->StoreByStoreId(null, $resource);
    }

    public function Update($id, IResource $resource) {
        return $this->UpdateByStoreId(null, $id, $resource);
    }

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
                'position' => '2', 
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
    
    private function ValidateProductId() {
        if (!isset($this->product_id)) {
            throw new Exception('The product ID was not specified.');
        }
    }

}
