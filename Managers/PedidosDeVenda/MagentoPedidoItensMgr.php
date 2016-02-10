<?php

namespace Managers\PedidosDeVenda;

use Proxies\ProxyFactory;

final class MagentoPedidoItensMgr {
   
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryOrderItems(\MagentoConfigs::$CONTEXT);
    }
    
    public function ConsultarItensDoPedido($order_id) {
        $this->proxy->SetOrderId($order_id);
        return $this->proxy->Index();
    }
    
}
