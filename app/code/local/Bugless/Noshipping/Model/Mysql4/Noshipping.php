<?php

class Bugless_Noshipping_Model_Mysql4_Noshipping extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("noshipping/noshipping", "destination_id");
    }
}