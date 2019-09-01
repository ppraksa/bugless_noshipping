<?php

class Bugless_Noshipping_Model_Shipping_Source_Method
{
    public function toOptionArray()
    {
        $shippingRates = Mage::helper('noshipping')->getAll();

        foreach ($shippingRates as $item) {

            $arr[] = array(
                'value' => 'noshipping_' . $item->destination_id,
                'label' => $item->address
            );
        }

        return $arr;
    }
}