<?php
include_once '../inc/header.php';
?>

<div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card w-100 border-0 shadow-none p-5 rounded-xxl bg-lightblue2 mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <img src="/images/admin.greeting.png" alt="image" class="w-90">
                                            </div>
                                            <div class="col-lg-6 ps-lg-5">
                                                <h2 class="display1-size d-block mb-2 text-grey-900 fw-700">
                                                Hi, admin#no</h2>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>               
                    </div>
                </div>                
            </div>          




    <script src="js/plugin.js"></script>

    <script src="js/apexcharts.min.js"></script> 
    <script src="js/chart.js"></script> 
    <script src="js/scripts.js"></script>

    <script src="js/jquery.easypiechart.min.js"></script> 
    <script>
        $('.chart').easyPieChart({
            easing: 'easeOutElastic',
            delay: 3000,
            barColor: '#3498db',
            trackColor: '#aaa',
            scaleColor: false,
            lineWidth: 5,
            trackWidth: 5,
            size: 50,
            lineCap: 'round',
            onStep: function(from, to, percent) {
                this.el.children[0].innerHTML = Math.round(percent);
            }
        });
    </script> 
    
</body>

</html>