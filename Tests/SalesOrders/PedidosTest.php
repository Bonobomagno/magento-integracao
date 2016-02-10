<?php

require '../../AutoLoader.php';

//MagentoConfigs::$CONTEXT = 'SOAP';
MagentoConfigs::$CONTEXT = 'REST';

$mgr = new \Managers\PedidosDeVenda\MagentoPedidosMgr();

$result = $mgr->ConsultarPedidos();

if ($result->IsSuccess()) {
    echo "Total: " . count($result->GetResult()) . "<br>";
    var_dump($result->GetResult());
}
else {
    echo $result->GetMessage() . "<br>";
    
    foreach ($result->GetErrors() as $error) {
        echo $error->code . ": " . $error->message . "<br>";
    }
} 
