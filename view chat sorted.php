<?php

$conn = mysqli_connect("localhost", "user", "password", "chatroom_db");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Perform query
$rows=array();
$sql = "select sid,rid count(1) as cnt from (select * from chat order by created_on ) as alias where rid =$_SESSION['id'] or sid =$_SESSION['id']  group by  rid,sid having cnt > 1 ORDER BY created_on;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    global $rows;
    while($row = $result->fetch_assoc()) {
        if($rows["sid"]==$_SESSION['id']){
            echo '<div id="$row[rid] "style: border=3px;><a href="view chat.php?.id=$row[rid]">$row[rid]</a></div></br>';
         }

        else{
            echo '<div id="$row[sid]" style: border=3px;><a href="view chat.php?.id=$row[sid]">$row[sid]</div></br>';}

        }}
     else {
    echo "no chats";}
$conn->close();
?>

