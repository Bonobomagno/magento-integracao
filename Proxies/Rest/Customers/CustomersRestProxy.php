<?php

namespace Proxies\Rest\Customers;

use Proxies\Rest\RestProxyBase;

final class CustomersRestProxy extends RestProxyBase {
    
    public function GetResourceName() {
        return "customers";
    }

}
