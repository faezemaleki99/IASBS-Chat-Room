<?php
session_start();
require "model/user.php";
if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else
{
    $u = unserialize($_SESSION['USER']);
    $WelcomeMessage = 'Welcome '.$u->getName();
}

require "config.php";
include $ViewPath."header.html";

include $ViewPath."header2.html";

?>
