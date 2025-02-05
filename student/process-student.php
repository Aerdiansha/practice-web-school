<?php 

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';

if(isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = trim(htmlspecialchars($_POST['nama']));
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $foto = htmlspecialchars($_FILES['image']['name']);

    // cek foto
    if($foto != '') {
        $url = "add-student.php";
        $foto = uploadimg($url);
    } else {
        $foto = 'default.png';
    }

    mysqli_query($connection, "INSERT INTO data_siswa VALUES('$nis', '$nama', '$alamat', '$kelas', '$jurusan', '$foto')");

    echo "<script>alert('Data added successfully'); window.location.href = 'add-student.php';</script>";
    return;

}

?>