<?php 

session_start();

require_once '../config.php';

// jika tombol login ditekan
if(isset($_POST['login'])) {
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));

    $result = mysqli_query($connection, "SELECT * FROM data_user WHERE username='$username'");

    // cek username
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // cek password
        if(password_verify($password, $row['password'])){
            $_SESSION['ssLogin'] = true;
            $_SESSION['ssUser'] = $username;
            header("Location:../index.php");
            exit;
        } else {
            echo "<script>alert('Wrong password');document.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username not found');document.location.href='login.php';</script>";
    };
};
?>