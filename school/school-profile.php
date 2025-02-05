<?php

session_start();

if(!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';

$title = "School Profile";
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
if ($msg == "notimage") {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i> Update data failed, invalid file upload!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == "oversize") {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-triangle-exclamation"></i> Update data failed, oversize upload file!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == "updated") {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check"></i> Update Data Success! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

$sekolah = mysqli_query($connection, "SELECT * FROM data_sekolah WHERE id = 1");
$data = mysqli_fetch_array($sekolah);
// var_dump($data); 
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">School</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>index.php">Home</a></li>
                <li class="breadcrumb-item active">School Profile</li>
            </ol>
            <form action="school-process.php" method="POST" enctype="multipart/form-data">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-pen-to-square"></i> School Data</span>
                        <button type="submit" name="simpan" class="btn btn-success float-end"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="gbrLama" value="<?= $data['gambar'] ?>">
                                <img src="../assets/image/<?= $data['gambar'] ?>" alt="school-img" class="mb-3" width="100%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Photo format: png, jpg, jpeg Max size: 1MB</small>
                            </div>
                            <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Name</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -70px;">
                                        <input type="text" class="form-control border-0 border-bottom" id="nama" name="nama" value="<?= $data['nama'] ?>" placeholder="School Name" require>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <label for="email" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -70px;">
                                        <input type="text" class="form-control border-0 border-bottom" id="email" name="email" value="<?= $data['email'] ?>" placeholder="School Email" require>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <label for="status" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -70px;">
                                        <select name="status" id="status" class="form-select border-0 border-bottom" require>
                                            <!-- <option value="public">Public School</option>
                                            <option value="private">Private School</option> -->
                                            <?php
                                            $status = ['public', 'private'];
                                            foreach ($status as $stat) {
                                                if ($data['status'] == $stat) { ?>
                                                    <option value="<?= $stat ?>" selected><?= $stat ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $stat ?>"><?= $stat ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="akreditasi" class="col-sm-2 col-form-label">Accreditation</label>
                                    <label for="akreditasi" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -70px;">
                                        <select name="akreditasi" id="akreditasi" class="form-select border-0 border-bottom" require>
                                            <?php
                                            $akreditasi = ['S', 'A', 'B', 'C', 'D'];
                                            foreach ($akreditasi as $akr) {
                                                if ($data['akreditasi'] == $akr) { ?>
                                                    <option value="<?= $akr ?>" selected><?= $akr ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $akr ?>"><?= $akr ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Address</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -70px;">
                                        <textarea name="alamat" id="alamat" value="<?= $data['alamat'] ?>" rows="3" class="form-control border-0 border-bottom" placeholder="Address" require></textarea>`
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="visimisi" class="col-sm-2 col-form-label">Vision & Mission</label>
                                    <label for="visimisi" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -70px;">
                                        <textarea name="visimisi" id="visimisi" value="<?= $data['visi_misi'] ?>" rows="3" class="form-control border-0 border-bottom" placeholder="Vision & Mission" require></textarea>`
                                    </div>
                                </div>
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