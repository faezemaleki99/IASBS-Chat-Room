<?php 
	session_start();
	if(isset($_SESSION['name']))
	{
		include "view/header2.html"; 
		include "config.php"; 
		
		$sql="SELECT * FROM `chat`";

		$query = mysqli_query($conn,$sql);
?>

<div class="container">
  <center><h2>Welcome <span style="color:#dd7ff3;"><?php echo $_SESSION['name']; ?> !</span></h2>
	<label>Join the chat</label>
  </center></br>
  <div class="display-chat">
