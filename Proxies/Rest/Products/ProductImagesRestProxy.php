<?php

namespace Proxies\Rest\Products;

use Proxies\Rest\RestProxyBase;
use Resources\IResource;
use Proxies\IProductsImagesProxy;
use ProxyResults\ProxyResultBase;

final class ProductImagesRestProxy extends RestProxyBase implements IProductsImagesProxy {
    
    private $product_id;
    
    public function GetResourceName() {
        $this->ValidateProductId();
        
        return "products/{$this->product_id}/images";
    }
    
    public function SetProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function DestroyByStoreId($store_id, $id) {
        $this->ValidateProductId();
        
        $resourceUri = $this->GetContext()->GetApiUrl() . "/products/{$this->product_id}/images/$id/store/$store_id";
        
        try {
            $this->GetContext()->GetClient()->fetch($resourceUri, OAUTH_HTTP_METHOD_DELETE);
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            $resource = json_decode($lastResponse);
            return ProxyResultBase::CreateSuccessResult($resource);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }

    public function IndexByStoreId($store_id) {
        $this->ValidateProductId();
        
        $resourceUri = $this->GetContext()->GetApiUrl() . "/products/{$this->product_id}/images/store/$store_id";
        
        try {
            $this->GetContext()->GetClient()->fetch($resourceUri);
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            $resources = json_decode($lastResponse);
            return ProxyResultBase::CreateSuccessResult($resources);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
        
    }

    public function ShowByStoreId($store_id, $id) {
        $this->ValidateProductId();
        
        $resourceUrl = $this->GetContext()->GetApiUrl() . "/products/{$this->product_id}/images/$id/store/$store_id";
        try {
            $this->GetContext()->GetClient()->fetch($resourceUrl);
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            $resource = json_decode($lastResponse);
            
            return ProxyResultBase::CreateSuccessResult($resource);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }

    public function StoreByStoreId($store_id, IResource $resource) {
        $this->ValidateProductId();
        
        $resourceUri = $this->GetContext()->GetApiUrl() . "/products/{$this->product_id}/images/store/$store_id";
        $resourceData = json_encode($resource->ObjectToArray());
        
        try {
            $this->GetContext()->GetClient()->disableRedirects();
            $this->GetContext()->GetClient()->fetch($resourceUri, $resourceData, OAUTH_HTTP_METHOD_POST, $this->GetContext()->GetHeaders());
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            return ProxyResultBase::CreateSuccessResult($lastResponse);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }

    public function UpdateByStoreId($store_id, $id, IResource $resource) {
        $this->ValidateProductId();
        
        $resourceUrl = $this->GetContext()->GetApiUrl() . "/products/{$this->product_id}/images/$id/store/$store_id";
        $resourceData = json_encode($resource->ObjectToArray());
        
        try{
            $this->GetContext()->GetClient()->fetch($resourceUrl, $resourceData, OAUTH_HTTP_METHOD_PUT, $this->GetContext()->GetHeaders());
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            return ProxyResultBase::CreateSuccessResult($lastResponse);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }
    
    private function ValidateProductId() {
        if (!isset($this->product_id)) {
            throw new Exception('The product ID was not specified.');
        }
    }

}
