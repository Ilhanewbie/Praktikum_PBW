<?php
include('data/connection_remote_database.php');
$id = $_GET['id'];

$sql = "SELECT * FROM krs WHERE id=$id";
$query = mysqli_query($connection, $sql);
$data = mysqli_fetch_assoc($query);
