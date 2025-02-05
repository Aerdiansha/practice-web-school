<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';
$title = "Edit Student";
require_once '../template/header.php';
require_once '../template/navbar.php';
require_once '../template/sidebar.php';

$nis = $_GET['nis'];
$siswa = mysqli_query($connection, "SELECT * FROM data_siswa WHERE nis = '$nis'");
$data = mysqli_fetch_array($siswa);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Student</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>student/student.php">Students</a></li>
                <li class="breadcrumb-item active">Update Student</li>
            </ol>
            <form action="process-student.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-pen"></i> Update Student</span>
                        <button type="submit" name="update" class="btn btn-success float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                    <label for="nis" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" class="form-control border-0 border-bottom ps-2" name="nis" id="nis" value="<?= $nis; ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Name</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" class="form-control border-0 border-bottom ps-2" name="nama" id="nama" value="<?= $data['nama']; ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kelas" class="col-sm-2 col-form-label">Class</label>
                                    <label for="kelas" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="kelas" id="kelas" class="form-select border-0 border-bottom" required>
                                            <?php
                                            $kelas = ['X', 'XI', 'XII'];
                                            foreach ($kelas as $kls) {
                                                if ($data['kelas'] == $kls) { ?>
                                                    <option value="<?= $kls ?>" selected><?= $kls ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $kls ?>"><?= $kls ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jurusan" class="col-sm-2 col-form-label">Major</label>
                                    <label for="jurusan" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="jurusan" id="jurusan" class="form-select border-0 border-bottom" required>
                                            <?php 
                                            $jurusan = ['Warrior', 'Mage', 'Rogue', 'Archer'];
                                            foreach ($jurusan as $jrs) {
                                                if ($data['jurusan'] == $jrs) { ?>
                                                    <option value="<?= $jrs ?>" selected><?= $jrs ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $jrs ?>"><?= $jrs ?></option>
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
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" rows="3" class="form-control border-0 border-bottom" id="alamat" placeholder="Address" required><?= $data['alamat']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
                                <img src="../assets/image/<?= $data['foto'] ?>" alt="" class="mb-3 rounded-circle" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Photo format: png, jpg, jpeg Max size: 2MB</small>
                                <div><small class="text-secondary">width = height</small></div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>

    <?php

    require_once '../template/footer.php';

    ?>