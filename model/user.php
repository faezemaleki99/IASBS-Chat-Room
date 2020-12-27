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

        function checkUserPass()
    {
        $paramTypes = "ss";
        $Parameters = array($this->email, $this->password);
        $result = database::ExecuteQuery('CheckUserPass', $paramTypes, $Parameters);

        if(mysqli_num_rows($result) > 0)
        {
            $row = $result->fetch_array();
            $this->setName($row["name"]);
            $this->setNumber($row["number"]);
            return true;
        }
        return false;
    }
    
        private function getUserAsaText()
    {
        return $this->email.' '.$this->password.' '.$this->name.' '.$this->number.PHP_EOL;
    }

    public function IsEmailExist()
    {
        $paramTypes = "s";
        $Parameters = array($this->email);
        $result = database::ExecuteQuery('IsUsernameExist', $paramTypes, $Parameters);

        if(mysqli_num_rows($result) > 0)
              return true;
        return false;
    }
