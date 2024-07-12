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

//****************************************************** GUN SONU RAPORU ILE ILGILI KODLAR *******************************************************/

$tableNameBusiness = "business";
$columnsBusinessCategory = ['business_id', 'business_name', 'business_country', 'business_city', 'business_province', 'business_district', 'business_telephone', 'business_address', 'business_tip'];

$tableNameDayOperationsTypes = "day_operations";
$columnsDayOperationTypes = ['day_id', 'day_perday', 'day_endoftheday'];

$tableNameOrderItems = "order_items";
$columnsOrderItems = ['id', 'order_id', 'product_id', 'product_category_id', 'product_name', 'product_size', 'product_price', 'product_quantity', 'payment_type', 'users_id', 'business_id', 'order_currentDateTime'];

$tableNamePaymentTypes = "payment_types";
$columnsPaymentTypes = ['id', 'payment_types_name', 'payment_types_publicy', 'payment_types_currentDateTime'];

$tableNameExpense = "expense";
$columnsExpense = ['expense_id', 'expense_explanation', 'expense_type', 'expense_amount', 'expense_paymentype', 'expense_currentdatetime'];

$tableNameUsers = "users";
$columnsUsers = ['users_id', 'business_name', 'users_name', 'users_psw', 'users_role', 'users_role'];

$tableNameBusiness = "business";
$columnsBusiness = ['business_id', 'business_name', 'business_country', 'business_city', 'business_province', 'business_district', 'business_telephone', 'business_address', 'business_tip'];

$tableNameOrders = "orders";
$columnsOrders = ['id', 'order_type', 'desk_number', 'created_at', 'order_status', 'order_activity'];

$tableNameCategory = "product_category";
$columnsCategory = ['product_category_id', 'product_category_name', 'product_category_description', 'product_category_currentDateTime', 'product_category_publicy'];


$totalOrderPrice = 0;
$totalExpensePrice = 0;
$totalRemainingAmount = 0;


$fetchLatestDayOperations = fetch_latest_day_operations_row($db, $tableNameDayOperationsTypes, $columnsDayOperationTypes);
$day_perday = $fetchLatestDayOperations['day_perday'];
$day_endoftheday = '01-01-2030 23:59:59';


