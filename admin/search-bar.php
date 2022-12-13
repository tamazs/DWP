<?php 

include '../inc/header.php';

// fetch all posts from posts table
$query = "SELECT * FROM user ORDER BY date_time DESC";
$posts = mysqli_query ($connection, $query);

if (isset ($_GET[ ' search']) && isset ($_GET['submit'])) {
    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM user WHERE title LIKE '%$search%' ORDER BY date_time DESC";
    $posts = mysqli_query ($connection, $query) ;
} else {
    die();
}

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
                                                <section class="search bar">
                                                    <form class="container search _bar-container" action="search-bar.php" method="GET">
                                                        <div> <i class="uil uil-search"></i>
                                                            <input type="search" name="search" placeholder="Search">
                                                        </div>
                                                        <button type="submit" name="submit" class="btn">Go</button>
                                                    </form>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
</div>