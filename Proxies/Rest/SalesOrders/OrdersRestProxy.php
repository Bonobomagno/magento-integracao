<?php

namespace Proxies\Rest\SalesOrders;

use Proxies\Rest\RestProxyBase;

final class OrdersRestProxy extends RestProxyBase {
    
    
    public function GetResourceName() {
        return "orders";
    }

}
