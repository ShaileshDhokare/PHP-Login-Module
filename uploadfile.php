<?php
include_once "connection.php";
session_start();

if (!isset($_SESSION['id'])){
    header("Location:index.php");
}else{
    $id = $_SESSION['id'];
}


//Uploading image to server

if (isset($_POST['uploadfile'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];
    $fileSize = $_FILES['file']['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = ['jpg', 'jpeg', 'png']; //allowed image formats

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError===0){
            if ($fileSize < 500000){
                $fileDestination='Uploads/profile'.$id.'.'.$fileActualExt;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql="UPDATE `users` SET `profile_status`=1 WHERE id='$id'";
                mysqli_query($conn, $sql);
                echo '<script>alert("File Uploaded Successfully");</script>';
                echo '<script>location.href="index.php";</script>';

            }else {
                echo '<script>alert("File size must be less than 500kb");</script>';
                echo '<script>location.href="index.php";</script>';
            }
        }else{
            echo '<script>alert("Error while uploading the file");</script>';
            echo '<script>location.href="index.php";</script>';
        }

    } else {
        echo '<script>alert("this extension is not allowed");</script>';
        echo '<script>location.href="index.php";</script>';

    }
}