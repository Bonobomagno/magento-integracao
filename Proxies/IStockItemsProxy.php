<?php

namespace Proxies;

use Resources\Inventory\StockItemResource;
use ProxyResults\ProxyResultBase;

interface IStockItemsProxy {
    
    /**
     * Allows you to update existing stock items.
     * @param StockItemResource[] $stockItems
     * @return ProxyResultBase
     */
    public function UpdateStockItems($stockItems);
    
}
