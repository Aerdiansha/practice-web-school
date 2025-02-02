<?php

// Database connection 
try {
    $connection = mysqli_connect('localhost', 'root', '', 'db_sekolah');
    // echo "koneksi berhasil";
} 
catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}

// url induk
$main_url = "http://localhost/practice-web-sekolah/";