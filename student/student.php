<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';
$title = "Students";
require_once '../template/header.php';
require_once '../template/navbar.php';
require_once '../template/sidebar.php';

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Students</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>index.php">Home</a></li>
                <li class="breadcrumb-item active">Students</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Students list</span>
                    <a href="<?= $main_url ?>student/add-student.php" class="btn btn-success float-end"><i class="fa-solid fa-plus"></i> Add student</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">
                                    <center>Photo</center>
                                </th>
                                <th scope="col">
                                    <center>NIS</center>
                                </th>
                                <th scope="col">
                                    <center>Name</center>
                                </th>
                                <th scope="col">
                                    <center>Class</center>
                                </th>
                                <th scope="col">
                                    <center>Major</center>
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
                                <td>Photo</td>
                                <td>NIS</td>
                                <td>Name</td>
                                <td>Class</td>
                                <td>Major</td>
                                <td>Address</td>
                                <td align="center">
                                    <a href="" class="btn btn-sm btn-warning" title="Update student"><i class="fa solid fa-pen"></i></a>
                                    <a href="" class="btn btn-sm btn-danger" title="Delete student"><i class="fa solid fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php

    require_once '../template/footer.php';

    ?>