<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * An abstract model which provides methods for accessing arbitrary properties
 * and the data mapper. It also provides methods for finding and saving the
 * model. Subclasses simply need to define their properties and provide accessor
 * methods.
 *
 * @author Lee Boynton
 */
abstract class Default_Model_AbstractModel
{
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
            throw new Exception('Invalid property: ' . $method);
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method))
        {
            throw new Exception('Invalid property: ' . $method);
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

    public abstract function getOptions($id);

    public function setMapper($mapper)
    {
        $this->_mapper = $mapper;
        return $this;
    }

    public abstract function getMapper();

    public function save()
    {
        $this->getMapper()->save($this);
    }

    public function find($id)
    {
        $this->getMapper()->find($id, $this);
        return $this;
    }

    protected function toArray($options)
    {
        $methods = get_class_methods($this);

        $array = array();

        foreach ($options as $key)
        {
            $method = 'get' . ucfirst($key);
            
            if (in_array($method, $methods))
            {
                $array[$key] = $this->$method();
            }
        }

        return $array;
    }

    public function fetchAll()
    {
        return $this->getMapper()->fetchAll();
    }

    public function delete($id)
    {
        $this->getMapper()->delete($id);
    }
}
