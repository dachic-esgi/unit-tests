<?php

class User 
{
    private $_firstname;
    private $_lastname;
    private $_age;
    private $_email;

    function __construct($firstname, $lastname, $age, $email) {
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        $this->_age = $age;
        $this->_email = $email;
    }

    public function isValid() 
    {
        $email = $this->get_email();
        $age = $this->get_age();
        $firstname = $this->get_firstname();
        $lastname = $this->get_lastname();

        if( $email == null || !$this->isEmailValid($email) || $firstname == "" && $lastname == "" || !$this->isAgeValid($age))
        {
            return false;
        }
        else
            return true;
    }

    public function isEmailValid($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function isAgeValid($age) {
        return $age == 13 || $age > 13;
    }

    /**
     * Get the value of _firstname
     */ 
    public function get_firstname()
    {
        return $this->_firstname;
    }

    /**
     * Set the value of _firstname
     *
     * @return  self
     */ 
    public function set_firstname($_firstname)
    {
        $this->_firstname = (string)$_firstname;

        return $this;
    }

    /**
     * Get the value of _lastname
     */ 
    public function get_lastname()
    {
        return $this->_lastname;
    }

    /**
     * Set the value of _lastname
     *
     * @return  self
     */ 
    public function set_lastname($_lastname)
    {
        $this->_lastname = (string)$_lastname;

        return $this;
    }

    /**
     * Get the value of _age
     */ 
    public function get_age()
    {
        return $this->_age;
    }

    /**
     * Set the value of _age
     *
     * @return  self
     */ 
    public function set_age($_age)
    {
        $this->_age = (int)$_age;

        return $this;
    }

    /**
     * Get the value of _email
     */ 
    public function get_email()
    {
        return $this->_email;
    }

    /**
     * Set the value of _email
     *
     * @return  self
     */ 
    public function set_email($_email)
    {
        $this->_email = $_email;

        return $this;
    }
}
