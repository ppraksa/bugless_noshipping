<?php

class Bugless_Noshipping_Block_Adminhtml_Noshipping_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {

        parent::__construct();
        $this->_objectId = "destination_id";
        $this->_blockGroup = "noshipping";
        $this->_controller = "adminhtml_noshipping";
        $this->_updateButton("save", "label", Mage::helper("noshipping")->__("Save Item"));
        $this->_updateButton("delete", "label", Mage::helper("noshipping")->__("Delete Item"));

        $this->_addButton("saveandcontinue", array(
            "label" => Mage::helper("noshipping")->__("Save And Continue Edit"),
            "onclick" => "saveAndContinueEdit()",
            "class" => "save",
        ), -100);


        $this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
    }

    public function getHeaderText()
    {
        if (Mage::registry("noshipping_data") && Mage::registry("noshipping_data")->getId()) {

            return Mage::helper("noshipping")->__("Edit Address '%s'", $this->htmlEscape(Mage::registry("noshipping_data")->getId()));

        } else {

            return Mage::helper("noshipping")->__("Add Address");

        }
    }
}