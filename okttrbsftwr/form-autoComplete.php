<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>AutoComplete | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../src/assets/img/favicon.ico"/>
    <link href="../layouts/modern-light-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="../layouts/modern-light-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../layouts/modern-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../src/plugins/src/autocomplete/css/autoComplete.02.css" rel="stylesheet" type="text/css" />

    <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/light/autocomplete/css/custom-autoComplete.css" rel="stylesheet" type="text/css" />

    <link href="../src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/plugins/css/dark/autocomplete/css/custom-autoComplete.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    
</head>
<body class="layout-boxed" data-bs-spy="scroll" data-bs-target="#navSection" data-bs-offset="100">
    
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">
        <header class="header navbar navbar-expand-sm expand-header">

            <a href="javascript:void(0);" class="sidebarCollapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </a>

            <div class="search-animated toggle-search">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x search-close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </div>
                </form>
                <span class="badge badge-secondary">Ctrl + /</span>
            </div>

            <ul class="navbar-item flex-row ms-lg-auto ms-0">

                <li class="nav-item dropdown language-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../src/assets/img/1x1/us.svg" class="flag-width" alt="flag">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/us.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;English</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/tr.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Turkish</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/br.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Portuguese</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/in.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Hindi</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/de.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;German</span></a>
                    </div>
                </li>

                <li class="nav-item theme-toggle-item">
                    <a href="javascript:void(0);" class="nav-link theme-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    </a>
                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                        <div class="drodpown-title message">
                            <h6 class="d-flex justify-content-between"><span class="align-self-center">Messages</span> <span class="badge badge-primary">9 Unread</span></h6>
                        </div>
                        <div class="notification-scroll">
                            <div class="dropdown-item">
                                <div class="media server-log">
                                    <img src="../src/assets/img/profile-16.jpeg" class="img-fluid me-2" alt="avatar">
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Kara Young</h6>
                                            <p class="">1 hr ago</p>
                                        </div>
                                        
                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown-item">
                                <div class="media ">
                                    <img src="../src/assets/img/profile-15.jpeg" class="img-fluid me-2" alt="avatar">
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Daisy Anderson</h6>
                                            <p class="">8 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media file-upload">
                                    <img src="../src/assets/img/profile-21.jpeg" class="img-fluid me-2" alt="avatar">
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Oscar Garner</h6>
                                            <p class="">14 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="drodpown-title notification mt-2">
                                <h6 class="d-flex justify-content-between"><span class="align-self-center">Notifications</span> <span class="badge badge-secondary">16 New</span></h6>
                            </div>

                            <div class="dropdown-item">
                                <div class="media server-log">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Server Rebooted</h6>
                                            <p class="">45 min ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Kelly Portfolio.pdf</h6>
                                            <p class="">670 kb</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Licence Expiring Soon</h6>
                                            <p class="">8 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </li>

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-container">
                            <div class="avatar avatar-sm avatar-indicators avatar-online">
                                <img alt="avatar" src="../src/assets/img/profile-30.png" class="rounded-circle">
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <div class="emoji me-2">
                                    &#x1F44B;
                                </div>
                                <div class="media-body">
                                    <h5>Shaun Park</h5>
                                    <p>Project Leader</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="user-profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="app-mailbox.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth-boxed-lockscreen.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth-boxed-signin.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                    
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="./index.html">
                                <img src="../src/assets/img/logo.svg" class="navbar-logo" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="./index.html" class="nav-link"> CORK </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>
                <div class="profile-info">
                    <div class="user-info">
                        <div class="profile-img">
                            <img src="../src/assets/img/profile-30.png" alt="avatar">
                        </div>
                        <div class="profile-content">
                            <h6 class="">Shaun Park</h6>
                            <p class="">Project Leader</p>
                        </div>
                    </div>
                </div>
                                
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./index.html"> Analytics </a>
                            </li>
                            <li>
                                <a href="./index2.html"> Sales </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>APPLICATIONS</span></div>
                    </li>

                    <li class="menu">
                        <a href="./app-calendar.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span>Calendar</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="./app-chat.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                <span>Chat</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="./app-mailbox.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span>Mailbox</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="./app-todoList.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                <span>Todo List</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="./app-notes.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span>Notes</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="./app-scrumboard.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                                <span>Scrumboard</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="./app-contacts.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <span>Contacts</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#invoice" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                <span>Invoice</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="invoice" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-invoice-list.html"> List </a>
                            </li>
                            <li>
                                <a href="./app-invoice-preview.html"> Preview </a>
                            </li>
                            <li>
                                <a href="./app-invoice-add.html"> Add </a>
                            </li>
                            <li>
                                <a href="./app-invoice-edit.html"> Edit </a>
                            </li>                            
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#ecommerce" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                <span>Ecommerce</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="ecommerce" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-ecommerce-product-shop.html"> Shop </a>
                            </li>
                            <li>
                                <a href="./app-ecommerce-product.html"> Product </a>
                            </li>
                            <li>
                                <a href="./app-ecommerce-product-list.html"> List </a>
                            </li>
                            <li>
                                <a href="./app-ecommerce-product-add.html"> Create </a>
                            </li>                            
                            <li>
                                <a href="./app-ecommerce-product-edit.html"> Edit </a>
                            </li>                            
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#blog" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                                <span>Blog</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="blog" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./app-blog-grid.html"> Grid </a>
                            </li>
                            <li>
                                <a href="./app-blog-list.html"> List </a>
                            </li>
                            <li>
                                <a href="./app-blog-post.html"> Post </a>
                            </li>
                            <li>
                                <a href="./app-blog-create.html"> Create </a>
                            </li>                            
                            <li>
                                <a href="./app-blog-edit.html"> Edit </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER INTERFACE</span></div>
                    </li>

                    <li class="menu">
                        <a href="#components" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Components</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="components" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./component-tabs.html"> Tabs </a>
                            </li>
                            <li>
                                <a href="./component-accordion.html"> Accordions  </a>
                            </li>
                            <li>
                                <a href="./component-modal.html"> Modals </a>
                            </li>                            
                            <li>
                                <a href="./component-cards.html"> Cards </a>
                            </li>
                            <li>
                                <a href="./component-bootstrap-carousel.html">Carousel</a>
                            </li>
                            <li>
                                <a href="./component-splide.html">Splide</a>
                            </li>
                            <li>
                                <a href="./component-sweetalert.html"> Sweet Alerts </a>
                            </li>
                            <li>
                                <a href="./component-timeline.html"> Timeline </a>
                            </li>
                            <li>
                                <a href="./component-notifications.html"> Notifications </a>
                            </li>
                            <li>
                                <a href="./component-media-object.html"> Media Object </a>
                            </li>
                            <li>
                                <a href="./component-list-group.html"> List Group </a>
                            </li>
                            <li>
                                <a href="./component-pricing-table.html"> Pricing Tables </a>
                            </li>
                            <li>
                                <a href="./component-lightbox.html"> Lightbox </a>
                            </li>
                            <li>
                                <a href="./component-drag-drop.html"> Drag and Drop </a>
                            </li>
                            <li>
                                <a href="./component-fonticons.html"> Font Icons </a>
                            </li>
                            <li>
                                <a href="./component-flags.html"> Flag Icons </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#elements" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Elements</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="elements" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./element-alerts.html"> Alerts </a>
                            </li>
                            <li>
                                <a href="./element-avatar.html"> Avatar </a>
                            </li>
                            <li>
                                <a href="./element-badges.html"> Badges </a>
                            </li>
                            <li>
                                <a href="./element-breadcrumbs.html"> Breadcrumbs </a>
                            </li>                            
                            <li>
                                <a href="./element-buttons.html"> Buttons </a>
                            </li>
                            <li>
                                <a href="./element-buttons-group.html"> Button Groups </a>
                            </li>
                            <li>
                                <a href="./element-color-library.html"> Color Library </a>
                            </li>
                            <li>
                                <a href="./element-dropdown.html"> Dropdown </a>
                            </li>
                            <li>
                                <a href="./element-infobox.html"> Infobox </a>
                            </li>
                            <li>
                                <a href="./element-loader.html"> Loader </a>
                            </li>
                            <li>
                                <a href="./element-pagination.html"> Pagination </a>
                            </li>
                            <li>
                                <a href="./element-popovers.html"> Popovers </a>
                            </li>
                            <li>
                                <a href="./element-progressbar.html"> Progress Bar </a>
                            </li>
                            <li>
                                <a href="./element-search.html"> Search </a>
                            </li>
                            <li>
                                <a href="./element-tooltips.html"> Tooltips </a>
                            </li>
                            <li>
                                <a href="./element-treeview.html"> Treeview </a>
                            </li>
                            <li>
                                <a href="./element-typography.html"> Typography </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="./map-leaflet.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                                <span>Maps</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="./charts-apex.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                                <span>Charts</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="./widgets.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                <span>Widgets</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#layouts" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-terminal"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                                <span>Layouts</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="layouts" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./layout-blank-page.html"> Blank Page </a>
                            </li>
                            <li>
                                <a href="./layout-empty.html"> Empty Page </a>
                            </li>
                            <li>
                                <a href="./layout-full-width.html"> Full Width </a>
                            </li>
                            <li>
                                <a href="./layout-collapsible-menu.html"> Collapsed Menu </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>TABLES AND FORMS</span></div>
                    </li>

                    <li class="menu">
                        <a href="./table-basic.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                <span>Tables</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="#datatables" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>DataTables</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="datatables" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./table-datatable-basic.html"> Basic </a>
                            </li>
                            <li>
                                <a href="./table-datatable-striped-table.html"> Striped </a>
                            </li>
                            <li>
                                <a href="./table-datatable-custom.html"> Custom </a>
                            </li>
                            <li>
                                <a href="./table-datatable-miscellaneous.html"> Miscellaneous </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu active">
                        <a href="#forms" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                <span>Forms</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="forms" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./form-bootstrap-basic.html"> Basic </a>
                            </li>
                            <li>
                                <a href="./form-input-group-basic.html"> Input Group </a>
                            </li>
                            <li>
                                <a href="./form-layouts.html"> Layouts </a>
                            </li>
                            <li>
                                <a href="./form-validation.html"> Validation </a>
                            </li>
                            <li>
                                <a href="./form-input-mask.html"> Input Mask </a>
                            </li>
                            <li>
                                <a href="./form-tom-select.html"> Tom Select </a>
                            </li>
                            <li>
                                <a href="./form-tagify.html"> Tagify </a>
                            </li>
                            <li>
                                <a href="./form-bootstrap-touchspin.html"> TouchSpin </a>
                            </li>
                            <li>
                                <a href="./form-maxlength.html"> Maxlength </a>
                            </li>                          
                            <li>
                                <a href="./form-checkbox.html"> Checkbox </a>
                            </li>
                            <li>
                                <a href="./form-radio.html"> Radio </a>
                            </li>
                            <li>
                                <a href="./form-switches.html"> Switches </a>
                            </li>
                            <li>
                                <a href="./form-wizard.html"> Wizards </a>
                            </li>
                            <li>
                                <a href="./form-fileupload.html"> File Upload </a>
                            </li>
                            <li>
                                <a href="./form-quill.html"> Quill Editor </a>
                            </li>
                            <li>
                                <a href="./form-markdown.html"> Markdown Editor </a>
                            </li>
                            <li>
                                <a href="./form-date-time-picker.html"> Date Time Picker </a>
                            </li>
                            <li>
                                <a href="./form-slider.html"> Slider </a>
                            </li>
                            <li>
                                <a href="./form-clipboard.html"> Clipboard </a>
                            </li>
                            <li class="active">
                                <a href="./form-autoComplete.html"> Auto Complete </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER AND PAGES</span></div>
                    </li>                    

                    <li class="menu">
                        <a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>Users</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="users" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./user-profile.html"> Profile </a>
                            </li>
                            <li>
                                <a href="./user-account-settings.html"> Account Settings </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#pages" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                <span>Pages</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="pages" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./pages-knowledge-base.html"> Knowledge Base </a>
                            </li>
                            <li>
                                <a href="./pages-faq.html"> FAQ </a>
                            </li>
                            <li>
                                <a href="./pages-contact-us.html"> Contact Form </a>
                            </li>
                            <li>
                                <a href="./pages-error404.html" target="_blank"> Error </a>
                            </li>
                            <li>
                                <a href="./pages-maintenence.html" target="_blank"> Maintanence </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="#authentication" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <span>Authentication</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="authentication" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./auth-boxed-signin.html" target="_blank"> Sign In </a>
                            </li>
                            <li>
                                <a href="./auth-boxed-signup.html" target="_blank"> Sign Up </a>
                            </li>
                            <li>
                                <a href="./auth-boxed-lockscreen.html" target="_blank"> Unlock </a>
                            </li>
                            <li>
                                <a href="./auth-boxed-password-reset.html" target="_blank"> Reset </a>
                            </li>
                            <li>
                                <a href="./auth-boxed-2-step-verification.html" target="_blank"> 2 Step </a>
                            </li>
                            <li>
                                <a href="./auth-cover-signin.html" target="_blank"> Sign In Cover </a>
                            </li>
                            <li>
                                <a href="./auth-cover-signup.html" target="_blank"> Sign Up Cover </a>
                            </li>
                            <li>
                                <a href="./auth-cover-lockscreen.html" target="_blank"> Unlock Cover </a>
                            </li>
                            <li>
                                <a href="./auth-cover-password-reset.html" target="_blank"> Reset Cover </a>
                            </li>
                            <li>
                                <a href="./auth-cover-2-step-verification.html" target="_blank"> 2 Step Cover </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>MISCELLANEOUS</span></div>
                    </li>

                    <li class="menu">
                        <a href="#menuLevel1" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                <span>Item Level</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="menuLevel1" data-bs-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Item Level 1a </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Item Level 1b </a>
                            </li>

                            <li>
                                <a href="#level-three" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed"> Item Level 1c <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="level-three" data-bs-parent="#pages"> 
                                    <li>
                                        <a href="javascript:void(0);"> Item Level 2a </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"> Item Level 2b </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"> Item Level 2c </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle disabled">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                <span>Item Disabled</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                <span>Item Label</span>
                                <span class="badge badge-primary sidebar-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle badge-icon"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> New</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a target="_blank" href="../../documentation/index.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                <span>Documentation</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a target="_blank" href="../../documentation/changelog.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                                <span>Changelog</span>
                            </div>
                        </a>
                    </li>
                    
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="container">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Form</a></li>
                                <li class="breadcrumb-item active" aria-current="page">AutoComplete</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

                    <div id="navSection" data-bs-spy="affix" class="nav sidenav">
                        <div class="sidenav-content">
                            <a href="#ftFormArray" class="active nav-link">Basic</a>
                            <a href="#ftFormTwoArray" class="nav-link">Search with Button</a>
                        </div>
                    </div>
                    
                    <div class="row layout-top-spacing" id="Basic">
                        <div id="ftFormArray" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Basic</h4> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area custom-autocomplete h-100">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input id="autoComplete" class="form-control">
                                        </div>
                                    </div>

                                    <div class="code-section-container show-code">
                                                
                                        <button class="btn toggle-code-snippet"><span>HTML</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                            <pre>
