<?php

class ContactController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $contact = new Default_Model_Contact();
        $this->view->entries = $contact->fetchAll();
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $addressBook = new Default_Model_AddressBook();
        $form = new Default_Form_Contact();

        if ($this->getRequest()->isPost())
        {
            if ($form->isValid($request->getPost()))
            {
                $model = new Default_Model_Contact($form->getValues());
                $model->save();
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }
}