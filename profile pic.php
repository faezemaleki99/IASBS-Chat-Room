<?php
session_start();
include_once 'database.php';
$id = $_SESSION['id'];
if (isset($_POST['submit'])) {

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg", "jpeg", "png", "pdf");


    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {

            if ($fileSize < 500000) {
              $fileNameNew = "profile" . $id . "." . $fileActualExt;
              $fileDestination = 'uploads/' . $fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);

              $sql = "UPDATE profileimg SET status=0 WHERE userid='$id';";
              $result = mysqli_query($conn, $sql);

              header("Location: index.php?uploadsuccess");
    } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file, try again!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}