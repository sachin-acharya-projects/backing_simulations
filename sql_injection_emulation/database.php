<?php
    $database = 'sqltest';
    $host = 'localhost';
    $username = 'root';
    $password = '';

    $connection = mysqli_connect($host, $username, $password, $database) or die("Failded to connect to DATABASE");
?>