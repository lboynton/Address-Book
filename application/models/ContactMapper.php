<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactMapper
 *
 * @author Lee Boynton
 */
class Default_Model_ContactMapper
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
            $this->setDbTable('Default_Model_DbTable_Contacts');
        }
        return $this->_dbTable;
    }

    public function save(Default_Model_Contact $contact)
    {
        $data = array(
            'address_book_id'   => $contact->getAddressBookId(),
            'first_name' => $contact->getFirstName(),
            'last_name' => $contact->getLastName(),
            'address_1' => $contact->getAddress1(),
            'address_2' => $contact->getAddress2(),
            'town' => $contact->getTown(),
            'county' => $contact->getCounty(),
            'country' => $contact->getCountry(),
            'post_code' => $contact->getPostCode(),
            'home_tel' => $contact->getHomeTel(),
            'work_tel' => $contact->getWorkTel(),
            'mobile_tel' => $contact->getMobileTel(),
            'fax' => $contact->getFax(),
            'email' => $contact->getEmail()
        );

        if (null === ($id = $contact->getId()))
        {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        }
        else
        {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Default_Model_Contact $contact)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result))
        {
            return;
        }
        $row = $result->current();
        $contact->setId($row->id)
                ->setAddressBookId($row->address_book_id)
                ->setFirstName($row->first_name)
                ->setLastName($row->last_name)
                ->setAddress1($row->address_1)
                ->setAddress2($row->address_2)
                ->setTown($row->town)
                ->setCounty($row->county)
                ->setCountry($row->country)
                ->setPostCode($row->post_code)
                ->setHomeTel($row->home_tel)
                ->setWorkTel($row->work_tel)
                ->setMobileTel($row->mobile_tel)
                ->setFax($row->fax)
                ->setEmail($row->email);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();

        foreach ($resultSet as $row)
        {
            $entry = new Default_Model_Contact();

            $entry->setId($row->id)
                ->setAddressBookId($row->address_book_id)
                ->setFirstName($row->first_name)
                ->setLastName($row->last_name)
                ->setAddress1($row->address_1)
                ->setAddress2($row->address_2)
                ->setTown($row->town)
                ->setCounty($row->county)
                ->setCountry($row->country)
                ->setPostCode($row->post_code)
                ->setHomeTel($row->home_tel)
                ->setWorkTel($row->work_tel)
                ->setMobileTel($row->mobile_tel)
                ->setFax($row->fax)
                ->setEmail($row->email)
                ->setMapper($this);
                
            $entries[] = $entry;
        }
        
        return $entries;
    }

    public function findByName($name)
    {
        $select  = $this->getDbTable()->select()
            ->where('CONCAT(first_name, \' \', last_name) LIKE ?', '%'.$name.'%');

        $resultSet = $this->getDbTable()->fetchAll($select);
        
        $entries = array();

        foreach ($resultSet as $row)
        {
            $entry = new Default_Model_Contact();

            $entry->setId($row->id)
                ->setAddressBookId($row->address_book_id)
                ->setFirstName($row->first_name)
                ->setLastName($row->last_name)
                ->setAddress1($row->address_1)
                ->setAddress2($row->address_2)
                ->setTown($row->town)
                ->setCounty($row->county)
                ->setCountry($row->country)
                ->setPostCode($row->post_code)
                ->setHomeTel($row->home_tel)
                ->setWorkTel($row->work_tel)
                ->setMobileTel($row->mobile_tel)
                ->setFax($row->fax)
                ->setEmail($row->email)
                ->setMapper($this);

            $entries[] = $entry;
        }

        return $entries;
    }

    public function delete($id)
    {
        $where = $this->getDbTable()->getAdapter()->quoteInto('id = ?', $id);
        $this->getDbTable()->delete($where);
    }
}