<?php
/**
 * Panel controller
 */
class EDPA_Adpan_Adminhtml_Edpa_Adpan_PanelController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Index action - shows the grid
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('edpa_adpan/item');
        $this->renderLayout();
    }

    /**
     * Edit action - shows edit form
     */
    public function editAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('edpa_adpan/item');
        $this->renderLayout();
    }

	public function saveAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('edpa_adpan/item');
		echo 'Saving data';
        $this->renderLayout();
    }
}
