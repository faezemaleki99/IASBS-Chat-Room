<?php

include "config.php";
session_start();
if($_POST)
{
	$name=$_SESSION['name'];
    $msg=$_POST['msg'];
    
    $deleting = mysqli_query($connection, "DELETE FROM `chat` WHERE (`from`='$id_of_member_a' AND `to`='$id_of_member_b') OR (`from`='$id_of_member_b' AND `to`='$id_of_member_a') ") or die(mysqli_error($connection));

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		header('Location: chatpage.php');
	}
	else
	{
		echo "Something went wrong";
	}
	
	}
?>
