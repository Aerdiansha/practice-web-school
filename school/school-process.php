<?php

require_once '../config.php';

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
    // ambil value yang diupload
    $id = $_POST['id'];
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $status = $_POST['status'];
    $accreditation = $_POST['accreditation'];
    $address = trim(htmlspecialchars($_POST['address']));
    $visi_misi = $_POST['visimisi'];
    $image = trim(htmlspecialchars($_POST['oldImg']));


    // cek upload images
    if ($_FILES['image']['error'] === 4) {
        $schImg = $image;
    } else {
        $url = 'school-profile.php';
        $schImg = uploadimg($url);
        @unlink('../assets/image/' . $image);
    }

    // update data (perlu di cek)
    mysqli_query($connection, "UPDATE data_sekolah SET nama = '$name', email = '$email', status = '$status', akreditasi = '$accreditation', alamat = '$address', visi_misi = '$visi_misi', gambar = '$schImg' WHERE id = $id");
    header("Location:school-profile.php?msg=updated");
    return;
}
