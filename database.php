<?php
abstract class database
{
    private static function ConnectToDB()
    {
        global $server;
        global $db_email;
        global $db_password;
        global $db_name;

        $connection = mysqli_connect($server, $db_email, $db_password, $db_name);
        if ($connection->connect_error)
        {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }

    private static function PrepareParameters($ParamTypes, $Parameters)
    {
        $inputArray[] = &$ParamTypes;
        $j = count($Parameters);
        $ParameterQuestionMarks = "";
        for($i=0;$i<$j;$i++){
            $inputArray[] = &$Parameters[$i];
            $ParameterQuestionMarks.='?,';
        }

        return array("ParameterQuestionMarks"=>$ParameterQuestionMarks, "inputArray"=>$inputArray);
    }
