<?php

namespace Managers\Produtos;

use Proxies\ProxyFactory;
use ProxyResults\IProxyResult;
use Resources\Products\ProductWebsiteResource;

final class MagentoProdutoWebsitesMgr {
    
    private $proxy;

    public function __construct() {
        $this->proxy = ProxyFactory::FactoryProductWebsites(\MagentoConfigs::$CONTEXT);
    }
    
    /**
     * 
     * @param int $product_id
     * @return IProxyResult
     */
    public function ConsultarWebsitesDoProduto($product_id) {
        $this->proxy->SetProductId($product_id);
        
        return $this->proxy->Index();
    }
    
    /**
     * 
     * @param int $product_id
     * @param ProductWebsiteResource $productWebsite
     * @return IProxyResult
     */
    public function AtribuirWebsiteAoProduto($product_id, ProductWebsiteResource $productWebsite) {
        $this->proxy->SetProductId($product_id);
        
        return $this->proxy->Store($productWebsite);
    }
    
    /**
     * 
     * @param int $product_id
     * @param int $website_id
     * @return IProxyResult
     */
    public function RemoverWebsiteDoProduto($product_id, $website_id) {
        $this->proxy->SetProductId($product_id);
        
        return $this->proxy->Destroy($website_id);
    }
    
}
