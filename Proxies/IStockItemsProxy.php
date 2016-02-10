<?php

namespace Proxies;

use Resources\Inventory\StockItemResource;
use ProxyResults\ProxyResultBase;

interface IStockItemsProxy {
    
    /**
     * 
     * @param StockItemResource[] $stockItems
     * @return ProxyResultBase
     */
    public function UpdateStockItems($stockItems);
    
}
