
<?php

//asperula cafe veri tabanına bağlantı kodu!!
$servername="localhost";
$database="asperula_cafe";
$username="root";
$password="";

$db=mysqli_connect($servername,$username,$password,$database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>