<?php

require '../../AutoLoader.php';

//MagentoConfigs::$CONTEXT = 'SOAP';
MagentoConfigs::$CONTEXT = 'REST';

$mgr = new Managers\PedidosDeVenda\MagentoPedidoEnderecosMgr();

//$result = $mgr->ConsultarEnderecosDoPedido(1);
$result = $mgr->ConsultarEnderecoDeCobrancaDoPedido(1);
//$result = $mgr->ConsultarEnderecoDeEntregaDoPedido(1);

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
