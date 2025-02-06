<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once '../config.php';
$title = "Teachers";
require_once '../template/header.php';
require_once '../template/navbar.php';
require_once '../template/sidebar.php';

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Teachers</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>index.php">Home</a></li>
                <li class="breadcrumb-item active">Teachers</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Teachers List</span>
                    <a href="<?= $main_url ?>teacher/add-teacher.php" class="btn btn-sm btn-success float-end"><i class="fa-solid fa-plus "></i> Add Teacher</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <center>No</center>
                                </th>
                                <th scope="col">
                                    <center>Photo</center>
                                </th>
                                <th scope="col">
                                    <center>NIP</center>
                                </th>
                                <th scope="col">
                                    <center>Name</center>
                                </th>
                                <th scope="col">
                                    <center>Handphone</center>
                                </th>
                                <th scope="col">
                                    <center>Religion</center>
                                </th>
                                <th scope="col">
                                    <center>Address</center>
                                </th>
                                <th scope="col">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Foto guru</td>
                                <td>NIP</td>
                                <td>Nama</td>
                                <td>Telp</td>
                                <td>Agama</td>
                                <td>Alamat</td>
                                <td align="center">
                                    <a href="" class="btn btn-sm btn-warning" title="Update Teacher"><i class="fa-solid fa-pen"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" title="Delete Teacher" onclick="return confirm('Delete data?')"><i class="fa solid fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>`

    <?php

    require_once '../template/footer.php';

    ?>