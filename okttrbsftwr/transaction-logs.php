<?php
include "../php/adminpanel.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>İşlem Logları | Asperula Kafe - Sipariş Sistemi Paneli </title>
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
    <link rel="stylesheet" type="text/css" href="../src/plugins/src/table/datatable/datatables.css">

    <link rel="stylesheet" type="text/css" href="../src/plugins/css/light/table/datatable/dt-global_style.css">
    <link href="../src/assets/css/light/apps/invoice-list.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="../src/plugins/css/dark/table/datatable/dt-global_style.css">
    <link href="../src/assets/css/dark/apps/invoice-list.css" rel="stylesheet" type="text/css" />

    <link href="../src/assets/css/light/scrollBar.css" rel="stylesheet" type="text/css" />

    <!--  END CUSTOM STYLE FILE  -->

</head>

<body class="layout-boxed">
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
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="./index.php">
                                <img src="../src/assets/img/asperulaLogoWoman.png" class="" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="./index.php" class="nav-link"> 
                            <?php 
                                $usersIdForBusiness=$_SESSION['business_name'];
                                $fetchDataBusinessName = fetch_data_users_business_detail($db, $tableNameBusiness, $columnsBusinessCategory, $usersIdForBusiness);
                                            echo $fetchDataBusinessName['business_name'] ?> 
                                            </a> 
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
                    <li class="menu">
                        <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
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
                            <li>
                                <a href="./index.php"> POS </a>
                            </li>
                            <li>
                                <a href="./app-tables.php"> Masalar </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                                                if ($_SESSION['users_role'] == 0) {

                                                ?>
                                                <?php
                                                } else {
                                                ?>
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span>UYGULAMALAR</span></div>
                    </li>

                    <li class="menu">
                        <a href="./app-additions.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M14 11C14 10.4477 14.4477 10 15 10C15.5523 10 16 10.4477 16 11V13C16 13.5523 15.5523 14 15 14C14.4477 14 14 13.5523 14 13V11Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M14.0079 19.0029L13.2579 19.0007V19.0007L14.0079 19.0029ZM14.0137 17L14.7637 17.0022V17H14.0137ZM3.14958 18.8284L2.61991 19.3594H2.61991L3.14958 18.8284ZM3.14958 5.17157L2.61991 4.64058L2.61991 4.64058L3.14958 5.17157ZM2.95308 10.2537L2.58741 10.9085H2.58741L2.95308 10.2537ZM2.01058 8.98947L1.26124 8.95797L2.01058 8.98947ZM2.95308 13.7463L2.58741 13.0915L2.58741 13.0915L2.95308 13.7463ZM2.01058 15.0105L2.75992 14.979L2.01058 15.0105ZM21.0469 10.2537L21.4126 10.9085L21.0469 10.2537ZM21.9894 8.98947L22.7388 8.95797V8.95797L21.9894 8.98947ZM20.8504 5.17157L21.3801 4.64058L21.3801 4.64058L20.8504 5.17157ZM21.0469 13.7463L20.6812 14.4012V14.4012L21.0469 13.7463ZM21.9894 15.0105L22.7388 15.042V15.042L21.9894 15.0105ZM20.8504 18.8284L21.3801 19.3594L21.3801 19.3594L20.8504 18.8284ZM21.9437 14.332L22.5981 13.9656L22.5981 13.9656L21.9437 14.332ZM21.9437 9.66803L22.5981 10.0344L22.5981 10.0344L21.9437 9.66803ZM2.05634 14.332L1.4019 13.9656L1.4019 13.9656L2.05634 14.332ZM2.05634 9.66802L2.71079 9.30168L2.71078 9.30168L2.05634 9.66802ZM14.0137 7H14.7637L14.7637 6.99782L14.0137 7ZM14.0064 4.49855L13.2564 4.50073V4.50073L14.0064 4.49855ZM16.5278 4.0189L16.5471 3.26915L16.5278 4.0189ZM17.0336 19.9642L17.0653 20.7135H17.0653L17.0336 19.9642ZM13.8595 19.8541L13.3299 19.323L13.3299 19.323L13.8595 19.8541ZM14.7579 19.0051L14.7637 17.0022L13.2637 16.9978L13.2579 19.0007L14.7579 19.0051ZM15.0162 16.75C15.1574 16.75 15.2687 16.8637 15.2687 17H16.7687C16.7687 16.0317 15.9823 15.25 15.0162 15.25V16.75ZM15.0162 15.25C14.0501 15.25 13.2637 16.0317 13.2637 17H14.7637C14.7637 16.8637 14.875 16.75 15.0162 16.75V15.25ZM9.99502 4.75H13.5052V3.25H9.99502V4.75ZM13.0079 19.25H9.99502V20.75H13.0079V19.25ZM9.99502 19.25C8.08355 19.25 6.72521 19.2484 5.69469 19.1102C4.68554 18.9749 4.10384 18.721 3.67925 18.2974L2.61991 19.3594C3.3698 20.1074 4.32051 20.4393 5.4953 20.5969C6.64871 20.7516 8.12585 20.75 9.99502 20.75V19.25ZM9.99502 3.25C8.12585 3.25 6.64871 3.24841 5.4953 3.4031C4.32051 3.56066 3.3698 3.89255 2.61991 4.64058L3.67925 5.70256C4.10384 5.27902 4.68554 5.02513 5.69469 4.88979C6.72521 4.75159 8.08355 4.75 9.99502 4.75V3.25ZM2.58741 10.9085C2.97311 11.1239 3.23007 11.533 3.23007 12H4.73007C4.73007 10.9664 4.1586 10.0678 3.31876 9.59884L2.58741 10.9085ZM2.75992 9.02097C2.83795 7.16494 3.09146 6.28889 3.67925 5.70256L2.61991 4.64058C1.59036 5.66758 1.34012 7.08185 1.26124 8.95797L2.75992 9.02097ZM3.23007 12C3.23007 12.467 2.97311 12.8761 2.58741 13.0915L3.31876 14.4012C4.1586 13.9322 4.73007 13.0336 4.73007 12H3.23007ZM1.26124 15.042C1.34012 16.9182 1.59036 18.3324 2.61991 19.3594L3.67925 18.2974C3.09146 17.7111 2.83795 16.8351 2.75992 14.979L1.26124 15.042ZM20.7699 12C20.7699 11.533 21.0269 11.1239 21.4126 10.9085L20.6812 9.59884C19.8414 10.0678 19.2699 10.9664 19.2699 12H20.7699ZM22.7388 8.95797C22.6599 7.08185 22.4096 5.66758 21.3801 4.64058L20.3207 5.70256C20.9085 6.28889 21.1621 7.16494 21.2401 9.02097L22.7388 8.95797ZM21.4126 13.0915C21.0269 12.8761 20.7699 12.467 20.7699 12H19.2699C19.2699 13.0336 19.8414 13.9322 20.6812 14.4012L21.4126 13.0915ZM21.2401 14.979C21.1621 16.8351 20.9085 17.7111 20.3207 18.2974L21.3801 19.3594C22.4096 18.3324 22.6599 16.9182 22.7388 15.042L21.2401 14.979ZM20.6812 14.4012C20.9652 14.5597 21.1507 14.6636 21.2761 14.7427C21.3379 14.7817 21.3653 14.8024 21.3735 14.8093C21.388 14.8213 21.3375 14.7846 21.2892 14.6983L22.5981 13.9656C22.5153 13.8177 22.4043 13.7154 22.3304 13.6542C22.2503 13.5878 22.1613 13.5276 22.0764 13.4741C21.9087 13.3683 21.6804 13.2411 21.4126 13.0915L20.6812 14.4012ZM22.7388 15.042C22.746 14.8706 22.7541 14.6937 22.7476 14.5458C22.741 14.3959 22.7178 14.1795 22.5981 13.9656L21.2892 14.6983C21.2386 14.6079 21.2461 14.5457 21.249 14.6117C21.2503 14.6404 21.2505 14.6822 21.2488 14.7464C21.2472 14.8104 21.244 14.8847 21.2401 14.979L22.7388 15.042ZM21.4126 10.9085C21.6804 10.7589 21.9087 10.6317 22.0764 10.5259C22.1613 10.4724 22.2503 10.4122 22.3304 10.3458C22.4043 10.2846 22.5153 10.1823 22.5981 10.0344L21.2892 9.30168C21.3375 9.21543 21.388 9.17871 21.3735 9.19072C21.3653 9.19756 21.3379 9.21832 21.2761 9.25725C21.1507 9.33637 20.9652 9.44028 20.6812 9.59884L21.4126 10.9085ZM21.2401 9.02097C21.244 9.11528 21.2472 9.18961 21.2488 9.25357C21.2505 9.31779 21.2503 9.35964 21.249 9.38827C21.2461 9.45428 21.2386 9.39206 21.2892 9.30169L22.5981 10.0344C22.7178 9.82054 22.741 9.60408 22.7476 9.45419C22.7541 9.30634 22.746 9.12945 22.7388 8.95797L21.2401 9.02097ZM2.58741 13.0915C2.31959 13.2411 2.0913 13.3683 1.92358 13.4741C1.83872 13.5276 1.74971 13.5878 1.66957 13.6542C1.59566 13.7154 1.48474 13.8177 1.4019 13.9656L2.71078 14.6983C2.6625 14.7846 2.61198 14.8213 2.62648 14.8093C2.63474 14.8024 2.66215 14.7817 2.72387 14.7427C2.84929 14.6636 3.03482 14.5597 3.31876 14.4012L2.58741 13.0915ZM2.75992 14.979C2.75595 14.8847 2.75285 14.8104 2.7512 14.7464C2.74954 14.6822 2.74973 14.6404 2.75099 14.6117C2.75389 14.5457 2.76137 14.6079 2.71078 14.6983L1.4019 13.9656C1.28221 14.1795 1.25903 14.3959 1.25244 14.5458C1.24593 14.6937 1.25403 14.8706 1.26124 15.042L2.75992 14.979ZM3.31876 9.59884C3.03482 9.44028 2.84929 9.33637 2.72386 9.25725C2.66214 9.21832 2.63474 9.19756 2.62648 9.19072C2.61198 9.17871 2.66251 9.21543 2.71079 9.30168L1.4019 10.0344C1.48473 10.1823 1.59565 10.2846 1.66956 10.3458C1.74971 10.4122 1.83872 10.4724 1.92357 10.5259C2.0913 10.6317 2.31959 10.7589 2.58741 10.9085L3.31876 9.59884ZM1.26124 8.95797C1.25403 9.12945 1.24593 9.30634 1.25244 9.45419C1.25903 9.60408 1.28221 9.82054 1.4019 10.0344L2.71078 9.30168C2.76137 9.39206 2.75389 9.45428 2.75099 9.38827C2.74973 9.35964 2.74954 9.31779 2.7512 9.25357C2.75285 9.18961 2.75595 9.11528 2.75992 9.02097L1.26124 8.95797ZM14.7637 6.99782L14.7564 4.49637L13.2564 4.50073L13.2637 7.00218L14.7637 6.99782ZM15.0162 7.25C14.875 7.25 14.7637 7.13631 14.7637 7H13.2637C13.2637 7.96826 14.0501 8.75 15.0162 8.75V7.25ZM15.2687 7C15.2687 7.13631 15.1574 7.25 15.0162 7.25V8.75C15.9823 8.75 16.7687 7.96826 16.7687 7H15.2687ZM15.2687 4.51618V7H16.7687V4.51618H15.2687ZM16.5084 4.76865C18.6966 4.82509 19.6778 5.06124 20.3208 5.70256L21.3801 4.64058C20.2676 3.53084 18.6939 3.32452 16.5471 3.26915L16.5084 4.76865ZM16.7687 4.51618C16.7687 4.656 16.6534 4.77239 16.5084 4.76865L16.5471 3.26915C15.8429 3.25099 15.2687 3.81835 15.2687 4.51618H16.7687ZM13.5052 4.75C13.3698 4.75 13.2568 4.64027 13.2564 4.50073L14.7564 4.49637C14.7544 3.80569 14.1931 3.25 13.5052 3.25V4.75ZM17.0653 20.7135C18.9399 20.6343 20.353 20.384 21.3801 19.3594L20.3208 18.2974C19.7336 18.8831 18.8563 19.1365 17.002 19.2148L17.0653 20.7135ZM15.2687 17V18.9765H16.7687V17H15.2687ZM13.2579 19.0007C13.2575 19.121 13.2572 19.2136 13.255 19.2926C13.2528 19.3721 13.249 19.4192 13.245 19.4481C13.2411 19.4764 13.2396 19.4669 13.2513 19.4387C13.2654 19.4045 13.2911 19.3617 13.3299 19.323L14.389 20.3852C14.6246 20.1502 14.701 19.8709 14.7311 19.6521C14.7582 19.4548 14.7573 19.219 14.7579 19.0051L13.2579 19.0007ZM13.0079 20.75C13.2218 20.75 13.4576 20.7516 13.6549 20.7251C13.8739 20.6957 14.1534 20.6201 14.389 20.3852L13.3299 19.323C13.3687 19.2843 13.4116 19.2587 13.4458 19.2447C13.4741 19.2331 13.4836 19.2346 13.4553 19.2384C13.4264 19.2423 13.3792 19.246 13.2998 19.248C13.2208 19.25 13.1282 19.25 13.0079 19.25V20.75ZM17.002 19.2148C16.8812 19.2199 16.7889 19.2238 16.7101 19.225C16.631 19.2262 16.5849 19.2244 16.5575 19.2217C16.5309 19.2191 16.5426 19.2175 16.5734 19.2292C16.6103 19.2433 16.6536 19.2685 16.6917 19.305L15.6536 20.3878C15.8978 20.6219 16.183 20.6921 16.4108 20.7145C16.6127 20.7344 16.8518 20.7225 17.0653 20.7135L17.002 19.2148ZM15.2687 18.9765C15.2687 19.1953 15.267 19.4374 15.295 19.6397C15.3263 19.8655 15.407 20.1514 15.6536 20.3878L16.6917 19.305C16.7313 19.343 16.7584 19.3863 16.7737 19.4221C16.7863 19.4516 16.7848 19.4622 16.7808 19.4337C16.7768 19.4046 16.7729 19.3566 16.7708 19.2753C16.7687 19.1945 16.7687 19.0997 16.7687 18.9765H15.2687Z" fill="currentColor"></path>
                                    </g>
                                </svg>
                                <span>Adisyonlar</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="./app-day-transactions.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="0.768">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="day">
                                            <g id="day_2">
                                                <path id="Combined Shape" fill-rule="evenodd" clip-rule="evenodd" d="M25 9V5C25 4.44772 24.5523 4 24 4C23.4477 4 23 4.44772 23 5V9C23 9.55228 23.4477 10 24 10C24.5523 10 25 9.55228 25 9ZM24.0008 34C27.7953 34 31.2116 31.8658 32.9084 28.5468C33.1598 28.0551 33.7622 27.8602 34.254 28.1116C34.7457 28.363 34.9406 28.9655 34.6892 29.4572C32.6537 33.4387 28.5537 36 24.0008 36C17.3732 36 12.0008 30.6269 12.0008 24C12.0008 21.0466 13.0678 18.3423 14.8374 16.2516L9.85729 11.2715C9.46677 10.881 9.46677 10.2478 9.85729 9.85729C10.2478 9.46677 10.881 9.46677 11.2715 9.85729L16.2516 14.8374C18.3423 13.0674 21.0469 12 24.0008 12C30.2903 12 35.4514 16.8414 35.9597 23H43C43.5523 23 44 23.4477 44 24C44 24.5523 43.5523 25 43 25H35.0008H33C32.4477 25 32 24.5523 32 24C32 23.4477 32.4477 23 33 23H33.9514C33.4495 17.9476 29.185 14 24.0008 14C21.5993 14 19.3956 14.8466 17.6717 16.2575L18.7075 17.2933C19.098 17.6838 19.098 18.317 18.7075 18.7075C18.317 19.098 17.6838 19.098 17.2933 18.7075L16.2575 17.6718C14.847 19.3956 14.0008 21.5991 14.0008 24C14.0008 29.5224 18.4778 34 24.0008 34ZM18 24C18 27.3137 20.6863 30 24 30C24.5523 30 25 30.4477 25 31C25 31.5523 24.5523 32 24 32C19.5817 32 16 28.4183 16 24C16 23.4477 16.4477 23 17 23C17.5523 23 18 23.4477 18 24ZM25 39V43C25 43.5523 24.5523 44 24 44C23.4477 44 23 43.5523 23 43V39C23 38.4477 23.4477 38 24 38C24.5523 38 25 38.4477 25 39ZM9 25H5C4.44772 25 4 24.5523 4 24C4 23.4477 4.44772 23 5 23H9C9.55228 23 10 23.4477 10 24C10 24.5523 9.55228 25 9 25ZM33.9003 35.3145L36.7283 38.1425C37.1188 38.533 37.752 38.533 38.1425 38.1425C38.533 37.752 38.533 37.1188 38.1425 36.7283L35.3145 33.9003C34.924 33.5098 34.2908 33.5098 33.9003 33.9003C33.5098 34.2908 33.5098 34.924 33.9003 35.3145ZM12.6855 33.9003L9.85749 36.7283C9.46697 37.1188 9.46697 37.752 9.85749 38.1425C10.248 38.533 10.8812 38.533 11.2717 38.1425L14.0997 35.3145C14.4902 34.924 14.4902 34.2908 14.0997 33.9003C13.7092 33.5098 13.076 33.5098 12.6855 33.9003ZM33.9005 12.6853L36.7285 9.85729C37.119 9.46677 37.7522 9.46677 38.1427 9.85729C38.5332 10.2478 38.5332 10.881 38.1427 11.2715L35.3147 14.0995C34.9242 14.49 34.291 14.49 33.9005 14.0995C33.51 13.709 33.51 13.0758 33.9005 12.6853Z" fill="currentColor"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>Gün İşlemleri</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#report" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M18 6.00002V6.75002H18.75V6.00002H18ZM15.7172 2.32614L15.6111 1.58368L15.7172 2.32614ZM4.91959 3.86865L4.81353 3.12619H4.81353L4.91959 3.86865ZM5.07107 6.75002H18V5.25002H5.07107V6.75002ZM18.75 6.00002V4.30604H17.25V6.00002H18.75ZM15.6111 1.58368L4.81353 3.12619L5.02566 4.61111L15.8232 3.0686L15.6111 1.58368ZM4.81353 3.12619C3.91638 3.25435 3.25 4.0227 3.25 4.92895H4.75C4.75 4.76917 4.86749 4.63371 5.02566 4.61111L4.81353 3.12619ZM18.75 4.30604C18.75 2.63253 17.2678 1.34701 15.6111 1.58368L15.8232 3.0686C16.5763 2.96103 17.25 3.54535 17.25 4.30604H18.75ZM5.07107 5.25002C4.89375 5.25002 4.75 5.10627 4.75 4.92895H3.25C3.25 5.9347 4.06532 6.75002 5.07107 6.75002V5.25002Z" fill="currentColor"></path>
                                        <path d="M8 12H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8 15.5H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M4 6V19C4 20.6569 5.34315 22 7 22H17C18.6569 22 20 20.6569 20 19V14M4 6V5M4 6H17C18.6569 6 20 7.34315 20 9V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </g>
                                </svg>
                                <span>Raporlar</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="report" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-report.php"> Rapor </a>
                            </li>
                            <li>
                                <a href="#"> Excel </a>
                            </li>
                            <li>
                                <a href="#"> PDF </a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg><span>YÖNETİM</span></div>
                    </li>

                    <li class="menu">
                        <a href="#accounts" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M13 14.0008L7 14M13 14.0008L10.5 11.5M13 14.0008L10.5 16.5M21 12V11.2C21 10.0799 21 9.51984 20.782 9.09202C20.5903 8.71569 20.2843 8.40973 19.908 8.21799C19.4802 8 18.9201 8 17.8 8H3M21 12V16M21 12H19C17.8954 12 17 12.8954 17 14C17 15.1046 17.8954 16 19 16H21M21 16V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8V8M18 8V7.2C18 6.0799 18 5.51984 17.782 5.09202C17.5903 4.71569 17.2843 4.40973 16.908 4.21799C16.4802 4 15.9201 4 14.8 4H6.2C5.07989 4 4.51984 4 4.09202 4.21799C3.71569 4.40973 3.40973 4.71569 3.21799 5.09202C3 5.51984 3 6.0799 3 7.2V8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <span>Hesaplar</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="accounts" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-income.php"> Gelir Tablosu </a>
                            </li>
                            <li>
                                <a href="./app-expense.php"> Gider Tablosu </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#product" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: none;
                                                    stroke: currentColor;
                                                    stroke-miterlimit: 10;
                                                    stroke-width: 1.91px;
                                                }
                                            </style>
                                        </defs>
                                        <path class="cls-1" d="M19.64,1.5H4.36L2.45,5.32V7.23a1.91,1.91,0,0,0,3.82,0,1.91,1.91,0,0,0,3.82,0,1.91,1.91,0,0,0,3.82,0,1.91,1.91,0,1,0,3.82,0,1.91,1.91,0,1,0,3.82,0V5.32Z">
                                        </path>
                                        <path class="cls-1" d="M12,13.91h0a3.82,3.82,0,0,1,3.82,3.82v1a0,0,0,0,1,0,0H8.18a0,0,0,0,1,0,0v-1A3.82,3.82,0,0,1,12,13.91Z">
                                        </path>
                                        <line class="cls-1" x1="12" y1="12" x2="12" y2="13.91"></line>
                                        <line class="cls-1" x1="6.27" y1="18.68" x2="17.73" y2="18.68"></line>
                                        <line class="cls-1" x1="0.55" y1="22.5" x2="23.45" y2="22.5"></line>
                                        <line class="cls-1" x1="3.41" y1="8.18" x2="3.41" y2="22.5"></line>
                                        <line class="cls-1" x1="20.59" y1="8.18" x2="20.59" y2="22.5"></line>
                                        <line class="cls-1" x1="2.45" y1="5.32" x2="21.55" y2="5.32"></line>
                                        <line class="cls-1" x1="6.27" y1="5.32" x2="6.27" y2="7.23"></line>
                                        <line class="cls-1" x1="10.09" y1="5.32" x2="10.09" y2="7.23"></line>
                                        <line class="cls-1" x1="13.91" y1="5.32" x2="13.91" y2="7.23"></line>
                                        <line class="cls-1" x1="17.73" y1="5.32" x2="17.73" y2="7.23"></line>
                                    </g>
                                </svg>
                                <span>Lezzetler</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="product" data-bs-parent="#accordionExample">
                            <li>
                                <a href="#level-three" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                                    Ürünler <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg> </a>
                                <ul class="collapse list-unstyled sub-submenu show" id="level-three" data-bs-parent="#pages">
                                    <li>
                                        <a href="app-product.php"> Ürün </a>
                                    </li>
                                    <li>
                                        <a href="app-product-category.php"> Kategori </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="app-menu.php"> Menüler </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu active">
                        <a href="#users" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="User / Users">
                                            <path id="Vector" d="M21 19.9999C21 18.2583 19.3304 16.7767 17 16.2275M15 20C15 17.7909 12.3137 16 9 16C5.68629 16 3 17.7909 3 20M15 13C17.2091 13 19 11.2091 19 9C19 6.79086 17.2091 5 15 5M9 13C6.79086 13 5 11.2091 5 9C5 6.79086 6.79086 5 9 5C11.2091 5 13 6.79086 13 9C13 11.2091 11.2091 13 9 13Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                                </svg>
                                <span>Kullanıcı</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="users" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-users.php"> Kullanıcılar </a>
                            </li>
                            <li class="active">
                                <a href="./transaction-logs.php"> İşlem Logları </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#stock" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7071 4.69719C19.0976 4.30667 19.7308 4.30667 20.1213 4.69719L28.6066 13.1825C28.9971 13.573 28.9971 14.2062 28.6066 14.5967C28.216 14.9872 27.5829 14.9872 27.1924 14.5967L18.7071 6.1114C18.3166 5.72088 18.3166 5.08771 18.7071 4.69719Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M28.7071 4.7068C29.0976 5.09733 29.0976 5.73049 28.7071 6.12102L20.2218 14.6063C19.8313 14.9968 19.1981 14.9968 18.8076 14.6063C18.4171 14.2158 18.4171 13.5826 18.8076 13.1921L27.2929 4.7068C27.6834 4.31628 28.3166 4.31628 28.7071 4.7068Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.3162 15.0513C24.111 14.9829 23.8891 14.9829 23.6838 15.0513L8.86851 19.9889C8.64603 20.063 8.463 20.2102 8.34247 20.3985L4.39805 25.4613C4.1985 25.7175 4.13573 26.0545 4.2297 26.3653C4.32367 26.6761 4.56269 26.922 4.87072 27.0246L8.19325 28.1319L8.19595 36.7634C8.19636 38.0544 9.02257 39.2003 10.2473 39.6085L23.6291 44.0691C23.7475 44.1164 23.8738 44.1406 24.0009 44.1405C24.1293 44.141 24.2569 44.1168 24.3765 44.069L37.7577 39.6086C38.9827 39.2003 39.8089 38.054 39.809 36.7628L39.8096 28.1328L43.1346 27.0246C43.4427 26.922 43.6817 26.6761 43.7757 26.3653C43.8696 26.0545 43.8069 25.7175 43.6073 25.4613L39.6117 20.3327C39.4927 20.176 39.3274 20.0542 39.1315 19.9889L24.3162 15.0513ZM9.54341 22.1112L22.346 26.378L19.6478 29.8413L6.8452 25.5745L9.54341 22.1112ZM24.0025 24.8203L35.6526 20.9376L24 17.0541L12.35 20.9367L24.0025 24.8203ZM10.196 36.7628L10.1935 28.7986L19.686 31.9622C20.088 32.0962 20.5307 31.9623 20.7911 31.6281L23.0003 28.7924L23.0001 41.7513L10.8797 37.7112C10.4715 37.5751 10.1961 37.1931 10.196 36.7628ZM37.8095 28.7993L28.3193 31.9622C27.9174 32.0962 27.4747 31.9623 27.2143 31.6281L25.0013 28.7876L25.0049 41.7514L37.1252 37.7113C37.5336 37.5752 37.809 37.1931 37.809 36.7627L37.8095 28.7993ZM28.3576 29.8413L25.6583 26.3767L38.4609 22.1099L41.1602 25.5745L28.3576 29.8413Z" fill="currentColor"></path>
                                    </g>
                                </svg>
                                <span>Stoklar</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="stock" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-stock.php"> Stok </a>
                            </li>

                            <li>
                                <a href="./app-material.php"> Materyal </a>
                            </li>
                            <li>
                                <a href="./app-storage.php"> Depo </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="./app-businesses.php" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: none;
                                                    stroke: currentColor;
                                                    stroke-linecap: square;
                                                    stroke-miterlimit: 10;
                                                    stroke-width: 1.91px;
                                                }
                                            </style>
                                        </defs>
                                        <g id="shop">
                                            <path class="cls-1" d="M7.23,6.27v5.25a2.39,2.39,0,0,1-4.78,0L4.36,6.27Z"></path>
                                            <path class="cls-1" d="M12,6.27v5.25a2.39,2.39,0,1,1-4.77,0V6.27Z"></path>
                                            <path class="cls-1" d="M16.77,6.27v5.25a2.39,2.39,0,1,1-4.77,0V6.27Z"></path>
                                            <path class="cls-1" d="M21.55,11.52a2.39,2.39,0,0,1-4.78,0V6.27h2.87Z"></path>
                                            <path class="cls-1" d="M19.64,13.91V22.5H4.36V13.91h.48a2.39,2.39,0,0,0,2.39-2.39,2.39,2.39,0,1,0,4.77,0,2.39,2.39,0,1,0,4.77,0,2.39,2.39,0,0,0,2.39,2.39Z">
                                            </path>
                                            <polyline class="cls-1" points="1.5 22.5 4.36 22.5 19.64 22.5 22.5 22.5"></polyline>
                                            <rect class="cls-1" x="6.27" y="1.5" width="11.45" height="4.77"></rect>
                                            <rect class="cls-1" x="8.18" y="17.73" width="7.64" height="4.77"></rect>
                                        </g>
                                    </g>
                                </svg>
                                <span>İşletmeler</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#entities" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M4 21V18.5C4 15.4624 6.46243 13 9.5 13H14.5C17.5376 13 20 15.4624 20 18.5V21M8 21V18M16 21V18M11 9H7.5C6.67157 9 6 8.32843 6 7.5V6.5C6 5.16725 6.57938 3.96983 7.5 3.14585M18 8.00001V6.50001C18 5.16726 17.4206 3.96983 16.5 3.14585M20 7.5V6M4 7.5V6M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path>
                                    </g>
                                </svg>
                                <span>Varlıklar</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="entities" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-customers.php"> Müşteriler </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#settings" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5"></circle>
                                        <path d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </g>
                                </svg>
                                <span>Ayarlar</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="settings" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-payment-types.php"> Ödeme Tipleri </a>
                            </li>
                            <li>
                                <a href="./pos-settings.php"> Masalar </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                                                }
                                                ?>
                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">
                    <div class="row" id="cancel-row">

                        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                            <div class="widget-content widget-content-area br-8">
                                <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="checkbox-column"> Record no. </th>

                                            <th>İşlem Türü</th>
                                            <th> İşlem </th>

                                            <th> Tarih</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (is_array($fetchDataLogsTypes)) {
                                            $sn = 1;
                                            foreach ($fetchDataLogsTypes as $data) {
                                                $product_category_name_url = $data['logs_type'];
                                                $product_category_id_url = $data['logs_id'];

                                                $seo_name = cleanTurkishCharacters($product_category_name_url);

                                                // SEO uyumlu URL'yi oluştur
                                                $url = "/$seo_name" . "/$product_category_id_url";
                                        ?>

                                                <tr>
                                                    <td class="checkbox-column"> 1 </td>
                                                    <td><span class="inv-amount"> <?php echo $data['logs_type'] ?></span></td>
                                                    <td>
                                                        <div class="d-flex">

                                                            <p class="align-self-center mb-0 user-name"> <?php echo $data['logs_process'] ?> </p>
                                                        </div>
                                                    </td>

                                                    <td><span class="inv-amount"></span> <?php echo $data['logs_currentdatetime'] ?> </td>





                                                </tr>
                                        <?php
                                                $sn++;
                                            }
                                        } else {
                                            echo $fetchDataLogsTypes;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper mt-0">
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
    <script src="../src/plugins/src/global/vendors.min.js"></script>
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../src/plugins/src/waves/waves.min.js"></script>
    <script src="../layouts/modern-light-menu/app.js"></script>
    <script src="../src/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="../src/plugins/src/table/datatable/datatables.js"></script>
    <script src="../src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="../src/assets/js/apps/app-transaction-logs.js"></script>

</body>

</html>