<?php
include 'conn.php';


$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM devices where id = '$id'");

if ($sql==true) {

echo "<script> alert('Device deleted Successfully'); </script>";
header("location:Devices.php");

}




?>