<?php

namespace Resources\Customers;

use Resources\ResourceBase;

class CustomerAdressResource extends ResourceBase {
    
    /**
     * Customer first name
     * @var string
     * @required
     */
    public $firstname;
    
    /**
     * Customer last name
     * @var string
     * @required
     */
    public $lastname;
    
    /**
     * Customer street address. There can be more than one street address.
     * @var string[] 
     * @required
     */
    public $street;
     
    /**
     * Name of the city
     * @var string 
     * @required
     */
    public $city;
    
    /**
     * Name of the country
     * @var string
     * @required 
     */
    public $country_id;
    	
    /**
     * Region name or code
     * @var string 
     * @required
     */
    public $region;
    
    /**
     * Customer ZIP/postal code
     * @var string
     * @required
     */
    public $postcode; 
    	
    /**
     * Customer phone number
     * @var string
     * @required
     */
    public $telephone; 
    
}
