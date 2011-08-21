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
        $screen = Phockito::mock('Screen');
        $catalog = Phockito::mock('Catalog');
     
        $pointOfSale = new PointOfSale($catalog, $screen);
        $pointOfSale->onBarcode('123');
        
        Phockito::verify($catalog)->search('123');
    }
    
    /**
     * @test
     */
    public function onBarcode_show_price() {
        $screen = Phockito::mock('Screen');
        $catalog = Phockito::mock('Catalog');
        
        Phockito::when($catalog)->search('123')->return('1€');

        $pointOfSale = new PointOfSale($catalog, $screen);
        $pointOfSale->onBarcode('123');
        
        Phockito::verify($screen)->show('1€');
    }
}
