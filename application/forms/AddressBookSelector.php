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

        $this->addElement('select', 'name', array(
            'label'      => 'View address book'
        ));

        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'View',
        ));
    }
}
