<?php

include "./Product.php";
include "./DBConnection.php";
include "./EmailSender.php";

class Exchange
{
    private $_receiver;
    private $_product;
    private $_owner;
    private $_startDate;
    private $_endDate;
    private $_emailSender;
    private $_dbConnection;

    function __construct(User $receiver, Product $product, User $owner, $startDate, $endDate, EmailSender $emailSender, DatabaseConnection $dbConnection) {
        $this->_receiver = $receiver;
        $this->_product = $product->set_owner($owner);
        $this->_owner = $owner;
        $this->_startDate = $startDate;
        $this->_endDate = $endDate;
        $this->_emailSender = $emailSender;
        $this->_dbConnection = $dbConnection;

    }

    public function save() 
    {
        $this->isMinorReceiver();

        if($this->_receiver->isValid() && $this->_owner->isValid() && $this->_product->isValid() && $this->AreDatesCorrect())
        {
            return $this->_dbConnection->saveExchange($this);
        }
        else
        {
            return false;
        }
    }

    public function AreDatesCorrect()
    {
        $date = date('d-m-Y');
        if(strtotime($this->_startDate) > strtotime($date) && strtotime($this->_startDate) < strtotime($this->_endDate))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function isMinorReceiver() {
        if($this->_receiver->get_age() < 18)
        {
            return $this->_emailSender->sendEmail(null, null);
        };
    }
    

    /**
     * Get the value of _startDate
     */ 
    public function get_startDate()
    {
        return $this->_startDate;
    }

    /**
     * Set the value of _startDate
     *
     * @return  self
     */ 
    public function set_startDate($_startDate)
    {
        $date = new date('d-m-Y',strtotime($_startDate));
        $this->_startDate = $date;

        return $this;
    }

    /**
     * Get the value of _endDate
     */ 
    public function get_endDate()
    {
        return $this->_endDate;
    }

    /**
     * Set the value of _endDate
     *
     * @return  self
     */ 
    public function set_endDate($_endDate)
    {
        $date = new date('d-m-Y',strtotime($_endDate));
        $this->_endDate = $date;

        return $this;
    }

    /**
     * Get the value of _product
     */ 
    public function get_product()
    {
        return $this->_product;
    }

    /**
     * Set the value of _product
     *
     * @return  self
     */ 
    public function set_product($_product)
    {
        $this->_product = $_product;

        return $this;
    }
}
