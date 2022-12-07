<?php include '../inc/header.php';

// fetch all posts from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC";
$posts = mysqli_query ($connection, $query);

if (isset ($_GET[ ' search']) && isset ($_GET['submit'])) {
    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
    $posts = mysqli_query ($connection, $query) ;
} else {
    header ('location: ' . ROOT_URL . 'blog-php');
    die();
}

?>

<section class="search bar">
    <form class="container search _bar-container" action="<?= ROOT_URL ?>search.php" method-"GET">
        <div> <i class="uil uil-search"></i>
            <input type="search" name="search" placeholder="Search">
        </div>
        <button type="submit" name="submit" class="btn">Go</button>
    </form>
</section>


