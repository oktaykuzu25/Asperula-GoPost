<?php
include "../php/cart.php";
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 account-settings-container layout-top-spacing">
                        <div class="account-content">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <ul class="nav nav-pills" id="animateLine" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button style="color:orange" class="nav-link active" id="animated-all-tab" data-bs-toggle="tab" href="#animated-all" role="tab" aria-controls="animated-all" aria-selected="true">
                                                Hepsi</button>
                                        </li>
                                        <?php
                                        if (is_array($fetchDataProductCategory)) {
                                            $sn = 1;
                                            foreach ($fetchDataProductCategory as $data) {
                                        ?>
                                                <li class="nav-item" role="presentation">
                                                    <button style="color:orange" class="nav-link " id="animated-<?php echo cleanTurkishCharacters($data['product_category_id']) ?>-tab" data-bs-toggle="tab" href="#animated-<?php echo cleanTurkishCharacters($data['product_category_id']) ?>" role="tab" aria-controls="animated-<?php echo cleanTurkishCharacters($data['product_category_id']) ?>" aria-selected="true">
                                                        <?php echo $data['product_category_name'] ?></button>
                                                </li>
                                        <?php
                                                $sn++;
                                            }
                                        } else {
                                            echo $fetchDataProductCategory;
                                        } ?>
                                        <li class="nav-item ms-auto" role="presentation">
                                            <a style="color:orange" href="app-cart.php" class="nav-link">
                                                Sepet
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content" id="animateLineContent-4">
                                <div class="tab-pane fade show active" id="animated-all" role="tabpanel" aria-labelledby="animated-all-tab">
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
                                        <div class="tab-pane fade" id="animated-<?php echo cleanTurkishCharacters($category['product_category_id']) ?>" role="tabpanel" aria-labelledby="animated-<?php echo cleanTurkishCharacters($category['product_category_id']) ?>-tab">
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

            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg></p>
                </div>
            </div>
            <!--  END FOOTER  -->

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

</body>

</html>