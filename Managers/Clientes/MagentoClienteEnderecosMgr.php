<?php

use Proxies\ProxyFactory;
use Resources\Customers\CustomerAdressResource;

final class MagentoClienteEnderecosMgr {

    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryCustomerAddresses(MagentoConfigs::$CONTEXT);
    }
    
    public function ConsultarEnderecosDoCliente($costumer_id) {
        $this->proxy->SetCostumerId($costumer_id);
        return $this->proxy->Index();
    }
    
    public function AdicionarEnderecoAoCliente($costumer_id, CustomerAdressResource $customerAdress) {
        $this->proxy->SetCostumerId($costumer_id);
        return $this->proxy->Store($customerAdress);
    }
    
    public function ConsultarEndereco($id) {
        return $this->proxy->Show($id);
    }
    
    public function EditarEndereco($id, CustomerAdressResource $customerAdress) {
        return $this->proxy->Update($id, $customerAdress);
    }
    
    public function ExcluirEndereco($id) {
        return $this->proxy->Destroy($id);
    }
    
}
