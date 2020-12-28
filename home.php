<?php 
	session_start();
	if(isset($_SESSION['name']))
	{
		include "view/header2.html"; 
		include "config.php"; 
		
		$sql="SELECT * FROM `chat`";

		$query = mysqli_query($conn,$sql);

?>
