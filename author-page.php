<?php

include_once 'header.php';

?>
        <!-- main content -->
        <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3 overflow-hidden">
                                <div class="card-body d-block pt-4 text-center position-relative">
                                    <figure class="avatar mt--6 position-relative w75 z-index-1 w100 z-index-1 ms-auto me-auto"><img src="https://via.placeholder.com/100x100.png" alt="image" class="p-1 bg-white rounded-xl w-100"></figure>

                                    <h4 class="font-xs ls-1 fw-700 text-grey-900">Surfiya Zakir <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">@surfiyazakir22</span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-block p-4">
                                    <h4 class="fw-700 mb-3 font-xsss text-grey-900">About</h4>
                                    <p class="fw-500 text-grey-500 lh-24 font-xssss mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus</p>
                                </div>
                                <div class="card-body border-top-xs d-flex">
                                    <i class="feather-lock text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-0">Private <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">What's up, how are you?</span></h4>
                                </div>

                                <div class="card-body d-flex pt-0">
                                    <i class="feather-eye text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-0">Visble <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Anyone can find you</span></h4>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-map-pin text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">Flodia, Austia </h4>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-users text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1">Genarel Group</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-xxl-9 col-lg-8">
                        <?php

                            include_once 'create_post.php';

                        ?>


                        <?php

                            include 'post.php';

                        ?>
                            
                                      
                    </div>
                </div>
                 
            </div>            
        </div>
        <!-- main content -->
    <script src="js/plugin.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="js/scripts.js"></script>
    
</body>

</html>