
<?php if (!isset($_SESSION['users_name'])) {
$_SESSION['msg'] = "You must log in first";
header('location: singup/dist/signin.php');
}

if (isset($_GET['logout'])) {
unset($_SESSION['users_id']);
unset($_SESSION['business_name']);
unset($_SESSION['users_name']);
unset($_SESSION['users_role']);
header("location: singup/dist/signin.php");
}

?>