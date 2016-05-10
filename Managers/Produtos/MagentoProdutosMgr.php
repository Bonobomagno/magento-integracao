<?php

namespace Managers\Produtos;

use Proxies\IProductsProxy;
use Proxies\ProxyFactory;
use Resources\Products\ProductResource;
use ProxyResults\IProxyResult;
use MagentoConfigs;
use ProxyResults\ProxyResultBase;

final class MagentoProdutosMgr {

    /**
     * @var IProductsProxy
     */
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryProducts(MagentoConfigs::$CONTEXT);
    }

    /**
     * 
     * @return IProxyResult
     */
    public function ConsultarProdutos($filter) {
        $result = $this->proxy->Index($filter);
        
        if ($result->IsSuccess()) {
            $products = array();
            foreach ($result as $resource) {
                $productResource = new ProductResource();
                $productResource->StdClassToObject($resource);
                array_push($products, $productResource);
            }
            return ProxyResultBase::CreateSuccessResult($products);
        }
        
        return $result;
    }
    
    public function ConsultarProdutosPorCategoria($category_id) {
        $result = $this->proxy->IndexByCategoryId($category_id);
        
        if ($result->IsSuccess()) {
            $products = array();
            foreach ($result as $resource) {
                $productResource = new ProductResource();
                $productResource->StdClassToObject($resource);
                array_push($products, $productResource);
            }
            return ProxyResultBase::CreateSuccessResult($products);
        }
        
        return $result;
    }
    
    /**
     * 
     * @param type $id
     * @return IProxyResult
     */
    public function ConsultarProduto($id) {
        $result = $this->proxy->Show($id);
        
        if ($result->IsSuccess()) {
            $productResource = new ProductResource();
            $productResource->StdClassToObject($result->GetResult());
            return ProxyResultBase::CreateSuccessResult($productResource);
        }
        
        return $result;
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
