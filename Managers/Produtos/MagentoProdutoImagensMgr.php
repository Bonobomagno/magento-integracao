<?php

namespace Managers\Produtos;

use Proxies\ProxyFactory;
use Resources\Products\ProductImageResource;

final class MagentoProdutoImagensMgr {
    
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryProductImages(\MagentoConfigs::$CONTEXT);
    }
    
    /**
     * 
     * @param type $product_id
     * @param ProductImageResource $productImage
     * @param type $store_id
     * @return \ProxyResults\IProxyResult
     */
    public function AtribuirImagemAoProduto($product_id, ProductImageResource $productImage, $store_id = null) {
        $this->proxy->SetProductId($product_id);
        
        if ($store_id == null) {
            return $this->proxy->Store($productImage);
        }
        else {
            return $this->proxy->StoreByStoreId($store_id, $productImage);
        }
    }
    
    /**
     * 
     * @param type $product_id
     * @param type $store_id
     * @return \ProxyResults\IProxyResult
     */
    public function ConsultarImagensDoProduto($product_id, $store_id = null) {
        $this->proxy->SetProductId($product_id);
        
        if ($store_id == null) {
            return $this->proxy->Index();
        }
        else {
            return $this->proxy->IndexByStoreId($store_id);
        }
    }
    
    /**
     * 
     * @param type $product_id
     * @param type $image_id
     * @param type $store_id
     * @return \ProxyResults\IProxyResult
     */
    public function ConsultarImagemDoProduto($product_id, $image_id, $store_id = null) {
        $this->proxy->SetProductId($product_id);
        
        if ($store_id == null) {
            return $this->proxy->Show($image_id);
        }
        else {
            return $this->proxy->ShowByStoreId($image_id, $store_id);
        }
    }
    
    /**
     * 
     * @param int $product_id
     * @param int $image_id
     * @param ProductImageResource $productImage
     * @param type $store_id
     * @return \ProxyResults\IProxyResult
     */
    public function EditarImagemDoProduto($product_id, $image_id, ProductImageResource $productImage, $store_id = null) {
        $this->proxy->SetProductId($product_id);
        
        if ($store_id == null) {
            return $this->proxy->Update($image_id, $productImage);
        }
        else {
            return $this->proxy->UpdateByStoreId($store_id, $image_id, $productImage);
        }
    }
    
    /**
     * 
     * @param int $product_id
     * @param int $image_id
     * @param int $store_id
     * @return \ProxyResults\IProxyResult
     */
    public function RemoverImagemDoProduto($product_id, $image_id, $store_id = null) {
        $this->proxy->SetProductId($product_id);
        
        if ($store_id == null) {
            return $this->proxy->Destroy($image_id);
        }
        else {
            return $this->proxy->DestroyByStoreId($image_id, $store_id);
        }
    }
    
}
