<?php
if($_GET['logout']){logOut();}

function logOut() {
    session_destroy();
// Redirect to the login page:
    header('Location: loginer.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NewInDK</title>

    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/fav64.ico">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/emoji.css">
    
    <link rel="stylesheet" href="css/lightbox.css">

</head>

<body class="color-theme-red mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <div class="nav-header bg-white shadow-xs border-0 justify-content-between">
            <div class="nav-top ">
                <a href="default.php"><img src="images/logo.png" class="me-2 ms-0" style="height: 70px";><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">NewIn.DK</span> </a>
            </div>
            <div class="d-flex flex-row">
            <div class="p-2 text-center ms-3 position-relative dropdown-menu-icon menu-icon cursor-pointer">
                <i class="feather-settings animation-spin d-inline-block font-xl text-current"></i>
                <div class="dropdown-menu-settings switchcolor-wrap">
                    <h4 class="fw-700 font-sm mb-4">Settings</h4>
                    <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                    <ul>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="red" checked=""><i class="ti-check"></i>
                                <span class="circle-color bg-red" style="background-color: #ff3b30;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="green"><i class="ti-check"></i>
                                <span class="circle-color bg-green" style="background-color: #4cd964;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="blue"><i class="ti-check"></i>
                                <span class="circle-color bg-blue" style="background-color: #132977;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="pink"><i class="ti-check"></i>
                                <span class="circle-color bg-pink" style="background-color: #ff2d55;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="yellow"><i class="ti-check"></i>
                                <span class="circle-color bg-yellow" style="background-color: #ffcc00;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="orange"><i class="ti-check"></i>
                                <span class="circle-color bg-orange" style="background-color: #ff9500;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="gray"><i class="ti-check"></i>
                                <span class="circle-color bg-gray" style="background-color: #8e8e93;"></span>
                            </label>
                        </li>

                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="brown"><i class="ti-check"></i>
                                <span class="circle-color bg-brown" style="background-color: #D2691E;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkgreen"><i class="ti-check"></i>
                                <span class="circle-color bg-darkgreen" style="background-color: #228B22;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="deeppink"><i class="ti-check"></i>
                                <span class="circle-color bg-deeppink" style="background-color: #FFC0CB;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="cadetblue"><i class="ti-check"></i>
                                <span class="circle-color bg-cadetblue" style="background-color: #5f9ea0;"></span>
                            </label>
                        </li>
                        <li>
                            <label class="item-radio item-content">
                                <input type="radio" name="color-radio" value="darkorchid"><i class="ti-check"></i>
                                <span class="circle-color bg-darkorchid" style="background-color: #9932cc;"></span>
                            </label>
                        </li>
                    </ul>
                    
                    <div class="card bg-transparent-card border-0 d-block mt-3">
                        <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                        <div class="d-inline float-right mt-1">
                            <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                        </div>
                    </div>
                    
                </div>
            </div>
                <a class="p-2 text-center ms-3 position-relative menu-icon cursor-pointer" href="#" onClick='location.href="?logout=1"'><i class="feather-log-out d-inline-block font-xl text-current"></i></a>
            </div>
            
        </div>
        <!-- navigation top -->

        <!-- navigation left -->
        <nav class="navigation scroll-bar">
            <div class="container ps-0 pe-0">
                <div class="nav-content">
                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                        <ul class="mb-1 top-content">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="default.php" class="nav-content-bttn open-font" ><i class="feather-tv btn-round-md bg-primary-gradiant me-3"></i><span>Newsfeed</span></a></li>
                            <li><a href="default-badge.html" class="nav-content-bttn open-font" ><i class="feather-check btn-round-md bg-primary-gradiant me-3"></i><span>Q&A</span></a></li>
                            <li><a href="author-page.php" class="nav-content-bttn open-font"><i class="feather-user btn-round-md bg-primary-gradiant me-3"></i><span>Author Profile </span></a></li>
                        </ul>
                    </div>

                    <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
                        <ul class="mb-1">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="default-settings.php" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-settings me-3 text-grey-500"></i><span>Settings</span></a></li>
                            <li><a href="default-analytics.html" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-database me-3 text-grey-500"></i><span>Admin</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navigation left -->