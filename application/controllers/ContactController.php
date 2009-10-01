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

    public function viewAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $contact = new Default_Model_Contact();

        $request = $this->getRequest();
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
        else
        {
            $form->populate($contact->find($id)->toArray());
        }

        $this->view->form = $form;
    }
}