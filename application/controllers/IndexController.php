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

        $id = (int) $this->getRequest()->getParam('addressbook');
        $name = (string) $this->getRequest()->getParam('name');
        
        $this->view->contacts = $contact->search($name, $id);

        $form = new Default_Form_AddressBookSelector();
        $form->populate(array('addressbook' => $id));
        $form->populate(array('name' => $name));
        $this->view->form = $form;
    }
}