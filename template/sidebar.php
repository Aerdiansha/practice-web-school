<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">HOME</div>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">ADMIN</div>
                            <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/password.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Change Password
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">DATA</div>
                            <a class="nav-link" href="<?= $main_url ?>student/student.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Student
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>teacher/teacher.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                                Teacher
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Subjects
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                                Exam
                            </a>
                            <hr class="mb-0">
                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION['ssUser'] ?>
                    </div>
                </nav>
            </div>