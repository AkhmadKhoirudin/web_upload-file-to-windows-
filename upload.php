<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Tentukan direktori tujuan awal
$targetDir = "E:/projek/";

// Periksa apakah direktori E:/projek/ ada
if (!file_exists($targetDir)) {
    // Jika tidak ada, ubah direktori tujuan ke D:/PROJEK
    $targetDir = "D:/PROJEK/";

    // Periksa apakah direktori D:/PROJEK/ ada
    if (!file_exists($targetDir)) {
        // Jika tidak ada, buat direktori D:/PROJEK/
        mkdir($targetDir, 0777, true);
    }
}

$response = [];
foreach ($_FILES['files']['name'] as $key => $name) {
    $targetFile = $targetDir . basename($name);

    // Mengunggah file ke direktori target tanpa memeriksa jenis file
    if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFile)) {
        $response[] = "File $name berhasil diupload ke $targetDir.";
    } else {
        http_response_code(500);
        $response[] = "Gagal mengupload file $name.";
    }
}

echo json_encode($response);
?>
