<?php

class Bugless_Noshipping_Block_Adminhtml_Noshipping_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset("noshipping_form", array("legend" => Mage::helper("noshipping")->__("Address information")));

        $fieldset->addField("address", "textarea", array(
            "label" => Mage::helper("noshipping")->__("Address"),
            "name" => "address",
        ));

        if (Mage::getSingleton("adminhtml/session")->getNoshippingData()) {
            $form->setValues(Mage::getSingleton("adminhtml/session")->getNoshippingData());
            Mage::getSingleton("adminhtml/session")->setNoshippingData(null);
        } elseif (Mage::registry("noshipping_data")) {
            $form->setValues(Mage::registry("noshipping_data")->getData());
        }
        return parent::_prepareForm();
    }
}
