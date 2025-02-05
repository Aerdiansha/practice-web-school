<?php

session_start();

if(!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';

$title = "Add User";
require_once '../template/header.php';
require_once '../template/navbar.php';
require_once '../template/sidebar.php';

// Get message parameter from url
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}
$alert = '';
// check $msg value 
if ($msg == "error") {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-xmark"></i> Add user error, username already taken!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == "notimage") {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-xmark"></i> Add user error, invalid file upload!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == "oversize") {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-xmark"></i> Add user error, oversize upload file!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == "added") {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check"></i> Add user success! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>index.php">Home</a></li>
                <li class="breadcrumb-item active">Add User</li>
            </ol>
            <form action="process-user.php" method="POST" enctype="multipart/form-data">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <Span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Add user</Span>
                        <button type="submit" name="simpan" class="btn btn-success float-end"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" pattern="[A -Za-z0-9]{3,}" title="Username minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" class="form-control border-0 border-bottom" id="username" name="username" maxlength="20" require>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Name</label>
                                    <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" pattern="[A -Za-z0-9]{3,}" class="form-control border-0 border-bottom" id="nama" name="nama" maxlength="20" require>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="position" class="col-sm-2 col-form-label">Position</label>
                                    <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="position" id="position" class="form-select border-0 border-bottom" require>
                                            <option value="" selected>--Choose Position--</option>
                                            <option value="Headmaster">Headmaster</option>
                                            <option value="General Staff">General Staff</option>
                                            <option value="Lecturer">Lecturer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <label class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="address" id="address" rows="3" class="form-control border-0 border-bottom" placeholder="Address" require></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <img src="../assets/image/default.png" alt="User Image" class="mb-3" width="35%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Photo format: png, jpg, jpeg Max size: 2MB</small> <br>
                                <small class="text-secondary">Width = Height</small>
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