<?php
require_once "database.php";
abstract class person
{
    public $name;
    public $number;
    public $address;

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getNumber()
    {
        return $this->number;
    }

    function setNumber($number)
    {
        $this->number = $number;
    }

    function getAddress()
    {
        return $this->address;
    }

    function setAddress($address)
    {
        $this->address = $address;
    }
}
