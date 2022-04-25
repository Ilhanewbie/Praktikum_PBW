<?php

$connect = mysqli_connect('localhost','root','','rest');
if(isset($_GET['username']) && isset($_GET['password'])){
    $username = $_GET['username'];
    $password = $_GET['password'];

    $query = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $view = mysqli_fetch_assoc($query);
    
    if($query->num_rows > 0){
        $resp['status'] = $view['status'];
        $resp['id'] = $view['id'];
        $resp['username'] = $view['username'];
        $resp['message'] = "Data berhasil dikembalikan";
    } else {
        $resp['status'] = "0";
        $resp['message'] = "Maaf data tidak ditemukan";
    }
} else {
    $resp['status'] = "0";
    $resp['message'] = "Username atau Password tidak sesuai";
}

header('conten-type: application/json');

$response['response'] = $resp;

echo json_encode($response);

mysqli_close($connect);