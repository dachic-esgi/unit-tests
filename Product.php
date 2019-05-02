<?php

include "./User.php";

class Product
{
    private $_name;
    private $_owner;

    function __construct($name, User $owner) 
    {
        $this->_name = $name;
        $this->_owner = $owner;
    }

    public function isValid()
    {
        if($this->get_name() != "" && $this->_owner->isValid())
        {
            return true;
        }
        else 
            return false;
    }

    /**
     * Get the value of _name
     */ 
    public function get_name()
    {
        return $this->_name;
    }

    /**
     * Set the value of _name
     *
     * @return  self
     */ 
    public function set_name($_name)
    {
        $this->_name = $_name;

        return $this;
    }

    /**
     * Get the value of _owner
     */ 
    public function get_owner()
    {
            return $this->_owner;
    }

    /**
     * Set the value of _owner
     *
     * @return  self
     */ 
    public function set_owner($_owner)
    {
            $this->_owner = $_owner;

            return $this;
    }
}
