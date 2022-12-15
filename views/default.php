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

                include '../components/create_post.php';

                ?>

                <?php

                include '../components/post.php';

                ?>
                        </div>               
                        
                    </div>
                </div>
        <!-- main content -->
    <script src="../js/plugin.js"></script>

    <script src="../js/lightbox.js"></script>
    <script src="../js/scripts.js"></script>

    
</body>

</html>