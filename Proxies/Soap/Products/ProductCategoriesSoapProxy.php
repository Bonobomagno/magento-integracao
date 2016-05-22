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

    /**
     * Allows you to retrieve information about assigned categories, assign, and unassign a category from/to a product.
     * SOAP Method: catalogProductInfo
     * @return ProxyResultBase
     */
    public function Index(IFilter $filter) {
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

    /**
     * Allows you to assign a category to a specified product.
     * SOAP Method: catalogCategoryAssignProduct
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Store(IResource $resource) {
        try {
            $this->ValidateProductId();
            $result = $this->GetContext()->GetClient()->catalogCategoryAssignProduct($this->GetContext()->GetSession(), $resource->category_id, $this->product_id, null, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Allows you to unassign a category from a specified product.
     * SOAP Method: catalogCategoryRemoveProduct
     * @param int $id
     * @return ProxyResultBase
     */
    public function Destroy($id) {
        try {
            $this->ValidateProductId();
            $result = $this->GetContext()->GetClient()->catalogCategoryRemoveProduct($this->GetContext()->GetSession(), $id, $this->product_id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Not implemented.
     * @param type $id
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
