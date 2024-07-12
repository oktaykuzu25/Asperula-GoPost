<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$errors = array();

session_start();

include_once('errors.php');
include_once('dbconnect.php');
include_once('sessionControl.php');


function validate($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

function splitByComma($sentence)
{
    $words = preg_split('/\s*,\s*/', $sentence, -1, PREG_SPLIT_NO_EMPTY);
    return $words;
}


function cleanTurkishCharacters($text)
{
    $turkishCharacters = array('ç', 'ğ', 'ı', 'i', 'ö', 'ş', 'ü', 'Ç', 'Ğ', 'İ', 'Ö', 'Ş', 'Ü', ' ', "'");
    $englishCharacters = array('c', 'g', 'i', 'i', 'o', 's', 'u', 'C', 'G', 'I', 'O', 'S', 'U', '-', '');

    $cleanedText = str_replace($turkishCharacters, $englishCharacters, $text);
    $cleanedText = preg_replace('/[^A-Za-z0-9\-]/', '', $cleanedText); // Remove special characters
    $cleanedText = strtolower($cleanedText); // Convert to lowercase

    return $cleanedText;
}

function cleanPhoneNumber($phoneNumber)
{
    $cleanedNumber = str_replace(['(', ')', ' '], '', $phoneNumber);
    return $cleanedNumber;
}

//****************************************************** KATEGORI ILE ILGILI KODLAR *******************************************************/

$tableNameProductCategory = "product_category";
$columnsProductCategory = ['product_category_id', 'product_category_name', 'product_category_description', 'product_category_currentDateTime', 'product_category_publicy'];

// VERITABANINA URUNLER ICIN KATEGORI EKLEME KODLARI
if (isset($_POST['category-add'])) {
    $product_category_name = mysqli_real_escape_string($db, $_POST['product_category_name']);
    $product_category_description = mysqli_real_escape_string($db, $_POST['product_category_description']);
    $product_category_publicy = isset($_POST['product_category_publicy']) ? 1 : 0;

    if (empty($product_category_name) && empty($product_category_description)) {
        array_push($errors, "Enter the category name and description!");
    }

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $product_category_title_query = "SELECT * FROM product_category WHERE `product_category_name`='$product_category_name'";
    $resultProductCategoryTitleQuery = mysqli_query($db, $product_category_title_query);
    $productCategoryAlreadyControl = mysqli_fetch_assoc($resultProductCategoryTitleQuery);

    if ($productCategoryAlreadyControl) {
        if ($productCategoryAlreadyControl['product_category_name'] === $product_category_name) {
            array_push($errors, "This category is already available in the system!");
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO product_category (product_category_name,product_category_description,product_category_currentDateTime,product_category_publicy) 
        VALUES ('$product_category_name','$product_category_description','$currentDateTime','$product_category_publicy')";
        $post_data_query = mysqli_query($db, $query);

        //LOGS VERİTABANI İÇİN
        $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
        VALUES ('KATEGORİ  EKLEME','$product_category_name','$currentDateTime')";
        $post_data_logs_query = mysqli_query($db, $logsquery);

        if ($post_data_query) {
            header('location: app-product-category.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}

// URUN KATEGORILERIN LISTESINE VERI CEKME KODLARI
$fetchDataProductCategory = fetch_data_product_category($db, $tableNameProductCategory, $columnsProductCategory);
function fetch_data_product_category($db, $tableName, $columns)
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
        $query .= " ORDER BY product_category_id ASC";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Kategori Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

// VERITABANINDAN URUN KATEGORI SILME KODLARI
if (isset($_GET['deleteProductCategory'])) {
    $id = validate($_GET['deleteProductCategory']);
    $condition = ['product_category_id' => $id];
    $deleteMsg = delete_data_product_category($db, $tableNameProductCategory, $condition);
    header("location:app-product-category.php");
}

function delete_data_product_category($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}

//VERITABANINDAN KATEGORI DETAY SAYFASINA VERI CEKME KODLARI 
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $product_category_id = end($url_segments);
    $id = validate($product_category_id);
    $fetchDataProductCategoryDetails = fetch_data_product_category_detail($db, $tableNameProductCategory, $columnsProductCategory, $id);
}
function fetch_data_product_category_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE product_category_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

// VERITABANINDA KATEGORI GUNCELLEME KODLARI
if (isset($_POST['category-update'])) {
    $product_category_id  = mysqli_real_escape_string($db, $_POST['product_category_id']);
    $product_category_name = mysqli_real_escape_string($db, $_POST['product_category_name']);
    $product_category_description = mysqli_real_escape_string($db, $_POST['product_category_description']);
    $product_category_publicy = isset($_POST['product_category_publicy']) ? 1 : 0;


    $select_query = "SELECT * FROM product_category WHERE product_category_id = '$product_category_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $update_query = "UPDATE product_category SET 
        product_category_name = '$product_category_name',
        product_category_description = '$product_category_description',
        product_category_publicy = '$product_category_publicy'
        WHERE product_category_id = '$product_category_id'";

    $update_result = mysqli_query($db, $update_query);

    $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
    VALUES ('KATEGORİ GÜNCELLEME','$product_category_name','$currentDateTime')";
    $post_data_logs_query = mysqli_query($db, $logsquery);

    if ($update_result) {
        header('location: app-product-category.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}



//****************************************************** URUN ILE ILGILI KODLAR *******************************************************/


$tableNameProduct = "product";
$columnsProduct = ['product_id', 'product_category_id', 'product_name', 'product_info', 'product_small_price', 'product_middle_price', 'product_big_price', 'product_normal_price', 'product_image', 'product_currentDateTime', 'product_publicy'];

// VERITABANINA URUN EKLEME KODLARI
if (isset($_POST['product-add'])) {
    $product_category_id = mysqli_real_escape_string($db, $_POST['product_category_id']);
    $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $product_small_price = mysqli_real_escape_string($db, $_POST['product_small_price']);
    $product_middle_price = mysqli_real_escape_string($db, $_POST['product_middle_price']);
    $product_big_price = mysqli_real_escape_string($db, $_POST['product_big_price']);
    $product_normal_price = mysqli_real_escape_string($db, $_POST['product_normal_price']);
    $product_info = mysqli_real_escape_string($db, $_POST['product_info']);
    $product_publicy = isset($_POST['product_publicy']) ? 1 : 0;

    $targetDirectory = "product_photos/";

    $product_photos_1200x960 = $_FILES['product_image']['name'];

    $product_photos_1200x960_product = $targetDirectory . basename($_FILES['product_image']['name']);

    $product_photos_1200x960_product_img = $product_photos_1200x960_product;

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $product_title_query = "SELECT * FROM  product WHERE `product_name`='$product_name'";
    $resultProductTitleQuery = mysqli_query($db, $product_title_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultProductTitleQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['product_name'] === $product_name) {
            array_push($errors, "This product is already available in the system!");
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO product (product_category_id,product_name,product_info,product_small_price,product_middle_price,product_big_price,product_normal_price,product_image,product_currentDateTime,product_publicy) 
        VALUES ('$product_category_id','$product_name','$product_info','$product_small_price','$product_middle_price','$product_big_price','$product_normal_price','$product_photos_1200x960_product_img','$currentDateTime','$product_publicy')";
        $post_data_query = mysqli_query($db, $query);

        $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
        VALUES ('ÜRÜN EKLEME','$product_name','$currentDateTime')";
        $post_data_logs_query = mysqli_query($db, $logsquery);

        if ($post_data_query) {
            header('location: app-product.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}

//VERITABANINDAN URUN LISTESINE VERI CEKME KODLARI 
$fetchDataProduct = fetch_data_product($db, $tableNameProduct, $columnsProduct);
function fetch_data_product($db, $tableName, $columns)
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
        $query .= " ORDER BY product_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Urun Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

//VERITABANINDAN URUN KATEGORISINI CEKME KODLARI
function fetch_data_category_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE product_category_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


//VERITABANINDAN URUN DETAY SAYFASINA VERI CEKME KODLARI 
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $product_id = end($url_segments);
    $id = validate($product_id);
    $fetchDataProductDetails = fetch_data_product_detail($db, $tableNameProduct, $columnsProduct, $id);
}
function fetch_data_product_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE product_id  = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


// VERITABANINDA URUN GUNCELLEME KODLARI
if (isset($_POST['product-update'])) {
    $product_id = mysqli_real_escape_string($db, $_POST['product_id']);
    $product_category_id = mysqli_real_escape_string($db, $_POST['product_category_id']);
    $product_name = mysqli_real_escape_string($db, $_POST['product_name']);
    $product_info = mysqli_real_escape_string($db, $_POST['product_info']);
    $product_small_price = mysqli_real_escape_string($db, $_POST['product_small_price']);
    $product_middle_price = mysqli_real_escape_string($db, $_POST['product_middle_price']);
    $product_big_price = mysqli_real_escape_string($db, $_POST['product_big_price']);
    $product_normal_price = mysqli_real_escape_string($db, $_POST['product_normal_price']);

    $product_publicy = isset($_POST['product_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM product WHERE product_id = '$product_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    $product_photos_1024x683_cafe_img = $row['product_image'];

    $targetDirectory = "product_photos/";

    if (!empty($_FILES['product_image']['name'])) {
        $product_photos_1200x960 = $_FILES['product_image']['name'];
        $product_photos_1200x960_product_img = $targetDirectory . basename($product_photos_1200x960);
    } else {
        $product_photos_1200x960_product_img = $row['product_image'];
    }

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $update_query = "UPDATE product SET 
        product_category_id = '$product_category_id',
        product_name = '$product_name',
        product_info = '$product_info',
        product_small_price = '$product_small_price',
        product_middle_price = '$product_middle_price',
        product_big_price = '$product_big_price',
        product_normal_price = '$product_normal_price',
        product_image = '$product_photos_1200x960_product_img',
        product_publicy = '$product_publicy',
        product_currentDateTime = '$currentDateTime'
        WHERE product_id = '$product_id'";

    $update_result = mysqli_query($db, $update_query);

    $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
      VALUES ('ÜRÜN GÜNCELLEME','$product_name','$currentDateTime')";
    $post_data_logs_query = mysqli_query($db, $logsquery);

    if ($update_result) {
        header('location: app-product.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}


// VERITABANINDAN URUN SILME KODLARI
if (isset($_GET['deleteProduct'])) {
    $id = validate($_GET['deleteProduct']);
    $condition = ['product_id' => $id];
    $deleteMsg = delete_data_product($db, $tableNameProduct, $condition);
    header("location:app-product.php");
}

function delete_data_product($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}


//****************************************************** DEPO ILE ILGILI KODLAR *******************************************************/

$tableNameStorage = "storage";
$columnsStorage = ['storage_id', 'storage_name', 'storage_code', 'storage_currentDateTime'];

// VERITABANINA DEPO EKLEME KODLARI
if (isset($_POST['storage-add'])) {
    $storage_name = mysqli_real_escape_string($db, $_POST['storage_name']);
    $storage_code = mysqli_real_escape_string($db, $_POST['storage_code']);

    if (empty($storage_name) && empty($storage_code)) {
        array_push($errors, "Enter the storage name and code!");
    }

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $storage_title_query = "SELECT * FROM storage WHERE `storage_name`='$storage_name'";
    $resultStorageTitleQuery = mysqli_query($db, $storage_title_query);
    $storageAlreadyControl = mysqli_fetch_assoc($resultStorageTitleQuery);

    if ($storageAlreadyControl) {
        if ($storageAlreadyControl['storage_name'] === $storage_name) {
            array_push($errors, "This storage is already available in the system!");
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO storage (storage_name,storage_code,storage_currentDateTime) 
        VALUES ('$storage_name','$storage_code','$currentDateTime')";
        $post_data_query = mysqli_query($db, $query);

        $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
 VALUES ('DEPO EKLEME','$storage_name','$currentDateTime')";
        $post_data_logs_query = mysqli_query($db, $logsquery);

        if ($post_data_query) {
            header('location: app-storage.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}

//VERITABANINDAN DEPO LISTESINE VERI CEKME KODLARI 
$fetchDataStorage = fetch_data_storage($db, $tableNameStorage, $columnsStorage);
function fetch_data_storage($db, $tableName, $columns)
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
        $query .= " ORDER BY storage_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Depo Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

// VERITABANINDAN DEPO SILME KODLARI
if (isset($_GET['deleteStorage'])) {
    $id = validate($_GET['deleteStorage']);
    $condition = ['storage_id' => $id];
    $deleteMsg = delete_data_storage($db, $tableNameStorage, $condition);
    header("location:app-storage.php");
}

function delete_data_storage($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}


//****************************************************** MATERYAL ILE ILGILI KODLAR *******************************************************/



$tableNameMaterial = "material";
$columnsMaterial = ['material_id', 'material_name', 'material_currentDateTime', 'material_unit', 'material_unit_amount', 'material_price', 'material_publicy'];

// VERITABANINA MATERYAL EKLEME KODLARI
if (isset($_POST['material-add'])) {
    $material_name = mysqli_real_escape_string($db, $_POST['material_name']);
    $material_unit = mysqli_real_escape_string($db, $_POST['material_unit']);
    $material_unit_amount = mysqli_real_escape_string($db, $_POST['material_unit_amount']);
    $material_price = mysqli_real_escape_string($db, $_POST['material_price']);
    $material_publicy = isset($_POST['material_publicy']) ? 1 : 0;

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $material_title_query = "SELECT * FROM  material WHERE `material_name`='$material_name'";
    $resultMaterialTitleQuery = mysqli_query($db, $material_title_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultMaterialTitleQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['material_name'] === $material_name) {
            array_push($errors, "This material is already available in the system!");
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO material (material_name,material_currentDateTime,material_unit,material_unit_amount,material_price,material_publicy) 
        VALUES ('$material_name','$currentDateTime','$material_unit','$material_unit_amount','$material_price','$material_publicy')";
        $post_data_query = mysqli_query($db, $query);

        $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
        VALUES (' MATERYAL EKLEME','$material_name','$currentDateTime')";
        $post_data_logs_query = mysqli_query($db, $logsquery);

        if ($post_data_query) {
            header('location: app-material.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}
//VERITABANINDAN MATERYAL LISTESINE VERI CEKME KODLARI 
$fetchDataMaterial = fetch_data_material($db, $tableNameMaterial, $columnsMaterial);
function fetch_data_material($db, $tableName, $columns)
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
        $query .= " ORDER BY material_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Materyal Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}
//VERITABANINDAN URUN DETAY SAYFASINA VERI CEKME KODLARI 
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $product_id = end($url_segments);
    $id = validate($product_id);
    $fetchDataMaterialDetails = fetch_data_material_detail($db, $tableNameMaterial, $columnsMaterial, $id);
}

function fetch_data_material_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE material_id  = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}
// VERITABANINDA URUN GUNCELLEME KODLARI
if (isset($_POST['material-update'])) {
    $material_id = mysqli_real_escape_string($db, $_POST['material_id']);
    $material_name = mysqli_real_escape_string($db, $_POST['material_name']);
    $material_unit = mysqli_real_escape_string($db, $_POST['material_unit']);
    $material_unit_amount = mysqli_real_escape_string($db, $_POST['material_unit_amount']);
    $material_price = mysqli_real_escape_string($db, $_POST['material_price']);
    $material_publicy = isset($_POST['material_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM material WHERE material_id = '$material_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $update_query = "UPDATE material SET 
        material_name = '$material_name',
        material_unit = '$material_unit',
        material_unit_amount = '$material_unit_amount',
        material_price = '$material_price',
        material_publicy = '$material_publicy',
        material_currentDateTime = '$currentDateTime'
        WHERE material_id = '$material_id'";

    $update_result = mysqli_query($db, $update_query);


    $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
        VALUES (' MATERYAL GÜNCELLEME','$material_name','$currentDateTime')";
    $post_data_logs_query = mysqli_query($db, $logsquery);

    if ($update_result) {
        header('location: app-material.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}
// VERITABANINDAN URUN SILME KODLARI
if (isset($_GET['deleteMaterial'])) {
    $id = validate($_GET['deleteMaterial']);
    $condition = ['material_id' => $id];
    $deleteMsg = delete_data_material($db, $tableNameMaterial, $condition);
    header("location:app-material.php");
}

function delete_data_material($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}



//****************************************************** STOCK ILE ILGILI KODLAR *******************************************************/

$tableNameStock = "stock";
$columnsStock = ['stock_id', 'material_id', 'storage_id', 'stock_amount', 'stock_price', 'stock_currentDateTime', 'stock_processing', 'stock_publicy'];

// VERITABANINA STOCK EKLEME KODLARI
if (isset($_POST['stock-add'])) {
    $material_id = mysqli_real_escape_string($db, $_POST['material_id']);
    $storage_id = mysqli_real_escape_string($db, $_POST['storage_id']);
    $stock_amount = mysqli_real_escape_string($db, $_POST['stock_amount']);
    $stock_price = mysqli_real_escape_string($db, $_POST['stock_price']);
    $stock_processing = mysqli_real_escape_string($db, $_POST['stock_processing']);
    $stock_publicy = isset($_POST['stock_publicy']) ? 1 : 0;

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $stock_title_query = "SELECT * FROM  stock WHERE `material_id`='$material_id'";
    $resultStockTitleQuery = mysqli_query($db, $stock_title_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultStockTitleQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['material_id'] === $material_id && $resultAlreadyControl['storage_id'] === $storage_id) {
            array_push($errors, "This material and storage is already available in the system!");
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO stock (material_id,storage_id,stock_amount,stock_price,stock_currentDateTime,stock_processing,stock_publicy) 
        VALUES ('$material_id','$storage_id','$stock_amount','$stock_price','$currentDateTime','$stock_processing','$stock_publicy')";
        $post_data_query = mysqli_query($db, $query);

        $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
               VALUES ('STOCK EKLEME ','$stock_processing','$currentDateTime')";
        $post_data_logs_query = mysqli_query($db, $logsquery);

        if ($post_data_query) {
            header('location: app-stock.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}

//VERITABANINDAN STOCK LISTESINE VERI CEKME KODLARI 
$fetchDataStock = fetch_data_stock($db, $tableNameStock, $columnsStock);
function fetch_data_stock($db, $tableName, $columns)
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
        $query .= " ORDER BY stock_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Stok Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

//VERITABANINDAN STOCK LISTESINE MATERYAL VERILERI CEKME KODLARI 
function fetch_data_materialTable_for_stock($db, $tableName, $columns, $id)
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
        $query .= " WHERE material_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

//VERITABANINDAN STOCK LISTESINE DEPO VERILERI CEKME KODLARI 
function fetch_data_storageTable_for_stock($db, $tableName, $columns, $id)
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
        $query .= " WHERE storage_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

// STOCK EKLEME SAYFASINA DEPO BILGILERINI CEKME KODLARI
$fetchDataStorageForStock = fetch_data_storage_for_stock($db, $tableNameStorage, $columnsStorage);
function fetch_data_storage_for_stock($db, $tableName, $columns)
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
        $query .= " ORDER BY storage_id ASC";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Kategori Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

// STOCK EKLEME SAYFASINA MATERYAL BILGILERINI CEKME KODLARI
$fetchDataMaterialForStock = fetch_data_material_for_stock($db, $tableNameMaterial, $columnsMaterial);
function fetch_data_material_for_stock($db, $tableName, $columns)
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
        $query .= " WHERE material_publicy = 1";
        $query .= " ORDER BY material_id ASC";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Kategori Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_stock_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE stock_id  = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}
// VERITABANINDA STOCK GUNCELLEME KODLARI
if (isset($_POST['stock-update'])) {
    $stock_id = mysqli_real_escape_string($db, $_POST['stock_id']);
    $material_id = mysqli_real_escape_string($db, $_POST['material_id']);
    $storage_id = mysqli_real_escape_string($db, $_POST['storage_id']);
    $stock_amount = mysqli_real_escape_string($db, $_POST['stock_amount']);
    $stock_price = mysqli_real_escape_string($db, $_POST['stock_price']);
    $stock_processing = mysqli_real_escape_string($db, $_POST['stock_processing']);
    $stock_publicy = isset($_POST['stock_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM stock WHERE stock_id = '$stock_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $update_query = "UPDATE stock SET 
        material_id = '$material_id',
        storage_id = '$storage_id',
        stock_amount = '$stock_amount',
        stock_price = '$stock_price',
        stock_currentDateTime = '$currentDateTime',
        stock_processing = '$stock_processing',
        stock_publicy = '$stock_publicy'
        WHERE stock_id = '$stock_id'";

    $update_result = mysqli_query($db, $update_query);

    $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
       VALUES ('STOCK GÜNCELLEME ','$stock_processing','$currentDateTime')";
    $post_data_logs_query = mysqli_query($db, $logsquery);

    if ($update_result) {
        header('location: app-stock.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}
// VERITABANINDAN STOCK SILME KODLARI
if (isset($_GET['deleteStock'])) {
    $id = validate($_GET['deleteStock']);
    $condition = ['stock_id' => $id];
    $deleteMsg = delete_data_stock($db, $tableNameStock, $condition);
    header("location:app-stock.php");
}

function delete_data_stock($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}

//****************************************************** İŞLETME  ILE ILGILI KODLAR *******************************************************/

// İŞLETME HESABINDAN VERİLERİ ÇEKME
$tableNameBusiness = "business";
$columnsBusinessCategory = ['business_id', 'business_name', 'business_country', 'business_city', 'business_province', 'business_district', 'business_telephone', 'business_address', 'business_tip'];


// İŞLETME EKLEME KODLARI 
if (isset($_POST['product-ad-business'])) {
    // Verileri güvenli hale getirme
    $app_business_name = mysqli_real_escape_string($db, $_POST['product_business']);
    $app_business_country = mysqli_real_escape_string($db, $_POST['product_country']);
    $app_business_city = mysqli_real_escape_string($db, $_POST['product_city']);
    $app_business_province = mysqli_real_escape_string($db, $_POST['product_province']);
    $app_business_district = mysqli_real_escape_string($db, $_POST['product_district']);
    $app_business_address = mysqli_real_escape_string($db, $_POST['product_address']);
    $app_business_telephone = mysqli_real_escape_string($db, $_POST['product_telephone']);
    $app_business_tip = mysqli_real_escape_string($db, $_POST['product_tip']);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    // Hata kontrolü
    $errors = [];
    if (empty($app_business_name) || empty($app_business_country) || empty($app_business_city) || empty($app_business_province) || empty($app_business_district) || empty($app_business_address) || empty($app_business_telephone)) {
        array_push($errors, "Özellik sütunu hariç , sütunların doldurulması zorunludur.");
    }



    // Hatalar yoksa veritabanına ekle
    if (count($errors) == 0) {
        // Veritabanına veri ekleme sorgusu
        $insert_query = "INSERT INTO business (business_name, business_country, business_city, business_province, business_district, business_address, business_telephone, business_tip) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
  VALUES ('İŞLETME EKLEME ','$app_business_name','$currentDateTime')";
        $post_data_logs_query = mysqli_query($db, $logsquery);

        // Hazırlanmış ifadeler (Prepared statements) kullanarak sorguyu çalıştırma
        $stmt = $db->prepare($insert_query);

        // Değişkenleri yer tutuculara bağlama
        $stmt->bind_param("ssssssss", $app_business_name, $app_business_country, $app_business_city, $app_business_province, $app_business_district, $app_business_address, $app_business_telephone, $app_business_tip);

        // Sorguyu çalıştırma
        if ($stmt->execute()) {
            echo "Record successfully added.";
            header('location: app-businesses.php');
        } else {
            echo "Error: " . $stmt->error;
        }

        // İfade kapatma
        $stmt->close();
    } else {
        // Hata mesajlarını gösterme
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}


$fetchDataBusinesses = fetch_data_businesses($db, $tableNameBusiness, $columnsBusinessCategory);
function fetch_data_businesses($db, $tableName, $columns)
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
        $query .= " ORDER BY business_id";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Urun Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

//  VERITABANINDAN  İŞLETME HESABI SILME KODLARI
if (isset($_GET['deleteBusinessesId'])) {
    $id = validate($_GET['deleteBusinessesId']);
    $condition = ['business_id' => $id];
    $deleteMsg = delete_data_product($db, $tableNameBusiness, $condition);
    header("location:app-businesses.php");
}

function delete_data_businesses($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}

//VERITABANINDAN İŞLETME  DETAY SAYFASINA VERI CEKME KODLARI 
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $app_business_id = end($url_segments);
    $id = validate($app_business_id);
    $fetchDataAppBusinessUpdate = fetch_data_app_business_update($db, $tableNameBusiness, $columnsBusinessCategory, $id);
}
function fetch_data_app_business_update($db, $tableName, $columns, $id)
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
        $query .= " WHERE business_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_POST['App-ad-business-update'])) {
    // Verileri güvenli hale getirme
    $app_business_id = mysqli_real_escape_string($db, $_POST['business_id']);
    $app_business_name = mysqli_real_escape_string($db, $_POST['product_business']);
    $app_business_country = mysqli_real_escape_string($db, $_POST['product_country']);
    $app_business_city = mysqli_real_escape_string($db, $_POST['product_city']);
    $app_business_province = mysqli_real_escape_string($db, $_POST['product_province']);
    $app_business_district = mysqli_real_escape_string($db, $_POST['product_district']);
    $app_business_address = mysqli_real_escape_string($db, $_POST['product_address']);
    $app_business_telephone = mysqli_real_escape_string($db, $_POST['product_telephone']);
    $app_business_tip = mysqli_real_escape_string($db, $_POST['product_tip']);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    // Boş değer kontrolü
    if (empty($app_business_id) || empty($app_business_name) || empty($app_business_country) || empty($app_business_city) || empty($app_business_province) || empty($app_business_district) || empty($app_business_address) || empty($app_business_telephone) || empty($app_business_tip)) {
        die("Tüm alanlar doldurulmalıdır.");
    }

    $select_query = "SELECT * FROM business WHERE business_id = '$app_business_id'";
    $result = mysqli_query($db, $select_query);

    if (mysqli_num_rows($result) == 0) {
        die("Veritabanında böyle bir kayıt bulunamadı.");
    }

    $update_query = "UPDATE business SET 
    business_name = '$app_business_name',
    business_country= '$app_business_country',
    business_city = '$app_business_city',
    business_province = '$app_business_province',
    business_district = '$app_business_district',
    business_address = '$app_business_address',
    business_telephone = '$app_business_telephone',
    business_tip = '$app_business_tip'
    WHERE business_id = '$app_business_id'";

    $update_result = mysqli_query($db, $update_query);

    $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
    VALUES ('İŞLETME GÜNCELLEME ','$app_business_name','$currentDateTime')";
    $post_data_logs_query = mysqli_query($db, $logsquery);

    if ($update_result) {
        header('location: app-businesses.php');
        exit();
    } else {
        die("Güncelleme hatası: " . mysqli_error($db));
    }
}


//****************************************************** KULLANICILAR ILE ILGILI KODLAR *******************************************************/

$tableNameUsers = "users";
$columnUsers = ['users_id', 'business_name', 'users_name', 'users_psw', 'users_role', 'users_currentDateTime'];
$fetchDataUsers = fetch_data_users($db, $tableNameUsers, $columnUsers);

function fetch_data_users($db, $tableName, $columns)
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
        $query .= " ORDER BY users_id";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Urun Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


//  VERITABANINDAN  KULLANICI HESABI SILME KODLARI
if (isset($_GET['deleteUsersId'])) {
    $id = validate($_GET['deleteUsersId']);
    $condition = ['users_id' => $id];
    $deleteMsg = delete_data_users($db, $tableNameUsers, $condition);
    header("location:app-users.php");
}

function delete_data_users($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }
    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}



if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $app_users_id = end($url_segments);
    $id = validate($app_business_id);
    $fetchDataAppUsersUpdate = fetch_data_app_users_update($db, $tableNameUsers, $columnUsers, $id);
}
function fetch_data_app_users_update($db, $tableName, $columns, $id)
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
        $query .= " WHERE users_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}



if (isset($_POST['App-users-update'])) {
    // Veritabanı bağlantısını $db değişkeniyle sağladığınızı varsayalım

    // Verileri güvenli hale getirme
    $app_users_id = mysqli_real_escape_string($db, $_POST['users_id']);
    $app_users_name = mysqli_real_escape_string($db, $_POST['users_name']);
    $app_business_name = mysqli_real_escape_string($db, $_POST['business_name']);
    $app_users_psw = mysqli_real_escape_string($db, $_POST['users_psw']);
    $app_users_role = mysqli_real_escape_string($db, $_POST['users_role']);
    $app_users_currentDateTime = mysqli_real_escape_string($db, $_POST['users_currentDateTime']);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    // Boş değer kontrolü
    if (empty($app_users_id) || empty($app_business_name) || empty($app_users_psw) || empty($app_users_role) || empty($app_users_currentDateTime)) {
        die("Tüm alanlar doldurulmalıdır.");
    }

    // Kullanıcıyı veritabanında kontrol et
    $select_query = "SELECT * FROM users WHERE users_id = '$app_users_id'";
    $result = mysqli_query($db, $select_query);

    if (mysqli_num_rows($result) == 0) {
        die("Veritabanında böyle bir kayıt bulunamadı.");
    }

    // UPDATE sorgusunu oluştur
    $update_query = "UPDATE users SET 
        users_name = '$app_users_name',
        business_name = '$app_business_name',
        users_psw = '$app_users_psw',
        users_role = '$app_users_role',
        users_currentDateTime = '$app_users_currentDateTime'
        WHERE users_id = '$app_users_id'";

    // UPDATE sorgusunu çalıştır
    $update_result = mysqli_query($db, $update_query);

    $logsquery = "INSERT INTO logs (logs_type,logs_process,logs_currentdatetime) 
    VALUES ('KULLANICI  GÜNCELLEME ','$app_users_name','$app_users_currentDateTime')";
    $post_data_logs_query = mysqli_query($db, $logsquery);

    if ($update_result) {
        // Başarılı güncelleme durumunda yönlendirme yap
        header('location: app-users.php');
        exit();
    } else {
        // Hata durumunda hata mesajı göster
        die("Güncelleme hatası: " . mysqli_error($db));
    }
}


//VERITABANINDAN URUN KATEGORISINI CEKME KODLARI
function fetch_data_users_business_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE business_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}



//****************************************************** ODEME ILE ILGILI KODLAR *******************************************************/



$tableNamePaymentTypes = "payment_types";
$columnsPaymentTypes = ['id', 'payment_types_name', 'payment_types_publicy', 'payment_types_currentDateTime'];

// VERITABANINA ODEME SEKLI EKLEME KODLARI
if (isset($_POST['payment-types-add'])) {
    $payment_types_name = mysqli_real_escape_string($db, $_POST['payment_types_name']);
    $payment_types_publicy = isset($_POST['payment_types_publicy']) ? 1 : 0;

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $payment_title_query = "SELECT * FROM  payment_types WHERE `payment_types_name`='$payment_types_name'";
    $resultPaymentTitleQuery = mysqli_query($db, $payment_title_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultPaymentTitleQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['payment_types_name'] === $payment_types_name) {
            array_push($errors, "This payment types is already available in the system!");
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO payment_types (payment_types_name,payment_types_publicy,payment_types_currentDateTime) 
        VALUES ('$payment_types_name','$payment_types_publicy','$currentDateTime')";
        $post_data_query = mysqli_query($db, $query);


        if ($post_data_query) {
            header('location: app-payment-types.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}
//VERITABANINDAN ODEME SEKLI LISTESINE VERI CEKME KODLARI 
$fetchDataPaymentTypes = fetch_data_payment_types($db, $tableNamePaymentTypes, $columnsPaymentTypes);
function fetch_data_payment_types($db, $tableName, $columns)
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
        $query .= " ORDER BY id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Odeme Sekli Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}
//VERITABANINDAN ODEME SEKLI DETAY SAYFASINA VERI CEKME KODLARI 
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $payment_types_id = end($url_segments);
    $id = validate($payment_types_id);
    $fetchDataPaymentTypesDetails = fetch_data_payment_types_detail($db, $tableNamePaymentTypes, $columnsPaymentTypes, $id);
}

function fetch_data_payment_types_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}
// VERITABANINDA ODEME SEKLI GUNCELLEME KODLARI
if (isset($_POST['payment-types-update'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $payment_types_name = mysqli_real_escape_string($db, $_POST['payment_types_name']);
    $payment_types_publicy = isset($_POST['payment_types_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM payment_types WHERE id = '$id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $update_query = "UPDATE payment_types SET 
        payment_types_name = '$payment_types_name',
        payment_types_publicy = '$payment_types_publicy',
        payment_types_currentDateTime = '$currentDateTime'
        WHERE id = '$id'";

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-payment-types.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}
// VERITABANINDAN ODEME SEKLI SILME KODLARI
if (isset($_GET['deletePaymentTypes'])) {
    $id = validate($_GET['deletePaymentTypes']);
    $condition = ['id' => $id];
    $deleteMsg = delete_data_payment_types($db, $tableNamePaymentTypes, $condition);
    header("location:app-payment-types.php");
}

function delete_data_payment_types($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}



//****************************************************** MUSTERILER ILE ILGILI KODLAR *******************************************************/

$tableNameCustomers = "customers";
$columnsCustomers = ['customers_id', 'customers_name', 'customers_surname', 'customers_phone', 'customers_address', 'customers_email', 'customers_note', 'customers_publicy', 'customers_currentDateTime'];

// VERITABANINA MUSTERI EKLEME KODLARI
if (isset($_POST['customers-add'])) {
    $customers_name = mysqli_real_escape_string($db, $_POST['customers_name']);
    $customers_surname = mysqli_real_escape_string($db, $_POST['customers_surname']);
    $customers_phone = mysqli_real_escape_string($db, $_POST['customers_phone']);
    $customers_address = mysqli_real_escape_string($db, $_POST['customers_address']);
    $customers_email = mysqli_real_escape_string($db, $_POST['customers_email']);
    $customers_note = mysqli_real_escape_string($db, $_POST['customers_note']);
    $customers_publicy = isset($_POST['customers_publicy']) ? 1 : 0;

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8'); // Türkçe dil desteği için locale ayarı
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $customers_title_query = "SELECT * FROM  customers WHERE `customers_name`='$customers_name' AND `customers_surname`='$customers_surname' AND `customers_phone`='$customers_phone' ";
    $resultCustomersTitleQuery = mysqli_query($db, $customers_title_query);
    $resultAlreadyControl = mysqli_fetch_assoc($resultCustomersTitleQuery);

    if ($resultAlreadyControl) {
        if ($resultAlreadyControl['customers_name'] === $customers_name && $resultAlreadyControl['customers_surname'] === $customers_surname && $resultAlreadyControl['customers_phone'] === $customers_phone) {
            array_push($errors, "This customers is already available in the system!");
        }
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO customers (customers_name,customers_surname,customers_phone,customers_address,customers_email,customers_note,customers_publicy,customers_currentDateTime) 
        VALUES ('$customers_name','$customers_surname','$customers_phone','$customers_address','$customers_email','$customers_note','$customers_publicy','$currentDateTime')";
        $post_data_query = mysqli_query($db, $query);


        if ($post_data_query) {
            header('location: app-customers.php');
        } else {
            $errors[] = "Work could not be loaded: " . mysqli_error($db);
        }
    }
}

//VERITABANINDAN MUSTERI LISTESINE VERI CEKME KODLARI 
$fetchDataCustomers = fetch_data_customers($db, $tableNameCustomers, $columnsCustomers);
function fetch_data_customers($db, $tableName, $columns)
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
        $query .= " ORDER BY customers_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Musteri Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

//VERITABANINDAN MUSTERI DETAY SAYFASINA VERI CEKME KODLARI 
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $customers_id = end($url_segments);
    $id = validate($customers_id);
    $fetchDataCustomersDetails = fetch_data_customers_detail($db, $tableNameCustomers, $columnsCustomers, $id);
}

function fetch_data_customers_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE customers_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

// VERITABANINDA MUSTERI GUNCELLEME KODLARI
if (isset($_POST['customers-update'])) {
    $customers_id = mysqli_real_escape_string($db, $_POST['customers_id']);
    $customers_name = mysqli_real_escape_string($db, $_POST['customers_name']);
    $customers_surname = mysqli_real_escape_string($db, $_POST['customers_surname']);
    $customers_phone = mysqli_real_escape_string($db, $_POST['customers_phone']);
    $customers_address = mysqli_real_escape_string($db, $_POST['customers_address']);
    $customers_email = mysqli_real_escape_string($db, $_POST['customers_email']);
    $customers_note = mysqli_real_escape_string($db, $_POST['customers_note']);
    $customers_publicy = isset($_POST['customers_publicy']) ? 1 : 0;

    $select_query = "SELECT * FROM customers WHERE customers_id = '$customers_id'";
    $result = mysqli_query($db, $select_query);
    $row = mysqli_fetch_assoc($result);

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    $update_query = "UPDATE customers SET 
        customers_name = '$customers_name',
        customers_surname = '$customers_surname',
        customers_phone = '$customers_phone',
        customers_address = '$customers_address',
        customers_email = '$customers_email',
        customers_note = '$customers_note',
        customers_publicy = '$customers_publicy',
        customers_currentDateTime = '$currentDateTime'
        WHERE customers_id = '$customers_id'";

    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        header('location: app-customers.php');
    } else {
        $errors[] = "Work could not be updated: " . mysqli_error($db);
    }
}

// VERITABANINDAN MUSTERI SILME KODLARI
if (isset($_GET['deleteCustomers'])) {
    $id = validate($_GET['deleteCustomers']);
    $condition = ['customers_id' => $id];
    $deleteMsg = delete_data_customers($db, $tableNameCustomers, $condition);
    header("location:app-customers.php");
}

function delete_data_customers($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}



//****************************************************** İŞLEM LOGLARI ILE ILGILI KODLAR *******************************************************/

$tableNameLogstypes = " logs";
$columnsLogstypes = ['logs_id', 'logs_type', 'logs_process', 'logs_currentdatetime'];

//VERITABANINDAN ODEME SEKLI LISTESINE VERI CEKME KODLARI 
$fetchDataLogsTypes = fetch_data_logs_types($db, $tableNameLogstypes, $columnsLogstypes);
function fetch_data_logs_types($db, $tableName, $columns)
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
        $query .= " logs_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Odeme Sekli Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}



//****************************************************** MASALAR  ILE ILGILI KODLAR *******************************************************/


$tableNameTablestypes = "tables";
$columnsTablestypes = ['tables_id', 'tables_number', 'tables_name', 'tables_role', 'tables_currrentdatetime'];

if (isset($_POST['app-tables-ad'])) {
    // Verileri güvenli hale getirme
    $app_tables_name = mysqli_real_escape_string($db, $_POST['tables_name']);
    $app_tables_number = mysqli_real_escape_string($db, $_POST['tables_number']);
    $app_tables_role = mysqli_real_escape_string($db, $_POST['tables_role']);

    // Hata kontrolü
    $errors = [];
    if (empty($app_tables_name) || empty($app_tables_number) || empty($app_tables_role)) {
        array_push($errors, "Sütunların doldurulması zorunludur.");
    }

    // Hatalar yoksa veritabanına ekle
    if (count($errors) == 0) {
        // Veritabanına veri ekleme sorgusu
        $insert_query = "INSERT INTO tables (tables_name, tables_number, tables_role,tables_currrentdatetime) VALUES (?, ?, ?, NOW())";

        // Hazırlanmış ifadeler (Prepared statements) kullanarak sorguyu çalıştırma
        $stmt = $db->prepare($insert_query);

        if ($stmt === false) {
            // Prepare başarısız olduysa hata göster
            die('Veritabanı hatası: ' . htmlspecialchars($db->error));
        }

        // Değişkenleri yer tutuculara bağlama
        $stmt->bind_param("sss", $app_tables_name, $app_tables_number, $app_tables_role);

        // Sorguyu çalıştırma
        if ($stmt->execute()) {
            $stmt->close();
            header('Location: app-tables-settings.php');
            exit; // Yönlendirme sonrası scriptin çalışmasını sonlandır
        } else {
            // Execute başarısız olduysa hata göster
            die('Veritabanı hatası: ' . htmlspecialchars($stmt->error));
        }
    } else {
        // Hata mesajlarını gösterme
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}


//VERITABANINDAN MASA EKELMEE SAYFASA LISTESINE VERI CEKME KODLARI 
$fetchDataTablesTypes = fetch_data_tabels_types($db, $tableNameTablestypes, $columnsTablestypes);
function fetch_data_tabels_types($db, $tableName, $columns)
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
        $query .= " tables_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Odeme Sekli Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}
//VERITABANINDAN MASA  GÜNCELLEME SAYFASINA VERI CEKME KODLARI 
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $app_tables_id = end($url_segments);
    $id = validate($app_tables_id);
    $fetchDataApptablesUpdate = fetch_data_app_tables_update($db, $tableNameTablestypes, $columnsTablestypes, $id);
}
function fetch_data_app_tables_update($db, $tableName, $columns, $id)
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
        $query .= " WHERE tables_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

if (isset($_POST['App-tables-update'])) {
    // Veritabanı bağlantısını $db değişkeniyle sağladığınızı varsayalım

    // Verileri güvenli hale getirme
    $app_tables_id = mysqli_real_escape_string($db, $_POST['tables_id']);
    $app_tables_number = mysqli_real_escape_string($db, $_POST['tables_number']);
    $app_tables_name = mysqli_real_escape_string($db, $_POST['tables_name']);
    $app_tables_role = mysqli_real_escape_string($db, $_POST['tables_role']);



    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME, 'tr_TR.utf8');
    $gunler = array(
        'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
    );
    $aylar = array(
        'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
    );
    $gun = $gunler[date('w')];
    $ay = $aylar[date('n') - 1];
    $gunAyYil = date('d') . ' ' . $ay . ' ' . date('Y');
    $saatDakika = date('H:i');
    $currentDateTime = $gunAyYil . ' ' . $saatDakika;

    // Boş değer kontrolü
    if (empty($app_tables_id) || empty($app_tables_number) || empty($app_tables_name) || empty($app_tables_role)) {
        die("Tüm alanlar doldurulmalıdır.");
    }

    // Kullanıcıyı veritabanında kontrol et
    $select_query = "SELECT * FROM tables WHERE tables_id = '$app_tables_id'";
    $result = mysqli_query($db, $select_query);

    if (mysqli_num_rows($result) == 0) {
        die("Veritabanında böyle bir kayıt bulunamadı.");
    }

    // UPDATE sorgusunu oluştur
    $update_query = "UPDATE tables SET 
        tables_number = '$app_tables_number',
        tables_name = '$app_tables_name',
        tables_role = '$app_tables_role',
        tables_currrentdatetime = '$currentDateTime'
        WHERE tables_id = '$app_tables_id'";

    // UPDATE sorgusunu çalıştır
    $update_result = mysqli_query($db, $update_query);






    if ($update_result) {
        // Başarılı güncelleme durumunda yönlendirme yap
        header('location: app-tables-settings.php');
        exit();
    } else {
        // Hata durumunda hata mesajı göster
        die("Güncelleme hatası: " . mysqli_error($db));
    }
}


// VERITABANINDAN  MASA  SILME KODLARI
if (isset($_GET['deleteTablesId'])) {
    $id = validate($_GET['deleteTablesId']);
    $condition = ['tables_id' => $id];
    $deleteMsg = delete_data_tables_types($db, $tableNameTablestypes, $condition);
    header("location:app-tables-settings.php");
}

function delete_data_tables_types($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}


$tableNameTable = "tables";
$columnsTables = ['tables_id', 'tables_number', 'tables_name', 'tables_role', 'tables_currrentdatetime'];
//VERITABANINDAN MASA EKELMEE SAYFASA LISTESINE VERI CEKME KODLARI 
$fetchDataTable = fetch_data_table_types($db, $tableNameTable, $columnsTables);
function fetch_data_table_types($db, $tableName, $columns)
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
        $query .= " tables_id";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Odeme Sekli Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}



/****************************************************** GÜN İŞLEMLERİ ILE ILGILI KODLAR *******************************************************/


// POST isteği kontrolü
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gün başı işlemi
    if (isset($_POST['perday'])) {

        // Gün başı işlemi için tarih ve saat bilgisi
        date_default_timezone_set('Europe/Istanbul');
        setlocale(LC_TIME, 'tr_TR.utf8');

        $gunler = array(
            'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
        );
        $aylar = array(
            'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
        );

        $gun = $gunler[date('w')];
        $ay = $aylar[date('n') - 1];

        // Yeni tarih ve saat formatı
        $gunAyYil = date('d-m-Y H:i:s');
        $zaman_damgasi = $gunAyYil;

        // Gün başı işlemi için INSERT sorgusu
        $insert_query = "INSERT INTO day_operations (day_perday, day_endoftheday) VALUES (?, NULL)";

        $stmt = $db->prepare($insert_query);
        $stmt->bind_param("s", $zaman_damgasi);

        if ($stmt->execute()) {
            echo "Gün başı işlemi başarıyla kaydedildi.";
        } else {
            echo "Veritabanı hatası: " . htmlspecialchars($stmt->error);
        }
    }

    // Gün sonu işlemi
    if (isset($_POST['endofday'])) {
        // Gün başı işlemi için tarih ve saat bilgisi
        date_default_timezone_set('Europe/Istanbul');
        setlocale(LC_TIME, 'tr_TR.utf8');

        $gunler = array(
            'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
        );
        $aylar = array(
            'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
        );

        $gun = $gunler[date('w')];
        $ay = $aylar[date('n') - 1];

        // Yeni tarih ve saat formatı
        $gunAyYil = date('d-m-Y H:i:s');
        $zaman_damgasi = $gunAyYil;

        // Gün sonu işlemi için UPDATE sorgusu
        $update_query = "UPDATE day_operations SET day_endoftheday = ? WHERE day_endoftheday IS NULL ORDER BY day_perday DESC LIMIT 1";

        $stmt = $db->prepare($update_query);
        $stmt->bind_param("s", $zaman_damgasi);

        if ($stmt->execute()) {
            echo "Gün sonu işlemi başarıyla kaydedildi.";
        } else {
            echo "Veritabanı hatası: " . htmlspecialchars($stmt->error);
        }
    }
}


$tableNameLogstypes = "day_operations";
$columnsLogstypes = ['day_id', 'day_perday', 'day_endoftheday'];
//VERITABANINDAN ODEME SEKLI LISTESINE VERI CEKME KODLARI 
$fetchDataDayTypes = fetch_data_day_types($db, $tableNameLogstypes, $columnsLogstypes);
function fetch_data_day_types($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM " . $tableName;
        $query .= " ORDER BY day_id DESC";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Odeme Sekli Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


/****************************************************** GİDER TABLOSU  ILE ILGILI KODLAR *******************************************************/
// GİDER  HESABINDAN VERİLERİ ÇEKME
$tableNameExpense = "expense";
$columnsExpenseCategory = ['expense_id', 'expense_explanation', 'expense_type', 'expense_amount', 'expense_paymentype', 'expense_currentdatetime'];

if (isset($_POST['app-expense-ad'])) {
    $expense_explanation = mysqli_real_escape_string($db, $_POST['expense_explanation']);
    $expense_type = mysqli_real_escape_string($db, $_POST['expense_type']);
    $expense_amount = mysqli_real_escape_string($db, $_POST['expense_amount']);
    $expense_paymentype_id = mysqli_real_escape_string($db, $_POST['expense_paymentype']);

    // Check if payment type name is fetched successfully
    if (!empty($expense_paymentype_id)) {
        // Türkiye saati ve tarih ayarlama
        date_default_timezone_set('Europe/Istanbul');
        setlocale(LC_TIME, 'tr_TR.utf8');

        $gunler = array(
            'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
        );
        $aylar = array(
            'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
        );

        $gun = $gunler[date('w')];
        $ay = $aylar[date('n') - 1];

        // Yeni tarih ve saat formatı
        $gunAyYil = date('d-m-Y H:i:s');
        $currentDateTime = $gunAyYil;

        // Insert into database using the fetched payment type name
        $query = "INSERT INTO expense (expense_explanation, expense_type, expense_amount, expense_paymentype, expense_currentdatetime) 
                  VALUES ('$expense_explanation', '$expense_type', '$expense_amount', '$expense_paymentype_id', '$currentDateTime')";
        $post_data_query = mysqli_query($db, $query);

        if ($post_data_query) {
            header('location: app-expense.php');
        } else {
            $errors[] = "Expense could not be added: " . mysqli_error($db);
        }
    } else {
        $errors[] = "Invalid payment type selected.";
    }
}

$fetchDataExpense = fetch_data_expense($db, $tableNameExpense, $columnsExpenseCategory);

function fetch_data_expense($db, $tableName, $columns)
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
        $query .= " ORDER BY expense_id";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Urun Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

//VERITABANINDAN URUN KATEGORISINI CEKME KODLARI
function fetch_data_expense_payment_detail($db, $tableName, $columns, $id)
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
        $query .= " WHERE id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


//VERITABANINDAN MASA  GÜNCELLEME SAYFASINA VERI CEKME KODLARI 
if (isset($_SERVER['REQUEST_URI'])) {
    $url_segments = explode('/', $_SERVER['REQUEST_URI']);
    $app_expense_id = end($url_segments);
    $id = validate($app_expense_id);
    $fetchDataExpenseUpdate = fetch_data_app_expense_update($db, $tableNameExpense, $columnsExpenseCategory, $id);
}
function fetch_data_app_expense_update($db, $tableName, $columns, $id)
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
        $query .= " WHERE expense_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

//GİDER TABLOSU GÜNCELLEME KODLARI
if (isset($_POST['app-expense-update'])) {
    // Veritabanı bağlantısını $db değişkeniyle sağladığınızı varsayalım

    // Verileri güvenli hale getirme
    $app_expense_id = mysqli_real_escape_string($db, $_POST['expense_id']);
    $app_expense_explanation = mysqli_real_escape_string($db, $_POST['expense_explanation']);
    $app_expense_type = mysqli_real_escape_string($db, $_POST['expense_type']);
    $app_expense_amount = mysqli_real_escape_string($db, $_POST['expense_amount']);
    $app_expense_paymentype_id = mysqli_real_escape_string($db, $_POST['expense_paymentype']);



    // Check if payment type name is fetched successfully
    if (!empty($app_expense_paymentype_id)) {
        date_default_timezone_set('Europe/Istanbul');
        setlocale(LC_TIME, 'tr_TR.utf8');

        $gunler = array(
            'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
        );
        $aylar = array(
            'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
        );

        $gun = $gunler[date('w')];
        $ay = $aylar[date('n') - 1];

        // Yeni tarih ve saat formatı
        $gunAyYil = date('d-m-Y H:i:s');
        $currentDateTime = $gunAyYil;

        // Boş değer kontrolü
        if (empty($app_expense_id) || empty($app_expense_explanation) || empty($app_expense_type) || empty($app_expense_amount)) {
            die("Tüm alanlar doldurulmalıdır.");
        }

        // Kullanıcıyı veritabanında kontrol et
        $select_query = "SELECT * FROM expense WHERE expense_id = '$app_expense_id'";
        $result = mysqli_query($db, $select_query);

        if (mysqli_num_rows($result) == 0) {
            die("Veritabanında böyle bir kayıt bulunamadı.");
        }

        // UPDATE sorgusunu oluştur
        $update_query = "UPDATE expense SET 
            expense_explanation = '$app_expense_explanation',
            expense_type = '$app_expense_type',
            expense_amount = '$app_expense_amount',
            expense_paymentype = '$app_expense_paymentype_id',
            expense_currentdatetime = '$currentDateTime'
            WHERE expense_id = '$app_expense_id'";

        // UPDATE sorgusunu çalıştır
        $update_result = mysqli_query($db, $update_query);

        if ($update_result) {
            // Başarılı güncelleme durumunda yönlendirme yap
            header('location: app-expense.php');
            exit();
        } else {
            // Hata durumunda hata mesajı göster
            die("Güncelleme hatası: " . mysqli_error($db));
        }
    } else {
        die("Geçersiz ödeme tipi seçildi.");
    }
}

// VERITABANINDAN  GİDER  SILME KODLARI
if (isset($_GET['deleteExpenseId'])) {
    $id = validate($_GET['deleteExpenseId']);
    $condition = ['expense_id' => $id];
    $deleteMsg = delete_data_expense_types($db, $tableNameExpense, $condition);
    header("location:app-expense.php");
}

function delete_data_expense_types($db, $tableName, $condition)
{
    $conditionData = '';
    $i = 0;
    foreach ($condition as $index => $data) {
        $and = ($i > 0) ? ' AND ' : '';
        $conditionData .= $and . $index . " = " . "'" . $data . "'";
        $i++;
    }

    $query = "DELETE FROM " . $tableName . " WHERE " . $conditionData;
    $result = $db->query($query);
    if ($result) {
        $msg = "data was deleted successfully";
    } else {
        $msg = $db->error;
    }
    return $msg;
}



/****************************************************** ADİSYON ILE ILGILI KODLAR *******************************************************/


$tableNameOrders = "orders";
$columnsOrders = ['id', 'order_type', 'desk_number', 'created_at', 'order_status', 'order_activity'];

$tableNameOrderItems = "order_items";
$columnsOrderItems = ['id', 'order_id', 'product_id', 'product_category_id', 'product_name', 'product_size', 'product_price', 'product_quantity', 'payment_type', 'users_id', 'business_id', 'order_currentDateTime'];

$fetchDataOrdersForAdditions = fetch_data_orders_for_additions($db, $tableNameOrders, $columnsOrders);

function fetch_data_orders_for_additions($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM " . $tableName;
        $query .= " ORDER BY created_at DESC";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "Odeme Sekli Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_order_items_for_additions($db, $tableName, $columns, $id)
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
        $query .= " WHERE order_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_order_items_total_price_for_additions($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        return "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        return "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        return "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT SUM(product_price) AS total_price FROM $tableName";
        $query .= " WHERE order_id = '$id' LIMIT 1";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_price = $row['total_price'];
                return $total_price;
            } else {
                return "No data found";
            }
        } else {
            return "Query error: " . $db->error;
        }
    }
}

function fetch_data_users_for_additions($db, $tableName, $columns, $id)
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
        $query .= " WHERE users_id = '$id' LIMIT 1";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_business_for_additions($db, $tableName, $columns, $id)
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
        $query .= " WHERE business_id = '$id' LIMIT 1";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_payment_type_for_additions($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        return "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        return "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        return "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE id = '$id' LIMIT 1";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row; // Doğrudan $row'u döndür
            } else {
                return "No data found";
            }
        } else {
            return "Query error: " . $db->error;
        }
    }
}





function fetch_data_order_items_for_additions_detail_page($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        return "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        return "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        return "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE order_id = '$id'"; // Use WHERE clause to filter by order_id
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $rows = array();
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows; // Return array of fetched rows
            } else {
                return "Sipariş Detayı Bulunamadı!";
            }
        } else {
            return "Query error: " . $db->error;
        }
    }
}


function fetch_data_category_for_additions_detail_page($db, $tableName, $columns, $id)
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
        $query .= " WHERE product_category_id = '$id' LIMIT 1";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_product_for_additions_detail_page($db, $tableName, $columns, $id)
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
        $query .= " WHERE product_id = '$id' LIMIT 1";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $msg = $row;
            } else {
                $msg = "No data found";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_orders_for_additions_detail_page($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        return "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        return "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        return "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE id = '$id' LIMIT 1";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row; // Doğrudan $row'u döndür
            } else {
                return "No data found";
            }
        } else {
            return "Query error: " . $db->error;
        }
    }
}