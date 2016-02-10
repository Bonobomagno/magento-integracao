<?php

namespace Proxies\Rest\Products;

use Proxies\Rest\RestProxyBase;
use Proxies\IProductsProxy;
use ProxyResults\ProxyResultBase;

final class ProductsRestProxy extends RestProxyBase implements IProductsProxy {
    
    public function GetResourceName() {
        return "products";
    }

        /**
     * HTTP Method: GET
     * @param int $category_id
     * @return type
     */
    public function IndexByCategoryId($category_id) {
        $results = array();
        $page = 1;
        do {
            $resourceUrl = $this->GetContext()->GetApiUrl() . "/products/category_id=$category_id?page=$page&limit=100";
            
            try {
                $this->GetContext()->GetClient()->fetch($resourceUrl);
                $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
                
                if (isset($lastResponse)) {
                    $produtos = array_values(get_object_vars(json_decode($lastResponse)));
                    $results = array_merge($results, $produtos);
                    $page++;
                }
            }
            catch (\Exception $except) {
                return ProxyResultBase::CreateErrorResult(array(), $except->getMessage());
            }
            
        } while (count($produtos) === 100);
        
        
        return ProxyResultBase::CreateSuccessResult($results);
    }

}
