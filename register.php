<?php

include 'inc/header_login.php';

?>
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(https://via.placeholder.com/800x950.png);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>                        
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                            
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
                            <div class="form-group icon-input mb-3">
                                <input type="password" name="password2" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Confirm Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="col-sm-12 p-0 text-left">
                                <input class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 " type="submit" value="Register">
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="login.html" class="fw-700 ms-1">Login</a></h6>
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