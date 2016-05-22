<?php

namespace Managers\Estoque;

use Proxies\ProxyFactory;
use ProxyResults\IProxyResult;
use Resources\Inventory\StockItemResource;
use Filters\Inventory\MagentoStockItemsFilter;

final class MagentoEstoqueMgr {

    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryStockItems(\MagentoConfigs::$CONTEXT);
    }
    
    /**
     * 
     * @return IProxyResult
     */
    public function ConsultarItensDoEstoque (MagentoStockItemsFilter $filter) {
        return $this->proxy->Index($filter);
    }
    
    /**
     * 
     * @param int $id
     * @return IProxyResult
     */
    public function ConsultarItemDoEstoque ($id) {
        return $this->proxy->Show($id);
    }
    
    /**
     * 
     * @param int $id
     * @param StockItemResource $stockItem
     * @return IProxyResult
     */
    public function AtualizarItemDoEstoque ($id, StockItemResource $stockItem) {
        return $this->proxy->Update($id, $stockItem);
    }
    
    /**
     * 
     * @param int $id
     * @param StockItemResource[] $stockItems
     * @return IProxyResult
     */
    public function AtualizarItensDoEstoque ($stockItems) {
        return $this->proxy->UpdateStockItems($stockItems);
    }
    
    
}
