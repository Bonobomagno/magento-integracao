<?php

namespace Proxies\Soap\Products;

use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class ProductCategoriesSoapProxy extends SoapProxyBase {
    
    private $product_id;
    
    public function SetProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function Destroy($id) {
        try {
            $this->ValidateProductId();
            $result = $this->GetContext()->GetClient()->catalogCategoryRemoveProduct($this->GetContext()->GetSession(), $id, $this->product_id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    public function Index() {
        try {
            $this->ValidateProductId();
            
            $product = $this->GetContext()->GetClient()->catalogProductInfo($this->GetContext()->GetSession(), $this->product_id);
            
            $result = array();
            foreach ($product->categories as $category_id) {
                $category = new \stdClass();
                $category->category_id = $category_id;
                array_push($result, $category);
            }
            
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    public function Show($id) {
        $errors = array();
        return ProxyResultBase::CreateErrorResult($errors, 'Not implemented.');
    }

    public function Store(\Resources\IResource $resource) {
        try {
            $this->ValidateProductId();
            $result = $this->GetContext()->GetClient()->catalogCategoryAssignProduct($this->GetContext()->GetSession(), $resource->category_id, $this->product_id, null, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    public function Update($id, IResource $resource) {
        $errors = array();
        return ProxyResultBase::CreateErrorResult($errors, 'Not implemented.');
    }
    
    private function ValidateProductId() {
        if (!isset($this->product_id)) {
            throw new Exception('The product ID was not specified.');
        }
    }

}
