<?php
if ($_SESSION['roleid'] != 2) {
    header('Location: ../views/default.php');
}
