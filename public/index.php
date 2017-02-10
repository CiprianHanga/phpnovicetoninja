<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/ui/quote.php';

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
    public $postal_code;
    
    // Name of the Country.
    public $country_name;
    
    /**
     * Display an address in HTML.
     * @return string 
     */
    function display() {
        $output = '';
        return $output;
    }
}