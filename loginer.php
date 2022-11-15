<?php
$userName = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$conn = new mysqli("localhost", "Tamas", "1234", "NewInDkDB");
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

if (isset($_POST['submit'])) {
    if ($stmt = $conn->prepare('SELECT userID, password FROM `User` WHERE userName = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $userName);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        var_dump($stmt);
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userID, $password_hashed);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($password, $password_hashed)) {
                session_start();
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['username'] = $userName;
                $_SESSION['id'] = $userID;
                header('Location: default.php');
            } else {
                // Incorrect password
                echo 'Incorrect username and/or password!';
            }
        } else {
            // Incorrect username
            echo 'Incorrect username and/or password!';
        }

        $stmt->close();
    }
}
include_once 'inc/header_login.php';
?>


<div class="row">
    <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(https://via.placeholder.com/800x950.png);"></div>
    <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
        <div class="card shadow-none border-0 ms-auto me-auto login-card">
            <div class="card-body rounded-0 text-left">
                <h2 class="fw-700 display1-size display2-md-size mb-4">Log into<br>your account</h2>
                <form method="post" action="">
                    <div class="form-group icon-input mb-3">
                        <input type="text" name="username" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Username">
                        <i class="font-sm ti-user text-grey-500 pe-0"></i>
                    </div>
                    <div class="form-group icon-input mb-3">
                        <input type="password" name="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                        <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                    </div>
                    <div class="col-sm-12 p-0 text-left">
                        <input class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 " type="submit" value="Login" name="submit">
                        <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Don't have an account? <a href="register.php" class="fw-700 ms-1">Register</a></h6>
                    </div>
                </form>
        </div>
    </div>
</div>
</div>
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>