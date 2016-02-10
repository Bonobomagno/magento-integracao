<?php

require '../../AutoLoader.php';

MagentoConfigs::$CONTEXT = 'SOAP';
//MagentoConfigs::$CONTEXT = 'REST';

//$product = new \Resources\Products\ProductResource();

//Atributos Obrigatórios
//$product->type_id = 'simple';
//$product->attribute_set_id = 4;
//$product->sku = '8';
//$product->name = 'Produto Teste Rest';
//$product->price = 99;
//$product->weight = 100;
//$product->status = 2;
//$product->visibility = '4';
//$product->tax_class_id = '0';
//$product->description = 'Produto Teste Rest';
//$product->short_description = 'Produto Teste Rest';


$mgr = new Managers\Produtos\MagentoProdutosMgr();

//$result = $mgr->CriarProduto($product);
//
//if ($result->IsSuccess()) {
//    echo "Produto criado";
//}
//else {
//    echo $result->GetMessage() . "<br>";
//    
//    foreach ($result->GetErrors() as $error) {
//        echo $error->code . ": " . $error->message . "<br>";
//    }
//    
//    die;
//}


//$result = $mgr->ConsultarProduto(8);
//
//if ($result->IsSuccess()) {
//    var_dump($result->GetResult());
//}
//else {
//    echo $result->GetMessage() . "<br>";
//    
//    foreach ($result->GetErrors() as $error) {
//        echo $error->code . ": " . $error->message . "<br>";
//    }
//    
//    die;
//}


//$product->name = "Nome do Produto Alterado";
//$result = $mgr->EditarProduto(8, $product);
//
//if ($result->IsSuccess()) {
//    echo "Produto alterado!";
//    var_dump($result->GetResult());
//}
//else {
//    echo $result->GetMessage() . "<br>";
//    
//    foreach ($result->GetErrors() as $error) {
//        echo $error->code . ": " . $error->message . "<br>";
//    }
//    
//    die;
//}

$result = $mgr->ConsultarProdutos();

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
//
//$result = $mgr->ExcluirProduto(7);
//
//if ($result->IsSuccess()) {
//    echo "Produto deletado";
//    var_dump($result->GetResult());
//}
//else {
//    echo $result->GetMessage() . "<br>";
//    
//    foreach ($result->GetErrors() as $error) {
//        echo $error->code . ": " . $error->message . "<br>";
//    }
//    
//    die;
//} 
