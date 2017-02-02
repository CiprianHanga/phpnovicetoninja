<?php

/** 
 * Ciprian Hanga (c) 2017 (ciprianhanga@gmail.com)
 * Title: Address Class
 * Description: Class for the address objects.
 */


/**
 * Physical address.
 */
class Address {
    // Street address.
    public $street_address_1;
    public $street_address_2;
    
    // Name of the City.
    public $city_name;
    
    // Name of the subdivision.
    public $subdivision_name;
    
    // Postal code.
    protected $_postal_code;
    
    // Name of the Country.
    public $country_name;
    
    // Primary key of an Address.
    protected $_address_id;
    
    // When the record was created and last updated.
    protected $_time_created;
    protected $_time_updated;
    
    /**
     * Guess the postal code given the subdivision name and city name.
     * @todo Replace with a database lookup.
     * @return string
     */
    protected function _postal_code_guess () {
        return 'LOOKUP';
    }

    /**
     * Display an address in HTML.
     * @return string
     */
    function display() {
        $output = '';
        
        // Street address.
        $output .= $this->street_address_1;
        if ($this->street_address_2) {
            $output .= '<br/>' . $this->street_address_2;
        }
        
        // City, Subdivision, Postal.
        $output .= '<br/>';
        $output .= $this->city_name . ', ' . $this->subdivision_name;
        $output .= ' ' . $this->postal_code;
        
        // Country.
        $output .= '<br/>';
        $output .= $this->country_name;
        
        return $output;
    }
}
