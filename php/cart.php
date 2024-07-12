<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

error_reporting(E_ALL);

$errors = array();

include_once('errors.php');
include_once('dbconnect.php');
include_once('sessionControl.php');

// Function to validate input
function validate($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

// Function to split sentence by comma
function splitByComma($sentence)
{
    $words = preg_split('/\s*,\s*/', $sentence, -1, PREG_SPLIT_NO_EMPTY);
    return $words;
}

// Function to clean Turkish characters
function cleanTurkishCharacters($text)
{
    $turkishCharacters = array('ç', 'ğ', 'ı', 'i', 'ö', 'ş', 'ü', 'Ç', 'Ğ', 'İ', 'Ö', 'Ş', 'Ü', ' ', "'");
    $englishCharacters = array('c', 'g', 'i', 'i', 'o', 's', 'u', 'C', 'G', 'I', 'O', 'S', 'U', '-', '');

    $cleanedText = str_replace($turkishCharacters, $englishCharacters, $text);
    $cleanedText = preg_replace('/[^A-Za-z0-9\-]/', '', $cleanedText); // Remove special characters
    $cleanedText = strtolower($cleanedText); // Convert to lowercase

    return $cleanedText;
}

// Function to clean phone number
function cleanPhoneNumber($phoneNumber)
{
    $cleanedNumber = str_replace(['(', ')', ' '], '', $phoneNumber);
    return $cleanedNumber;
}
/*
echo "<pre>";
print_r($_GET);
echo "</pre>";
*/

// Check if addCart is set
if (isset($_GET['addCart'])) {
    // Ensure all required POST variables are set
    if (isset($_POST['product_id'], $_POST['product_category_id'], $_POST['product_name'], $_POST['product_info'], $_POST['product_small_price'], $_POST['product_middle_price'], $_POST['product_big_price'], $_POST['product_normal_price'], $_POST['product_image'], $_POST['product_currentDateTime'], $_POST['product_publicy'])) {
        // Validate inputs
        $product_price = validate($_GET['addCart']);
        $product_size = validate($_POST['product_size']);
        $product_id = validate($_POST['product_id']);
        $product_category_id = validate($_POST['product_category_id']);
        $product_name = validate($_POST['product_name']);
        $product_info = validate($_POST['product_info']);
        $product_small_price = validate($_POST['product_small_price']);
        $product_middle_price = validate($_POST['product_middle_price']);
        $product_big_price = validate($_POST['product_big_price']);
        $product_normal_price = validate($_POST['product_normal_price']);
        $product_image = validate($_POST['product_image']);
        $product_currentDateTime = validate($_POST['product_currentDateTime']);
        $product_publicy = validate($_POST['product_publicy']);

        // Fetch product data from database
        $query = "SELECT * FROM product WHERE product_id = $product_id";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Initialize session cart if not set
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // Determine the next cart_id
            $cart_id = 1; // Başlangıç değeri
            if (!empty($_SESSION['cart'])) {
                // Eğer sepet doluysa, son cart_id değerinden bir fazlasını al
                $last_item = end($_SESSION['cart']);
                $cart_id = $last_item['cart_id'] + 1;
            }

            // Create cart array with cart_id
            $cart = array(
                'cart_id' => $cart_id,
                'product_price' => $product_price,
                'product_size' => $product_size,
                'product_id' => $row['product_id'],
                'product_category_id' => $row['product_category_id'],
                'product_name' => $row['product_name'],
                'product_info' => $row['product_info'],
                'product_small_price' => $row['product_small_price'],
                'product_middle_price' => $row['product_middle_price'],
                'product_big_price' => $row['product_big_price'],
                'product_normal_price' => $row['product_normal_price'],
                'product_image' => $row['product_image'],
                'product_currentDateTime' => $row['product_currentDateTime'],
                'product_publicy' => $row['product_publicy']
            );

            // Add product to cart
            $_SESSION['cart'][] = $cart;

            // Redirect to cart page
            header('Location: index.php');
            exit;
        } else {
            echo "Ürün bulunamadı.";
        }
    } else {
        echo "Gerekli ürün bilgileri eksik.";
    }
} /*else {
    echo "addCart parametresi set edilmemiş.";
}*/

