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
class Default_Model_DbTable_Contacts extends Zend_Db_Table_Abstract
{
    protected $_name = 'contacts';
    protected $_dependentTables = array('Default_Model_DbTable_AddressBooks');

    protected $_referenceMap = array(
        'AddressBook' => array(
        'columns'           => array('address_book_id'),
        'refTableClass'     => 'Default_Model_DbTable_AddressBooks',
        'refColumns'        => array('id')
    ));
}
