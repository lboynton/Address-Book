<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddressBook
 *
 * @author Lee Boynton
 */
class Default_Form_AddressBook extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement('text', 'name', array(
            'label'      => 'Name of Address Book',
            'required'   => true,
            'class'      => 'title text',
            'filters'    => array('StringTrim'),
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Create Address Book',
        ));
    }
}