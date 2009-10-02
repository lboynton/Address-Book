<?php

class AddressbookController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->headTitle('Address Books');
        $addressBook = new Default_Model_AddressBook();
        $this->view->entries = $addressBook->fetchAll();
    }
    
    public function viewAction()
    {
        $id = (int) $this->getRequest()->getParam('id');

        $addressBook = new Default_Model_AddressBook();

        $this->view->addressBook = $addressBook->find($id);
        $this->view->contacts = $addressBook->getContacts($id);
    }

    public function addAction()
    {
        $this->view->headTitle('Add Address Book');
        $request = $this->getRequest();
        $form = new Default_Form_AddressBook();

        if ($this->getRequest()->isPost())
        {
            if ($form->isValid($request->getPost()))
            {
                $model = new Default_Model_AddressBook($form->getValues());
                $model->save();
                return $this->_helper->redirector('index', 'index');
            }
        }

        $this->view->form = $form;
    }
}