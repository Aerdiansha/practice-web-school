<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';
$title = "Change Password";
require_once '../template/header.php';
require_once '../template/navbar.php';
require_once '../template/sidebar.php';

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}

$alert = '';

if ($msg == "err1") {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-xmark"></i> Update password failed, invalid password!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == "err2") {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-xmark"></i> Update password failed, pasword not match!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == "updated") {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check"></i> Update password Success! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Change Password</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>index.php">Home</a></li>
                <li class="breadcrumb-item active">Change Password</li>
            </ol>
            <form action="process-password.php" method="POST">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }

                ?>
                <div class="card">
                    <h5 class="card-header"><span class="h5 my-5"><i class="fa-solid fa-pen-to-square"></i> Change Password</span>
                        <button type="submit" name="simpan" class="btn btn-success float-end"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </h5>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="currentPassword" class="form-label">Old Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Input Old Password" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" minlength="4" maxlength="20" placeholder="Input New Password" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm New Password" required>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>


    <?php

    require_once '../template/footer.php';

    ?>