<?php
    session_start();
    require './database.php';
    if (isset($_POST['login'])) {
        $username = $_POST['user'];
        $password = $_POST['password'];
        $query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $_SESSION['message'] = 'success'; 
            echo "success";
        }
        else {
            $_SESSION['message'] = 'fail';
            echo "failed";
        }
        header("location: /");
    }
?>