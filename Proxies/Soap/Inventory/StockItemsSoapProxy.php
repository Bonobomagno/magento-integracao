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

    /**
     * Not implemented.
     * @param IResource $resource
     * @throws \Exceptions\NotImplementedException
     */
    public function Store(IResource $resource) {
        throw new \Exceptions\NotImplementedException;
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

    /**
     * Allows you to update the required product stock data.
     * SOAP Method: catalogInventoryStockItemUpdate
     * @param int $id
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Update($id, IResource $resource) {
        try {
            $result = $this->GetContext()->GetClient()->catalogInventoryStockItemUpdate($this->GetContext()->GetSession(), $id, $resource->ObjectToArray());
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Allows you to update the required products stock data.
     * @param array $stockItems
     * @return ProxyResultBase
     */
    public function UpdateStockItems($stockItems) {
        if (!is_array($stockItems)) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, "StockItems is not an array.");
        }
        
        $results = array();
        foreach ($stockItems as $stockItem) {
            $result = $this->Update($stockItem->product_id, $stockItem);
            
            array_push($results, $result);
        }
        
        return ProxyResultBase::CreateSuccessResult($results);
    }
    
    /**
     * Not implemented.
     * @param type $id
     * @throws \Exceptions\NotImplementedException
     */
    public function Destroy($id) {
        throw new \Exceptions\NotImplementedException;
    }

}
