<?php
/*

 * @category	Miscellaneous
 
 * @package		EDPA_Admin_Module
 
 * @author		EDPA/Robert A. D. Ambicki
 
 * @date        28-08-2016
 
 * @last edit   28-08-2016
 
 * @copyright	Copyright 2016 EDPA
 
 */
  
class EDPA_Adpan_Block_Adminhtml_Widget_Grid_Column_Renderer_Inline extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Input
{
    public function render(Varien_Object $row)
    {
        //$html = parent::render($row);

        $html = '<button onclick="updateField(this, '. $row->getId() .'); return false">' . Mage::helper('inchoo_orders')->__('Update') . '</button>';

        return $html;
    }
}
?>