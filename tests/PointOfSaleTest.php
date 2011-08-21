<?php

/**
 *
 * @author Isidro Merayo
 */
class PointOfSaleTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @test
     */
    public function onBarcode_search_catalog() {
    
        $catalog = Phockito::mock('Catalog');
     
        $pointOfSale = new PointOfSale($catalog);
        $pointOfSale->onBarcode('123');
        
        Phockito::verify($catalog)->search('123');
    }
}
