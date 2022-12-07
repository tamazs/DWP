<?php
session_start();
include_once '../config/userAuth.php';
include_once '../inc/header.php'


?>

<link rel="stylesheet" href="../css/admin-dashboard.css"> 

<section class="dashboard">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card w-100 border-0 shadow-none p-5 rounded-xxl bg-lightblue2 mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="../images/admin.greeting.png" alt="image" class="w-50">
                                            </div>
                                            <div class="col-lg-6 ps-lg-5">
                                                <h1 class="display1-size d-block mb-2 text-grey-700 fw-700">
                                                    Hi, Admin!
                                                </h1>
                                                <h3 class=" d-block mb-4 text-grey-600 fw-200">
                                                    Welcome to the user manager session!
                                                </h3>
                                            </div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>UserID</th>
                                                        <th colspan="2">Name</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th colspan="2">Manage</th>
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
                                                                <td>" . $row["userID"] . "</td> 
                                                                <td>" . $row["firstName"] . "</td>
                                                                <td>" . $row["lastName"] . "</td>
                                                                <td>" . $row ["userName"] . "</td>                                                              
                                                                <td>" . $row["email"] . "</td>                                                                                                                                                                                             
                                                                <td>" . $row["roleID"]. "</td>                                                               
                                                                <td> 
                                                                <Edit class='btn btn-primary btn-sm' href='edit'>Edit</a></td><td>
                                                                <Delete class='btn btn-danger btn-sm' href='delete'>Delete</a>
                                                                </td>
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
</section>          

</body>

</html>