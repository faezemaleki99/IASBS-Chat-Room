<?php include "view/header.html"; ?>
<div class="container">

  <center><h2>Registration form</h2></center></br>
  <form class="form-horizontal" method="post" action="add_user.php">
    <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="name">Name:</label>
	  
      <div class="col-sm-5">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
      </div>
    </div>
