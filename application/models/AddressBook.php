<?php

/**
 * Description of AddressBook
 *
 * @author Lee Boynton
 */
class Default_Model_AddressBook extends Default_Model_AbstractModel
{
    protected $_name;

    public function getOptions($id)
    {
        $this->find($id);
        return $this->toArray(array('id', 'name'));
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

    public function getContacts($id)
    {
        return $this->getMapper()->findContacts($id);
    }

    public function getNames()
    {
        return $this->getMapper()->findNames();
    }
}
