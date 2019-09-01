<?php
class Bugless_Noshipping_Adminhtml_NoshippingbackendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Noshipping page"));
	   $this->renderLayout();
    }
}