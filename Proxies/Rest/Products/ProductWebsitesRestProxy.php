<?php

namespace Proxies\Rest\Products;

use Proxies\Rest\RestProxyBase;

final class ProductWebsitesRestProxy extends RestProxyBase {
    
    private $product_id;
    
    public function GetResourceName() {
        if (!isset($this->product_id)) {
            throw new Exception('The product ID was not specified.');
        }
        
        return "products/{$this->product_id}/websites";
    }
    
    public function SetProductId($product_id) {
        $this->product_id = $product_id;
    }
    
}
