<?php

class EDPA_Adpan_Block_Adminhtml_Panel_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct(); # for grids, parent constructor should be called first

        $this->setId('panelGrid'); # not sure where the grid id gets used
        $this->setDefaultSort('name'); # sets the default sort column
        $this->setDefaultDir('asc'); # sets the default sort direction
        $this->setSaveParametersInSession(true); # this sets filters and sorts in the session, as opposed to using the url
    }

    /**
     * Prepare grid collection object
     *
     * @return EDPA_Adpan_Block_Adminhtml_Thing_Grid
     */

    protected function _prepareCollection()
    {	
		
		$result = [];
		$collector = Mage::getModel('catalog/product')->getCollection()->addAttributeToSelect('*');
		//$collection[] = '';
		$collection = new Varien_Data_Collection();
		foreach ($collector as $itm){
			//$item = $itm;
			//var_dump($itm);
			$itm->setData(array(
				'panel_id'				=> $itm['entity_id'],
				'name'					=> $itm['name'],
				'short_description'		=> $itm['description'],
				'offer_status'			=> $itm['offer_status'],
				'price'					=> $itm['price'],
			));
			$result = $itm;
			$collection->addItem($result);
		}
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare grid columns
     *
     * @return EDPA_Adpan_Block_Adminhtml_Panel_Grid
     */
    protected function _prepareColumns()
    {
		$currencyCode = Mage::app()->getStore()->getCurrentCurrencyCode();
		$attributes = Mage::getModel('eav/config')
						->getAttribute('catalog_product', 'offer_status')
						->getSource()->getAllOptions(false, true);
		foreach($attributes as $record) {
			$options[$record['value']] = $record['label'];
		}

        $this->addColumn(
            'panel_id', # the column id
            array(
                'type'     => 'text',//number', # needed for using a ranged filter
                'header'   => Mage::helper('edpa_adpan')->__('ID'),
                'width'    => '20px',
                'index'    => 'panel_id', # index is the name of the data in the entity
                'sortable' => true, # defaults to true so this is pointless, just using as an example, can be true or false
            )
        );
        $this->addColumn(
            'name',
            array(
                'header' => Mage::helper('edpa_adpan')->__('Name'),
                'index'  => 'name',
            )
        );
/*          $this->addColumn(
            'image',
            array(
                'header' => Mage::helper('edpa_adpan')->__('Image'),
                'width'  => '100px',
                'index'  => 'image',
            )
        ); */
		
		$this->addColumn(
            'price',
            array(
                'header' => Mage::helper('edpa_adpan')->__('Price'),
                'width'  => '50px',
				'type'    => 'currency',
				'currency_code'  => $currencyCode,
                'index'  => 'price', # notice how index and the column id are different? this shows that index defines the data key
            )
        );
		$this->addColumn(
            'lo',
            array(
                'header' => Mage::helper('edpa_adpan')->__('Lo %'),
                'width'  => '30px',
				'type'    => 'text',
				'index'  => 'lo', # notice how index and the column id are different? this shows that index defines the data key
            )
        );
		$this->addColumn(
            'hi',
            array(
                'header' => Mage::helper('edpa_adpan')->__('Hi %'),
                'width'  => '30px',
				'type'    => 'text',
				'index'  => 'hi', # notice how index and the column id are different? this shows that index defines the data key
            )
        );
		
          $this->addColumn(
            'offer_status',
            array(
                'header' => Mage::helper('edpa_adpan')->__('Offer'),
                'width'  => '30px',
				'type'    => 'select',
				'options' => $options,
                'index'  => 'offer_status', # notice how index and the column id are different? this shows that index defines the data key
            )
        );
      
		$this->addColumn('field', array(
			'header'  => Mage::helper('edpa_adpan')->__('Field'),
			'width'   => '50px',
			'align'   => 'right',
			'renderer'=> 'EDPA_Adpan_Block_Adminhtml_Widget_Grid_Column_Renderer_Inline',
			'index'   => 'field',
		));
		
        return parent::_prepareColumns();
    }

    /**
     * Return a URL to be used for each row
     *
     * If you don't wish rows to return a URL, simply omit this method
     *
     * @param Varien_Object $row The row for which to supply a URL
     *
     * @return string The row URL
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('entity_id' => $row->getId()));
    }

    /**
     * Prepare grid mass actions
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('panel_id');
        $this->getMassactionBlock()->setFormFieldName('panel');
        $this->getMassactionBlock()->addItem(
            'delete',
            array(
                'label'   => Mage::helper('edpa_adpan')->__('Save'),
                'url'     => $this->getUrl('*/*/massSave'),
                'confirm' => Mage::helper('edpa_adpan')->__('Are you sure?')
            )
        );
        return $this;
    }
}
