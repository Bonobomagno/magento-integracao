<?php

namespace Proxies\Orders;

use Proxies\RestProxy;

final class SalesOrdersProxy extends RestProxy {
    
    public function Index() {
        try {
            $resourceUrl = $this->GetApiUrl() . "/orders";
            $this->GetOAuthClient()->fetch($resourceUrl);
            return $this->GetOAuthClient()->getLastResponse();
        }
        catch (\OAuthException $e) {
            return $e->getMessage();
        }
    }
    
    public function Store($productData) {
        throw new \Exceptions\NotImplementedException;
    }
    
    public function Show($id) {
        try {
            $resourceUrl = $this->GetApiUrl() . "/orders/$id";
            $this->GetOAuthClient()->fetch($resourceUrl);
            return $this->GetOAuthClient()->getLastResponse();
        }
        catch (\OAuthException $e) {
            return $e->getMessage();
        }
    }
    
    public function Update() {
        throw new \Exceptions\NotImplementedException;
    }
    
    public function Destroy($id) {
        throw new \Exceptions\NotImplementedException;
    }
    
}
