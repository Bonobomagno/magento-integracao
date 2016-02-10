<?php

namespace Managers\Produtos;

use Proxies\ProxyFactory;
use ProxyResults\IProxyResult;
use Resources\Products\ProductCategoryResource;

final class MagentoProdutoCategoriasMgr {
    
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryProductCategories(\MagentoConfigs::$CONTEXT);
    }

    /**
     * 
     * @param type $product_id
     * @return IProxyResult
     */
    public function ConsultarCategoriasDoProduto($product_id) {
        $this->proxy->SetProductId($product_id);
        return $this->proxy->Index();
    }
    
    /**
     * 
     * @param type $product_id
     * @param ProductCategoryResource $productCategory
     * @return IProxyResult
     */
    public function AtribuirCategoriaAoProduto($product_id, ProductCategoryResource $productCategory) {
        $this->proxy->SetProductId($product_id);
        return $this->proxy->Store($productCategory);
    }
    
    /**
     * 
     * @param type $product_id
     * @param type $category_id
     * @return IProxyResult
     */
    public function DesatribuirCategoriaDoProduto($product_id, $category_id) {
        $this->proxy->SetProductId($product_id);
        return $this->proxy->Destroy($category_id);
    }
    
}
