<?php

namespace Managers\PedidosDeVenda;

use Proxies\ProxyFactory;

final class MagentoPedidoComentariosMgr {
    
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryOrderComments(\MagentoConfigs::$CONTEXT);
    }
    
    public function ConsultarComentariosDoPedido($order_id) {
        $this->proxy->SetOrderId($order_id);
        return $this->proxy->Index();
    }
}
