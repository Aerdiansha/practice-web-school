<?php 

session_start();

if(!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';

if(isset($_POST['simpan'])) {
    // variable dari form untuk ditampung
    $currentPassword = trim(htmlspecialchars($_POST['currentPassword']));
    $newPassword = trim(htmlspecialchars($_POST['newPassword']));
    $confirmPassword = trim(htmlspecialchars($_POST['confirmPassword']));

    // cek session user yang login
    $username = $_SESSION['ssUser'];
    // mengambil data user dari database
    $queryUser = mysqli_query($connection, "SELECT * FROM data_user WHERE username = '$username'");
    //  query menjadi array pada $queryUser
    $data = mysqli_fetch_array($queryUser);

    // jika password baru tidak sama dengan konfirmasi password
    if($newPassword !== $confirmPassword) {
        header("Location:password.php?msg=err1");
        exit;
    }
    // verifikasi password lama dengan data di database data_user
    if(!password_verify($currentPassword, $data['password'])) {
        header("Location:password.php?msg=err2");
        exit;
    } else {
        $pass = password_hash($newPassword, PASSWORD_DEFAULT);
        mysqli_query($connection, "UPDATE data_user SET `password` = '$pass' WHERE `username` = '$username'");
        header("Location:password.php?msg=updated");
        exit;
    }

}

?>