<?php

namespace Managers\PedidosDeVenda;

use Proxies\ProxyFactory;

final class MagentoPedidosMgr {

    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryOrders(\MagentoConfigs::$CONTEXT);
    }
    
    public function ConsultarPedidos() { 
        return $this->proxy->Index();
    }
    
    public function ConsultarPedido($id) {
        return $this->proxy->Show($id);
    }
    
}
