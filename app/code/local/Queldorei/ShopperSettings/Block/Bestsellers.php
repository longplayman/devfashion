<?php
/**
 * @version   1.0 12.0.2012
 * @author    Queldorei http://www.queldorei.com <mail@queldorei.com>
 * @copyright Copyright (C) 2010 - 2012 Queldorei
 */

class Queldorei_ShopperSettings_Block_Bestsellers extends Mage_Catalog_Block_Product_Abstract
{
    public function __construct(){
        parent::_construct();
        $this->setData('bestsellers', Mage::getStoreConfig('shoppersettings/catalog/bestsellers'));
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getBestsellers()
    {
        $id = $this->getData('bestsellers');
        if (  empty($id) ) return null;

        $id = explode(',',$this->getData('bestsellers'));
        $products = array();
        foreach ($id as $_id) {
            $products[] = Mage::getModel("catalog/product")->load($_id);
        }

        return $products;
    }
}