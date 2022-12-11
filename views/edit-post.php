<?php
session_start();
include_once '../config/conn.php';
include_once '../config/userAuth.php';
$postID = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM `Post` WHERE postID='$postID'");
$postData = mysqli_fetch_array($query);

if (isset($_POST['postUpdate'])) {
    $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE `Post` SET `text`='$text' WHERE postID='$postID'";
    $edit = mysqli_query($conn, $sql);

    if ($edit) {
        mysqli_close($conn);
        header('Location: default.php');
    } else {
        echo mysqli_error($conn);
    }
}

if (isset($_POST['postDelete'])) {
    $sqlDelete = "DELETE * FROM `Post` WHERE postID='$postID'";
    $delete = mysqli_query($conn, $sqlDelete);

    if ($delete) {
        mysqli_close($conn);
        header('Location: default.php');
    } else {
        echo mysqli_error($conn);
    }
}
include_once '../inc/header.php';
?>
<!-- main content -->
<div class="main-content bg-lightblue theme-dark-bg right-chat-active">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="middle-wrap">
                <form action="" method="post">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                        <a href="default.php" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                        <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Edit post</h4>
                    </div>
                            <div class="col-lg-12 mb-3">
                                <label class="mont-font fw-600 font-xsss">Text</label>
                                <input name="text" class="form-control mb-0 p-3" spellcheck="false" value="<?php echo $postData['text']?>">
                            </div>

                            <div class="col-lg-12">
                                <input name="postUpdate" type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block" value="Update">
                            </div>
                    <div class="col-lg-12">
                        <input name="postDelete" type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block" value="Delete">
                    </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- main content -->
<script src="../js/plugin.js"></script>
<script src="../js/scripts.js"></script>

</body>

</html>