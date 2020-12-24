<?php

require_once "database.php";
abstract class person
{
    public $name;
    public $family;
    public $email;

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getFamily()
    {
        return $this->family;
    }

    function setFamily($family)
    {
        $this->family = $family;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

}

class user extends person
{
    private $username;
    private $password;

    function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
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
        $Parameters = array($this->username, $this->password);
        $result = database::ExecuteQuery('CheckUserPass', $paramTypes, $Parameters);

        if(mysqli_num_rows($result) > 0)
        {
            $row = $result->fetch_array();
            $this->setName($row["name"]);
            $this->setFamily($row["family"]);
            $this->setEmail($row["email"]);
            return true;
        }
        return false;
    }

    private function getUserAsaText()
    {
        return $this->username.' '.$this->password.' '.$this->name.' '.$this->family.' '.$this->email.PHP_EOL;
    }

    private function IsUsernameExist()
    {
        $paramTypes = "s";
        $Parameters = array($this->username);
        $result = database::ExecuteQuery('isUsernameExist', $paramTypes, $Parameters);

        if(mysqli_num_rows($result) > 0)
              return true;
        return false;
    }

    function Save()
    {
        if(!$this->IsUsernameExist()) {
            $paramTypes = "sssss";
            $Parameters = array($this->name, $this->family, $this->email, $this->username, $this->password);
            database::ExecuteQuery('addUser', $paramTypes, $Parameters);
            return true;
        }
        return false;
    }
}

class message
{
    private $from_user;
    private $to_user;
    private $text_message;
    private $time_status;

    function getFromUser()
    {
        return $this->from_user;
    }

    function getToUser()
    {
        return $this->to_user;
    }

    function getTextMessage()
    {
        return $this->text_message;
    }

    function getTimeStatus()
    {
        return $this->time_status;
    }

    function setMessage($input_message)
    {
        $this->text_message = $input_message;
    } 


}


class contact extends user
{
    private $contactList; // list
    

    function contactList() {
        $this->contactList = array();
        $paramTypes = "s";
        $Parameters = array($this->getUsername());
        $result = database::ExecuteQuery('getContactList', $paramTypes, $Parameters);
        $contactList = $result->fetchAll();
    }
}
?>