<?php

class Bugless_Noshipping_Model_Shipping extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'bugless_noshipping';

    public function getAllowedMethods()
    {
        $shippingRates = Mage::helper('noshipping')->getAll();

        $allowed = Mage::getStoreConfig('carriers/bugless_noshipping/allowed_methods');

        $arr = array();

        foreach ($shippingRates as $item) {

            $tested = strpos($allowed, 'noshipping_' . $item->destination_id);

            if ($tested !== false) {
                $arr['noshipping_' . $item->destination_id] = $item->address;
            }
        }

        return $arr;
    }

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!Mage::getStoreConfig('carriers/' . $this->_code . '/active')) {
            return false;
        }
        $result = Mage::getModel('shipping/rate_result');

        $allowedMethods = $this->getAllowedMethods();
        foreach ($allowedMethods as $key => $title) {

            $method = Mage::getModel('shipping/rate_result_method');
            $method->setCarrier('bugless_noshipping');
            $method->setCarrierTitle($this->getConfigData('title'));
            $method->setMethod($key);
            $method->setMethodTitle($title);
            $method->setMethodDescription($title);
            $method->setCost(0);
            $method->setPrice(0);
            $result->append($method);
        }

        return $result;
    }

    protected function _getDefaultRate()
    {
        $rate = Mage::getModel('shipping/rate_result_method');
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod($this->_code);
        $rate->setMethodTitle($this->getConfigData('name'));
        $rate->setPrice($this->getConfigData('price'));
        $rate->setCost(0);

        return $rate;
    }
}