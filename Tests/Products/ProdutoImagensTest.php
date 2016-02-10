<?php

require '../../AutoLoader.php';

MagentoConfigs::$CONTEXT = 'SOAP';
//MagentoConfigs::$CONTEXT = 'REST';

//$image = file_get_contents("tenis.jpg");

//$productImage = new \Resources\Products\ProductImageResource();
//$productImage->label = "Novo Label";
//$productImage->file_mime_type = 'image/jpeg';
//$productImage->file_content = base64_encode($image);
//$productImage->file_name = "Imagem Teste";

$mgr = new \Managers\Produtos\MagentoProdutoImagensMgr();

//$result = $mgr->AtribuirImagemAoProduto(8, $productImage);
$result = $mgr->ConsultarImagensDoProduto(8);
//$result = $mgr->ConsultarImagemDoProduto(8, '/I/m/Imagem_Teste_1.jpg');
//$result = $mgr->EditarImagemDoProduto(8, '/I/m/Imagem_Teste_1.jpg', $productImage);
//$result = $mgr->RemoverImagemDoProduto(8, '/I/m/Imagem_Teste_1.jpg');


if ($result->isSuccess()) {
    var_dump($result->GetResult());
}
else {
    echo $result->GetMessage();
    var_dump($result->GetErrors());
}

