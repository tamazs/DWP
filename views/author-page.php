<?php
session_start();
include_once '../config/conn.php';
include_once '../config/userAuth.php';
$userID = $_SESSION['id'];
$userName = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM `User` WHERE userID='$userID'");
$data = mysqli_fetch_array($query);

$sql = "SELECT * FROM Post WHERE userName='$userName'";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_all($result, MYSQLI_ASSOC);
include_once '../inc/header.php';

?>
        <!-- main content -->
<div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3 overflow-hidden">
                                <div class="card-body d-block pt-4 text-center position-relative">
                                    <h4 class="font-xs ls-1 fw-700 text-grey-900"><?php echo $data['firstName'] . ' ' . $data['lastName']?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">@<?php echo $data['userName']?></span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-block p-4">
                                    <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                                    <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0"><?php echo $data['description']?></p>
                                </div>
                                <div class="card-body border-top-xs d-flex">
                                    <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $data['origin']?></h4>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-map-pin text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $data['postalCode']?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-xxl-9 col-lg-8">
                        <?php

                            include_once 'create_post.php';

                        ?>
                            <?php foreach ($post as $post): ?>
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                    <div class="card-body p-0 d-flex">
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">kaka<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo $post['timeStamp'];?></span></h4>
                                    </div>
                                    <div class="card-body p-0 me-lg-5">
                                        <p class="fw-500 text-grey-500 lh-26 font-xssss w-100"><?php echo $post['text'];?></p>
                                    </div>
                                    <div class="card-body d-block p-0">
                                        <div class="row ps-2 pe-2">
                                            <div class="col-xs-4 col-sm-4 p-1"><a href="https://via.placeholder.com/1200x800.png" data-lightbox="roadtrip"><img src="https://via.placeholder.com/1200x800.png" class="rounded-3 w-100" alt="image"></a></div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex p-0 mt-3">
                                        <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i><?php echo $post['like'];?> Like</a>
                                        <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss">22 Comment</span></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                    </div>
                </div>
                 
            </div>            
        </div>
</div>
        <!-- main content -->
    <script src="../js/plugin.js"></script>
    <script src="../js/lightbox.js"></script>
    <script src="../js/scripts.js"></script>
    
</body>

</html>