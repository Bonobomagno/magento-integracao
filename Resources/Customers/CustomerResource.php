<?php

namespace Resources\Customers;

use Resources\ResourceBase;

final class CustomerResource extends ResourceBase {
 
    /**
     * The customer first name
     * @var string
     * @required
     */
    public $firstname;
    
    /**
     * The customer last name
     * @var string
     * @required
     */
    public $lastname;
    
    /**
     * The customer email address
     * @var string
     * @required 
     */
    public $email;
    
    /**
     * The customer password. The password must contain minimum 7 characters.
     * @var string
     * @required 
     */
    public $password;
    
    /**
     * Website ID.
     * @var int
     * @required
     */
    public $website_id;
    
    /**
     * Customer group ID.
     * @var int
     * @required
     */
    public $group_id;
    
    /**
     * Defines whether the automatic group change for the customer will be disabled.
     * @var int
     * @optional
     */
    public $disable_auto_group_change;
    
    /**
     * Customer prefix.
     * @var string
     * @optional
     */
    public $prefix;
    
    /**
     * Customer middle name or initial
     * @var string
     * @optional
     */
    public $middlename;
    
    /**
     * Customer suffix
     * @var string
     * @optional
     */
    public $suffix;
    
    /**
     * Customer Tax or VAT number
     * @var string
     * @optional
     */
    public $taxvat;
    
}