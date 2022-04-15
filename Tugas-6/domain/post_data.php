<?php
include('../data/connection_remote_database.php');

if (isset($_POST['binput'])) {

    $npm = $_POST['tnpm'];
    $nama = $_POST['tnama'];
    $prodi = $_POST['tprodi'];
    $alamat = $_POST['talamat'];
    $mk = $_POST['tmk'];
    $sks = $_POST['tsks'];

    $query = mysqli_query($connection, "INSERT into mahasiswa (npm,nama,jurusan,alamat) VALUES ('$npm','$nama','$prodi','$alamat')");
    if ($query) {
        $query1 = mysqli_query($connection, "INSERT into krs (id,mahasiswa_npm,matakuliah_kodemk) VALUES ('','$npm','$mk')");
        $message = "Input Data Berhasil";
        $message = urlencode($messae);
        header("Location:../index.php?message={$message}");
    } else {
        $message = "Input Data Gagal, Isi seluruh data dengan benar";
        $message = urlencode($message);
        header("Location:../index.php?message={$message}");
    }
}
