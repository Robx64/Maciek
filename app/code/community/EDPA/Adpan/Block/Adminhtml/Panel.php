<?php
/**
 * Panel grid container
 */
class EDPA_Adpan_Block_Adminhtml_Panel extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->_controller = 'adminhtml_panel'; # this is the common prefix in the second part of the grouped class name, i.e. whatever/(this_bit)
        $this->_blockGroup = 'edpa_adpan'; # the first part of the grouped class name, i.e. (some_module)/whatever
        $this->_headerText = Mage::helper('edpa_adpan')->__('Products In Offer'); # sets the name in the header
        $this->_addButtonLabel = Mage::helper('edpa_adpan')->__('Add Product To Offer'); # sets the text for the add button

        parent::__construct(); # for grid containers, parent constructor must be called last
    }

    /**
     * Header CSS class
     *
     * Used to set the icon next to the header text, not at all needed but a
     * nice touch. Look at all the headers to see the available icons, or make
     * your own by omitting this and making a CSS rule for .head-adminhtml-panel
     *
     * @return string The CSS class
     */
    public function getHeaderCssClass()
    {
        return 'icon-head head-cms-page';
    }
}
