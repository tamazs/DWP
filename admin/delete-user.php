<?php
$userID = $_GET['id'];
if(isset($_row['delete'])) {
    $query = "DELETE FROM `user` WHERE ID=" .$_GET['id'];
    mysqli_query($connection, $query);
    if ($edit) {
        mysqli_close($conn);
        header('Location: admin-dashboard.php');
}
}