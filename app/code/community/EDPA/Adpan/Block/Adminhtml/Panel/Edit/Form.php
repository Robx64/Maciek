<?php
/**
 *
 */
class EDPA_Adpan_Block_Adminhtml_Panel_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare form before rendering HTML
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
		# create the form with the essential information, such as DOM ID, action
        # attribute, method and the enc type (this is needed if you have image
        # inputs in your form, and doesn't hurt to use otherwise)
        $form = new Varien_Data_Form(
            array(
                'id'      => 'edit_form',
                'action'  => $this->getUrl('*/*/save',
			array(
				'id' => $this->getRequest()->getParam('option_id'))),
				'method'  => 'post',
				'enctype' => 'multipart/form-data',
            )
        );
		
        $form->setUseContainer(true);

        $this->setForm($form);
		
		$title = $this->getName();;

		# add a fieldset, this returns a Varien_Data_Form_Element_Fieldset object

        $fieldset = $form->addFieldset(
            'base_fieldset',
            array(
                'legend' => Mage::helper('edpa_adpan')->__('Actually: '.$title),
            )
        );

        $fieldset->addField(
            'id', # the input id
            'text', # the type
            array(
                'label'    => Mage::helper('edpa_adpan')->__('Id'),
				'width'    => '20px',
                'class'    => 'required-entry',
                'required' => true,
                'name'     => $itm['entity_id'],
            )
        );

		$fieldset->addField(
            'name', # the input id
            'text', # the type
            array(
                'label'    => Mage::helper('edpa_adpan')->__('Name'),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => $itm['name'],
            )
        );

		$fieldset->addField(
            'offer_status', # the input id
            'text', # the type
            array(
                'label'    => Mage::helper('edpa_adpan')->__('Offer status'),
                'required' => false,
                'name'     => $itm['offer_status'],
            )
        );
        $fieldset->addField(
            'low_rate',
            'text',
            array(
                'label' => Mage::helper('edpa_adpan')->__('Low rate (%)'),
                'name'  => 'low_rate',
            )
        );
        $fieldset->addField(
            'hi_rate',
            'text',
            array(
                'label' => Mage::helper('edpa_adpan')->__('High rate (%)'),
                'name'  => 'hi_rate',
            )
        );

/*         $fieldset->addField(
            'long_description',
            'textarea',
            array(
                'label' => Mage::helper('edpa_adpan')->__('Long description'),
                'name'  => 'long_description',
                'note'  => 'The long description didn\'t appear in the grid',
            )
        );
 */
/*         # we can use multiple fieldsets

        $fieldset = $form->addFieldset(
            'stock_fieldset',
            array(
                'legend' => Mage::helper('edpa_adpan')->__('Stock - beware, stock is changing every minute ;)'),
            )
        );

        $fieldset->addField(
            'stock_note',
            'note',
            array(
                'text' => Mage::helper('edpa_adpan')->__('A note field can be used to inform users of '
                                      . 'something, they look a bit naff though. You can add any HTML you fancy to '
                                      . 'make them look better, such as the note at the top of this form does'),
            )
        );

        $fieldset->addField(
            'quantity',
            'text',
            array(
                'label'    => Mage::helper('edpa_adpan')->__('Quantity'),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'quantity',
            )
        ); */
        
        return parent::_prepareForm();
    }
}
