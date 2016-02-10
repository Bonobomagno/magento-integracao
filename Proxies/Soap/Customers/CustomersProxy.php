<?php

namespace Proxies\Customers;

use Proxies\RestProxy;
use Resources\Customers\CustomerResource;

final class CustomersProxy extends RestProxy {
    
    /**
     * GET
     * @return type
     */
    public function Index() {
        
        $resourceUrl = $this->GetApiUrl() . "/customers";
        $this->GetOAuthClient()->fetch($resourceUrl);
        return $this->GetOAuthClient()->getLastResponse();
    }
    
    /**
     * POST
     * @param CustomerResource $customer
     * @return type
     */
    public function Store(CustomerResource $customer) {
        try {
            $resourceUrl = $this->GetApiUrl() . "/customers";
            $this->GetOAuthClient()->fetch($resourceUrl, $customer->ObjectToArray(), OAUTH_HTTP_METHOD_POST, $this->GetHeaders());
            return $this->GetOAuthClient()->getLastResponse();
        }
        catch (\OAuthException $exception) {
            return $exception->getMessage();
        }
    }
    
    /**
     * GET
     * @param type $id
     * @return type
     */
    public function Show($id) {
        $resourceUrl = $this->GetApiUrl() . "/customers/$id";
        $this->GetOAuthClient()->fetch($resourceUrl);
        return $this->GetOAuthClient()->getLastResponse();
    }
    
    /**
     * PUT
     * @param ProductResource $product
     * @return type
     */
    public function Update(CustomerResource $customer, $id) {
        $resourceUrl = $this->GetApiUrl() . "/customers/$id";
        $this->GetOAuthClient()->fetch($resourceUrl, $customer, OAUTH_HTTP_METHOD_PUT, $this->GetHeaders());
        return $this->GetOAuthClient()->getLastResponse();
    }
    
    /**
     * DELETE
     * @param type $id
     * @return type
     */
    public function Destroy($id) {
        $resourceUrl = $this->GetApiUrl() . "/customers/$id";
        $this->GetOAuthClient()->fetch($resourceUrl, OAUTH_HTTP_METHOD_DELETE);
        return $this->GetOAuthClient()->getLastResponse();
    }
}
