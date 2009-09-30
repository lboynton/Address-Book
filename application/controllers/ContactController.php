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
        // action body
    }
}