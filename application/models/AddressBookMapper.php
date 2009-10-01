<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddressBookMapper
 *
 * @author Lee Boynton
 */
class Default_Model_AddressBookMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable))
        {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract)
        {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable)
        {
            $this->setDbTable('Default_Model_DbTable_AddressBooks');
        }
        return $this->_dbTable;
    }

    public function save(Default_Model_AddressBook $addressBook)
    {
        $data = array(
            'name'   => $addressBook->getName()
        );

        if (null === ($id = $addressBook->getId()))
        {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        }
        else
        {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Default_Model_AddressBook $addressBook)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result))
        {
            return;
        }
        $row = $result->current();
        $addressBook->setId($row->id)
            ->setName($row->name);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();

        $entries   = array();
        foreach ($resultSet as $row)
        {
            $entry = new Default_Model_AddressBook();
            $entry->setId($row->id)
                ->setName($row->name)
                ->setMapper($this);
            $entries[] = $entry;
        }
        return $entries;
    }

    public function findContacts($id)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result))
        {
            return array();
        }
        $row = $result->current();
        $resultSet = $row->findDependentRowset('Default_Model_DbTable_Contacts');

        $contacts = array();
        foreach ($resultSet as $row)
        {
            $contact = new Default_Model_Contact();
            
            $contact->setId($row->id)
                ->setAddressBookId($row->address_book_id)
                ->setFirstName($row->first_name)
                ->setLastName($row->last_name)
                ->setAddress1($row->address_1)
                ->setAddress2($row->address_2)
                ->setCounty($row->county)
                ->setCountry($row->country)
                ->setPostCode($row->post_code)
                ->setHomeTel($row->home_tel)
                ->setWorkTel($row->work_tel)
                ->setMobileTel($row->mobile_tel)
                ->setFax($row->fax)
                ->setEmail($row->email);

            $contacts[] = $contact;
        }

        return $contacts;
    }

    public function findNames()
    {
        $addressBooks = $this->fetchAll();

        $names = array();

        foreach($addressBooks as $addressBook)
        {
            $names[$addressBook->id] = $addressBook->name;
        }

        return $names;
    }
}