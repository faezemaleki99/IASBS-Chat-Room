<?php
include"viewchat.html";
require_once "view chat.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*$otherid=$_GET['id'];
echo '<script type="text/JavaScript">
    $passedId = $_GET['id'];
     </script>'
// sql to delete a record*/
$dom = new DOMDocument();
$dom->loadHTML('$viewchat.html');
$xpath = new DOMXPath($dom);
$divContent = $xpath->query('//div[id=$_SESSION['id']]');
$sql = "DELETE FROM chat WHERE sid=$_SESSION['id']and rid=$selid and massage like $divContent ";


if ($conn->query($sql) === TRUE and $yes==TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>