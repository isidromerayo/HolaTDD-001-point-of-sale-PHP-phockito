<?php

/**
 *
 * @author Isidro Merayo
 */
class PointOfSale {
   
    private $catalog;
    private $screen;
    
    public function __construct(Catalog $catalog, Screen $screen) {
        $this->catalog = $catalog;
        $this->screen = $screen;
    }
    public function onBarcode($barcode) {
        $this->screen->show($this->catalog->search($barcode));
    }
}
