<?php

namespace Proxies;

abstract class ProxyFactory {
    
    /**
     * 
     * @param type $context
     * @return \Proxies\Rest\Products\ProductsRestProxy|\Proxies\Soap\Products\ProductsSoapProxy
     */
    public static function FactoryProducts($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductsSoapProxy();
            case \MagentoConfigs::$REST: return new Rest\Products\ProductsRestProxy();
        }
    }
    
    public static function FactoryProductCategories($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductCategoriesSoapProxy();
            case \MagentoConfigs::$REST: return new Rest\Products\ProductCategoriesRestProxy();
        }
    }
    
    public static function FactoryProductImages($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductImagesSoapProxy();
            case \MagentoConfigs::$REST: return new Rest\Products\ProductImagesRestProxy();
        }
    }
    
    public static function FactoryProductWebsites($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductWebsitesSoapProxy();
            case \MagentoConfigs::$REST: return new Rest\Products\ProductWebsitesRestProxy();
        }
    }
    
    public static function FactoryCustomers($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductsProxy();
            case \MagentoConfigs::$REST: return new Rest\Customers\CustomersRestProxy();
        }
    }
    
    public static function FactoryCustomerAddresses($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductsProxy();
            case \MagentoConfigs::$REST: return new Rest\Customers\CustomerAddressesRestProxy();
        }
    }
    
    public static function FactoryStockItems($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Inventory\StockItemsSoapProxy();
            case \MagentoConfigs::$REST: return new Rest\Inventory\StockItemsRestProxy();
        }
    }
    
    public static function FactoryOrders($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductsProxy();
            case \MagentoConfigs::$REST: return new Rest\SalesOrders\OrdersRestProxy();
        }
    }
    
    public static function FactoryOrderAddresses($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductsProxy();
            case \MagentoConfigs::$REST: return new Rest\SalesOrders\OrderAddressesRestProxy();
        }
    }
    
    public static function FactoryOrderComments($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductsProxy();
            case \MagentoConfigs::$REST: return new Rest\SalesOrders\OrderCommentsRestProxy();
        }
    }
    
    public static function FactoryOrderItems($context) {
        switch ($context) {
            case \MagentoConfigs::$SOAP: return new Soap\Products\ProductsProxy();
            case \MagentoConfigs::$REST: return new Rest\SalesOrders\OrderItemsRestProxy();
        }
    }
    
}