&lt;input id=&quot;autoComplete&quot; class=&quot;form-control&quot;&gt;
</pre>
                                        </div>
                                    </div>

                                    <div class="code-section-container">
                                                
                                        <button class="btn toggle-code-snippet"><span>JS</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                            <pre>
const autoCompleteJS = new autoComplete({
    selector: &quot;#autoComplete&quot;,
    placeHolder: &quot;Search Country Code&quot;,
    data: {
        src: [
            &quot;+93 - Afghanistan&quot;,
            &quot;+358 - Aland Islands&quot;,
            &quot;+355 - Albania&quot;,
            &quot;+213 - Algeria&quot;,
            &quot;+1684 - American Samoa&quot;,
            &quot;+376 - Andorra&quot;,
            &quot;+244 - Angola&quot;,
            &quot;+1264 - Anguilla&quot;,
            &quot;+672 - Antarctica&quot;,
            &quot;+1268 - Antigua and Barbuda&quot;,
            &quot;+54 - Argentina&quot;,
            &quot;+374 - Armenia&quot;,
            &quot;+297 - Aruba&quot;,
            &quot;+61 - Australia&quot;,
            &quot;+43 - Austria&quot;,
            &quot;+994 - Azerbaijan&quot;,
            &quot;+1242 - Bahamas&quot;,
            &quot;+973 - Bahrain&quot;,
            &quot;+880 - Bangladesh&quot;,
            &quot;+1246 - Barbados&quot;,
            &quot;+375 - Belarus&quot;,
            &quot;+32 - Belgium&quot;,
            &quot;+501 - Belize&quot;,
            &quot;+229 - Benin&quot;,
            &quot;+1441 - Bermuda&quot;,
            &quot;+975 - Bhutan&quot;,
            &quot;+591 - Bolivia&quot;,
            &quot;+599 - Bonaire, Sint Eustatius and Saba&quot;,
            &quot;+387 - Bosnia and Herzegovina&quot;,
            &quot;+267 - Botswana&quot;,
            &quot;+55 - Bouvet Island&quot;,
            &quot;+55 - Brazil&quot;,
            &quot;+246 - British Indian Ocean Territory&quot;,
            &quot;+673 - Brunei Darussalam&quot;,
            &quot;+359 - Bulgaria&quot;,
            &quot;+226 - Burkina Faso&quot;,
            &quot;+257 - Burundi&quot;,
            &quot;+855 - Cambodia&quot;,
            &quot;+237 - Cameroon&quot;,
            &quot;+1 - Canada&quot;,
            &quot;+238 - Cape Verde&quot;,
            &quot;+1345 - Cayman Islands&quot;,
            &quot;+236 - Central African Republic&quot;,
            &quot;+235 - Chad&quot;,
            &quot;+56 - Chile&quot;,
            &quot;+86 - China&quot;,
            &quot;+61 - Christmas Island&quot;,
            &quot;+672 - Cocos (Keeling) Islands&quot;,
            &quot;+57 - Colombia&quot;,
            &quot;+269 - Comoros&quot;,
            &quot;+242 - Congo&quot;,
            &quot;+242 - Congo, Democratic Republic of the Congo&quot;,
            &quot;+682 - Cook Islands&quot;,
            &quot;+506 - Costa Rica&quot;,
            &quot;+225 - Cote D'Ivoire&quot;,
            &quot;+385 - Croatia&quot;,
            &quot;+53 - Cuba&quot;,
            &quot;+599 - Curacao&quot;,
            &quot;+357 - Cyprus&quot;,
            &quot;+420 - Czech Republic&quot;,
            &quot;+45 - Denmark&quot;,
            &quot;+253 - Djibouti&quot;,
            &quot;+1767 - Dominica&quot;,
            &quot;+1809 - Dominican Republic&quot;,
            &quot;+593 - Ecuador&quot;,
            &quot;+20 - Egypt&quot;,
            &quot;+503 - El Salvador&quot;,
            &quot;+240 - Equatorial Guinea&quot;,
            &quot;+291 - Eritrea&quot;,
            &quot;+372 - Estonia&quot;,
            &quot;+251 - Ethiopia&quot;,
            &quot;+500 - Falkland Islands (Malvinas)&quot;,
            &quot;+298 - Faroe Islands&quot;,
            &quot;+679 - Fiji&quot;,
            &quot;+358 - Finland&quot;,
            &quot;+33 - France&quot;,
            &quot;+594 - French Guiana&quot;,
            &quot;+689 - French Polynesia&quot;,
            &quot;+262 - French Southern Territories&quot;,
            &quot;+241 - Gabon&quot;,
            &quot;+220 - Gambia&quot;,
            &quot;+995 - Georgia&quot;,
            &quot;+49 - Germany&quot;,
            &quot;+233 - Ghana&quot;,
            &quot;+350 - Gibraltar&quot;,
            &quot;+30 - Greece&quot;,
            &quot;+299 - Greenland&quot;,
            &quot;+1473 - Grenada&quot;,
            &quot;+590 - Guadeloupe&quot;,
            &quot;+1671 - Guam&quot;,
            &quot;+502 - Guatemala&quot;,
            &quot;+44 - Guernsey&quot;,
            &quot;+224 - Guinea&quot;,
            &quot;+245 - Guinea-Bissau&quot;,
            &quot;+592 - Guyana&quot;,
            &quot;+509 - Haiti&quot;,
            &quot;+0 - Heard Island and Mcdonald Islands&quot;,
            &quot;+39 - Holy See (Vatican City State)&quot;,
            &quot;+504 - Honduras&quot;,
            &quot;+852 - Hong Kong&quot;,
            &quot;+36 - Hungary&quot;,
            &quot;+354 - Iceland&quot;,
            &quot;+91 - India&quot;,
            &quot;+62 - Indonesia&quot;,
            &quot;+98 - Iran, Islamic Republic of&quot;,
            &quot;+964 - Iraq&quot;,
            &quot;+353 - Ireland&quot;,
            &quot;+44 - Isle of Man&quot;,
            &quot;+972 - Israel&quot;,
            &quot;+39 - Italy&quot;,
            &quot;+1876 - Jamaica&quot;,
            &quot;+81 - Japan&quot;,
            &quot;+44 - Jersey&quot;,
            &quot;+962 - Jordan&quot;,
            &quot;+7 - Kazakhstan&quot;,
            &quot;+254 - Kenya&quot;,
            &quot;+686 - Kiribati&quot;,
            &quot;+850 - Korea, Democratic People's Republic of&quot;,
            &quot;+82 - Korea, Republic of&quot;,
            &quot;+381 - Kosovo&quot;,
            &quot;+965 - Kuwait&quot;,
            &quot;+996 - Kyrgyzstan&quot;,
            &quot;+856 - Lao People's Democratic Republic&quot;,
            &quot;+371 - Latvia&quot;,
            &quot;+961 - Lebanon&quot;,
            &quot;+266 - Lesotho&quot;,
            &quot;+231 - Liberia&quot;,
            &quot;+218 - Libyan Arab Jamahiriya&quot;,
            &quot;+423 - Liechtenstein&quot;,
            &quot;+370 - Lithuania&quot;,
            &quot;+352 - Luxembourg&quot;,
            &quot;+853 - Macao&quot;,
            &quot;+389 - Macedonia, the Former Yugoslav Republic of&quot;,
            &quot;+261 - Madagascar&quot;,
            &quot;+265 - Malawi&quot;,
            &quot;+60 - Malaysia&quot;,
            &quot;+960 - Maldives&quot;,
            &quot;+223 - Mali&quot;,
            &quot;+356 - Malta&quot;,
            &quot;+692 - Marshall Islands&quot;,
            &quot;+596 - Martinique&quot;,
            &quot;+222 - Mauritania&quot;,
            &quot;+230 - Mauritius&quot;,
            &quot;+269 - Mayotte&quot;,
            &quot;+52 - Mexico&quot;,
            &quot;+691 - Micronesia, Federated States of&quot;,
            &quot;+373 - Moldova, Republic of&quot;,
            &quot;+377 - Monaco&quot;,
            &quot;+976 - Mongolia&quot;,
            &quot;+382 - Montenegro&quot;,
            &quot;+1664 - Montserrat&quot;,
            &quot;+212 - Morocco&quot;,
            &quot;+258 - Mozambique&quot;,
            &quot;+95 - Myanmar&quot;,
            &quot;+264 - Namibia&quot;,
            &quot;+674 - Nauru&quot;,
            &quot;+977 - Nepal&quot;,
            &quot;+31 - Netherlands&quot;,
            &quot;+599 - Netherlands Antilles&quot;,
            &quot;+687 - New Caledonia&quot;,
            &quot;+64 - New Zealand&quot;,
            &quot;+505 - Nicaragua&quot;,
            &quot;+227 - Niger&quot;,
            &quot;+234 - Nigeria&quot;,
            &quot;+683 - Niue&quot;,
            &quot;+672 - Norfolk Island&quot;,
            &quot;+1670 - Northern Mariana Islands&quot;,
            &quot;+47 - Norway&quot;,
            &quot;+968 - Oman&quot;,
            &quot;+92 - Pakistan&quot;,
            &quot;+680 - Palau&quot;,
            &quot;+970 - Palestinian Territory, Occupied&quot;,
            &quot;+507 - Panama&quot;,
            &quot;+675 - Papua New Guinea&quot;,
            &quot;+595 - Paraguay&quot;,
            &quot;+51 - Peru&quot;,
            &quot;+63 - Philippines&quot;,
            &quot;+64 - Pitcairn&quot;,
            &quot;+48 - Poland&quot;,
            &quot;+351 - Portugal&quot;,
            &quot;+1787 - Puerto Rico&quot;,
            &quot;+974 - Qatar&quot;,
            &quot;+262 - Reunion&quot;,
            &quot;+40 - Romania&quot;,
            &quot;+70 - Russian Federation&quot;,
            &quot;+250 - Rwanda&quot;,
            &quot;+590 - Saint Barthelemy&quot;,
            &quot;+290 - Saint Helena&quot;,
            &quot;+1869 - Saint Kitts and Nevis&quot;,
            &quot;+1758 - Saint Lucia&quot;,
            &quot;+590 - Saint Martin&quot;,
            &quot;+508 - Saint Pierre and Miquelon&quot;,
            &quot;+1784 - Saint Vincent and the Grenadines&quot;,
            &quot;+684 - Samoa&quot;,
            &quot;+378 - San Marino&quot;,
            &quot;+239 - Sao Tome and Principe&quot;,
            &quot;+966 - Saudi Arabia&quot;,
            &quot;+221 - Senegal&quot;,
            &quot;+381 - Serbia&quot;,
            &quot;+381 - Serbia and Montenegro&quot;,
            &quot;+248 - Seychelles&quot;,
            &quot;+232 - Sierra Leone&quot;,
            &quot;+65 - Singapore&quot;,
            &quot;+1 - Sint Maarten&quot;,
            &quot;+421 - Slovakia&quot;,
            &quot;+386 - Slovenia&quot;,
            &quot;+677 - Solomon Islands&quot;,
            &quot;+252 - Somalia&quot;,
            &quot;+27 - South Africa&quot;,
            &quot;+500 - South Georgia and the South Sandwich Islands&quot;,
            &quot;+211 - South Sudan&quot;,
            &quot;+34 - Spain&quot;,
            &quot;+94 - Sri Lanka&quot;,
            &quot;+249 - Sudan&quot;,
            &quot;+597 - Suriname&quot;,
            &quot;+47 - Svalbard and Jan Mayen&quot;,
            &quot;+268 - Swaziland&quot;,
            &quot;+46 - Sweden&quot;,
            &quot;+41 - Switzerland&quot;,
            &quot;+963 - Syrian Arab Republic&quot;,
            &quot;+886 - Taiwan, Province of China&quot;,
            &quot;+992 - Tajikistan&quot;,
            &quot;+255 - Tanzania, United Republic of&quot;,
            &quot;+66 - Thailand&quot;,
            &quot;+670 - Timor-Leste&quot;,
            &quot;+228 - Togo&quot;,
            &quot;+690 - Tokelau&quot;,
            &quot;+676 - Tonga&quot;,
            &quot;+1868 - Trinidad and Tobago&quot;,
            &quot;+216 - Tunisia&quot;,
            &quot;+90 - Turkey&quot;,
            &quot;+7370 - Turkmenistan&quot;,
            &quot;+1649 - Turks and Caicos Islands&quot;,
            &quot;+688 - Tuvalu&quot;,
            &quot;+256 - Uganda&quot;,
            &quot;+380 - Ukraine&quot;,
            &quot;+971 - United Arab Emirates&quot;,
            &quot;+44 - United Kingdom&quot;,
            &quot;+1 - United States&quot;,
            &quot;+1 - United States Minor Outlying Islands&quot;,
            &quot;+598 - Uruguay&quot;,
            &quot;+998 - Uzbekistan&quot;,
            &quot;+678 - Vanuatu&quot;,
            &quot;+58 - Venezuela&quot;,
            &quot;+84 - Viet Nam&quot;,
            &quot;+1284 - Virgin Islands, British&quot;,
            &quot;+1340 - Virgin Islands, U.s.&quot;,
            &quot;+681 - Wallis and Futuna&quot;,
            &quot;+212 - Western Sahara&quot;,
            &quot;+967 - Yemen&quot;,
            &quot;+260 - Zambia&quot;,
            &quot;+263 - Zimbabwe&quot;
        ],
        cache: true,
    },
    resultsList: {
        element: (list, data) =&gt; {
            if (!data.results.length) {
                // Create &quot;No Results&quot; message element
                const message = document.createElement(&quot;div&quot;);
                // Add class to the created element
                message.setAttribute(&quot;class&quot;, &quot;no_result&quot;);
                // Add message text content
                message.innerHTML = `&lt;span&gt;Found No Results for &quot;${data.query}&quot;&lt;/span&gt;`;
                // Append message element to the results list
                list.prepend(message);
            }
        },
        noResults: true,
    },
    resultItem: {
        highlight: {
            render: true
        }
    },
    events: {
        input: {
            focus() {
            if (autoCompleteJS.input.value.length) autoCompleteJS.start();
            },
            selection(event) {
            const feedback = event.detail;
            // Prepare User's Selected Value
            const selection = feedback.selection.value;
            
            // Replace Input value with the selected value
            autoCompleteJS.input.value = selection;
            },
        },
    },
});
</pre>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="ftFormTwoArray" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Search with Button</h4> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="autocomplete-btn">
                                                <input id="example2" class="form-control">
                                                <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="code-section-container  show-code">
                                                
                                        <button class="btn toggle-code-snippet"><span>HTML</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                            <pre>
