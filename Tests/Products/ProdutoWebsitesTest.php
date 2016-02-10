<?php

require '../../AutoLoader.php';

MagentoConfigs::$CONTEXT = 'SOAP';
//MagentoConfigs::$CONTEXT = 'REST';

$mgr = new \Managers\Produtos\MagentoProdutoWebsitesMgr();

//$website = new \Resources\Products\ProductWebsiteResource();
//$website->website_id = 2;

$result = $mgr->ConsultarWebsitesDoProduto(1);
//$result = $mgr->AtribuirWebsiteAoProduto(1, $website);
//$result = $mgr->RemoverWebsiteDoProduto(1, 1);


if ($result->IsSuccess()) {
    var_dump($result->GetResult());
}
else {
    echo $result->GetMessage();
    
    foreach ($result->GetErrors() as $error) {
        echo '<br>'.$error->code . ' - ' . $error->message;
    }
}
