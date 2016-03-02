<?php

namespace Proxies\Soap\Products;

use Proxies\IProductsProxy;
use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class ProductsSoapProxy extends SoapProxyBase implements IProductsProxy {
    
    /**
     * Retrieve the list of products assigned to a required category.
     * SOAP Method: catalogCategoryAssignedProducts
     * @param int $category_id
     * @return ProxyResultBase
     */
    public function IndexByCategoryId($category_id) {
        try {
            $result = $this->GetContext()
                    ->GetClient()
                    ->catalogCategoryAssignedProducts(
                        $this->GetContext()->GetSession(), 
                        $category_id
                    );
            return ProxyResultBase::CreateSuccessResult($result); 
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Allows you to retrieve the list of products.
     * SOAP Method: catalogProductList
     * @return ProxyResultBase
     */
    public function Index() {
        try {
            $result = $this->GetContext()->GetClient()->catalogProductList($this->GetContext()->GetSession());
            return ProxyResultBase::CreateSuccessResult($result); 
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Allows you to create a new product and return ID of the created product.
     * SOAP Method: catalogProductCreate 
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Store(IResource $resource) {
        try {
            
            $attributeSets = $this->GetContext()->GetClient()->catalogProductAttributeSetList($this->GetContext()->GetSession());
            $attributeSet = current($attributeSets);
            
            $result = $this->GetContext()->GetClient()->catalogProductCreate($this->GetContext()->GetSession(), $resource->type_id, $attributeSet->set_id, $resource->sku, $resource);
            return ProxyResultBase::CreateSuccessResult($result);
             
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Allows you to retrieve information about the required product.
     * SOAP Method: catalogProductInfo
     * @param int $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        try {
            $result = $this->GetContext()->GetClient()->catalogProductInfo($this->GetContext()->GetSession(), $id);
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Allows you to update the required product. Note that you should specify only those parameters which you want to be updated.
     * SOAP Method: catalogProductUpdate
     * @param int $id
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Update($id, IResource $resource) {
        try {
            $result = $this->GetContext()->GetClient()->catalogProductUpdate($this->GetContext()->GetSession(), $id, $resource, null, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Allows you to delete the required product.
     * SOAP Method: catalogProductDelete
     * @param int $id
     * @return ProxyResultBase
     */
    public function Destroy($id) {
        try {
            $result = $this->GetContext()->GetClient()->catalogProductDelete($this->GetContext()->GetSession(), $id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

}
