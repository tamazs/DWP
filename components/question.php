<?php
include_once '../config/conn.php';
$sql = 'SELECT * FROM Post WHERE typeID= 3 ORDER BY `timeStamp` DESC';
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<?php foreach ($post as $post): ?>
    <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
        <div class="card-body p-0 d-flex">
            <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $post['userName'];?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo $post['timeStamp'];?></span></h4>
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
            <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss">22 Answers</span></a>
        </div>
    </div>
<?php endforeach; ?>