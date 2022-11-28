<?php
session_start();
include_once '../config/userAuth.php';
include_once '../inc/header.php';


?>
<!-- main content -->
<div class="main-content">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <?php

            include '../components/create_question.php';

            ?>

            <?php

            include '../components/question.php';

            ?>
            <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                    <div class="stage">
                        <div class="dot-typing"></div>
                    </div>
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