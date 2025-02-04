<?php

// Database connection 
try {
    $connection = mysqli_connect('localhost', 'root', '', 'db_sekolah');
    // echo "koneksi berhasil";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}

// url induk
$main_url = "http://localhost/practice-web-sekolah/";

// upload images function
function uploadimg($url)
{
    $namafile = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmp = $_FILES['image']['tmp_name'];

    // cek upload files
    $validExtension = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $namafile);
    $fileExtension = strtolower(end($fileExtension));
    if (!in_array($fileExtension, $validExtension)) {
        header("Location:" . $url . "?msg=notimage");
        die;
    }

    // cek file size
    if ($ukuran > 1000000) {
        header("Location:" . $url . "?msg=oversize");
        die;
    }

    // generate file name
    $namafilebaru = rand(10, 1000) . '-' . $namafile;

    // upload images
    move_uploaded_file($tmp, "../assets/image/" . $namafilebaru);
    return $namafilebaru;
}
