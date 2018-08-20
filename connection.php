<?php

$conn = new mysqli("localhost", "root", "", "learning_php");

if ($conn -> connect_errno > 0){
    echo 'Connection Error'.$conn->connect_error;
}