if (isset($_POST['report-filter'])) {
    $day_operations_id = mysqli_real_escape_string($db, $_POST['day_operations']);
    $dayOperationsFilterValue = fetch_data_day_operations_id_control($db, $tableNameDayOperationsTypes, $columnsDayOperationTypes, $day_operations_id);

    if (isset($dayOperationsFilterValue['error'])) {
        echo "Error: " . $dayOperationsFilterValue['error'];
    } else {
        $day_perday = $dayOperationsFilterValue['day_perday'];
        $day_endoftheday = $dayOperationsFilterValue['day_endoftheday'];

        if (empty($day_endoftheday)) {
            $day_endoftheday = '01-01-2030 23:59:59';
        }
 
        $fetchDataOrderItemsForEndOfDay = fetch_data_order_items_for_end_of_day($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
        $fetchDataOrderItemsForUserSales = fetch_data_order_items_for_user_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
        $fetchDataOrderItemsForRegionalSales = fetch_data_order_items_for_regional_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
        $fetchDataOrderItemsForUsersWhoSales = fetch_data_order_items_for_users_who_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
        $fetchDataOrderItemsForProductCategorySales = fetch_data_order_items_for_product_category_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
        $fetchDataOrderItemsForProductSales = fetch_data_order_items_for_product_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
        $fetchDataOrderForExpenseProduct = fetch_data_order_for_expense_product($db, $tableNameExpense, $columnsExpense, $day_perday, $day_endoftheday);
        $fetchDataDayOperations = fetch_data_day_operations($db, $tableNameDayOperationsTypes, $columnsDayOperationTypes);
        $fetchDataExpenseForİncomeTable = fetch_data_expense_for_income_table($db, $tableNameExpense, $columnsExpense, $day_perday, $day_endoftheday);
    }
}

if (isset($_POST['date-report-filter'])) {
    $day_perday = mysqli_real_escape_string($db, $_POST['day_perday']);
    $day_endoftheday = mysqli_real_escape_string($db, $_POST['day_endoftheday']);

    function convertToCustomFormat($isoDateTime)
    {
        $date = new DateTime($isoDateTime);
        return $date->format('d-m-Y H:i:s');
    }

    $day_perday = convertToCustomFormat($day_perday);
    $day_endoftheday = convertToCustomFormat($day_endoftheday);

    $fetchDataOrderItemsForEndOfDay = fetch_data_order_items_for_end_of_day($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
    $fetchDataOrderItemsForUserSales = fetch_data_order_items_for_user_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
    $fetchDataOrderItemsForRegionalSales = fetch_data_order_items_for_regional_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
    $fetchDataOrderItemsForUsersWhoSales = fetch_data_order_items_for_users_who_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
    $fetchDataOrderItemsForProductCategorySales = fetch_data_order_items_for_product_category_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
    $fetchDataOrderItemsForProductSales = fetch_data_order_items_for_product_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
    $fetchDataOrderForExpenseProduct = fetch_data_order_for_expense_product($db, $tableNameExpense, $columnsExpense, $day_perday, $day_endoftheday);
    $fetchDataDayOperations = fetch_data_day_operations($db, $tableNameDayOperationsTypes, $columnsDayOperationTypes);
    $fetchDataExpenseForİncomeTable = fetch_data_expense_for_income_table($db, $tableNameExpense, $columnsExpense, $day_perday, $day_endoftheday);
}




























$fetchDataOrderItemsForEndOfDay = fetch_data_order_items_for_end_of_day($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
function fetch_data_order_items_for_end_of_day($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName, SUM(product_price) AS total_price FROM $tableName";
        $query .= " WHERE STR_TO_DATE(order_currentDateTime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";
        $query .= " GROUP BY payment_type";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "No data found!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_payment_types_for_end_of_day($db, $tableName, $columns, $id)
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

function fetch_data_expense_for_end_of_day($db, $tableName, $columns, $id, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName, SUM(expense_amount) AS total_expense_price FROM $tableName";
        $query .= " WHERE expense_paymentype = $id";
        $query .= " AND STR_TO_DATE(expense_currentdatetime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday' , '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";
        $query .= " GROUP BY expense_paymentype";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row[0]; // İlk satırı döndür
            } else {
                $msg = []; // Boş bir dizi döndür
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


$fetchDataExpenseForİncomeTable = fetch_data_expense_for_income_table($db, $tableNameExpense, $columnsExpense, $day_perday, $day_endoftheday);
function fetch_data_expense_for_income_table($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        return "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        return "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        return "Table name is empty";
    } else {
        // Prepare column names for SQL query
        $columnName = implode(", ", $columns);

        // Construct SQL query to sum expense_amount within the specified date range
        $query = "SELECT SUM(expense_amount) AS total_expense_price FROM $tableName WHERE";
        $query .= " STR_TO_DATE(expense_currentdatetime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";

        // Execute the query
        $result = $db->query($query);

        if ($result) {
            // Fetch the result
            $row = $result->fetch_assoc();

            // If no data or total expense is null, return 0
            $total_expense_price = $row['total_expense_price'] ?? 0;

            // Return the total expense price
            return ['total_expense_price' => $total_expense_price];
        } else {
            // Return error message if query fails
            return "Query error: " . $db->error;
        }
    }
}


$fetchDataOrderItemsForUserSales = fetch_data_order_items_for_user_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
function fetch_data_order_items_for_user_sales($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName, SUM(product_price) AS total_price FROM $tableName";
        $query .= " WHERE STR_TO_DATE(order_currentDateTime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";
        $query .= " GROUP BY users_id";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "No data found!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_users_for_user_sales($db, $tableName, $columns, $id)
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



$fetchDataOrderItemsForRegionalSales = fetch_data_order_items_for_regional_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
function fetch_data_order_items_for_regional_sales($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName, payment_type, SUM(product_price) AS total_price FROM $tableName";
        $query .= " WHERE STR_TO_DATE(order_currentDateTime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";
        $query .= " GROUP BY business_id, payment_type";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = [];
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_business_for_regional_sales($db, $tableName, $columns, $id)
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


$fetchDataOrderItemsForUsersWhoSales = fetch_data_order_items_for_users_who_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
function fetch_data_order_items_for_users_who_sales($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName, payment_type, SUM(product_price) AS total_price FROM $tableName";
        $query .= " WHERE STR_TO_DATE(order_currentDateTime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE(' $day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";
        $query .= " GROUP BY users_id, payment_type";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = [];
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


function fetch_data_order_items_for_general_information($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName, SUM(product_price) AS total_price FROM $tableName";
        $query .= " WHERE STR_TO_DATE(order_currentDateTime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row[0]; // Return the first row
            } else {
                $msg = [];
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


function fetch_data_order_for_general_information($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT COUNT(DISTINCT id) AS unique_orders FROM $tableName";
        $query .= " WHERE STR_TO_DATE(created_at, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $msg = $result->fetch_assoc();
            } else {
                $msg = [];
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_expense_for_general_information($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName, SUM(expense_amount) AS total_expense_price FROM $tableName";
        $query .= " WHERE STR_TO_DATE(expense_currentdatetime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row[0]; // Return the first row
            } else {
                $msg = []; // Return an empty array
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}



$fetchDataOrderItemsForProductCategorySales = fetch_data_order_items_for_product_category_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);

function fetch_data_order_items_for_product_category_sales($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "
            SELECT 
                $columnName, 
                SUM(product_price) AS total_price, 
                COUNT(*) AS total_orders 
            FROM 
                $tableName
            WHERE 
                STR_TO_DATE(order_currentDateTime, '%d-%m-%Y %H:%i') 
                BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') 
                AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')
            GROUP BY 
                product_category_id";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "No data found!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}

function fetch_data_category_for_product_category_sales($db, $tableName, $columns, $id)
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



$fetchDataOrderItemsForProductSales = fetch_data_order_items_for_product_sales($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
function fetch_data_order_items_for_product_sales($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "
            SELECT 
                $columnName, 
                SUM(product_price) AS total_price, 
                COUNT(*) AS total_orders 
            FROM 
                $tableName
            WHERE 
                STR_TO_DATE(order_currentDateTime, '%d-%m-%Y %H:%i') 
                BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') 
                AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')
            GROUP BY
                product_name";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "No data found!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}



$fetchDataOrderForExpenseProduct = fetch_data_order_for_expense_product($db, $tableNameExpense, $columnsExpense, $day_perday, $day_endoftheday);
function fetch_data_order_for_expense_product($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName, SUM(expense_amount) AS total_expense_price FROM $tableName";
        $query .= " WHERE STR_TO_DATE(expense_currentdatetime, '%d-%m-%Y %H:%i') BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')";
        $query .= " GROUP BY expense_id";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "No data found!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}



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


$fetchDataDayOperations = fetch_data_day_operations($db, $tableNameDayOperationsTypes, $columnsDayOperationTypes);
function fetch_data_day_operations($db, $tableName, $columns)
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
                $msg = "Gün İşlemleri Bulunamadi!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}


function fetch_data_day_operations_id_control($db, $tableName, $columns, $id)
{
    if (empty($db)) {
        return array("error" => "Database connection error");
    } elseif (empty($columns) || !is_array($columns)) {
        return array("error" => "Column names must be defined in the array");
    } elseif (empty($tableName)) {
        return array("error" => "Table name is empty");
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        $query .= " WHERE day_id = '$id'";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
            } else {
                return array("error" => "No data found");
            }
        } else {
            return array("error" => "Query error: " . $db->error);
        }
    }
}


function fetch_latest_day_operations_row($db, $tableName, $columns)
{
    if (empty($db)) {
        return array("error" => "Database connection error");
    } elseif (empty($columns) || !is_array($columns)) {
        return array("error" => "Column names must be defined in the array");
    } elseif (empty($tableName)) {
        return array("error" => "Table name is empty");
    } else {
        // Select the latest row based on day_id
        $columnName = implode(", ", $columns);
        $query = "SELECT $columnName FROM $tableName ORDER BY day_id DESC LIMIT 1";
        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row; // Return the fetched row as an array
            } else {
                return array("error" => "No data found");
            }
        } else {
            return array("error" => "Query error: " . $db->error);
        }
    }
}


$fetchDataOrderItemsForİncomeTable = fetch_data_order_items_for_income_table($db, $tableNameOrderItems, $columnsOrderItems, $day_perday, $day_endoftheday);
function fetch_data_order_items_for_income_table($db, $tableName, $columns, $day_perday, $day_endoftheday)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Column names must be defined in the array";
    } elseif (empty($tableName)) {
        $msg = "Table name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "
            SELECT 
                $columnName, 
                SUM(product_price) AS total_price, 
                COUNT(*) AS total_orders 
            FROM 
                $tableName
            WHERE 
                STR_TO_DATE(order_currentDateTime, '%d-%m-%Y %H:%i') 
                BETWEEN STR_TO_DATE('$day_perday', '%d-%m-%Y %H:%i') 
                AND STR_TO_DATE('$day_endoftheday', '%d-%m-%Y %H:%i')
            GROUP BY
                product_name";

        $result = $db->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = array();
                while ($data = $result->fetch_assoc()) {
                    $row[] = $data;
                }
                $msg = $row;
            } else {
                $msg = "No data found!";
            }
        } else {
            $msg = "Query error: " . $db->error;
        }
    }

    return $msg;
}
