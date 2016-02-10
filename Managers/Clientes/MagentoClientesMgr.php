<?php

use Proxies\IProxy;
use Proxies\ProxyFactory;
use Resources\Customers\CustomerResource;
use ProxyResults\IProxyResult;

final class MagentoClientesMgr {
    
    /**
     * @var IProxy
     */
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryCustomers(MagentoConfigs::$CONTEXT);
    }
    
    /**
     * 
     * @return IProxyResult
     */
    public function ConsultarClientes() {
        return $this->proxy->Index();
    }
    
    /**
     * 
     * @param int $id
     * @return IProxyResult
     */
    public function ConsultarCliente($id) {
        return $this->proxy->Show($id);
    }
    
    /**
     * 
     * @param CustomerResource $customer
     * @return IProxyResult
     */
    public function CriarCliente(CustomerResource $customer) {
        return $this->proxy->Store($customer);
    }
    
    /**
     * 
     * @param int $id
     * @param CustomerResource $customer
     * @return IProxyResult
     */
    public function EditarCliente($id, CustomerResource $customer) {
        return $this->proxy->Update($id, $customer);
    }
    
    /**
     * 
     * @param int $id
     * @return IProxyResult
     */
    public function ExcluirCliente($id) {
        return $this->proxy->Destroy($id);
    }
    
}
