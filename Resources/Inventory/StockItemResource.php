<?php

namespace Resources\Inventory;

use Resources\ResourceBase;

final class StockItemResource extends ResourceBase {

    /**
     * Item ID
     * @var int
     */
    public $item_id;
    
    /**
     * Product ID
     * @var int
     */
    public $product_id;
    
    /**
     * Stock ID
     * @var int
     */
    public $stock_id;
    
    /**
     * Quantity of stock items for the current product
     * @var string 
     */
    public $qty;
    
    /**
     * Quantity for stock items to become out of stock
     * @var string
     */
    public $min_qty;
    
    /**
     * Choose whether the Config settings will be applied for the Qty for Item's 
     * Status to Become Out of Stock option
     * @var int 
     */
    public $use_config_min_qty;
    
    /**
     * Choose whether the product can be sold using decimals 
     * (e.g., you can buy 2.5 product)
     * @var int 
     */
    public $is_qty_decimal;
    
    /**
     * The customer can place the order for products that are out of stock at the moment
     * (0 - No Backorders, 1 - Allow Qty Below 0, and 2 - Allow Qty Below 0 and Notify Customer)
     * @var int 
     */
    public $backorders;
    
    /**
     * Choose whether the Config settings will be applied for the Backorders option
     * @var int
     */
    public $use_config_backorders;
    
    /**
     * Minimum number of items in the shopping cart to be sold
     * @var string 
     */
    public $min_sale_qty;
    
    /**
     * Choose whether the Config settings will be applied for the
     * Minimum Qty Allowed in Shopping Cart option
     * @var int 
     */
    public $use_config_min_sale_qty;
    
    /**
     * Maximum number of items in the shopping cart to be sold
     * @var string 
     */
    public $max_sale_qty;
    
    /**
     * Choose whether the Config settings will be applied for the Maximum
     * Qty Allowed in Shopping Cart option
     * @var int 
     */
    public $use_config_max_sale_qty;
    
    /**
     * Defines whether the product is available for selling
     * (0 - Out of Stock, 1 - In Stock)
     * @var int 
     */
    public $is_in_stock;
    
    /**
     * Date when the number of stock items became lower than the number 
     * defined in the Notify for Quantity Below option
     * @var string 
     */
    public $low_stock_date;
    
    /**
     * The number of inventory items below which the customer will be notified via the RSS feed
     * @var string
     */
    public $notify_stock_qty;
    
    /**
     * Choose whether the Config settings will be applied for the Notify for Quantity Below option
     * @var int 
     */
    public $use_config_notify_stock_qty;
    
    /**
     * Choose whether to view and specify the product quantity and availability 
     * and whether the product is in stock management ( 0 - No, 1 - Yes)
     * @var int 
     */
    public $manage_stock;
    
    /**
     * Choose whether the Config settings will be applied for the Manage Stock option
     * @var int 
     */
    public $use_config_manage_stock;
    
    /**
     * Defines whether products can be automatically returned to stock when the refund for an order is created
     * @var int 
     */
    public $stock_status_changed_auto;
    
    /**
     * Choose whether the Config settings will be applied for the Enable Qty Increments option
     * @var int 
     */
    public $use_config_qty_increments;
    
    /**
     * The product quantity increment value
     * @var string
     */
    public $qty_increments;
    
    /**
     * Choose whether the Config settings will be applied for the Qty Increments option
     * @var int 
     */
    public $use_config_enable_qty_inc;
    
    /**
     * Defines whether the customer can add products only in increments to the shopping cart
     * @var int 
     */
    public $enable_qty_increments;
    
    /**
     * Defines whether the stock items can be divided into multiple boxes for shipping.
     * @var int 
     */
    public $is_decimal_divided;	
    
}
