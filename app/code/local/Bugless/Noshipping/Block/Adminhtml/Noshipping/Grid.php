<?php

class Bugless_Noshipping_Block_Adminhtml_Noshipping_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("noshippingGrid");
				$this->setDefaultSort("destination_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("noshipping/noshipping")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("destination_id", array(
				"header" => Mage::helper("noshipping")->__("ID"),
				"align" =>"right",
				"width" => "150px",
			    "type" => "number",
				"index" => "destination_id",
				));
                
				$this->addColumn("address", array(
				"header" => Mage::helper("noshipping")->__("Address"),
				"index" => "address",
				));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}

}