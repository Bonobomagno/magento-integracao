<?php
require '../../AutoLoader.php';

MagentoConfigs::$CONTEXT = 'SOAP';
//MagentoConfigs::$CONTEXT = 'REST';

/*
$item = new Resources\Inventory\StockItemResource();
$item->qty = '5';
 */

//$item1 = new Resources\Inventory\StockItemResource();
//$item1->item_id = 6;
//$item1->product_id = 6;
//$item1->stock_id = 1;
//$item1->qty = '6';
//$item2 = new Resources\Inventory\StockItemResource();
//$item2->item_id = 7;
//$item2->product_id = 7;
//$item2->stock_id = 1;
//$item2->qty = '7';


$mgr = new Managers\Estoque\MagentoEstoqueMgr();

//$result = $mgr->ConsultarItensDoEstoque();
$result = $mgr->ConsultarItemDoEstoque(2);
//$result = $mgr->AtualizarItemDoEstoque(3, $item);
//$result = $mgr->AtualizarItensDoEstoque(array($item1, $item2));


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
