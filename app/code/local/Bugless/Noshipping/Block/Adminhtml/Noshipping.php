<?php

class Bugless_Noshipping_Block_Adminhtml_Noshipping extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_controller = "adminhtml_noshipping";
        $this->_blockGroup = "noshipping";
        $this->_headerText = Mage::helper("noshipping")->__("Noshipping Manager");
        $this->_addButtonLabel = Mage::helper("noshipping")->__("Add new address");
        parent::__construct();
    }

}