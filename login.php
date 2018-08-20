<?php

session_start();

if (isset($_SESSION['id'])){
    header("Location:profile.php");
}

require 'connection.php';

//login function

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM `users` WHERE username='$username'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])){
        $_SESSION['id'] = $row['id'];
        header("Location:profile.php");
    }else{
        echo "<script>alert('Wrong Username and Password');</script>";
        echo "<script>location.href='index.php';</script>";
    }
}

//signup function

if (isset($_POST['signup'])) {

    $firstName = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['bdate']);
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $securePassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM `users` WHERE username='$username'";

    $response = $conn->query($sql);

    if ($response->num_rows > 0){
        echo "<script>alert('Username already exists');</script>";
        echo "<script>location.href='index.php';</script>";
    }else{
        $query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `birthdate`, `username`, `password`, `profile_status`) VALUES ('$firstName', '$lastName', '$email', '$birthdate', '$username', '$securePassword', '0')";

        $result = $conn->query($query);

        if ($result) {
            echo "<script>alert('Sign Up successfully');</script>";
            echo "<script>location.href='index.php';</script>";
        } else {
            echo "<script>alert('Sign Up failed');</script>";
            echo "<script>location.href='index.php';</script>";
        }
    }

}
