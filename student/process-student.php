<?php 

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("Location:../auth/login.php");
    exit;
}

require_once '../config.php';


// jika tombol simpan ditekan
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
// jika tombol update ditekan
else if(isset($_POST['update'])) {
    $nis = $_POST['nis'];
    $nama = trim(htmlspecialchars($_POST['nama']));
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $foto = htmlspecialchars($_POST['fotoLama']);
    
    // cek foto jika baru
    if($_FILES['image']['error'] === 4) {
        $fotoSiswa = $foto;
    } else {
        $url = 'student.php';
        $fotoSiswa = uploadimg($url);
        if($foto != 'default.png') {
            unlink("../assets/image/" . $foto);
        }
    }

    mysqli_query($connection, "UPDATE data_siswa SET nis = '$nis', nama = '$nama', alamat = '$alamat', kelas = '$kelas', jurusan = '$jurusan', foto = '$fotoSiswa' WHERE nis = '$nis'");

    echo "<script>alert('Data updated successfully'); window.location.href = 'student.php';</script>";
    return;
}

?>