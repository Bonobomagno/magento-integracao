<?php

require '../../AutoLoader.php';

MagentoConfigs::$CONTEXT = 'SOAP';
//MagentoConfigs::$CONTEXT = 'REST';

$mgr = new Managers\PedidosDeVenda\MagentoPedidoEnderecosMgr();

//$result = $mgr->ConsultarEnderecosDoPedido('100000001');
//$result = $mgr->ConsultarEnderecoDeCobrancaDoPedido('100000001');
$result = $mgr->ConsultarEnderecoDeEntregaDoPedido('100000001');

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
