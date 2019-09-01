<?php

class Bugless_Noshipping_Adminhtml_NoshippingController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("noshipping/noshipping")->_addBreadcrumb(Mage::helper("adminhtml")->__("Noshipping Manager"),Mage::helper("adminhtml")->__("Noshipping Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Noshipping"));
			    $this->_title($this->__("Manager Noshipping"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Noshipping"));
				$this->_title($this->__("Noshipping"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("noshipping/noshipping")->load($id);
				if ($model->getId()) {
					Mage::register("noshipping_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("noshipping/noshipping");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Noshipping Manager"), Mage::helper("adminhtml")->__("Noshipping Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Noshipping Description"), Mage::helper("adminhtml")->__("Noshipping Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("noshipping/adminhtml_noshipping_edit"))->_addLeft($this->getLayout()->createBlock("noshipping/adminhtml_noshipping_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("noshipping")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Noshipping"));
		$this->_title($this->__("Noshipping"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("noshipping/noshipping")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("noshipping_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("noshipping/noshipping");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Noshipping Manager"), Mage::helper("adminhtml")->__("Noshipping Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Noshipping Description"), Mage::helper("adminhtml")->__("Noshipping Description"));


		$this->_addContent($this->getLayout()->createBlock("noshipping/adminhtml_noshipping_edit"))->_addLeft($this->getLayout()->createBlock("noshipping/adminhtml_noshipping_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						$model = Mage::getModel("noshipping/noshipping")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Noshipping was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setNoshippingData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setNoshippingData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("noshipping/noshipping");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('slider_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("noshipping/noshipping");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}

}
