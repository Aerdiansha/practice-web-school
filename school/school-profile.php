<?php

require_once '../config.php';

$title = "School Profile";
require_once '../template/header.php';
require_once '../template/navbar.php';
require_once '../template/sidebar.php';

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">School</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>index.php">Home</a></li>
                <li class="breadcrumb-item active">School Profile</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-pen-to-square"></i> School Data</span>
                    <button type="submit" name="simpan" class="btn btn-success float-end"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 text-center px-5">
                            <img src="../assets/image/img-default.png" alt="profile-img" class="mb-3" width="100%">
                            <input type="file" name="image" class="form-control form-control-sm">
                            <small class="text-secondary">Photo format: png, jpg, jpeg Max size: 1MB</small>
                        </div>
                        <div class="col-8">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Name</label>
                                <label for="nama" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <input type="text" class="form-control border-0 border-bottom" id="nama" name="nama" value="" placeholder="School Name" require>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <label for="email" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <input type="text" class="form-control border-0 border-bottom" id="email" name="email" value="" placeholder="School Email" require>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <label for="status" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <select name="status" id="status" class="form-select border-0 border-bottom" require>
                                        <option value="" selected>--Choose Status--</option>
                                        <option value="public">Public School</option>
                                        <option value="private">Private School</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="akreditasi" class="col-sm-2 col-form-label">Accreditation</label>
                                <label for="akreditasi" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <select name="akreditasi" id="akreditasi" class="form-select border-0 border-bottom" require>
                                        <option value="" selected>--Choose Accreditation--</option>
                                        <option value="SSS">SSS</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label">Address</label>
                                <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <textarea name="alamat" id="alamat" rows="3" class="form-control border-0 border-bottom" placeholder="Address" require></textarea>`
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="visimisi" class="col-sm-2 col-form-label">Vision & Mission</label>
                                <label for="visimisi" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -70px;">
                                    <textarea name="visimisi" id="visimisi" rows="3" class="form-control border-0 border-bottom" placeholder="Vision & Mission" require></textarea>`
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php

    require_once '../template/footer.php';
    ?>