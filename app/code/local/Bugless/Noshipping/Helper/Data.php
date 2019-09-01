<?php
class Bugless_Noshipping_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getAll() {
        $items = Mage::getModel('noshipping/noshipping')->getCollection();
        return $items;
    }
}
	 