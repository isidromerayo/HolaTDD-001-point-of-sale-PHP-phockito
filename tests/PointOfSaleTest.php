<?php

/**
 *
 * @author Isidro Merayo
 */
class PointOfSaleTest extends PHPUnit_Framework_TestCase {
    
    private $screen;
    private $catalog;
    private $pointOfSale;
    
    protected function setUp() {
        $this->screen = Phockito::mock('Screen');
        $this->catalog = Phockito::mock('Catalog');
     
        $this->pointOfSale = new PointOfSale($this->catalog, $this->screen);
    }
    
    /**
     * @test
     */
    public function onBarcode_search_catalog() {

        $this->pointOfSale->onBarcode('123');
        
        Phockito::verify($this->catalog)->search('123');
    }
    
    /**
     * @test
     */
    public function onBarcode_show_price() {
        
        Phockito::when($this->catalog)->search('123')->return('1€');

        $this->pointOfSale->onBarcode('123');
        
        Phockito::verify($this->screen)->show('1€');
    }
}
