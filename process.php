<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'localtech';

    $conn = mysqli_connect($server, $username, $password, $db_name);

    if(!$conn){
        die("gagal terhubung ke database" . mysqli_connect_error());
    } 
?>