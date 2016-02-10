<?php

require '../../AutoLoader.php';

MagentoConfigs::$CONTEXT = 'SOAP';
//MagentoConfigs::$CONTEXT = 'REST';

$mgr = new Managers\Produtos\MagentoProdutoCategoriasMgr();

$result = $mgr->ConsultarCategoriasDoProduto(5);
//$productCategory = new \Resources\Products\ProductCategoryResource();
//$productCategory->category_id = 4;
//$result = $mgr->AtribuirCategoriaAoProduto(5, $productCategory);
//$result = $mgr->DesatribuirCategoriaDoProduto(5, 4);

if ($result->IsSuccess()) {
    $categorias = $result->GetResult();
//    echo "Total: " . count($categorias) . "<br>";
    var_dump($categorias);
}



