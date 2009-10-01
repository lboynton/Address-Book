<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Lee Boynton
 */

class Default_Form_Contact extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'firstName', array(
            'label'      => 'First Name',
            'required'   => true,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'lastName', array(
            'label'      => 'Last Name',
            'required'   => true,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'address1', array(
            'label'      => 'Address 1',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'address2', array(
            'label'      => 'Address 2',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'county', array(
            'label'      => 'County',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'country', array(
            'label'      => 'Country',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'postCode', array(
            'label'      => 'Post Code',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'homeTel', array(
            'label'      => 'Home Telephone',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'workTel', array(
            'label'      => 'Work Telephone',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'mobileTel', array(
            'label'      => 'Mobile Telephone',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('text', 'fax', array(
            'label'      => 'Fax',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        // Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Email Address',
            'required'   => false,
            'filters'    => array('StringTrim'),
        ));

        $addressBook = new Default_Model_AddressBook();
        $addressBooks = $addressBook->getNames();

        $this->addElement('select', 'addressBookId', array(
            'multiOptions' => $addressBooks,
            'required'   => true,
            'label'      => 'Address Book'
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Add Contact',
        ));
    }
}