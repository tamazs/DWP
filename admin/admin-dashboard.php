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
                                                <img src="/images/admin.greeting.png" alt="image" class="w-90">
                                            </div>
                                            <div class="col-lg-6 ps-lg-5">
                                                <h2 class="display1-size d-block mb-2 text-grey-900 fw-700">
                                                Hi, Current user</h2>
                                            </div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>UserID</th>
                                                        <th colspan="2">Name</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // read all row from database
                                                    $sql = "SELECT * FROM User";
                                                    $result = $connection->query($sql);

                                                    if (!$result){
                                                        die("Invalid query: " . $connection->error);
                                                    }

                                                    //read data for each row
                                                    while($row = $result->fetch_assoc())
                                                    {
                                                        echo"<tr>
                                                                <td>" . $row["id"] . "</td> 
                                                                <td>" . $row["firstName"] . "</td>
                                                                <td>" . $row["lastName"] . "</td>
                                                                <td>" . $row ["userName"] . "</td>                                                              
                                                                <td>" . $row["email"] . "</td>                                                                                                                                                                                             
                                                                <td>" . $row["role"] . "</td>                                                               
                                                                <td> 
                                                                <a class='btn btn-primary btn-sm' href='update'›Update‹/a> 
                                                                <a class='btn btn-danger btn-sm' href='delete'›Delete‹/a>
                                                                </td>
                                                            </tr>";
                                                    }?>
                                                   <tr>
                                                            <td>testuserid</td>
                                                            <td>testFirstName</td>
                                                            <td>testLastName</td>
                                                            <td>testUsername</td>
                                                            <td>testEmail</td>
                                                            <td>tadmin</td>
                                                            <td>
                                                                <a href="Edit">Edit</a>
                                                                <a href="Delete">Delete</a>
                                                            </td>                                                        
                                                    </tr>
                                                    
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