$tableNameProductCategory = "product_category";
$columnsProductCategory = ['product_category_id', 'product_category_name', 'product_category_description', 'product_category_currentDateTime', 'product_category_publicy'];
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



$tableNameProduct = "product";
$columnsProduct = ['product_id', 'product_category_id', 'product_name', 'product_info', 'product_small_price', 'product_middle_price', 'product_big_price', 'product_normal_price', 'product_image', 'product_currentDateTime', 'product_publicy'];

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


$tableNamePaymentTypes  = "payment_types";
$columnsPaymentTypes = ['id', 'payment_types_name', 'payment_types_publicy', 'payment_types_currentDateTime'];

// ODEME TIPLERI VERILERINI CEKME KODLARI
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
        $query .= " ORDER BY id ASC";
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

if (isset($_POST['order-self-close'])) {
    $order_type = "SELF";
    $desk_number = "0";

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


    // Veritabanına müşteri bilgilerini kaydet
    $stmt = $db->prepare("INSERT INTO orders (order_type, desk_number, created_at, order_status, order_activity) VALUES (?, ?, ?, ?, ?)");
    $status = "0"; // $status değişkeni eklenerek
    $order_activity = "1";
    $stmt->bind_param("sssss", $order_type, $desk_number, $currentDateTime, $status, $order_activity);
    $stmt->execute();
    $order_id = $stmt->insert_id; // Eklenen siparişin ID'si
    $stmt->close();

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $payment_types_name = validate($_POST['payment_types_name']);
            $product_quantity = validate($_POST['product_quantity']);
            $users_id = validate($_POST['users_id']);
            $business_id = validate($_POST['business_name']);

            $product_id = $product['product_id'];
            $product_category_id = $product['product_category_id'];
            $product_name = $product['product_name'];
            $product_size = $product['product_size'];
            $product_price = $product['product_price'];

            $stmt = $db->prepare("INSERT INTO order_items (order_id, product_id, product_category_id, product_name, product_size, product_price, product_quantity, payment_type, users_id, business_id, order_currentDateTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $order_id, $product_id, $product_category_id, $product_name, $product_size, $product_price, $product_quantity, $payment_types_name, $users_id, $business_id, $currentDateTime);
            $stmt->execute();
            $stmt->close();
        }

        // Sepeti temizle
        unset($_SESSION['cart']);

        header('location: index.php');
    }
}

if (isset($_POST['order-self'])) {
    $order_type = "SELF";
    $desk_number = "0";

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

    $stmt = $db->prepare("INSERT INTO orders (order_type, desk_number, created_at, order_status, order_activity) VALUES (?, ?, ?, ?, ?)");
    $status = "0";
    $order_activity = "0";
    $stmt->bind_param("sssss", $order_type, $desk_number, $currentDateTime, $status, $order_activity);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            
            $payment_types_name = validate($_POST['payment_types_name']);
            $product_quantity = validate($_POST['product_quantity']);
            $users_id = validate($_POST['users_id']);
            $business_id = validate($_POST['business_name']);

            $product_id = $product['product_id'];
            $product_category_id = $product['product_category_id'];
            $product_name = $product['product_name'];
            $product_size = $product['product_size'];
            $product_price = $product['product_price'];

            $stmt = $db->prepare("INSERT INTO order_items (order_id, product_id, product_category_id, product_name, product_size, product_price, product_quantity, payment_type, users_id, business_id, order_currentDateTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $order_id, $product_id, $product_category_id, $product_name, $product_size, $product_price, $product_quantity, $payment_types_name, $users_id, $business_id, $currentDateTime);
            $stmt->execute();
            $stmt->close();
        }
        // Sepeti temizle
        unset($_SESSION['cart']);

        header('location: index.php');
        exit; // İşlemi sonlandır
    }
}


// İŞLETME HESABINDAN VERİLERİ ÇEKME
$tableNameBusiness = "business";
$columnsBusinessCategory = ['business_id', 'business_name', 'business_country', 'business_city', 'business_province', 'business_district', 'business_telephone', 'business_address', 'business_tip'];
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
