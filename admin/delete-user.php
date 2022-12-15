<?php
session_start();
include_once '../config/conn.php';
include_once '../config/adminAuth.php';
include_once '../config/userAuth.php';
include_once '../inc/header.php';
$userID = $_GET['id'];


if(isset($userID)) {
    $sqlDelete = "SET FOREIGN_KEY_CHECKS = 0;";
    $sqlDelete .= "DELETE FROM `post_like` WHERE userID='$userID';";
    $sqlDelete .= "DELETE FROM `Comment` WHERE userID='$userID';";
    $sqlDelete .= "DELETE FROM `Post` WHERE userID='$userID';";
    $sqlDelete .= "DELETE FROM `User` WHERE userID='$userID';";
    $sqlDelete .= "SET FOREIGN_KEY_CHECKS = 1;";


    $delete = mysqli_multi_query($conn, $sqlDelete);

    if ($delete) {
        mysqli_close($conn);
        header('Location: admin-dashboard.php');
    } else {
        echo mysqli_error($conn);
    }
}