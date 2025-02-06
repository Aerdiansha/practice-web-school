<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';

$title = "Add Teacher";
require_once '../template/header.php';
require_once '../template/navbar.php';
require_once '../template/sidebar.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Teacher</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>teacher/teacher.php">Teachers</a></li>
                <li class="breadcrumb-item active">Add Teacher</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Add Teacher</span>
                    <button type="submit" name="simpan" class="btn btn-success float-end"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3 row">
                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                <label for="nip" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <input type="text" class="form-control border-0 border-bottom ps-2" name="nip" id="nip" pattern="[0-9]{18,}" title="Minimal 18 angka" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Name</label>
                                <label for="nama" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <input type="text" class="form-control border-0 border-bottom ps-2" name="nama" id="nama" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="telpon" class="col-sm-2 col-form-label">Handphone</label>
                                <label for="telpon" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <input type="text" class="form-control border-0 border-bottom ps-2" name="telpon" id="telpon" pattern="[0-9]{5,}" title="Minimal 5 angka" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="agama" class="col-sm-2 col-form-label">Religion</label>
                                <label for="agama" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <select name="agama" id="agama" class="form-select border-0 border-bottom" required">
                                        <option value="" selected>--Choose Religion--</option>
                                        <option value="">Old gods</option>
                                        <option value="">New Gods</option>
                                        <option value="">Atheism</option>
                                        <option value="">Agnosticism</option>
                                        <option value="">Satanism</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Address</label>
                                <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -50px;">
                                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control border-0 border-bottom ps-2" placeholder="Address" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-center px-5">
                            <img src="../assets/image/default.png" alt="" class="mb-3" width="40%">
                            <input type="file" name="image" id="image" class="form-control form-control-sm">
                            <small class="text-secondary">Photo format: png, jpg, jpeg Max size: 2MB</small>
                            <div><small class="text-secondary">width = height</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <?php

    require_once '../template/footer.php';

    ?>