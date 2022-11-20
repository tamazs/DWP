<?php
session_start();
include_once 'config/userAuth.php';
include_once 'config/conn.php';

if($_GET['delete']){deleteAcc();}

function deleteAcc() {
    $userID = $_SESSION['id'];
    $query = "DELETE FROM `User` WHERE userID='$userID'";
    mysqli_query($conn, $query);
}
include_once 'inc/header.php';
?>
        <!-- main content -->
        <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            
                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb-4 font-xxl fw-700 mont-font mb-lg-5 mb-4 font-md-xs">Settings</h4>
                                        <div class="nav-caption fw-600 font-xsss text-grey-500 mb-2">General</div>
                                        <ul class="list-inline mb-4">
                                            <li class="list-inline-item d-block border-bottom me-0"><a href="account-information.php" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-primary-gradiant text-white feather-home font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Account Information</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                        </ul>

                                        <div class="nav-caption fw-600 font-xsss text-grey-500 mb-2">Account</div>
                                        <ul class="list-inline mb-4">
                                            <li class="list-inline-item d-block  me-0"><a href="password.php" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-blue-gradiant text-white feather-inbox font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Password</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                            <li class="list-inline-item d-block  me-0"><a href="#" onClick='location.href="?delete=1"' class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-blue-gradiant text-white feather-trash font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Delete account</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                        </ul>

                                        <div class="nav-caption fw-600 font-xsss text-grey-500 mb-2">Other</div>
                                        <ul class="list-inline">
                                            <li class="list-inline-item d-block border-bottom me-0"><a href="help-box.php" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-primary-gradiant text-white feather-help-circle font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Help</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                        </ul>
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


    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>

</html>