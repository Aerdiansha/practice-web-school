<?php

session_start();

if(isset($_SESSION['ssLogin'])) {
    header("Location:../index.php");
    exit;       
}

require_once '../config.php';

// ambil data sekolah
$school = mysqli_query($connection, "SELECT * FROM `data_sekolah` WHERE `id` = 1");
$data = mysqli_fetch_array($school);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="<?= $main_url ?>assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="icon" type="image/x-icon" href="<?= $main_url ?>assets/image/toga.png">

    <style>
        #bgLogin {
            background-image: url("../assets/image/<?= $data['gambar'] ?>");
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>

<body id="bgLogin">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Welcome<br> Please Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="process-login.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text" placeholder="username" pattern="[A-Za-z-0-9]{3,}" title="minimal 3 karakter kombinasi huruf besar huruf kecil dan angka" autocomplete="off" required />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" minlength="4" name="password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary col-12 rounded-pill my-2">Login</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="text-muted small">Copyright &copy; SMK ISEKAI <?= date('Y') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= $main_url ?>assets/js/scripts.js"></script>
</body>

</html>