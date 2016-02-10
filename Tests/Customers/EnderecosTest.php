<?php

require '../../AutoLoader.php';

//MagentoConfigs::$CONTEXT = 'SOAP';
MagentoConfigs::$CONTEXT = 'REST';

/*
$endereco = new Resources\Customers\CustomerAdressResource();
$endereco->firstname = 'Glauber';
$endereco->lastname = 'Griffante';
$endereco->street = array('Av. Oswaldo Aranha', '1000', 'Sala 3');
$endereco->city = 'Bento Gonçalves';
$endereco->country_id = 'BR';
$endereco->region = 'RS';
$endereco->postcode = '95700-000';
$endereco->telephone = '5481475112';
 */

$mgr = new MagentoEnderecosMgr();

//$result = $mgr->ConsultarEnderecosDoCliente(1);
//$result = $mgr->ConsultarEndereco(1);
//$result = $mgr->AdicionarEnderecoAoCliente(1, $endereco);
//$result = $mgr->EditarEndereco(1, $endereco);
$result = $mgr->ExcluirEndereco(1);


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
