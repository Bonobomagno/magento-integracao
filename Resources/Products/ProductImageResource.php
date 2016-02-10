<?php

namespace Resources\Products;

use Resources\ResourceBase; 

final class ProductImageResource extends ResourceBase {
    
    /**
     * Defines whether the image will associate only to one of the three image types.
     * @var int 
     * @optional
     */
    public $exclude;
    
    /**
     * Image file content (base_64 encoded).
     * @var string 
     * @required
     */
    public $file_content;
    
    /**
     * File mime type. Can have the following values: image/jpeg, image/png, etc.
     * @var string
     * @required 
     */
    public $file_mime_type;
    
    /**
     * Image file name.
     * @var string 
     * @optional
     */
    public $file_name;
    
    /**
     * A label that will be displayed on the frontend when pointing to the image.
     * @var string 
     * @optional
     */
    public $label;
    
    /**
     * The Sort Order option. The order in which the images are displayed in the MORE VIEWS section.
     * @var int 
     * @optional
     */
    public $position;
    
    /**
     * Array of image types. Can have the following values: image, small_image, and thumbnail.
     * @var string[] 
     * @optional
     */
    public $types;
    
}
