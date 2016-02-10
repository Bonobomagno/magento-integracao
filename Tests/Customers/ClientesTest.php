<?php

require '../../AutoLoader.php';

//MagentoConfigs::$CONTEXT = 'SOAP';
MagentoConfigs::$CONTEXT = 'REST';

/*
$cliente = new \Resources\Customers\CustomerResource();
$cliente->firstname = 'Jhon';
$cliente->lastname = 'Joe';
$cliente->email = 'glauber@eccosys.com.br';
$cliente->password = '123';
$cliente->website_id = 1;
$cliente->group_id = 1;
 * 
 */


$mgr = new MagentoClientesMgr();

$result = $mgr->ConsultarClientes();
//$result = $mgr->ConsultarCliente(1);
//$result = $mgr->CriarCliente($cliente);
//$result = $mgr->EditarCliente(1, $cliente);
//$result = $mgr->ExcluirCliente(1);


if ($result->IsSuccess()) {
    echo "Total: " . count($result->GetResult()) . "<br>";
    var_dump($result->GetResult());
}
else {
    echo $result->GetMessage() . "<br>";
    
    foreach ($result->GetErrors() as $error) {
        echo $error->code . ": " . $error->message . "<br>";
    }
    
    die;
} 