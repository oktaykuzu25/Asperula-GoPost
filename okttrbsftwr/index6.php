<?php
include "../php/cart.php";

if (isset($_POST['clear-cart'])) {
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}

if (isset($_GET['remove_product_id'])) {
    $removeProductId = $_GET['remove_product_id'];
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['cart_id'] == $removeProductId) {
                unset($_SESSION['cart'][$index]);
            }
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    echo '<script>window.location.href = "app-cart.php";</script>';
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Asperula Kafe - Sipariş Sistemi Paneli </title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico" />
    <link href="../layouts/modern-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/modern-light-menu/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" href="../src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="../src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link href="../src/plugins/src/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../src/plugins/src/sweetalerts2/sweetalerts2.css">

    <link href="../src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/components/tabs.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../src/assets/css/light/elements/alert.css">

    <link href="../src/plugins/css/light/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/light/notification/snackbar/custom-snackbar.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../src/assets/css/light/forms/switches.css">
    <link href="../src/assets/css/light/components/list-group.css" rel="stylesheet" type="text/css">

    <link href="../src/assets/css/light/users/account-setting.css" rel="stylesheet" type="text/css" />

    <link href="../src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/components/tabs.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../src/assets/css/dark/elements/alert.css">

    <link href="../src/plugins/css/dark/sweetalerts2/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/dark/notification/snackbar/custom-snackbar.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../src/assets/css/dark/forms/switches.css">
    <link href="../src/assets/css/dark/components/list-group.css" rel="stylesheet" type="text/css">

    <link href="../src/assets/css/dark/users/account-setting.css" rel="stylesheet" type="text/css" />

    <link href="../src/assets/css/light/scrollBar.css" rel="stylesheet" type="text/css" />

    <link href="../src/style.css" rel="stylesheet" type="text/css" />


    <style>
        .app-menu-product-section {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
        }

        .app-menu-product-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .app-menu-product-section>* {
            position: relative;
            z-index: 2;
            /* updated from 99 to 2 */
        }

        .layout-spacing .section {
            height: 100%;
        }

        /* Dropdown menu için gerekli ayarlar */
        .dropdown-menu {
            position: absolute;
            z-index: 1050;
            /* Bootstrap default for dropdowns */
        }

        /* Dropdown toggle için daha yüksek z-index */
        .dropdown-toggle {
            position: relative;
            z-index: 1060;
            /* Ensure it is higher than section */
        }

        /* Dropdown itemler için daha yüksek z-index */
        .dropdown-item {
            position: relative;
            z-index: 1060;
            /* Ensure it is higher than section */
        }

        .scrollable {
            max-height: 500px;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>

    <!--  END CUSTOM STYLE FILE  -->
</head>

<body class="alt-menu layout-boxed">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!-- Begin Navbar -->
    <?php include "website_parts/navbar.php" ?>
    <!-- End Navbar -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="./index.php">
                                <img src="../src/assets/img/logo.svg" class="navbar-logo" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="./index.php" class="nav-link"> ASPERULA </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left">
                                <polyline points="11 17 6 12 11 7"></polyline>
                                <polyline points="18 17 13 12 18 7"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="profile-info">
                    <div class="user-info">
                        <div class="profile-img">
                            <img src="../src/assets/img/profile-30.png" alt="avatar">
                        </div>
                        <div class="profile-content">
                            <h6 class="">Ismail Celebi</h6>
                            <p class="">Mudur</p>
                        </div>
                    </div>
                </div>

                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu active">
                        <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Yönetim Paneli</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">
                            <li class="active">
                                <a href="./index.php"> POS </a>
                            </li>
                            <li>
                                <a href="./index2.php"> Masalar </a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    <div class="row layout-top-spacing">


                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="checkout-main-area scrollable">
                                <div class="container">
                                    <div class="checkout-wrap">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="your-order-area">
                                                    <h3>Sepet</h3>
                                                    <div class="your-order-wrap gray-bg-4">
                                                        <div class="your-order-info-wrap">
                                                            <div class="your-order-info">
                                                                <ul>
                                                                    <li>Ürünler <span>Toplam</span></li>
                                                                </ul>
                                                            </div>
                                                            <div class="your-order-middle">
                                                                <ul>
                                                                    <?php
                                                                    $totalPrice = 0;
                                                                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                                                        $cart = $_SESSION['cart'];
                                                                        foreach ($cart as $item) {
                                                                            $productPrice = floatval($item['product_price']);
                                                                            $totalPrice += $productPrice;

                                                                            if (isset($_POST['discount-add'])) {
                                                                                $discountPercentage = validate($_POST['discount']);
                                                                                if ($discountPercentage > 0 && $discountPercentage <= 100) {
                                                                                    $discountFactor = $discountPercentage / 100;
                                                                                    $discountAmount = $totalPrice * $discountFactor;
                                                                                    $discountedPrice = $totalPrice - $discountAmount;
                                                                                } else {
                                                                                    echo "Lütfen geçerli bir yüzde indirim oranı giriniz.";
                                                                                }
                                                                            }
                                                                    ?>
                                                                            <li><?php echo $item['product_name']; ?> X 1 <span>₺<?php echo number_format($productPrice, 2); ?></span></li>
                                                                    <?php }
                                                                    } else {
                                                                        echo '<tr><td colspan="4"></td></tr>';
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <div class="your-order-info order-subtotal">
                                                                <ul>
                                                                    <li>Genel Toplam <span>₺<?php echo number_format($totalPrice, 2); ?> </span></li>
                                                                </ul>
                                                            </div>
                                                            <div class="your-order-info order-shipping">
                                                                <ul>
                                                                    <li>Shipping <p>Enter your full address </p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="your-order-info order-total">
                                                                <ul>
                                                                    <li>Total <span>$273.00 </span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="payment-method">
                                                            <div class="pay-top sin-payment">
                                                                <input id="payment_method_1" class="input-radio" type="radio" value="cheque" checked="checked" name="payment_method">
                                                                <label for="payment_method_1"> Direct Bank Transfer </label>
                                                                <div class="payment-box payment_method_bacs">
                                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                                                </div>
                                                            </div>
                                                            <div class="pay-top sin-payment">
                                                                <input id="payment-method-2" class="input-radio" type="radio" value="cheque" name="payment_method">
                                                                <label for="payment-method-2">Check payments</label>
                                                                <div class="payment-box payment_method_bacs">
                                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                                                </div>
                                                            </div>
                                                            <div class="pay-top sin-payment">
                                                                <input id="payment-method-3" class="input-radio" type="radio" value="cheque" name="payment_method">
                                                                <label for="payment-method-3">Cash on delivery </label>
                                                                <div class="payment-box payment_method_bacs">
                                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                                                </div>
                                                            </div>
                                                            <div class="pay-top sin-payment sin-payment-3">
                                                                <input id="payment-method-4" class="input-radio" type="radio" value="cheque" name="payment_method">
                                                                <label for="payment-method-4">PayPal <img alt="" src="assets/images/icon-img/payment.png"><a href="#">What is PayPal?</a></label>
                                                                <div class="payment-box payment_method_bacs">
                                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="Place-order">
                                                        <a href="#">Place Order</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12  layout-spacing">
                            <div class="account-content">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <ul class="nav nav-pills flex-column" id="animateLine" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="btn btn-primary m-2 nav-link" id="animated-all-tab" data-bs-toggle="tab" href="#animated-all" role="tab" aria-controls="animated-all" aria-selected="true">
                                                    Hepsi</button>
                                            </li>
                                            <?php
                                            if (is_array($fetchDataProductCategory)) {
                                                $sn = 1;
                                                foreach ($fetchDataProductCategory as $data) {
                                            ?>
                                                    <li class="nav-item" role="presentation">
                                                        <button class=" nav-link " id="animated-<?php echo cleanTurkishCharacters($data['product_category_id']) ?>-tab" data-bs-toggle="tab" href="#animated-<?php echo cleanTurkishCharacters($data['product_category_id']) ?>" role="tab" aria-controls="animated-<?php echo cleanTurkishCharacters($data['product_category_id']) ?>" aria-selected="true">
                                                            <?php echo $data['product_category_name'] ?></button>
                                                    </li>
                                            <?php
                                                    $sn++;
                                                }
                                            } else {
                                                echo $fetchDataProductCategory;
                                            } ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-content" id="animateLineContent-4">
                                    <div class="tab-pane fade show active scrollable" id="animated-all" role="tabpanel" aria-labelledby="animated-all-tab">
                                        <div class="row">
                                            <?php
                                            if (is_array($fetchDataProduct)) {
                                                foreach ($fetchDataProduct as $data) {
                                                    $url = "/" . cleanTurkishCharacters($data['product_name']) . "/" . $data['product_id'];
                                            ?>
                                                    <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                                        <div class="section general-info border app-menu-product-section" style="background-image: url(../<?php echo $data['product_image']; ?>); background-size: cover;">
                                                            <div class="info">
                                                                <h2 class="text-white"><?php echo $data['product_name']; ?></h2>
                                                                <div class="dropdown mb-4 mt-4">
                                                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                                            <circle cx="12" cy="12" r="1"></circle>
                                                                            <circle cx="19" cy="12" r="1"></circle>
                                                                            <circle cx="5" cy="12" r="1"></circle>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right left" aria-labelledby="dropdownMenuLink-1">
                                                                        <?php if (!empty($data['product_small_price'])) : ?>
                                                                            <form method="post" action="app-cart.php?addCart=<?php echo $data['product_small_price']; ?>">
                                                                                <input type="hidden" name="product_size" value="Küçük">
                                                                                <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                                                                <input type="hidden" name="product_category_id" value="<?php echo $data['product_category_id'] ?>">
                                                                                <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
                                                                                <input type="hidden" name="product_info" value="<?php echo $data['product_info'] ?>">
                                                                                <input type="hidden" name="product_small_price" value="<?php echo $data['product_small_price'] ?>">
                                                                                <input type="hidden" name="product_middle_price" value="<?php echo $data['product_middle_price'] ?>">
                                                                                <input type="hidden" name="product_big_price" value="<?php echo $data['product_big_price'] ?>">
                                                                                <input type="hidden" name="product_normal_price" value="<?php echo $data['product_normal_price'] ?>">
                                                                                <input type="hidden" name="product_image" value="<?php echo $data['product_image'] ?>">
                                                                                <input type="hidden" name="product_currentDateTime" value="<?php echo $data['product_currentDateTime'] ?>">
                                                                                <input type="hidden" name="product_publicy" value="<?php echo $data['product_publicy'] ?>">
                                                                                <button type="submit" class="dropdown-item list-edit">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                    </svg> Küçük
                                                                                </button>
                                                                            </form>
                                                                        <?php endif; ?>

                                                                        <?php if (!empty($data['product_middle_price'])) : ?>
                                                                            <form method="post" action="app-cart.php?addCart=<?php echo $data['product_middle_price']; ?>">
                                                                                <input type="hidden" name="product_size" value="Orta">
                                                                                <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                                                                <input type="hidden" name="product_category_id" value="<?php echo $data['product_category_id'] ?>">
                                                                                <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
                                                                                <input type="hidden" name="product_info" value="<?php echo $data['product_info'] ?>">
                                                                                <input type="hidden" name="product_small_price" value="<?php echo $data['product_small_price'] ?>">
                                                                                <input type="hidden" name="product_middle_price" value="<?php echo $data['product_middle_price'] ?>">
                                                                                <input type="hidden" name="product_big_price" value="<?php echo $data['product_big_price'] ?>">
                                                                                <input type="hidden" name="product_normal_price" value="<?php echo $data['product_normal_price'] ?>">
                                                                                <input type="hidden" name="product_image" value="<?php echo $data['product_image'] ?>">
                                                                                <input type="hidden" name="product_currentDateTime" value="<?php echo $data['product_currentDateTime'] ?>">
                                                                                <input type="hidden" name="product_publicy" value="<?php echo $data['product_publicy'] ?>">
                                                                                <button type="submit" class="dropdown-item list-edit">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                    </svg> Orta
                                                                                </button>
                                                                            </form>
                                                                        <?php endif; ?>

                                                                        <?php if (!empty($data['product_big_price'])) : ?>
                                                                            <form method="post" action="app-cart.php?addCart=<?php echo $data['product_big_price']; ?>">
                                                                                <input type="hidden" name="product_size" value="Büyük">
                                                                                <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                                                                <input type="hidden" name="product_category_id" value="<?php echo $data['product_category_id'] ?>">
                                                                                <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
                                                                                <input type="hidden" name="product_info" value="<?php echo $data['product_info'] ?>">
                                                                                <input type="hidden" name="product_small_price" value="<?php echo $data['product_small_price'] ?>">
                                                                                <input type="hidden" name="product_middle_price" value="<?php echo $data['product_middle_price'] ?>">
                                                                                <input type="hidden" name="product_big_price" value="<?php echo $data['product_big_price'] ?>">
                                                                                <input type="hidden" name="product_normal_price" value="<?php echo $data['product_normal_price'] ?>">
                                                                                <input type="hidden" name="product_image" value="<?php echo $data['product_image'] ?>">
                                                                                <input type="hidden" name="product_currentDateTime" value="<?php echo $data['product_currentDateTime'] ?>">
                                                                                <input type="hidden" name="product_publicy" value="<?php echo $data['product_publicy'] ?>">
                                                                                <button type="submit" class="dropdown-item list-edit">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                    </svg> Büyük
                                                                                </button>
                                                                            </form>
                                                                        <?php endif; ?>

                                                                        <?php if (!empty($data['product_normal_price'])) : ?>
                                                                            <form method="post" action="app-cart.php?addCart=<?php echo $data['product_normal_price']; ?>">
                                                                                <input type="hidden" name="product_size" value="Normal">
                                                                                <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                                                                <input type="hidden" name="product_category_id" value="<?php echo $data['product_category_id'] ?>">
                                                                                <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
                                                                                <input type="hidden" name="product_info" value="<?php echo $data['product_info'] ?>">
                                                                                <input type="hidden" name="product_small_price" value="<?php echo $data['product_small_price'] ?>">
                                                                                <input type="hidden" name="product_middle_price" value="<?php echo $data['product_middle_price'] ?>">
                                                                                <input type="hidden" name="product_big_price" value="<?php echo $data['product_big_price'] ?>">
                                                                                <input type="hidden" name="product_normal_price" value="<?php echo $data['product_normal_price'] ?>">
                                                                                <input type="hidden" name="product_image" value="<?php echo $data['product_image'] ?>">
                                                                                <input type="hidden" name="product_currentDateTime" value="<?php echo $data['product_currentDateTime'] ?>">
                                                                                <input type="hidden" name="product_publicy" value="<?php echo $data['product_publicy'] ?>">
                                                                                <button type="submit" class="dropdown-item list-edit">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                    </svg> Normal
                                                                                </button>
                                                                            </form>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            } else {
                                                echo $fetchDataProduct;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if (is_array($fetchDataProductCategory)) {
                                        foreach ($fetchDataProductCategory as $category) {
                                    ?>
                                            <div class="tab-pane fade scrollable" id="animated-<?php echo cleanTurkishCharacters($category['product_category_id']) ?>" role="tabpanel" aria-labelledby="animated-<?php echo cleanTurkishCharacters($category['product_category_id']) ?>-tab">
                                                <div class="row">
                                                    <?php
                                                    if (is_array($fetchDataProduct)) {
                                                        foreach ($fetchDataProduct as $data) {
                                                            if ($data['product_category_id'] == $category['product_category_id']) {
                                                                $url = "/" . cleanTurkishCharacters($data['product_name']) . "/" . $data['product_id'];
                                                    ?>
                                                                <div class="col-xl-4 col-lg-12 col-md-12 layout-spacing">
                                                                    <div class="section general-info border app-menu-product-section" style="background-image: url(../<?php echo $data['product_image']; ?>); background-size: cover;">
                                                                        <div class="info">
                                                                            <h2 class="text-white"><?php echo $data['product_name']; ?></h2>
                                                                            <div class="dropdown  mb-4 mt-4">
                                                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                                                        <circle cx="12" cy="12" r="1"></circle>
                                                                                        <circle cx="19" cy="12" r="1"></circle>
                                                                                        <circle cx="5" cy="12" r="1"></circle>
                                                                                    </svg>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right left" aria-labelledby="dropdownMenuLink-1">
                                                                                    <?php if (!empty($data['product_small_price'])) : ?>
                                                                                        <form method="post" action="app-cart.php?addCart=<?php echo $data['product_small_price']; ?>">
                                                                                            <input type="hidden" name="product_size" value="Küçük">
                                                                                            <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                                                                            <input type="hidden" name="product_category_id" value="<?php echo $data['product_category_id'] ?>">
                                                                                            <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
                                                                                            <input type="hidden" name="product_info" value="<?php echo $data['product_info'] ?>">
                                                                                            <input type="hidden" name="product_small_price" value="<?php echo $data['product_small_price'] ?>">
                                                                                            <input type="hidden" name="product_middle_price" value="<?php echo $data['product_middle_price'] ?>">
                                                                                            <input type="hidden" name="product_big_price" value="<?php echo $data['product_big_price'] ?>">
                                                                                            <input type="hidden" name="product_normal_price" value="<?php echo $data['product_normal_price'] ?>">
                                                                                            <input type="hidden" name="product_image" value="<?php echo $data['product_image'] ?>">
                                                                                            <input type="hidden" name="product_currentDateTime" value="<?php echo $data['product_currentDateTime'] ?>">
                                                                                            <input type="hidden" name="product_publicy" value="<?php echo $data['product_publicy'] ?>">
                                                                                            <button type="submit" class="dropdown-item list-edit">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                                </svg> Küçük
                                                                                            </button>
                                                                                        </form>
                                                                                    <?php endif; ?>

                                                                                    <?php if (!empty($data['product_middle_price'])) : ?>
                                                                                        <form method="post" action="app-cart.php?addCart=<?php echo $data['product_middle_price']; ?>">
                                                                                            <input type="hidden" name="product_size" value="Orta">
                                                                                            <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                                                                            <input type="hidden" name="product_category_id" value="<?php echo $data['product_category_id'] ?>">
                                                                                            <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
                                                                                            <input type="hidden" name="product_info" value="<?php echo $data['product_info'] ?>">
                                                                                            <input type="hidden" name="product_small_price" value="<?php echo $data['product_small_price'] ?>">
                                                                                            <input type="hidden" name="product_middle_price" value="<?php echo $data['product_middle_price'] ?>">
                                                                                            <input type="hidden" name="product_big_price" value="<?php echo $data['product_big_price'] ?>">
                                                                                            <input type="hidden" name="product_normal_price" value="<?php echo $data['product_normal_price'] ?>">
                                                                                            <input type="hidden" name="product_image" value="<?php echo $data['product_image'] ?>">
                                                                                            <input type="hidden" name="product_currentDateTime" value="<?php echo $data['product_currentDateTime'] ?>">
                                                                                            <input type="hidden" name="product_publicy" value="<?php echo $data['product_publicy'] ?>">
                                                                                            <button type="submit" class="dropdown-item list-edit">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                                </svg> Orta
                                                                                            </button>
                                                                                        </form>
                                                                                    <?php endif; ?>

                                                                                    <?php if (!empty($data['product_big_price'])) : ?>
                                                                                        <form method="post" action="app-cart.php?addCart=<?php echo $data['product_big_price']; ?>">
                                                                                            <input type="hidden" name="product_size" value="Büyük">
                                                                                            <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                                                                            <input type="hidden" name="product_category_id" value="<?php echo $data['product_category_id'] ?>">
                                                                                            <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
                                                                                            <input type="hidden" name="product_info" value="<?php echo $data['product_info'] ?>">
                                                                                            <input type="hidden" name="product_small_price" value="<?php echo $data['product_small_price'] ?>">
                                                                                            <input type="hidden" name="product_middle_price" value="<?php echo $data['product_middle_price'] ?>">
                                                                                            <input type="hidden" name="product_big_price" value="<?php echo $data['product_big_price'] ?>">
                                                                                            <input type="hidden" name="product_normal_price" value="<?php echo $data['product_normal_price'] ?>">
                                                                                            <input type="hidden" name="product_image" value="<?php echo $data['product_image'] ?>">
                                                                                            <input type="hidden" name="product_currentDateTime" value="<?php echo $data['product_currentDateTime'] ?>">
                                                                                            <input type="hidden" name="product_publicy" value="<?php echo $data['product_publicy'] ?>">
                                                                                            <button type="submit" class="dropdown-item list-edit">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                                </svg> Büyük
                                                                                            </button>
                                                                                        </form>
                                                                                    <?php endif; ?>

                                                                                    <?php if (!empty($data['product_normal_price'])) : ?>
                                                                                        <form method="post" action="app-cart.php?addCart=<?php echo $data['product_normal_price']; ?>">
                                                                                            <input type="hidden" name="product_size" value="Normal">
                                                                                            <input type="hidden" name="product_id" value="<?php echo $data['product_id'] ?>">
                                                                                            <input type="hidden" name="product_category_id" value="<?php echo $data['product_category_id'] ?>">
                                                                                            <input type="hidden" name="product_name" value="<?php echo $data['product_name'] ?>">
                                                                                            <input type="hidden" name="product_info" value="<?php echo $data['product_info'] ?>">
                                                                                            <input type="hidden" name="product_small_price" value="<?php echo $data['product_small_price'] ?>">
                                                                                            <input type="hidden" name="product_middle_price" value="<?php echo $data['product_middle_price'] ?>">
                                                                                            <input type="hidden" name="product_big_price" value="<?php echo $data['product_big_price'] ?>">
                                                                                            <input type="hidden" name="product_normal_price" value="<?php echo $data['product_normal_price'] ?>">
                                                                                            <input type="hidden" name="product_image" value="<?php echo $data['product_image'] ?>">
                                                                                            <input type="hidden" name="product_currentDateTime" value="<?php echo $data['product_currentDateTime'] ?>">
                                                                                            <input type="hidden" name="product_publicy" value="<?php echo $data['product_publicy'] ?>">
                                                                                            <button type="submit" class="dropdown-item list-edit">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                                                </svg> Normal
                                                                                            </button>
                                                                                        </form>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    <?php
                                                            }
                                                        }
                                                    } else {
                                                        echo $fetchDataProduct;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../src/plugins/src/waves/waves.min.js"></script>
    <script src="../layouts/modern-light-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../src/plugins/src/filepond/filepond.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="../src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="../src/plugins/src/notification/snackbar/snackbar.min.js"></script>
    <script src="../src/plugins/src/sweetalerts2/sweetalerts2.min.js"></script>
    <script src="../src/assets/js/users/account-settings.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mixitup/dist/mixitup.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mixer = mixitup('.filtered-items-wrap', {
                animation: {
                    duration: 300,
                    effects: 'fade translateZ(-100px)'
                }
            });

            document.querySelectorAll('.nav-link').forEach(function(tab) {
                tab.addEventListener('click', function(event) {
                    event.preventDefault();
                    var filterValue = this.getAttribute('data-bs-target');
                    mixer.filter(filterValue);
                });
            });
        });
    </script>

    <!--  END CUSTOM SCRIPTS FILE  -->


    <script>
        $(document).ready(function() {
            // Eşit yükseklik
            $('.layout-spacing').each(function() {
                var highestBox = 0;
                $(this).find('.section').each(function() {
                    if ($(this).height() > highestBox) {
                        highestBox = $(this).height();
                    }
                })
                $(this).find('.section').height(highestBox);
            });
        });
    </script>

    <script>
        (function($) {
            "use strict";

            /*------ ScrollUp -------- */
            $.scrollUp({
                scrollText: '<i class="icon-arrow-up"></i>',
                easingType: 'linear',
                scrollSpeed: 900,
                animation: 'fade'
            });

            /*------ Wow Active ----*/
            new WOW().init();

            /*------ Hero slider active 1 ----*/
            $('.hero-slider-active-1').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                loop: true,
                dots: true,
                arrows: true,
                prevArrow: '<span class="slider-icon-1-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="slider-icon-1-next"><i class="icon-arrow-right"></i></span>',
            });

            /*------ Hero slider active 2 ----*/
            $('.hero-slider-active-2').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                loop: true,
                dots: false,
                arrows: true,
                prevArrow: '<span class="slider-icon-1-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="slider-icon-1-next"><i class="icon-arrow-right"></i></span>',
            });

            /*------ Hero slider active 3 ----*/
            $('.hero-slider-active-3').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                loop: true,
                dots: true,
                arrows: false,
            });

            /*------ Product slider active ----*/
            $('.product-slider-active').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: true,
                arrows: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*------ Product slider active 2 ----*/
            $('.product-slider-active-2').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: true,
                rows: 2,
                arrows: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*------ Product slider active 3 ----*/
            $('.product-slider-active-3').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: true,
                prevArrow: '<span class="pro-slider-icon-1-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="pro-slider-icon-1-next"><i class="icon-arrow-right"></i></span>',
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*------ Product slider active 4 ----*/
            $('.product-slider-active-4').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: true,
                prevArrow: '<span class="pro-slider-icon-1-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="pro-slider-icon-1-next"><i class="icon-arrow-right"></i></span>',
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*------ Product slider active 5 ----*/
            $('.product-slider-active-5').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*------ product categories slider 1 ----*/
            $('.product-categories-slider-1').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: true,
                prevArrow: '<span class="pro-slider-icon-1-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="pro-slider-icon-1-next"><i class="icon-arrow-right"></i></span>',
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });

            /*------ Product categories slider 3 ----*/
            $('.product-categories-slider-3').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: true,
                rows: 2,
                prevArrow: '<span class="pro-slider-icon-1-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="pro-slider-icon-1-next"><i class="icon-arrow-right"></i></span>',
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });



            /*--------------------------------
                InstagramFeed active
            -----------------------------------*/

            /*--
            instafeed
            -----------------------------------*/
            // User Changeable Access
            var activeId = $("#instafeed"),
                limit = activeId.data("limit"),
                myTemplate = '<div class="single-instafeed"><a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a></div>';
            if (activeId.length) {
                var accessTokenID = "IGQVJWLXU1Ri1JbjE0RlhlRmVZAMy1mRllxUzJWZAG5najYxWUxLcGl1SV80UHNiN2ZAaUFdHTVllMEh6YjRucTZAIY09TQlowdGlScG9taHhWNHJwaXQzOVZAwUDdsZAHdqTjhTcHB5ZA2I5QWRVZAVZAtYjZA2SgZDZD",
                    userFeed = new Instafeed({
                        accessToken: accessTokenID,
                        template: myTemplate,
                        limit: limit,
                    });
                userFeed.run();
            }


            /*--- Language currency active ----*/
            $('.language-dropdown-active').on('click', function(e) {
                e.preventDefault();
                $('.language-dropdown').slideToggle(400);
            });
            $('.currency-dropdown-active').on('click', function(e) {
                e.preventDefault();
                $('.currency-dropdown').slideToggle(400);
            });

            /*--- Countdown timer active ----*/
            $('#timer-1-active , #timer-3-active').syotimer({
                year: 2021,
                month: 10,
                day: 22,
                hour: 8,
                minute: 48,
                layout: 'hms',
                periodic: false,
                periodUnit: 'm'
            });

            $('#timer-2-active').syotimer({
                year: 2021,
                month: 10,
                day: 22,
                hour: 8,
                minute: 48,
                layout: 'dhms',
                periodic: false,
                periodUnit: 'm'
            });

            /*====== SidebarCart ======*/
            function miniCart() {
                var navbarTrigger = $('.cart-active'),
                    endTrigger = $('.cart-close'),
                    container = $('.sidebar-cart-active'),
                    wrapper = $('.main-wrapper');

                wrapper.prepend('<div class="body-overlay"></div>');

                navbarTrigger.on('click', function(e) {
                    e.preventDefault();
                    container.addClass('inside');
                    wrapper.addClass('overlay-active');
                });

                endTrigger.on('click', function() {
                    container.removeClass('inside');
                    wrapper.removeClass('overlay-active');
                });

                $('.body-overlay').on('click', function() {
                    container.removeClass('inside');
                    wrapper.removeClass('overlay-active');
                });
            };
            miniCart();

            /*-------------------------------
	   Header Search Toggle
    -----------------------------------*/
            var searchToggle = $('.search-toggle');
            searchToggle.on('click', function(e) {
                e.preventDefault();
                if ($(this).hasClass('open')) {
                    $(this).removeClass('open');
                    $(this).siblings('.search-wrap-1').removeClass('open');
                } else {
                    $(this).addClass('open');
                    $(this).siblings('.search-wrap-1').addClass('open');
                }
            })


            /* NiceSelect */
            $('.nice-select').niceSelect();


            /*-------------------------
              Category active
            --------------------------*/
            $('.categori-show').on('click', function(e) {
                e.preventDefault();
                $('.categori-hide , .categori-hide-2').slideToggle(900);
            });

            /*--------------------------------
                Deal slider active
            -----------------------------------*/
            $('.deal-slider-active').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: true,
                prevArrow: '<span class="slider-icon-1-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="slider-icon-1-next"><i class="icon-arrow-right"></i></span>',
            });


            /*--------------------------------
                Sidebar product active
            -----------------------------------*/
            $('.sidebar-product-active').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                rows: 3,
                arrows: true,
                prevArrow: '<span class="sidebar-icon-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="sidebar-icon-next"><i class="icon-arrow-right"></i></span>',
            });

            /*--------------------------------
                Sidebar blog active
            -----------------------------------*/
            $('.sidebar-blog-active').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                rows: 2,
                arrows: true,
                prevArrow: '<span class="sidebar-icon-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="sidebar-icon-next"><i class="icon-arrow-right"></i></span>',
            });

            /*--------------------------------
                Product categories slider
            -----------------------------------*/
            $('.product-categories-slider-2').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: true,
                prevArrow: '<span class="sidebar-icon-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="sidebar-icon-next"><i class="icon-arrow-right"></i></span>',
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });

            /*--------------------------------
                Testimonial active
            -----------------------------------*/
            $('.testimonial-active-1').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: true,
                arrows: false,
            });
            /*--------------------------------
                Testimonial active 2
            -----------------------------------*/
            $('.testimonial-active-2').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: false,
            });

            /*--------------------------------
                Product slider active 6
            -----------------------------------*/
            $('.product-slider-active-6').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: true,
                rows: 2,
                arrows: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*--------------------------------
                Product slider active 7
            -----------------------------------*/
            $('.product-slider-active-7').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: true,
                rows: 2,
                arrows: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*--------------------------------
                Product slider active 8
            -----------------------------------*/
            $('.product-slider-active-8').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: true,
                arrows: true,
                prevArrow: '<span class="sidebar-icon-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="sidebar-icon-next"><i class="icon-arrow-right"></i></span>',
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*--------------------------------
                Product slider active 9
            -----------------------------------*/
            $('.product-slider-active-9').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: true,
                arrows: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*------- Color active -----*/
            $('.pro-details-color-content').on('click', 'a', function(e) {
                e.preventDefault();
                $(this).addClass('active').parent().siblings().children('a').removeClass('active');
            });

            /*--------------------------------
                Social icon active
            -----------------------------------*/
            if ($('.pro-details-action').length) {
                var $body = $('body'),
                    $cartWrap = $('.pro-details-action'),
                    $cartContent = $cartWrap.find('.product-dec-social');
                $cartWrap.on('click', '.social', function(e) {
                    e.preventDefault();
                    var $this = $(this);
                    if (!$this.parent().hasClass('show')) {
                        $this.siblings('.product-dec-social').addClass('show').parent().addClass('show');
                    } else {
                        $this.siblings('.product-dec-social').removeClass('show').parent().removeClass('show');
                    }
                });
                /*Close When Click Outside*/
                $body.on('click', function(e) {
                    var $target = e.target;
                    if (!$($target).is('.pro-details-action') && !$($target).parents().is('.pro-details-action') && $cartWrap.hasClass('show')) {
                        $cartWrap.removeClass('show');
                        $cartContent.removeClass('show');
                    }
                });
            }

            /*---------------------
                Price range
            --------------------- */
            var sliderrange = $('#slider-range');
            var amountprice = $('#amount');
            $(function() {
                sliderrange.slider({
                    range: true,
                    min: 16,
                    max: 400,
                    values: [0, 300],
                    slide: function(event, ui) {
                        amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    }
                });
                amountprice.val("$" + sliderrange.slider("values", 0) +
                    " - $" + sliderrange.slider("values", 1));
            });

            /*----------------------------
            	Cart Plus Minus Button
            ------------------------------ */
            var CartPlusMinus = $('.cart-plus-minus');
            CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
            CartPlusMinus.append('<div class="inc qtybutton">+</div>');
            $(".qtybutton").on("click", function() {
                var $button = $(this);
                var oldValue = $button.parent().find("input").val();
                if ($button.text() === "+") {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                $button.parent().find("input").val(newVal);
            });

            $('#exampleModal').on('shown.bs.modal', function() {
                $('.quickview-slide-active').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    fade: false,
                    loop: false,
                    dots: false,
                    arrows: true,
                    prevArrow: '<span class="icon-prev"><i class="icon-arrow-left"></i></span>',
                    nextArrow: '<span class="icon-next"><i class="icon-arrow-right"></i></span>',
                    responsive: [{
                            breakpoint: 1199,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 575,
                            settings: {
                                slidesToShow: 2,
                            }
                        }
                    ]
                });
                $('.quickview-slide-active a').on('click', function() {
                    $('.quickview-slide-active a').removeClass('active');
                })
            })

            /*====== Sidebar menu Active ======*/
            function mobileHeaderActive() {
                var navbarTrigger = $('.mobile-header-button-active'),
                    endTrigger = $('.sidebar-close'),
                    container = $('.mobile-header-active'),
                    wrapper4 = $('.main-wrapper');

                wrapper4.prepend('<div class="body-overlay-1"></div>');

                navbarTrigger.on('click', function(e) {
                    e.preventDefault();
                    container.addClass('sidebar-visible');
                    wrapper4.addClass('overlay-active-1');
                });

                endTrigger.on('click', function() {
                    container.removeClass('sidebar-visible');
                    wrapper4.removeClass('overlay-active-1');
                });

                $('.body-overlay-1').on('click', function() {
                    container.removeClass('sidebar-visible');
                    wrapper4.removeClass('overlay-active-1');
                });
            };
            mobileHeaderActive();

            /*---------------------
                mobile-menu
            --------------------- */
            var $offCanvasNav = $('.mobile-menu , .category-menu-dropdown'),
                $offCanvasNavSubMenu = $offCanvasNav.find('.dropdown');

            /*Add Toggle Button With Off Canvas Sub Menu*/
            $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i></i></span>');

            /*Close Off Canvas Sub Menu*/
            $offCanvasNavSubMenu.slideUp();

            /*Category Sub Menu Toggle*/
            $offCanvasNav.on('click', 'li a, li .menu-expand', function(e) {
                var $this = $(this);
                if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
                    e.preventDefault();
                    if ($this.siblings('ul:visible').length) {
                        $this.parent('li').removeClass('active');
                        $this.siblings('ul').slideUp();
                    } else {
                        $this.parent('li').addClass('active');
                        $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                        $this.closest('li').siblings('li').find('ul:visible').slideUp();
                        $this.siblings('ul').slideDown();
                    }
                }
            });


            /*--- checkout toggle function ----*/
            $('.checkout-click1').on('click', function(e) {
                e.preventDefault();
                $('.checkout-login-info').slideToggle(900);
            });


            /*--- checkout toggle function ----*/
            $('.checkout-click3').on('click', function(e) {
                e.preventDefault();
                $('.checkout-login-info3').slideToggle(1000);
            });

            /*-------------------------
            Create an account toggle
            --------------------------*/
            $('.checkout-toggle2').on('click', function() {
                $('.open-toggle2').slideToggle(1000);
            });

            $('.checkout-toggle').on('click', function() {
                $('.open-toggle').slideToggle(1000);
            });

            /*-------------------------
            checkout one click toggle function
            --------------------------*/
            var checked = $('.sin-payment input:checked')
            if (checked) {
                $(checked).siblings('.payment-box').slideDown(900);
            };
            $('.sin-payment input').on('change', function() {
                $('.payment-box').slideUp(900);
                $(this).siblings('.payment-box').slideToggle(900);
            });


            // Instantiate EasyZoom instances
            var $easyzoom = $('.easyzoom').easyZoom();

            /*-------------------------------------
                Product details big image slider
            ---------------------------------------*/
            $('.pro-dec-big-img-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                draggable: false,
                fade: false,
                asNavFor: '.product-dec-slider-small , .product-dec-slider-small-2',
            });

            /*---------------------------------------
                Product details small image slider
            -----------------------------------------*/
            $('.product-dec-slider-small').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.pro-dec-big-img-slider',
                dots: false,
                focusOnSelect: true,
                fade: false,
                prevArrow: '<span class="pro-dec-prev"><i class="icon-arrow-left"></i></span>',
                nextArrow: '<span class="pro-dec-next"><i class="icon-arrow-right"></i></span>',
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });

            /*----------------------------------------
                Product details small image slider 2
            ------------------------------------------*/
            $('.product-dec-slider-small-2').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                vertical: true,
                asNavFor: '.pro-dec-big-img-slider',
                dots: false,
                focusOnSelect: true,
                fade: false,
                prevArrow: '<span class="pro-dec-prev"><i class="icon-arrow-up"></i></span>',
                nextArrow: '<span class="pro-dec-next"><i class="icon-arrow-down"></i></span>',
                responsive: [{
                        breakpoint: 1365,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 2,
                        }
                    }
                ]
            });


            /*--
                Magnific Popup
            ------------------------*/
            $('.img-popup').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            $('.related-product-active').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                fade: false,
                loop: true,
                dots: false,
                arrows: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            /*------------------------
                Sidebar sticky active
            -------------------------- */
            $('.sidebar-active').stickySidebar({
                topSpacing: 0,
                bottomSpacing: 30,
                minWidth: 767,
            });

            /*--- language currency active ----*/
            $('.mobile-language-active').on('click', function(e) {
                e.preventDefault();
                $('.lang-dropdown-active').slideToggle(900);
            });
            $('.mobile-currency-active').on('click', function(e) {
                e.preventDefault();
                $('.curr-dropdown-active').slideToggle(900);
            });


        })(jQuery);
    </script>

</body>

</html>