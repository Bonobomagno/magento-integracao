<?php

namespace Proxies\Soap\Products;

use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class ProductWebsitesSoapProxy extends SoapProxyBase {
    
    private $product_id;
    
    public function SetProductId($product_id) {
        $this->product_id = $product_id;
    }
    

    /**
     * Allows you to retrieve information about websites assigned to the specified product.
     * SOAP Method: catalogProductInfo
     * @return ProxyResultBase
     */
    public function Index(IFilter $filter) {
        try {
            $this->ValidateProductId();
            
            $product = $this->GetContext()->GetClient()->catalogProductInfo($this->GetContext()->GetSession(), $this->product_id, null, 'product');
            
            $result = array();
            foreach ($product->websites as $website_id) {
                $website = new \stdClass();
                $website->website_id = $website_id;
                array_push($result, $website);
            }
            
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Allows you to assign a website to a specified product.
     * SOAP Method: catalogProductUpdate
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Store(IResource $resource) {
        $result = $this->Index();
        
        if ($result->IsSuccess()) {
            $websites = array();
            foreach ($result->GetResult() as $website) {
                array_push($websites, $website->website_id);
            }
            
            $product = new \Resources\Products\ProductResource();
            $product->website_ids = array_merge($websites, array($resource->website_id));
            
            try {
                $result = $this->GetContext()->GetClient()->catalogProductUpdate($this->GetContext()->GetSession(), $this->product_id, $product->ObjectToArray(), null, 'product');
                return ProxyResultBase::CreateSuccessResult($result);
            } catch (\Exception $ex) {
                $errors = array();
                return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
            }
            
        }
        else {
            return $result;
        }
    }

    /**
     * Allows you to unassign a website from a specified product.
     * @param int $id
     * @return ProxyResultBase
     */
    public function Destroy($id) {
        $result = $this->Index();
        
        if ($result->IsSuccess()) {
            $websites = array();
            foreach ($result->GetResult() as $website) {
                array_push($websites, $website->website_id);
            }
            
            $product = new \Resources\Products\ProductResource();
            $product->website_ids = array_values(array_diff($websites, array($id)));
            
            try {
                $result = $this->GetContext()->GetClient()->catalogProductUpdate($this->GetContext()->GetSession(), $this->product_id, $product->ObjectToArray(), null, 'product');
                return ProxyResultBase::CreateSuccessResult($result);
            } catch (\Exception $ex) {
                $errors = array();
                return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
            }
            
        }
        else {
            return $result;
        }
    }

    /**
     * Not implemented.
     * @param int $id
     * @throws \Exceptions\NotImplementedException
     */
    public function Show($id) {
        throw new \Exceptions\NotImplementedException;
    }

    /**
     * Not implemented.
     * @param int $id
     * @param IResource $resource
     * @throws \Exceptions\NotImplementedException
     */
    public function Update($id, IResource $resource) {
        throw new \Exceptions\NotImplementedException;
    }
    
    private function ValidateProductId() {
        if (!isset($this->product_id)) {
            throw new Exception('The product ID was not specified.');
        }
    }
    
}