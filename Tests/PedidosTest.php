<?php

require '../AutoLoader.php';

$mgr = new MagentoPedidosMgr();

//$pedidos = $mgr->ConsultarPedidos();

$pedido = $mgr->ConsultarPedido('55854');

//var_dump($pedidos);
var_dump($pedido);