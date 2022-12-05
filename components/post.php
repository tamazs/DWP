<?php
include_once '../config/conn.php';
    $sql = 'SELECT * FROM Post WHERE typeID = 1 ORDER BY `timeStamp` DESC';
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $userID = $_SESSION['id'];
    $commentText = $_POST['comment'];

    if (!empty($commentText)) {
        $postID = $_POST['postID'];
        $insertComments = "INSERT INTO `Comment` (typeID, postID, userID, content) VALUES ('2', '$postID', '$userID', '$commentText')";
        mysqli_query($conn, $insertComments) or die("database error: " . mysqli_error($conn));
        $message = '<label class="text-success">Comment posted Successfully.</label>';
        $status = array(
            'error' => 0,
            'message' => $message
        );
        $_POST['comment'] = array();
    } else {
        $message = '<label class="text-danger">Error: Comment not posted.</label>';
        $status = array(
            'error' => 1,
            'message' => $message
        );
    }

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

    /*
    $commentQuery = "SELECT Comment.userID, Comment.postID, Comment.content, Comment.`timeStamp`, User.userName FROM `Comment` INNER JOIN `User` ON Comment.userID=`User`.userID INNER JOIN Post ON Comment.postID=Post.postID ORDER BY Comment.`timeStamp`";
    $commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
    $commentHTML = '';
    while($comment = mysqli_fetch_assoc($commentsResult)){
        $commentHTML .= '
            <div class="panel panel-primary p-2">
            <div class="panel-heading">By <b>'.$comment["userName"].'</b> on <i>'.$comment["timeStamp"].'</i></div>
            <div class="panel-body">'.$comment["content"].'</div>
            </div> ';
    }
    */

    $imageResult = $conn->query("SELECT mediaID ,image FROM Media ");

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
            <div class="col-xs-4 col-sm-4 p-1"><img src="https://via.placeholder.com/1200x800.png" class="rounded-3 w-100" alt="image"></div>
        </div>
    </div>
    <div class="card-body d-flex p-0 mt-3">
        <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"><i class="feather-thumbs-up text-white bg-primary-gradiant me-1 btn-round-xs font-xss"></i><?php echo $post['like'];?> Like</a>
    </div>
    <div class="container mt-2">
        <form method="POST" id="commentForm">
            <div class="form-group">
                <input name="comment" id="comment" class="form-control" placeholder="Enter Comment">
            </div>
            <span id="message"></span>
            <div class="form-group mt-1">
                <input type="hidden" name="postID" value="<?php echo $post['postID']?>">
                <input type="submit" name="submit" id="submit" class="bg-current text-center text-white font-xsss fw-600 p-1 w175 rounded-3 d-inline-block" value="Post Comment" />
            </div>
        </form>
        <div id="showComments">
            <?php echo getCommentBy($post['postID']); ?>
        </div>
    </div>
</div>
    <?php endforeach; ?>