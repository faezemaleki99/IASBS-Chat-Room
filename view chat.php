<?php
include_once "viewchat.html";
require_once "deletechat.php"
$conn = mysqli_connect("localhost", "user", "password", "chatroom_db");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();}
$sqll ="select message,created_on, count(1) as cnt from (select * from chat order by created_on ) as alias where rid =$_SESSION['id'] and sid=$selid or sid =$_SESSION['id'] and rid=$selid   group by  rid,sid having cnt > 1 ORDER BY created_on;";
$result = $conn->query($sqll);
/*echo'<script type="text/javascript">$("a").click(function(e) {
                e.preventDefault();
                var a = $(this);
                window.location.href = a.attr('href')+"?clicked_id="+a.attr('id');} </script>';*/

$selid=$_GET['clicked_id'];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        if($row["sid"]==$_SESSION['id']){

            echo '<div id="$row['rid']"  class="sender" onclick="location.href="deletechat.php"> $row['massage']<div>$row['created_on']</div></div></br>';}
        else{
            echo '<div id="$row['sid']"  class="reciever" onclick="location.href="deletechat.php">$row['sid']+$row['massage']<div>$row['created_on']</div></div></br>';}

    }}}

else {
    echo "no massages";}
$conn->close();
?>