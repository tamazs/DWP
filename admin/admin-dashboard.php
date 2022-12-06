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
                                                        <th colspan="2">Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while($user = mysqli_fetch_assoc($users)) : ?>
                                                    <tr>
                                                        <td><?= $user['userID'] ?></td>
                                                        <td><?= $user['firstName'] ?></td>
                                                        <td><?= $user['lastName'] ?></td>
                                                        <td><?= $user['userName'] ?></td>
                                                        <td><?= $user['firstName'] ?></td>
                                                        <td>tadmin</td>
                                                        <td>Edit</td>
                                                        <td>Delete</td>
                                                    </tr>
                                                    <?php endwhile ?>
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