&lt;div class=&quot;autocomplete-btn&quot;&gt;
    &lt;input id=&quot;example2&quot; class=&quot;form-control&quot;&gt;
    &lt;button class=&quot;btn btn-primary&quot;&gt;Search&lt;/button&gt;
&lt;/div&gt;
</pre>
                                        </div>
                                    </div>

                                    <div class="code-section-container  show-code">
                                                
                                        <button class="btn toggle-code-snippet"><span>JS</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                            <pre>
const example2 = new autoComplete({
    selector: &quot;#example2&quot;,
    placeHolder: &quot;Enter Country Code&quot;,
    data: {
        src: [
            &quot;+93 - Afghanistan&quot;,
            &quot;+358 - Aland Islands&quot;,
            &quot;+355 - Albania&quot;,
            &quot;+213 - Algeria&quot;,
            &quot;+1684 - American Samoa&quot;,
            &quot;+376 - Andorra&quot;,
            &quot;+244 - Angola&quot;,
            &quot;+1264 - Anguilla&quot;,
            &quot;+672 - Antarctica&quot;,
            &quot;+1268 - Antigua and Barbuda&quot;,
            &quot;+54 - Argentina&quot;,
            &quot;+374 - Armenia&quot;,
            &quot;+297 - Aruba&quot;,
            &quot;+61 - Australia&quot;,
            &quot;+43 - Austria&quot;,
            &quot;+994 - Azerbaijan&quot;,
            &quot;+1242 - Bahamas&quot;,
            &quot;+973 - Bahrain&quot;,
            &quot;+880 - Bangladesh&quot;,
            &quot;+1246 - Barbados&quot;,
            &quot;+375 - Belarus&quot;,
            &quot;+32 - Belgium&quot;,
            &quot;+501 - Belize&quot;,
            &quot;+229 - Benin&quot;,
            &quot;+1441 - Bermuda&quot;,
            &quot;+975 - Bhutan&quot;,
            &quot;+591 - Bolivia&quot;,
            &quot;+599 - Bonaire, Sint Eustatius and Saba&quot;,
            &quot;+387 - Bosnia and Herzegovina&quot;,
            &quot;+267 - Botswana&quot;,
            &quot;+55 - Bouvet Island&quot;,
            &quot;+55 - Brazil&quot;,
            &quot;+246 - British Indian Ocean Territory&quot;,
            &quot;+673 - Brunei Darussalam&quot;,
            &quot;+359 - Bulgaria&quot;,
            &quot;+226 - Burkina Faso&quot;,
            &quot;+257 - Burundi&quot;,
            &quot;+855 - Cambodia&quot;,
            &quot;+237 - Cameroon&quot;,
            &quot;+1 - Canada&quot;,
            &quot;+238 - Cape Verde&quot;,
            &quot;+1345 - Cayman Islands&quot;,
            &quot;+236 - Central African Republic&quot;,
            &quot;+235 - Chad&quot;,
            &quot;+56 - Chile&quot;,
            &quot;+86 - China&quot;,
            &quot;+61 - Christmas Island&quot;,
            &quot;+672 - Cocos (Keeling) Islands&quot;,
            &quot;+57 - Colombia&quot;,
            &quot;+269 - Comoros&quot;,
            &quot;+242 - Congo&quot;,
            &quot;+242 - Congo, Democratic Republic of the Congo&quot;,
            &quot;+682 - Cook Islands&quot;,
            &quot;+506 - Costa Rica&quot;,
            &quot;+225 - Cote D'Ivoire&quot;,
            &quot;+385 - Croatia&quot;,
            &quot;+53 - Cuba&quot;,
            &quot;+599 - Curacao&quot;,
            &quot;+357 - Cyprus&quot;,
            &quot;+420 - Czech Republic&quot;,
            &quot;+45 - Denmark&quot;,
            &quot;+253 - Djibouti&quot;,
            &quot;+1767 - Dominica&quot;,
            &quot;+1809 - Dominican Republic&quot;,
            &quot;+593 - Ecuador&quot;,
            &quot;+20 - Egypt&quot;,
            &quot;+503 - El Salvador&quot;,
            &quot;+240 - Equatorial Guinea&quot;,
            &quot;+291 - Eritrea&quot;,
            &quot;+372 - Estonia&quot;,
            &quot;+251 - Ethiopia&quot;,
            &quot;+500 - Falkland Islands (Malvinas)&quot;,
            &quot;+298 - Faroe Islands&quot;,
            &quot;+679 - Fiji&quot;,
            &quot;+358 - Finland&quot;,
            &quot;+33 - France&quot;,
            &quot;+594 - French Guiana&quot;,
            &quot;+689 - French Polynesia&quot;,
            &quot;+262 - French Southern Territories&quot;,
            &quot;+241 - Gabon&quot;,
            &quot;+220 - Gambia&quot;,
            &quot;+995 - Georgia&quot;,
            &quot;+49 - Germany&quot;,
            &quot;+233 - Ghana&quot;,
            &quot;+350 - Gibraltar&quot;,
            &quot;+30 - Greece&quot;,
            &quot;+299 - Greenland&quot;,
            &quot;+1473 - Grenada&quot;,
            &quot;+590 - Guadeloupe&quot;,
            &quot;+1671 - Guam&quot;,
            &quot;+502 - Guatemala&quot;,
            &quot;+44 - Guernsey&quot;,
            &quot;+224 - Guinea&quot;,
            &quot;+245 - Guinea-Bissau&quot;,
            &quot;+592 - Guyana&quot;,
            &quot;+509 - Haiti&quot;,
            &quot;+0 - Heard Island and Mcdonald Islands&quot;,
            &quot;+39 - Holy See (Vatican City State)&quot;,
            &quot;+504 - Honduras&quot;,
            &quot;+852 - Hong Kong&quot;,
            &quot;+36 - Hungary&quot;,
            &quot;+354 - Iceland&quot;,
            &quot;+91 - India&quot;,
            &quot;+62 - Indonesia&quot;,
            &quot;+98 - Iran, Islamic Republic of&quot;,
            &quot;+964 - Iraq&quot;,
            &quot;+353 - Ireland&quot;,
            &quot;+44 - Isle of Man&quot;,
            &quot;+972 - Israel&quot;,
            &quot;+39 - Italy&quot;,
            &quot;+1876 - Jamaica&quot;,
            &quot;+81 - Japan&quot;,
            &quot;+44 - Jersey&quot;,
            &quot;+962 - Jordan&quot;,
            &quot;+7 - Kazakhstan&quot;,
            &quot;+254 - Kenya&quot;,
            &quot;+686 - Kiribati&quot;,
            &quot;+850 - Korea, Democratic People's Republic of&quot;,
            &quot;+82 - Korea, Republic of&quot;,
            &quot;+381 - Kosovo&quot;,
            &quot;+965 - Kuwait&quot;,
            &quot;+996 - Kyrgyzstan&quot;,
            &quot;+856 - Lao People's Democratic Republic&quot;,
            &quot;+371 - Latvia&quot;,
            &quot;+961 - Lebanon&quot;,
            &quot;+266 - Lesotho&quot;,
            &quot;+231 - Liberia&quot;,
            &quot;+218 - Libyan Arab Jamahiriya&quot;,
            &quot;+423 - Liechtenstein&quot;,
            &quot;+370 - Lithuania&quot;,
            &quot;+352 - Luxembourg&quot;,
            &quot;+853 - Macao&quot;,
            &quot;+389 - Macedonia, the Former Yugoslav Republic of&quot;,
            &quot;+261 - Madagascar&quot;,
            &quot;+265 - Malawi&quot;,
            &quot;+60 - Malaysia&quot;,
            &quot;+960 - Maldives&quot;,
            &quot;+223 - Mali&quot;,
            &quot;+356 - Malta&quot;,
            &quot;+692 - Marshall Islands&quot;,
            &quot;+596 - Martinique&quot;,
            &quot;+222 - Mauritania&quot;,
            &quot;+230 - Mauritius&quot;,
            &quot;+269 - Mayotte&quot;,
            &quot;+52 - Mexico&quot;,
            &quot;+691 - Micronesia, Federated States of&quot;,
            &quot;+373 - Moldova, Republic of&quot;,
            &quot;+377 - Monaco&quot;,
            &quot;+976 - Mongolia&quot;,
            &quot;+382 - Montenegro&quot;,
            &quot;+1664 - Montserrat&quot;,
            &quot;+212 - Morocco&quot;,
            &quot;+258 - Mozambique&quot;,
            &quot;+95 - Myanmar&quot;,
            &quot;+264 - Namibia&quot;,
            &quot;+674 - Nauru&quot;,
            &quot;+977 - Nepal&quot;,
            &quot;+31 - Netherlands&quot;,
            &quot;+599 - Netherlands Antilles&quot;,
            &quot;+687 - New Caledonia&quot;,
            &quot;+64 - New Zealand&quot;,
            &quot;+505 - Nicaragua&quot;,
            &quot;+227 - Niger&quot;,
            &quot;+234 - Nigeria&quot;,
            &quot;+683 - Niue&quot;,
            &quot;+672 - Norfolk Island&quot;,
            &quot;+1670 - Northern Mariana Islands&quot;,
            &quot;+47 - Norway&quot;,
            &quot;+968 - Oman&quot;,
            &quot;+92 - Pakistan&quot;,
            &quot;+680 - Palau&quot;,
            &quot;+970 - Palestinian Territory, Occupied&quot;,
            &quot;+507 - Panama&quot;,
            &quot;+675 - Papua New Guinea&quot;,
            &quot;+595 - Paraguay&quot;,
            &quot;+51 - Peru&quot;,
            &quot;+63 - Philippines&quot;,
            &quot;+64 - Pitcairn&quot;,
            &quot;+48 - Poland&quot;,
            &quot;+351 - Portugal&quot;,
            &quot;+1787 - Puerto Rico&quot;,
            &quot;+974 - Qatar&quot;,
            &quot;+262 - Reunion&quot;,
            &quot;+40 - Romania&quot;,
            &quot;+70 - Russian Federation&quot;,
            &quot;+250 - Rwanda&quot;,
            &quot;+590 - Saint Barthelemy&quot;,
            &quot;+290 - Saint Helena&quot;,
            &quot;+1869 - Saint Kitts and Nevis&quot;,
            &quot;+1758 - Saint Lucia&quot;,
            &quot;+590 - Saint Martin&quot;,
            &quot;+508 - Saint Pierre and Miquelon&quot;,
            &quot;+1784 - Saint Vincent and the Grenadines&quot;,
            &quot;+684 - Samoa&quot;,
            &quot;+378 - San Marino&quot;,
            &quot;+239 - Sao Tome and Principe&quot;,
            &quot;+966 - Saudi Arabia&quot;,
            &quot;+221 - Senegal&quot;,
            &quot;+381 - Serbia&quot;,
            &quot;+381 - Serbia and Montenegro&quot;,
            &quot;+248 - Seychelles&quot;,
            &quot;+232 - Sierra Leone&quot;,
            &quot;+65 - Singapore&quot;,
            &quot;+1 - Sint Maarten&quot;,
            &quot;+421 - Slovakia&quot;,
            &quot;+386 - Slovenia&quot;,
            &quot;+677 - Solomon Islands&quot;,
            &quot;+252 - Somalia&quot;,
            &quot;+27 - South Africa&quot;,
            &quot;+500 - South Georgia and the South Sandwich Islands&quot;,
            &quot;+211 - South Sudan&quot;,
            &quot;+34 - Spain&quot;,
            &quot;+94 - Sri Lanka&quot;,
            &quot;+249 - Sudan&quot;,
            &quot;+597 - Suriname&quot;,
            &quot;+47 - Svalbard and Jan Mayen&quot;,
            &quot;+268 - Swaziland&quot;,
            &quot;+46 - Sweden&quot;,
            &quot;+41 - Switzerland&quot;,
            &quot;+963 - Syrian Arab Republic&quot;,
            &quot;+886 - Taiwan, Province of China&quot;,
            &quot;+992 - Tajikistan&quot;,
            &quot;+255 - Tanzania, United Republic of&quot;,
            &quot;+66 - Thailand&quot;,
            &quot;+670 - Timor-Leste&quot;,
            &quot;+228 - Togo&quot;,
            &quot;+690 - Tokelau&quot;,
            &quot;+676 - Tonga&quot;,
            &quot;+1868 - Trinidad and Tobago&quot;,
            &quot;+216 - Tunisia&quot;,
            &quot;+90 - Turkey&quot;,
            &quot;+7370 - Turkmenistan&quot;,
            &quot;+1649 - Turks and Caicos Islands&quot;,
            &quot;+688 - Tuvalu&quot;,
            &quot;+256 - Uganda&quot;,
            &quot;+380 - Ukraine&quot;,
            &quot;+971 - United Arab Emirates&quot;,
            &quot;+44 - United Kingdom&quot;,
            &quot;+1 - United States&quot;,
            &quot;+1 - United States Minor Outlying Islands&quot;,
            &quot;+598 - Uruguay&quot;,
            &quot;+998 - Uzbekistan&quot;,
            &quot;+678 - Vanuatu&quot;,
            &quot;+58 - Venezuela&quot;,
            &quot;+84 - Viet Nam&quot;,
            &quot;+1284 - Virgin Islands, British&quot;,
            &quot;+1340 - Virgin Islands, U.s.&quot;,
            &quot;+681 - Wallis and Futuna&quot;,
            &quot;+212 - Western Sahara&quot;,
            &quot;+967 - Yemen&quot;,
            &quot;+260 - Zambia&quot;,
            &quot;+263 - Zimbabwe&quot;
        ],
        cache: true,
    },
    resultsList: {
        element: (list, data) =&gt; {
            if (!data.results.length) {
                // Create &quot;No Results&quot; message element
                const message = document.createElement(&quot;div&quot;);
                // Add class to the created element
                message.setAttribute(&quot;class&quot;, &quot;no_result&quot;);
                // Add message text content
                message.innerHTML = `&lt;span&gt;Found No Results for &quot;${data.query}&quot;&lt;/span&gt;`;
                // Append message element to the results list
                list.prepend(message);
            }
        },
        noResults: true,
    },
    resultItem: {
        highlight: {
            render: true
        }
    },
    events: {
        input: {
            focus() {
            if (example2.input.value.length) example2.start();
            },
            selection(event) {
            const feedback = event.detail;
            // Prepare User's Selected Value
            const selection = feedback.selection.value;
            
            // Replace Input value with the selected value
            example2.input.value = selection;
            },
        },
    },
});
</pre>
                                        </div>
                                    </div>
                                </div>
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
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
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
    
    
    <script src="../src/plugins/src/highlight/highlight.pack.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../src/assets/js/scrollspyNav.js"></script>
    <script src="../src/plugins/src/autocomplete/autoComplete.min.js"></script>
    <script src="../src/plugins/src/autocomplete/custom-autoComplete.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>