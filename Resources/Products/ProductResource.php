<?php

namespace Resources\Products;

use Resources\ResourceBase;

final class ProductResource extends ResourceBase {
            
    /**
     * Product type. Can have the "simple" value.
     * @var string 
     * @required
     */
    public $type_id;
    
    /**
     * Attribute set for the product.
     * @var int 
     * @required
     */
    public $attribute_set_id;
    
    /**
     * Product SKU
     * @var string
     * @required
     */
    public $sku;
    
    /**
     * Product name
     * @var string
     * @required
     */
    public $name;
    
    /**
     * Product meta title
     * @var string
     * @optional
     */
    public $meta_title;
    
    /**
     * Product meta description
     * @var string
     * @optional
     */
    public $meta_description;
    
    /**
     * A friendly URL path for the product
     * @var string
     * @optional
     */
    public $url_key;
    
    /**
     * Custom design applied for the product page
     * @var string
     * @optional 
     */
    public $custom_design;
    
    /**
     * Page template that can be applied to the product page
     * @var string
     * @optional
     */
    public $page_layout;
    
    /**
     * Defines how the custom options for the product will be displayed. 
     * Can have the following values: Block after Info Column or Product Info 
     * Column.
     * @var string
     * @optional
     */
    public $options_container;
    
    /**
     * Product country of manufacture
     * @var string
     * @optional
     */
    public $country_of_manufacture;
    
    /**
     * The Apply MAP option. Defines whether the price in the catalog in the 
     * frontend is substituted with a Click for price link
     * @var int
     * @optional
     */
    public $msrp_enabled;
    
    /**
     * Defines how the price will be displayed in the frontend. Can have the 
     * following values: In Cart, Before Order Confirmation, and On Gesture.
     * @var int
     * @optional
     */
    public $msrp_display_actual_price_type;
    
    /**
     * Defines whether the gift message is available for the product.
     * @var int
     * @optional
     */
    public $gift_message_available;
    
    /**
     * Product price
     * @var string
     * @required
     */
    public $price;
    
    /**
     *
     * @var string
     * @optional
     */
    public $special_price;
    
    /**
     * Product weight
     * @var string
     * @required
     */
    public $weight;
    
    /**
     * Product special price
     * @var string
     * @optional
     */
    public $msrp;
    
    /**
     * Product status. Can have the following values: 1- Enabled, 2 - Disabled.
     * @var int
     * @required
     */
    public $status;
    
    /**
     * Product visibility. Can have the following values: 
     * 1 - Not Visible Individually, 2 - Catalog, 3 - Search, 4 - Catalog, Search.
     * @var int
     * @required
     */
    public $visibility;
    
    /**
     * Defines whether the product can be purchased with the help of the Google 
     * Checkout payment service. Can have the following values: Yes and No.
     * @var int 
     * @optional
     */
    public $enable_googlecheckout;
    
    /**
     * Product tax class. Can have the following values: 
     * 0 - None, 2 - taxable Goods, 4 - Shipping, etc., depending on created tax classes.
     * @var int
     * @required 
     */
    public $tax_class_id;
    
    /**
     * Product description.
     * @var string
     * @required 
     */
    public $description;
    
    /**
     * Product short description.
     * @var string
     * @required
     */
    public $short_description;
    
    /**
     * Product meta keywords.
     * @var int 
     * @optional
     */
    public $meta_keyword;
    
    /**
     * An XML block to alter the page layout.
     * @var int 
     * @optional
     */
    public $custom_layout_update;
    
    /**
     * Date starting from which the special price will be applied to the product
     * @var string 
     * @optional
     */
    public $special_from_date;
    
    /**
     * Date till which the special price will be applied to the product
     * @var string 
     * @optional
     */
    public $special_to_date;
    
    /**
     * Date starting from which the product is promoted as a new product.
     * @var string 
     * @optional
     */
    public $news_from_date;
    
    /**
     * Date till which the product is promoted as a new product.
     * @var string 
     * @optional
     */
    public $news_to_date;
    
    /**
     * Date starting from which the custom design will be applied to the product page.
     * @var string
     * @optional 
     */
    public $custom_design_from;
    
    /**
     * Date till which the custom design will be applied to the product page.
     * @var string 
     * @optional
     */
    public $custom_design_to;
    
    /**
     * Product group price.
     * @var GroupPrice[] 
     * @optional
     */
    public $group_price;
    
    /**
     * Product tier price.
     * @var TierPrice[] 
     * @optional
     */
    public $tier_price;
    
    /**
     * Product inventory data
     * @var StockData[]
     * @optional 
     */
    public $stock_data;
    
    /**
     * Array of categories 
     * @var string[] 
     */
    public $categories; 
    
    /**
     * Array of websites 
     * @var string[] 
     */
    public $websites;
    
    /**
     * Array of category IDs 
     * @var string[] 
     */
    public $category_ids;
    
    /**
     * Array of website IDs 
     * @var string[] 
     */
    public $website_ids;
}
