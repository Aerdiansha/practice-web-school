<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= $main_url ?>index.php">SMK ISEKAI 1</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <span class="text-white text-capitalize"><?= $_SESSION['ssUser'] ?></span>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#modalProfileUser" data-bs-toggle="modal">Profile User</a></li>
                    <li><a class="dropdown-item" href="<?php $main_url ?>school/school-profile.php">Profile Sekolah</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php $main_url ?>auth/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <?php
    $username = $_SESSION['ssUser'];
    $queryUser = mysqli_query($connection, "SELECT * FROM data_user WHERE username = '$username'");
    $profile = mysqli_fetch_array($queryUser);

    ?>

    // modal profile user
    <div class="modal" tabindex="-1" id="modalProfileUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profile User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-3 border-0" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $main_url ?>assets/image/<?= $profile['foto'] ?>" class="img-fluid rounded-start" width="100%" alt="user image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title mb-3 text-capitalize ps-1"><?= $profile['username']; ?></h4>
                                    <hr>
                                    <div class="row">
                                        <label for="nama" class="col-sm-4 col-form-label">Name :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control border-0 bg-transparent" id="nama" value="<?= $profile['nama']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="jabatan" class="col-sm-4 col-form-label pe-0">Jabatan :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control border-0 bg-transparent" id="jabatan" value="<?= $profile['jabatan']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="alamat" class="col-sm-4 col-form-label pe-0">alamat :</label>
                                        <div class="col-sm-8">
                                            <textarea id="alamat" cols="30" rows="2" class="form-control border-0 bg-transparent" readonly><?= $profile['alamat']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>