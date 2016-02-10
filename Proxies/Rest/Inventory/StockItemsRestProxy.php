<?php

namespace Proxies\Rest\Inventory;

use Proxies\IStockItemsProxy;
use Proxies\Rest\RestProxyBase;
use Resources\Inventory\StockItemResource;
use ProxyResults\ProxyResultBase;

final class StockItemsRestProxy extends RestProxyBase implements IStockItemsProxy {
    
    public function GetResourceName() {
        return "stockitems";
    }
    
    /**
     * 
     * @param StockItemResource[] $stockItems
     * @return ProxyResultBase
     */
    public function UpdateStockItems($stockItems) {
        $resourceName = $this->GetResourceName();
        $resourceUrl = $this->GetContext()->GetApiUrl() . "/$resourceName";
        
        $resource = array();
        foreach ($stockItems as $stockItem) {
            $resource[$stockItem->item_id] = $stockItem->ObjectToArray();
        }
        $resourceData = json_encode($resource);
        
        try{
            $this->GetContext()->GetClient()->fetch($resourceUrl, $resourceData, OAUTH_HTTP_METHOD_PUT, $this->GetContext()->GetHeaders());
            $lastResponse = $this->GetContext()->GetClient()->getLastResponse();
            return ProxyResultBase::CreateSuccessResult($lastResponse);
        }
        catch (\OAuthException $except) {
            $lastResponse = json_decode($except->lastResponse);
            $errors = $lastResponse->messages->error;

            if (!is_array($errors)) {
                $errors = array($errors);
            }

            return ProxyResultBase::CreateErrorResult($errors, $except->getMessage());
        }
    }

}
