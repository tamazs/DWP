<?php
session_start();
include_once '../config/conn.php';
include_once '../config/userAuth.php';
include_once '../config/reactionDAO.php';
$userID = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM `User` WHERE userID='$userID'");
$data = mysqli_fetch_array($query);

$sql = "SELECT * FROM Post WHERE userID='$userID' ORDER BY `timeStamp` DESC";
$result = mysqli_query($conn, $sql);
$post = mysqli_fetch_all($result, MYSQLI_ASSOC);

function getCommentBy($postId) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (isset($conn)) {
        $commentQuery =
            "SELECT Comment.userID, Comment.postID, Comment.content, Comment.timeStamp, User.userName 
                FROM Comment
                LEFT JOIN User ON Comment.userID=User.userID
                WHERE Comment.postID = $postId
                ORDER BY Comment.timeStamp";
        $commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
        $commentHTML = '';
        while($comment = mysqli_fetch_assoc($commentsResult)){
            $commentHTML .= '
                <div class="panel panel-primary p-2">
                <div class="panel-heading">By <b>'.$comment["userName"].'</b> on <i>'.$comment["timeStamp"].'</i></div>
                <div class="panel-body">'.$comment["content"].'</div>
                </div> ';
        }
        return $commentHTML;
    }
}

function getImageBy($postId) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (isset($conn)) {
        $imageQuery =
            "SELECT *
                FROM Media
                INNER JOIN PostHasMedia ON PostHasMedia.postID=$postId
                WHERE Media.mediaID=PostHasMedia.mediaID";
        $imageResult = mysqli_query($conn, $imageQuery) or die("database error:". mysqli_error($conn));
        if($imageResult->num_rows > 0){
            $image = mysqli_fetch_assoc($imageResult);
            return base64_encode($image['image']);
        } else {
            return null;
        }
    }
}

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
                        <div class="card-body d-flex pt-0">
                            <i class="feather-mail text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $data['email']?></h4>
                        </div>
                        <div class="card-body d-flex pt-0">
                            <i class="feather-compass text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $data['origin']?></h4>
                        </div>
                        <div class="card-body d-flex pt-0">
                            <i class="feather-map-pin text-grey-500 me-3 font-lg"></i>
                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $data['postalCode']?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-9 col-lg-8">
                    <?php foreach ($post as $post): ?>
                        <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                            <div class="card-body p-0 d-flex">
                                <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $post['userName'];?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo $post['timeStamp'];?></span></h4>
                            </div>
                            <div class="card-body p-0 me-lg-5">
                                <p class="fw-500 text-grey-500 lh-26 font-xssss w-100"><?php echo $post['text'];?></p>
                            </div>
                            <?php $img = getImageBy($post['postID']);
                            if (isset($img)) {
                                $imageTemplate =
                                    '<div class="card-body d-block p-0">
            <div class="row ps-2 pe-2">
                <div class="col-xs-12 col-sm-12 p-1">
                        <img class="post-img mw-100" src="data:image/*;charset=utf8;base64,' . $img . '">
                </div>
            </div>
        </div>';
                                echo $imageTemplate;
                            }


                            ?>

                            <div class="card-body d-flex p-0 mt-3">
                                <?php
                                $reactionDAO = new ReactionDAO();
                                $likeQuery = "SELECT post_like.ID FROM post_like WHERE postID=".$post['postID']."";
                                $likeResult = mysqli_query($conn, $likeQuery) or die("database error:". mysqli_error($conn));
                                $likeArray = mysqli_fetch_all($likeResult, MYSQLI_ASSOC);
                                $didUserLike = $reactionDAO->didUserLikePost($post['postID'],$_SESSION['id']);
                                echo count($likeArray);
                                if ($didUserLike) {
                                    echo "<a href='../components/post_reaction.inc.php?postID=".$post['postID']."&action=cancel_like' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss ms-2 me-2'><i class='feather-thumbs-down text-white bg-primary-gradiant me-1 btn-round-xs font-xss'></i>Remove Like</a>";
                                }else{
                                    echo "<a href='../components/post_reaction.inc.php?postID=".$post['postID']."&action=like' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss ms-2 me-2'><i class='feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss'></i>Like</a>";
                                }
                                ?>
                            </div>
                            <div class="container mt-2">
                                <div id="showComments">
                                    <?php echo getCommentBy($post['postID']); ?>
                                </div>
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