<?php

namespace Managers\PedidosDeVenda;

use Proxies\ProxyFactory;

final class MagentoPedidoEnderecosMgr {
    
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryOrderAddresses(\MagentoConfigs::$CONTEXT);
    }
    
    public function ConsultarEnderecosDoPedido($order_id) { 
        $this->proxy->SetOrderId($order_id);
        return $this->proxy->Index();
    }
    
    public function ConsultarEnderecoDeCobrancaDoPedido($order_id) {
        $this->proxy->SetOrderId($order_id);
        $this->proxy->SetAddressType('billing');
        return $this->proxy->Show('');
    }
    
    public function ConsultarEnderecoDeEntregaDoPedido($order_id) {
        $this->proxy->SetOrderId($order_id);
        $this->proxy->SetAddressType('shipping');
        return $this->proxy->Show('');
    }
    
}
