
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = array();

session_start();

include_once('dbconnect.php');
include_once('errors.php');


//Giris Kodu
if (isset($_POST['signin'])) {
    $asperula_users = isset($_POST['usersad']) ? mysqli_real_escape_string($db, $_POST['usersad']) : '';
    $aseperula_password = isset($_POST['pwd']) ? mysqli_real_escape_string($db, $_POST['pwd']) : '';
    
    if (empty($asperula_users)) {
        array_push($errors, "Username is required");
    }
    if (empty($aseperula_password)) {
        array_push($errors, "Password is required");
    }
    
    if (count($errors) == 0) {
        // Şifreyi MD5 ile şifrele
        $hashed_password = md5($aseperula_password);
        
        $query = "SELECT * FROM users WHERE `users_name`=? AND `users_psw`=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ss", $asperula_users, $hashed_password);
        $stmt->execute();
        $results = $stmt->get_result();
        $asperulaControl = $results->fetch_assoc();
    
        if ($results->num_rows == 1) {
            session_start();
            $_SESSION['users_id'] = $asperulaControl['users_id'];
            $_SESSION['users_name'] = $asperulaControl['users_name'];
            $_SESSION['business_name'] = $asperulaControl['business_name'];
            $_SESSION['users_role'] = $asperulaControl['users_role'];
            $_SESSION['success'] = "You are now logged in";
            header('location:../../index.php');
            exit();
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}


//Personel kaydetme singupoerso.php gelen formlar !!!
if (isset($_POST['singupersobtn'])) {
    $business_name = $_POST['sirket'];
    $users_name = $_POST['kullanıcıad'];
    $users_pswd = $_POST['pwd'];
    $users_pswtekrar = $_POST['pwdtekrar'];
    $users_role = $_POST['yetki'];
    $users_psw =  md5($users_pswd);
 
    if ($users_pswd != $users_pswtekrar) {
        die("Hata: Şifreler eşleşmiyor");
    } else {
        $sql = "INSERT INTO `users` (`business_name`, `users_name`, `users_psw`, `users_role`, `users_currentDateTime`) VALUES (?, ?, ?, ?, NOW())";

        $stmt = $db->prepare($sql);

        // Değişkenleri bağla
        $stmt->bind_param("ssss", $business_name, $users_name, $users_psw, $users_role);

        // Sorguyu çalıştır
        if ($stmt->execute()) {
            header("Location: signin.php");
            exit(); // İşlemi sonlandır
        } else {
            echo "Hata: " . $stmt->error;
        }
    }
}



$tableNameBusiness  = "business";
$columnsBusiness = ['business_id', 'business_name', 'business_country', 'business_city', 'business_province', 'business_district', 'business_telephone', 'business_address', 'business_tip'];

// ISYERI VERILERINI CEKME KODLARI
$fetchDataBusiness = fetch_data_business($db, $tableNameBusiness, $columnsBusiness);
function fetch_data_business($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " ORDER BY business_id ASC";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Is Yeri Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

?>