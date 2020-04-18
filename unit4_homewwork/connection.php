<?php 

// Thong so ket noi CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_online";

// Tao ket noi den CSDL
$conn = new mysqli($servername,$username,$password,$dbname);
mysqli_set_charset($conn, 'UTF8');
?>