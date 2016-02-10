<?php

namespace Managers\Produtos;

use Proxies\IProductsProxy;
use Proxies\ProxyFactory;
use Resources\Products\ProductResource;
use ProxyResults\IProxyResult;

final class MagentoProdutosMgr {

    /**
     * @var IProductsProxy
     */
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryProducts(\MagentoConfigs::$CONTEXT);
    }

    /**
     * 
     * @return IProxyResult
     */
    public function ConsultarProdutos() {
        return $this->proxy->Index();
    }
    
    public function ConsultarProdutosPorCategoria($category_id) {
        return $this->proxy->IndexByCategoryId($category_id);
    }
    
    /**
     * 
     * @param type $id
     * @return IProxyResult
     */
    public function ConsultarProduto($id) {
        return $this->proxy->Show($id);
    }
    
    /**
     * 
     * @param ProductResource $product
     * @return IProxyResult
     */
    public function CriarProduto(ProductResource $product) {
        return $this->proxy->Store($product);
    }
    
    public function EditarProduto($id, ProductResource $product) {
        return $this->proxy->Update($id, $product);
    }
    
    /**
     * 
     * @param type $id
     * @return IProxyResult
     */
    public function ExcluirProduto($id) {
        return $this->proxy->Destroy($id);
    }
    
}
