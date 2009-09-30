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
}