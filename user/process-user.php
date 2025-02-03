<?php 

require_once '../config.php';

// Jika tombol simpan diklik
if(isset($_POST['simpan'])) {
    // ambil value yang dikirim
    $username = trim(htmlspecialchars($_POST['username']));
    $nama = trim(htmlspecialchars($_POST['nama']));
    $position = $_POST['position'];
    $address = trim(htmlspecialchars($_POST['address']));
    $images = trim(htmlspecialchars($_FILES['image']['name']));
    $password = 1234;
    $pass = password_hash($password, PASSWORD_DEFAULT);

    // cek username
    $cek_username  = mysqli_query($connection, "SELECT * FROM data_user WHERE username = '$username'");
    if(mysqli_num_rows($cek_username) > 0) {
        header("Location:add-user.php?msg=error");
        return;
    }

    // upload Images user
    if($images !== null) {
        $url = 'add-user.php';
        $images = uploadimg($url);
    } else {
        $images = 'default.png';
    }

    mysqli_query($connection, "INSERT INTO data_user VALUES(NULL, '$username', '$pass', '$nama', '$address', '$position', '$images')");
    header("Location:add-user.php?msg=added");
    return;
}


?>