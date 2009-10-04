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

    public function renameAction()
    {
        // disable layout for ajax requests
        if($this->getRequest()->isXmlHttpRequest())
        {
            $this->_helper->layout()->disableLayout();
            $this->view->ajax = true;
        }

        $id = (int) $this->getRequest()->getParam('id');
        $model = new Default_Model_AddressBook();
        $model->find($id);

        $form = new Default_Form_AddressBook();

        if ($this->getRequest()->isPost())
        {
            if ($form->isValid($this->getRequest()->getPost()))
            {
                $model->setOptions($form->getValues());
                $model->setId($id);
                $model->save();

                if(!$this->getRequest()->isXmlHttpRequest())
                {
                    return $this->_helper->redirector('index', 'addressbook');
                }
            }
        }
        else
        {
            $form->populate(array('name' => $model->getName()));
        }

        $this->view->form = $form;
        $this->view->name = $model->getName();
    }

    public function deleteAction()
    {
        if ($this->getRequest()->isPost())
        {
            $id = (int) $this->getRequest()->getParam('id');
            $model = new Default_Model_AddressBook();
            $model->delete($id);
        }

        return $this->_helper->redirector('index', 'addressbook');
    }
}
