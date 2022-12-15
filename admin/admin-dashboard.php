<?php
session_start();
include_once '../config/conn.php';
include_once '../config/userAuth.php';
include_once '../config/adminAuth.php';

$username = $_SESSION['username'];

$sql = 'SELECT * FROM `User`';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

include_once '../inc/header.php';

?>
 <!-- main content -->
        <div class="main-content bg-white right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card w-100 border-0 shadow-none p-5 rounded-xxl bg-lightblue2 mb-3">
                                        <div class="row">
                                            <div class="col-lg-12 ps-lg-5">
                                                <h2 class="display1-size d-block mb-2 text-grey-900 fw-700">
                                                Hi, <?php echo $username; ?></h2>
                                                <div class="card-body p-2 border-0">
                                                    <div class="row">
                                                        <table style="border-collapse: separate; border-spacing: 0 15px; border: 1px solid gray;">
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
                                                        <?php foreach ($users as $user): ?>
                                                            <tr>
                                                                <td><?php echo $user['userID'] ?></td>
                                                                <td><?php echo $user['firstName'] ?></td>
                                                                <td><?php echo $user['lastName'] ?></td>
                                                                <td><?php echo $user['userName'] ?></td>
                                                                <td><?php echo $user['email'] ?></td>
                                                                <td><?php echo $user['roleID'] ?></td>
                                                                <td><a class='btn btn-primary btn-sm' href='../admin/edit-user.php?id=<?php echo $user['userID'] ?>'>Edit</a></td>
                                                                <td><a class='btn btn-danger btn-sm ' href='../admin/delete-user.php?id=<?php echo $user['userID'] ?>'>Delete</a></td>
                                                            </tr>
                                                        <?php endforeach; ?>
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
                </div>
                 
            </div>
        </div>
        <!-- main content -->



            </div>
        </div>
    </div>
    <script src="../js/plugin.js"></script>
    <script src="../js/scripts.js"></script>

</body>

</html>