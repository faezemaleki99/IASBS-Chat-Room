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
