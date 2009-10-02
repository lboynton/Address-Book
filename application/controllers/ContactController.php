<?php

class ContactController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
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
                return $this->_helper->redirector('index', 'index');
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
                return $this->_helper->redirector('index', 'index');
            }
        }
        else
        {
            $form->populate($contact->toArray($id));
        }

        $this->view->form = $form;
    }
}