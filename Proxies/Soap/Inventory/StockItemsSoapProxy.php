<?php

namespace Proxies\Soap\Inventory;

use Proxies\IStockItemsProxy;
use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class StockItemsSoapProxy extends SoapProxyBase implements IStockItemsProxy {
    
    
    public function Destroy($id) {
        
    }

    public function Index() {
        try {
            $result = $this->GetContext()->GetClient()->catalogInventoryStockItemList($this->GetContext()->GetSession());
            
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    public function Show($id) {
        try {
            $result = $this->GetContext()->GetClient()->catalogInventoryStockItemList($this->GetContext()->GetSession(), array($id));
            
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    public function Store(IResource $resource) {
        
    }

    public function Update($id, IResource $resource) {
        
    }

    public function UpdateStockItems($stockItems) {
        
    }

}
