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

class user extends person
{
    private $email;
    private $password;

    function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setPassword($password)
    {
        $this->password = md5($password);
    }
