<?php

class Bugless_Noshipping_Block_Adminhtml_Noshipping_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId("noshipping_tabs");
        $this->setDestElementId("edit_form");
        $this->setTitle(Mage::helper("noshipping")->__("Address Information"));
    }

    protected function _beforeToHtml()
    {
        $this->addTab("form_section", array(
            "label" => Mage::helper("noshipping")->__("Address Information"),
            "title" => Mage::helper("noshipping")->__("Address Information"),
            "content" => $this->getLayout()->createBlock("noshipping/adminhtml_noshipping_edit_tab_form")->toHtml(),
        ));
        return parent::_beforeToHtml();
    }

}
