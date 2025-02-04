<?php 

require_once '../config.php';

// jika tombol simpan ditekan
if(isset($_POST['simpan'])) {
    // ambil data upload
    $id = $_POST['id'];
    $nama = trim(htmlspecialchars($_POST['nama']));
    $email = trim(htmlspecialchars($_POST['email']));
    $status = $_POST['status'];
    $akreditasi = $_POST['akreditasi'];
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $visimisi = trim(htmlspecialchars($_POST['visimisi']));
    $gbr = trim(htmlspecialchars($_POST['gbrLama']));

    // cek gambar user
    if($_FILES['image']['error'] === 4) {
        $gbrSekolah = $gbr;
    }else {
        $url = 'school-profile.php';
        $gbrSekolah = uploadimg($url);
        @unlink("../assets/image/" . $gbr);
    }

    // update data
    mysqli_query($connection, "UPDATE `data_sekolah` SET `nama` = '$nama', `email` = '$email', `status` = '$status', `akreditasi` = '$akreditasi', `alamat` = '$alamat', `visi_misi` = '$visimisi', `gambar` = '$gbrSekolah' WHERE `id` = '$id'");
    header("Location:school-profile.php?msg=updated");
    return;
}


?>