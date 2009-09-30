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
class Default_Model_Contact
{
    protected $_id;
    protected $_addressBookId;
    protected $_firstName;
    protected $_lastName;
    protected $_address1;
    protected $_address2;
    protected $_county;
    protected $_country;
    protected $_postCode;
    protected $_homeTel;
    protected $_workTel;
    protected $_mobileTel;
    protected $_fax;
    protected $_email;
    protected $_mapper;

    public function __construct(array $options = null)
    {
        if (is_array($options))
        {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method))
        {
            throw new Exception('Invalid contact property: ' . $method);
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method))
        {
            throw new Exception('Invalid contact property: ' . $method);
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value)
        {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods))
            {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getAddressBookId()
    {
        return $this->_addressBookId;
    }

    public function setAddressBookId($addressBookId)
    {
        $this->_addressBookId = (int) $addressBookId;
        return $this;
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function setFirstName($firstName)
    {
        $this->_firstName = (string) $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    public function setLastName($lastName)
    {
        $this->_lastName = (string) $lastName;
        return $this;
    }

    public function getAddress1()
    {
        return $this->_address1;
    }

    public function setAddress1($address1)
    {
        $this->_address1 = (string) $address1;
        return $this;
    }

    public function getAddress2()
    {
        return $this->_address2;
    }

    public function setAddress2($address2)
    {
        $this->_address2 = (string) $address2;
        return $this;
    }

    public function getCounty()
    {
        return $this->_county;
    }

    public function setCounty($county)
    {
        $this->_county = (string) $county;
        return $this;
    }

    public function getCountry()
    {
        return $this->_country;
    }

    public function setCountry($country)
    {
        $this->_country = (string) $country;
        return $this;
    }

    public function getPostCode()
    {
        return $this->_postCode;
    }

    public function setPostCode($postCode)
    {
        $this->_postCode = (string) $postCode;
        return $this;
    }

    public function getHomeTel()
    {
        return $this->_homeTel;
    }

    public function setHomeTel($homeTel)
    {
        $this->_homeTel = (string) $homeTel;
        return $this;
    }

    public function getWorkTel()
    {
        return $this->_workTel;
    }

    public function setWorkTel($workTel)
    {
        $this->_workTel = (string) $workTel;
        return $this;
    }

    public function getMobileTel()
    {
        return $this->_mobileTel;
    }

    public function setMobileTel($mobileTel)
    {
        $this->_mobileTel = (string) $mobileTel;
        return $this;
    }

    public function getFax()
    {
        return $this->_fax;
    }

    public function setFax($fax)
    {
        $this->_fax = (string) $fax;
        return $this;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }

    public function setMapper($mapper)
    {
        $this->_mapper = $mapper;
        return $this;
    }

    public function getMapper()
    {
        if (null === $this->_mapper)
        {
            $this->setMapper(new Default_Model_ContactMapper());
        }
        return $this->_mapper;
    }

    public function save()
    {
        $this->getMapper()->save($this);
    }

    public function find($id)
    {
        $this->getMapper()->find($id, $this);
        return $this;
    }

    public function fetchAll()
    {
        return $this->getMapper()->fetchAll();
    }
}