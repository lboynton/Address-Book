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
class Default_Model_AddressBookMapper extends Default_Model_AbstractMapper
{
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
        $this->_data = array(
            'name'   => $addressBook->getName()
        );

        parent::save($addressBook);
    }

    public function find($id, Default_Model_AddressBook $addressBook)
    {
        $row = parent::find($id, $addressBook);

        $addressBook->setName($row->name);
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