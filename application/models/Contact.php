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
class Default_Model_Contact extends Default_Model_AbstractModel
{
    protected $_id;
    protected $_addressBookId;
    protected $_firstName;
    protected $_lastName;
    protected $_address1;
    protected $_address2;
    protected $_town;
    protected $_county;
    protected $_country;
    protected $_postCode;
    protected $_homeTel;
    protected $_workTel;
    protected $_mobileTel;
    protected $_fax;
    protected $_email;

    public function getOptions($id)
    {
        $this->find($id);
        
        return $this->toArray(array('id', 'firstName', 'lastName', 'address1',
            'address2', 'town', 'county', 'country', 'postCode','homeTel',
            'workTel', 'mobileTel','fax','email', 'addressBookId'));
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

    public function getTown()
    {
        return $this->_town;
    }

    public function setTown($town)
    {
        $this->_town = (string) $town;
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

    public function getMapper()
    {
        if (null === $this->_mapper)
        {
            $this->setMapper(new Default_Model_ContactMapper());
        }
        return $this->_mapper;
    }

    public function findByName($name)
    {
        return $this->getMapper()->findByName($name);
    }

    public function delete($id)
    {
        $this->getMapper()->delete($id);
    }
}