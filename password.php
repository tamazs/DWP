<?php
session_start();
include_once 'config/conn.php';
include_once 'config/userAuth.php';
$userID = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT password FROM `User` WHERE userID='$userID'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $newPass = filter_input(INPUT_POST, 'newPass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $newPassCheck = filter_input(INPUT_POST, 'newPassCheck', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($newPass == $newPassCheck) {
            $newPass_hashed = password_hash($newPass, PASSWORD_DEFAULT);
            $sql = "UPDATE `User` SET `password`='$newPass_hashed' WHERE userID='$userID'";
            $edit = mysqli_query($conn, $sql);

            if ($edit) {
                mysqli_close($conn);
                header('Location: default-settings.php');
            } else {
                echo mysqli_error($conn);
            }
        }
        else {
            echo 'The two new passwords dont match';
        }
}
include_once 'inc/header.php';

?>
        <!-- main content -->
        <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <a href="default-settings.php" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Change Password</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Change Password</label>
                                                <input type="text" name="newPass" class="form-control">
                                            </div>        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss">Confirm Change Password</label>
                                                <input type="text" name="newPassCheck" class="form-control">
                                            </div>        
                                        </div>                                     
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-0">
                                            <input name="update" type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block" value="Update">                                        </div>
                                    </div>

                                     
                                    </form>
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