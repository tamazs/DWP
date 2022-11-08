<?php
$text =  '';
$nameErr = '';

//Form submit
if (isset($_POST['submit'])) {
    //Validate name
    if (empty($_POST['text'])) {
        $textErr = 'Text is required';
    } else {
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');
    if (!empty($_FILES['upload']['name'])){
        $file_name = $_FILES['upload']['name'];
        $file_size = $_FILES['upload']['size'];
        $file_tmp = $_FILES['upload']['tmp_name'];
        $target_dir = "uploads/${file_name}";

        //Get file ext
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        //Validate file ext
        if (in_array($file_ext, $allowed_ext)) {
            if ($file_size <= 1000000) {
                move_uploaded_file($file_tmp, $target_dir);

                $message = '<p style="color: green;">File uploaded</p>';
            } else {
                $message = '<p style="color: red;">The file is too large</p>';
            }
        } else {
            $message = '<p style="color: red;">Invalid file type</p>';
        }

    }

    if (empty($textErr)) {
        $sql = "INSERT INTO Post (name, email, body) VALUES ('$name', '$email', '$body')";
        if (mysqli_query($conn, $sql)) {
            //Success
            header('Location: default.php');
        } else {
            //Error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
?>

<form class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
    <div class="card-body p-0 mt-3 position-relative">
        <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="https://via.placeholder.com/50x50.png" alt="image" class="shadow-sm rounded-circle w30"></figure>
        <textarea name="text" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg form-control <?php echo !$textErr ?:
            'is-invalid'; ?>" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
        <div id="validationServerFeedback" class="invalid-feedback">
            Please write something.
        </div>
    </div>
    <div class="card-body d-flex p-0 mt-0">
        <input type="file" name="upload" ><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span>
        <?php echo $message ?? null; ?>
        <input type="submit" name="submit" value="Send">
    </div>
</form>