<?php
include_once '../config/userAuth.php';
include_once '../inc/header.php';
$userID = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM `User` WHERE userID='$userID'");
$data = mysqli_fetch_array($query);

if(isset($_POST['delete'])) {
    $query = "DELETE FROM `user` WHERE userID=['id']";
    mysqli_query($connection, $query);

    if ($delete) {
        mysqli_close($conn);
        header('Location: admin-dashboard.php');
    } else {
        echo mysqli_error($conn);
    }
}