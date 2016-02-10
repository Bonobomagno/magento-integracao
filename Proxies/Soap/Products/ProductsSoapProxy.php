<?php

namespace Proxies\Soap\Products;

use Proxies\IProductsProxy;
use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class ProductsSoapProxy extends SoapProxyBase implements IProductsProxy {
    
    /**
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
     * HTTP Method: DELETE
     * @param int $id
     * @return ProxyResultBase
     */
    public function Destroy($id) {
        try {
            $result = $this->GetContext()->GetClient()->catalogProductUpdate($this->GetContext()->GetSession(), $id, 'product');
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\Exception $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

}
