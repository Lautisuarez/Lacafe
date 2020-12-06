<?php 
    $conn = new mysqli('localhost', 'root', 'root', 'lacafe');

    if($conn->connect_error){
        echo $error -> $conn->connect_error;
    }
?>