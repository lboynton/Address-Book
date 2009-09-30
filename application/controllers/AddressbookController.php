<?php

class AddressbookController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $addressBook = new Default_Model_AddressBook();
        $this->view->entries = $addressBook->fetchAll();
    }
}