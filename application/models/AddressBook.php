<?php

/**
 * Description of AddressBook
 *
 * @author Lee Boynton
 */
class Default_Model_AddressBook extends Default_Model_AbstractModel
{
    protected $_id;
    protected $_name;

    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getMapper()
    {
        if (null === $this->_mapper)
        {
            $this->setMapper(new Default_Model_AddressBookMapper());
        }
        return $this->_mapper;
    }
}
