<?php 

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';

// get id and foto from url 
$id = $_GET['nis'];
$foto = $_GET['foto'];

mysqli_query($connection, "DELETE FROM data_siswa WHERE nis = '$id'");
if($foto != 'default.png') {
    unlink("../assets/image/" . $foto);
}

echo "<script>alert('Delete data success'); document.location.href='student.php';</script>";
return;

?>