<?php

/**
 * Product:       Xtento_OrderExport (1.7.5)
 * ID:            5WpJHYT/KUnHtZhVZ4u0CQHzafHDF/hDx1bROha0mYM=
 * Packaged:      2015-04-02T20:38:40+00:00
 * Last Modified: 2013-11-23T16:12:34+01:00
 * File:          app/code/local/Xtento/OrderExport/controllers/Adminhtml/Orderexport/IndexController.php
 * Copyright:     Copyright (c) 2015 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_OrderExport_Adminhtml_OrderExport_IndexController extends Xtento_OrderExport_Controller_Abstract
{
    public function redirectAction()
    {
        $redirectController = Mage::getStoreConfig('orderexport/general/default_page');
        if (!$redirectController) {
            $redirectController = 'orderexport_manual';
        }
        $this->_redirect('*/'.$redirectController);
    }

    public function installationAction() {
        Mage::getSingleton('adminhtml/session')->addWarning(Mage::helper('xtento_orderexport')->__('The extension has not been installed properly. The required database tables have not been created yet. Please check out our <a href="http://support.xtento.com/wiki/Troubleshooting:_Database_tables_have_not_been_initialized" target="_blank">wiki</a> for instructions. After following these instructions access the module at Sales > Sales Export again.'));
        $this->loadLayout();
        $this->renderLayout();
    }

    public function disabledAction() {
        Mage::getSingleton('adminhtml/session')->addWarning(Mage::helper('xtento_orderexport')->__('The extension is currently disabled. Please go to System > XTENTO Extensions > Sales Export Configuration to enable it. After that access the module at Sales > Sales Export again.'));
        $this->loadLayout();
        $this->renderLayout();
    }
}