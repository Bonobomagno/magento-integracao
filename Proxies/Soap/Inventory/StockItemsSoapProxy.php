<?php

namespace Proxies\Soap\Inventory;

use Proxies\IStockItemsProxy;
use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class StockItemsSoapProxy extends SoapProxyBase implements IStockItemsProxy {
    
    /**
     * Allows you to retrieve the list of existing stock items.
     * SOAP Method: catalogInventoryStockItemList
     * @return ProxyResultBase
     */
    public function Index() {
        try {
            $products = $this->GetContext()->GetClient()->catalogProductList($this->GetContext()->GetSession());
            
            $ids = array();
            foreach ($products as $product) {
                array_push($ids, $product->product_id);
            }
            
            $result = $this->GetContext()->GetClient()->catalogInventoryStockItemList($this->GetContext()->GetSession(), $ids);
            
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    
    public function Store(IResource $resource) {
        
    }

    /**
     * Allows you to retrieve the stock item information.
     * SOAP Method: catalogInventoryStockItemList
     * @param int $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        try {
            $result = $this->GetContext()->GetClient()->catalogInventoryStockItemList($this->GetContext()->GetSession(), array($id));
            
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    public function Update($id, IResource $resource) {
        
    }

    public function UpdateStockItems($stockItems) {
        
    }
    
    public function Destroy($id) {
        
    }

}
