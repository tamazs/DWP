<?php
session_start();
include_once '../config/userAuth.php';
include_once '../inc/header.php'

?>

<body>
    <div class="container my-5">
        <h2>New User</h2>
        <form method="post">
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label">First Name</label>
                <div class="col-cm-3">
                    <input type="text" class="form-control" name="firstName" value="">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-cm-3">
                    <input type="text" class="form-control" name="lastName" value="">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label">User Name</label>
                <div class="col-cm-3">
                    <input type="text" class="form-control" name="userName" value="">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-cm-3">
                    <input type="text" class="form-control" name="email" value="">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label">Role (1/2)</label>
                <div class="col-cm-3">
                    <input type="text" class="form-control" name="roleID" value="">
                </div>
            </div>
            <div class="row mb-1">
                <div class="offset-sm-1 col-cm-2 d-grid my-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="offset-sm-1 col-cm-2 d-grid my-1">
                    <a class="btn btn-outline-danger" href="../admin/admin-dashboard.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>