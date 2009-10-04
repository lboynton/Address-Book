<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddressBookSelector
 *
 * @author Lee Boynton
 */
class Default_Form_AddressBookSelector extends Zend_Form
{
    public function init()
    {
        $this->setMethod('get');

        $this->addElement('text', 'name', array(
            'label'      => 'Name',
            'class'     => 'text',
            'decorators' => array('ViewHelper', 'Label', array(array('data' => 'htmlTag', 'tag' => 'div')))
        ));

        $addressBook = new Default_Model_AddressBook();
        $addressBooks = $addressBook->getNames();

        $this->addElement('select', 'addressbook', array(
            'multiOptions' => $addressBooks,
            'label'      => false,
            'decorators' => array('ViewHelper', array(array('data' => 'htmlTag', 'tag' => 'div')))
        ));

        $this->getElement('addressbook')->addMultiOption('0', 'All');

        $this->addElement('submit', 'submit-button', array(
            'ignore'   => true,
            'label'    => 'View',
            'class'     => 'submit',
            'decorators' => array('ViewHelper', array(array('data' => 'htmlTag', 'tag' => 'div')))
        ));

        $this->setName('address_book_form');

        $this->setDecorators(array('FormElements', 'Form'));
    }
}
