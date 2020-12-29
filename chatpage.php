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
	  
	  
<?php
    if(mysqli_num_rows($query)>0) {
	    
	    while($row= mysqli_fetch_assoc($query)) {	
		
?>

	<div class="message">
		<p>
			<span><?php echo $row['name']; ?> :</span>
			<?php echo $row['message']; ?>
			</p>
		</div>
	  
<?php
		}
	}
	else
	{
?>
<div class="message">
	<p>
		No previous chat available.
	        </p>
</div>
<?php
	} 
?>
