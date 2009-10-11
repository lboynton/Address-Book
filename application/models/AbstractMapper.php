<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractMapper
 *
 * @author Lee Boynton
 */
abstract class Default_Model_AbstractMapper
{
    protected $_dbTable;
    protected $_data;

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

    public abstract function getDbTable();
    
    public function save(Default_Model_AbstractModel $model)
    {
        if (null === ($id = $model->getId()))
        {
            unset($this->_data['id']);
            $this->getDbTable()->insert($this->_data);
        }
        else
        {
            $this->getDbTable()->update($this->_data, array('id = ?' => $id));
        }
    }

    public function find($id, Default_Model_AbstractModel $model)
    {
        $result = $this->getDbTable()->find($id);

        if (0 == count($result))
        {
            return;
        }
        
        $row = $result->current();

        $model->setId($row->id);

        return $row;
    }

    public abstract function fetchAll();

    public function delete($id)
    {
        $where = $this->getDbTable()->getAdapter()->quoteInto('id = ?', $id);
        $this->getDbTable()->delete($where);
    }
}
