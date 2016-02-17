<?php

require '../../AutoLoader.php';

MagentoConfigs::$CONTEXT = 'SOAP';
//MagentoConfigs::$CONTEXT = 'REST';

/*
$cliente = new \Resources\Customers\CustomerResource();
$cliente->firstname = 'Glauber';
$cliente->lastname = 'Joe';
$cliente->email = 'suporte@eccosys.com.br';
$cliente->password = '123456';
$cliente->website_id = 1;
$cliente->group_id = 1;
 * 
 */
 


$mgr = new \Managers\Clientes\MagentoClientesMgr();

$result = $mgr->ConsultarClientes();
//$result = $mgr->ConsultarCliente(1);
//$result = $mgr->CriarCliente($cliente);
//$result = $mgr->EditarCliente(2, $cliente);
//$result = $mgr->ExcluirCliente(2);


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