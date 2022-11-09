<?php

include_once 'config/conn.php';
include_once 'inc/header_login.php';

if (!isset($_POST['firstName'], $_POST['lastName'], $_POST['postalCode'], $_POST['username'], $_POST['password'], $_POST['email'])) {
    // Could not get the data that should have been sent.
    echo 'kaka';
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['username']) || empty($_POST['postalCode']) || empty($_POST['password']) || empty($_POST['email'])) {
    // One or more values are empty.
    echo 'poopoo';
}

// We need to check if the account with that username exists.
if ($stmt = $conn->prepare('SELECT * FROM `User` WHERE userName = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        echo 'Username exists, please choose another!';
    } else {
        // Username doesnt exists, insert new account
        if ($stmt = $conn->prepare('INSERT INTO `User` (firstName, lastName, userName, password, roleID, postalCode, email) VALUES (?, ?, ?, ?, ?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $roleID = '1';
            $stmt->bind_param('sssssss', $_POST['firstName'], $_POST['lastName'], $_POST['username'], $password, $roleID, $_POST['postalCode'], $_POST['email']);
            $stmt->execute();
            echo 'You have successfully registered, you can now login!';
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}
$conn->close();
?>
?>
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(https://via.placeholder.com/800x950.png);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>                        
                        <form method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                            
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input type="text" name="firstName" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="First Name">
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input type="text" name="lastName" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Last Name">
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="text" name="username" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Username">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="number" name="postalCode" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Postal code">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pe-0"></i>
                                <input type="email" name="email" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Email Address">
                            </div>
                            <div class="form-group icon-input mb-3">
                                <input type="password" name="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="col-sm-12 p-0 text-left">
                                <input class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 " type="submit" value="Register" name="reg">
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="login.php" class="fw-700 ms-1">Login</a></h6>
                            </div>

                        </form>
                         

                         
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>

</html>