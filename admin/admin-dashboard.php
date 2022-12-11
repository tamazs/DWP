<?php
session_start();
include_once '../config/userAuth.php';
include_once '../inc/header.php'


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NewInDK</title>

    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/fav64.ico">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/emoji.css">

    <link rel="stylesheet" href="../css/lightbox.css">

</head>

<section class="dashboard">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card w-100 border-0 shadow-none p-5 rounded-xxl bg-lightblue2 mb-3">
                                        <div class="row">
                                            <div class="col-lg-6 my-3">
                                                <img src="../images/admin.greeting.png" alt="image" class="w-50">
                                            </div>
                                            <div class="col-lg-6 ps-lg-5 my-3">
                                                <h1 class="display1-size d-block mb-2 text-grey-700 fw-700">
                                                    Hi, Admin!
                                                </h1>
                                                <h3 class=" d-block mb-4 text-grey-600 fw-200">
                                                    Welcome to the user manager session!
                                                </h3>
                                            </div>
                                            <div class= "container my-2">
                                                <h2 class="display1-size d-block mb-2 text-grey-700 fw-500">Users <a class="btn btn-primary" href="../admin/create-user.php">New user</a></h2>                                             
                                            </div><br>
<!-- Table for the users -->
<div class="table-responsive-sm">
                                            <table class="table my-2 table-bordered table-dark table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>UserID</th>
                                                        <th colspan="2">Name</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th colspan="3">Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    // read all row from database
                                                    $conn = mysqli_connect("localhost", "bendi", "", "NewInDkDB");
                                                    $sql = "SELECT * FROM User";
                                                    $result = $conn->query($sql);

                                                    if (!$result){
                                                        die("Invalid query: " . $conn->error);
                                                    }

                                                    //read data for each row
                                                    while($row = $result->fetch_assoc())
                                                    {
                                                        echo"<tr>
                                                                <td>" . $row['userID'] . "</td> 
                                                                <td>" . $row["firstName"] . "</td>
                                                                <td>" . $row["lastName"] . "</td>
                                                                <td>" . $row ["userName"] . "</td>                                                              
                                                                <td>" . $row["email"] . "</td>                                                                                                                                                                                             
                                                                <td>" . $row["roleID"] . "</td>                                                               
                                                                <td><a class='btn btn-primary btn-sm' href='../admin/edit-user.php?id=$row[userID];'>Edit</a></td>
                                                                <td><a class='btn btn-warning btn-sm' href='../admin/block-user.php?id=$row[userID]; onclick='return confirm('Are you sure you want to block this user?');'>Block</a></td>
                                                                <td><a class='btn btn-danger btn-sm ' onclick='return confirm('Are you sure you want to delete this user?');'>Delete</a></td>
                                                            </tr>"; //still need to add the names for the roles
                                                    }
                                                    if(isset($_POST['delete'])) {
                                                        $query = "DELETE FROM `user` WHERE ID=" .$_GET['id'];
                                                        mysqli_query($connection, $query);
                                                    }
                                                    ?>
                                                </tbody> 
                                            </table>
</div>
<!-- Table for the posts -->
                                            <div class= "container my-2">
                                                <h2 class="display1-size d-block mb-2 text-grey-700 fw-500">Posts <a class="btn btn-primary" href="../admin/create-user.php">New post</a> </h2>
                                            </div><br>
<div class="table-responsive-sm">
                                            <table class="table my-2 table-bordered table-dark table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>PostID</th>
                                                        <th>Type</th>
                                                        <th>Media</th>
                                                        <th>UserID</th>
                                                        <th>UserName</th>
                                                        <th>Text</th>
                                                        <th>Time</th>
                                                        <th colspan="2">Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    // read all row from database
                                                    $sql = "SELECT * FROM Post";
                                                    $result = $conn->query($sql);

                                                    if (!$result){
                                                        die("Invalid query: " . $conn->error);
                                                    }

                                                    //read data for each row
                                                    while($row = $result->fetch_assoc())
                                                    {
                                                        echo"<tr>
                                                                <td>" . $row["postID"] . "</td> 
                                                                <td>" . $row["typeID"] . "</td>
                                                                <td>" . $row["mediaID"] . "</td>
                                                                <td>" . $row ["userID" ] . "</td> 
                                                                <td>" . $row ["userName"] . "</td>                                                             
                                                                <td>" . $row["text"] . "</td>                                                                                                                                                                                             
                                                                <td>" . $row["timeStamp"]. "</td>                                                               
                                                                <td><a class='btn btn-primary btn-sm' href='../admin/edit-user.php'>Edit</a></td>
                                                                <td><a class='btn btn-danger btn-sm' href='../admin/delete-user.php'>Delete</a></td>
                                                            </tr>"; 
                                                    }?>
                                                </tbody> 
                                            </table>
</div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>               
                    </div>
                </div>                
            </div> 
</section>          

</body>

</html>