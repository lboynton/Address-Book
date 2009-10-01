<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $addressBook = new Default_Model_AddressBook();
        $contact = new Default_Model_Contact();
        
        $form = new Default_Form_AddressBookSelector();
        $form->populate(array('name'=>'bob'));
        foreach($addressBook->fetchAll() as $name)

        $this->view->form = $form;
        $this->view->contacts = $contact->fetchAll($id);
    }
}