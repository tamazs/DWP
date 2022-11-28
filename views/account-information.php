<?php
session_start();
include_once '../config/conn.php';
include_once '../config/userAuth.php';
$userID = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM `User` WHERE userID='$userID'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_NUMBER_INT);
    $userName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $origin = filter_input(INPUT_POST, 'origin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE `User` SET `userName`='$userName', `firstName`='$firstName', `lastName`='$lastName', `email`='$email', `description`='$description', `postalCode`='$postalCode', `origin`='$origin' WHERE userID='$userID'";
    $edit = mysqli_query($conn, $sql);

    if ($edit) {
        mysqli_close($conn);
        header('Location: default-settings.php');
    } else {
        echo mysqli_error($conn);
    }
}
include_once '../inc/header.php';
?>
        <!-- main content -->
        <div class="main-content bg-lightblue theme-dark-bg right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <a href="default-settings.php" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Account Details</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 text-center">
                                    <h2 class="fw-700 font-sm text-grey-900 mt-3"><?php echo $data['firstName'] . ' ' . $data['lastName']?></h2>
                                    <h4 class="text-grey-500 fw-500 mb-3 font-xsss mb-4"><?php echo $data['userName']?></h4>
                                </div>
                            </div>

                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">First Name</label>
                                            <input type="text" name="firstName" class="form-control" value="<?php echo $data['firstName']?>">
                                        </div>        
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Last Name</label>
                                            <input type="text" name="lastName" class="form-control" value="<?php echo $data['lastName']?>">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $data['email']?>">
                                        </div>        
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Username</label>
                                            <input type="text" name="username" class="form-control" value="<?php echo $data['userName']?>">
                                        </div>        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Postal code</label>
                                            <input type="number" name="postalCode" class="form-control" value="<?php echo $data['postalCode']?>">
                                        </div>        
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label class="mont-font fw-600 font-xsss">Origin</label>
                                            <input type="text" name="origin" class="form-control" value="<?php echo $data['origin']?>">
                                        </div>        
                                    </div>
                                </div>

                                    <div class="col-lg-12 mb-3">
                                        <label class="mont-font fw-600 font-xsss">Description</label>
                                        <input name="description" class="form-control mb-0 p-3" spellcheck="false" value="<?php echo $data['description']?>">
                                    </div>

                                    <div class="col-lg-12">
                                        <input name="update" type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block" value="Update">
                                    </div>
                                </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>            
        </div>
        <!-- main content -->
    <script src="../js/plugin.js"></script>
    <script src="../js/scripts.js"></script>
    
</body>

</html>