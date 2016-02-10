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
     * @return ProxyResultBase
     */
    public function Index() {
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
     * Not implemented.
     * @param int $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        return ProxyResultBase::CreateErrorResult(array(), 'Not implemented.');
    }

    /**
     * Allows you to assign a website to a specified product.
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
     * Not implemented.
     * @param type $id
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Update($id, IResource $resource) {
        return ProxyResultBase::CreateErrorResult(array(), 'Not implemented.');
    }

    /**
     * Allows you to unassign a website from a specified product.
     * @param type $id
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
    
    private function ValidateProductId() {
        if (!isset($this->product_id)) {
            throw new Exception('The product ID was not specified.');
        }
    }
    
}