<?php include "view/header.html"; ?>
<?php
  include "config.php";
  if($_POST)
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM `register` where email = '".$email."' and password = '".$password."' ";
		$query =  mysqli_query($conn, $sql);
		if(mysqli_num_rows($query)>0)
		{
			$row = mysqli_fetch_assoc($query);
			session_start();
			$_SESSION['name'] = $row['name'];
			header('Location: home.php');
		}
		else
		{
			echo "<script> alert('Invalid Email or Password.'); </script>";
		}
	}
?>
