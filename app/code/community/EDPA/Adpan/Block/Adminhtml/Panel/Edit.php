<?php

class EDPA_Adpan_Block_Adminhtml_Panel_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct(); # for form containers, parent constructor should be called first

        $this->_objectId = 'id'; # this is the param we look for in the url to load the entity
        $this->_controller = 'adminhtml_panel'; # same as the grid container
        $this->_blockGroup = 'edpa_adpan'; # same as the grid container
        //$this->_updateButton('save', 'label', Mage::helper('examples_admingridandform')->__('Save Thing')); # sets the text for the save button
        //$this->_updateButton('delete', 'label', Mage::helper('examples_admingridandform')->__('Delete Thing')); # sets the text for the delete button
        # adds a save and continue edit button, not needed but nice
        //$this->_addButton(
        //    'save_and_edit_button',
         //   array(
         //       'label'     => Mage::helper('examples_admingridandform')->__('Save and Continue Edit'),
          //      'onclick'   => 'saveAndContinueEdit()',
         //       'class'     => 'save'
         //   ),
         //   100
       // );
    }

    /**
     * Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        # the text changes depending on if we are editing an existing entity
        # or creating a new one, this is based on a registry item that the
        # controller registers, this will never exist in our examples as we
        # don't have the controller logic to support it
        if (Mage::registry('panel_data') && Mage::registry('panel_data')->getId() ) {
            return Mage::helper('edpa_adpan')->__("Edit Panel");
        } else {
            return Mage::helper('edpa_adpan')->__('Add Panel');
        }
    }

    /**
     * Header CSS class
     *
     * Used to set the icon next to the header text, not at all needed but a
     * nice touch. Look at all the headers to see the available icons, or make
     * your own by omitting this and making a CSS rule for .head-adminhtml-thing
     *
     * @return string The CSS class
     */
    public function getHeaderCssClass()
    {
        return 'icon-head head-cms-page';
    }
}
