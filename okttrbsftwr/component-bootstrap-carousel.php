    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Bootstrap Carousel | CORK - Multipurpose Bootstrap Dashboard Template </title>
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

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/light/components/carousel.css" rel="stylesheet" type="text/css" />

    <link href="../src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/components/carousel.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    
</head>
<body class="layout-boxed" data-bs-spy="scroll" data-bs-bs-target="#navSection" data-bs-offset="100">
    
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
        <div class="cs-overlay"></div>
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

                    <li class="menu active">
                        <a href="#components" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Components</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="components" data-bs-parent="#accordionExample">
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
                            <li class="active">
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

                    <li class="menu">
                        <a href="#forms" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                <span>Forms</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="forms" data-bs-parent="#accordionExample">
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
                            <li>
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
                                <li class="breadcrumb-item"><a href="#">Components</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Carousel</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

                    <div id="navSection" data-bs-spy="affix" class="nav  sidenav">
                        <div class="sidenav-content">
                            <a href="#custom_carousel" class="active nav-link">Custom</a>
                            <a href="#slides_only" class="nav-link">Slides only</a>
                            <a href="#with_controls" class="nav-link">With controls</a>
                            <a href="#with_indicators" class="nav-link">With indicators</a>
                            <a href="#with_captions" class="nav-link">With captions</a>
                        </div>
                    </div>
                
                    <div class="row layout-top-spacing">
                        <div id="custom_carousel" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Custom Carousel</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area  style-custom-1">
                                    <div class="container" style="max-width: 928px;">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 mb-5 p-0">
                                                <div id="style1" class="carousel slide style-custom-1" data-bs-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-bs-target="#style1" data-bs-slide-to="0" class="active"></li>
                                                        <li data-bs-target="#style1" data-bs-slide-to="1"></li>
                                                        <li data-bs-target="#style1" data-bs-slide-to="2"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100 slide-image" src="../src/assets/img/1.jpeg" alt="First slide">
                                                            <div class="carousel-caption">
                                                                <span class="badge">Lifestyle</span>
                                                                <h3>How To Make More Blog By Doing Less</h3>
                                                                <div class="media">
                                                                    <img src="../src/assets/img/profile-6.jpeg" class="" alt="avatar">
                                                                    <div class="media-body">
                                                                        <h6 class="user-name">User name</h6>
                                                                        <p class="meta-time"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> May 14, 2022</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100 slide-image" src="../src/assets/img/3.jpeg" alt="Second slide">
                                                            <div class="carousel-caption">
                                                                <span class="badge">Lifestyle</span>
                                                                <h3>How To Make Blog</h3>
                                                                <div class="media">
                                                                    <img src="../src/assets/img/profile-6.jpeg" class="" alt="avatar">
                                                                    <div class="media-body">
                                                                        <h6 class="user-name">User name</h6>
                                                                        <p class="meta-time"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> April 30, 2022</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100 slide-image" src="../src/assets/img/2.jpg" alt="Third slide">
                                                            <div class="carousel-caption">
                                                                <span class="badge">Lifestyle</span>
                                                                <h3>Best Blog Android Apps</h3>
                                                                <div class="media">
                                                                    <img src="../src/assets/img/profile-6.jpeg" class="" alt="avatar">
                                                                    <div class="media-body">
                                                                        <h6 class="user-name">User name</h6>
                                                                        <p class="meta-time"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> April 25, 2022</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#style1" role="button" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#style1" role="button" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="code-section-container show-code">
                                                
                                        <button class="btn toggle-code-snippet"><span>Code</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                                <pre>
&lt;div class="container" style="max-width: 928px;"&gt;
    &lt;div class="row"&gt;
        &lt;div class="col-lg-12 col-md-12 mb-5 p-0"&gt;
            &lt;div id="style1" class="carousel slide style-custom-1" data-bs-ride="carousel"&gt;
                &lt;ol class="carousel-indicators"&gt;
                    &lt;li data-bs-target="#style1" data-bs-slide-to="0" class="active"&gt;&lt;/li&gt;
                    &lt;li data-bs-target="#style1" data-bs-slide-to="1"&gt;&lt;/li&gt;
                    &lt;li data-bs-target="#style1" data-bs-slide-to="2"&gt;&lt;/li&gt;
                &lt;/ol&gt;
                &lt;div class="carousel-inner"&gt;
                    &lt;div class="carousel-item active"&gt;
                        &lt;img class="d-block w-100 slide-image" src="../src/assets/img/1.jpeg" alt="First slide"&gt;
                        &lt;div class="carousel-caption"&gt;
                            .................
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class="carousel-item"&gt;
                        &lt;img class="d-block w-100 slide-image" src="../src/assets/img/3.jpeg" alt="Second slide"&gt;
                        &lt;div class="carousel-caption"&gt;
                            .................
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class="carousel-item"&gt;
                        &lt;img class="d-block w-100 slide-image" src="../src/assets/img/2.jpg" alt="Third slide"&gt;
                        &lt;div class="carousel-caption"&gt;
                            .................
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
                &lt;a class="carousel-control-prev" href="#style1" role="button" data-bs-slide="prev"&gt;
                    &lt;span class="carousel-control-prev-icon" aria-hidden="true"&gt;&lt;/span&gt;
                    &lt;span class="visually-hidden"&gt;Previous&lt;/span&gt;
                &lt;/a&gt;
                &lt;a class="carousel-control-next" href="#style1" role="button" data-bs-slide="next"&gt;
                    &lt;span class="carousel-control-next-icon" aria-hidden="true"&gt;&lt;/span&gt;
                    &lt;span class="visually-hidden"&gt;Next&lt;/span&gt;
                &lt;/a&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

    </pre>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div id="slides_only" class="col-lg-12 col-md-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Slides only</h4> 
                                        </div>                             
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="../src/assets/img/1.jpeg" alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="../src/assets/img/2.jpg" alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="../src/assets/img/3.jpeg" alt="Third slide">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="code-section-container">
                                                
                                        <button class="btn toggle-code-snippet"><span>Code</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                            <pre>
&lt;div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel"&gt;
    &lt;div class="carousel-inner"&gt;
        &lt;div class="carousel-item active"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/1.jpeg" alt="First slide"&gt;
        &lt;/div&gt;
        &lt;div class="carousel-item"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/2.jpg" alt="Second slide"&gt;
        &lt;/div&gt;
        &lt;div class="carousel-item"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/3.jpeg" alt="Third slide"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</pre>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="with_controls" class="col-lg-12 col-md-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>With controls</h4> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="../src/assets/img/3.jpeg" alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="../src/assets/img/2.jpg" alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="../src/assets/img/1.jpeg" alt="Third slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>                                            
                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="code-section-container">
                                                
                                        <button class="btn toggle-code-snippet"><span>Code</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                            <pre>
&lt;div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"&gt;
    &lt;div class="carousel-inner"&gt;
        &lt;div class="carousel-item active"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/3.jpeg" alt="First slide"&gt;
        &lt;/div&gt;
        &lt;div class="carousel-item"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/2.jpg" alt="Second slide"&gt;
        &lt;/div&gt;
        &lt;div class="carousel-item"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/1.jpeg" alt="Third slide"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"&gt;
        &lt;span class="carousel-control-prev-icon" aria-hidden="true"&gt;&lt;/span&gt;
        &lt;span class="visually-hidden"&gt;Previous&lt;/span&gt;
    &lt;/a&gt;                                            
    &lt;a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"&gt;
        &lt;span class="carousel-control-next-icon" aria-hidden="true"&gt;&lt;/span&gt;
        &lt;span class="visually-hidden"&gt;Next&lt;/span&gt;
    &lt;/a&gt;
&lt;/div&gt;
</pre>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div id="with_indicators" class="col-lg-12 col-md-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>With indicators</h4> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active m"></li>
                                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="../src/assets/img/2.jpg" alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="../src/assets/img/1.jpeg" alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="../src/assets/img/3.jpeg" alt="Third slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="code-section-container">
                                                
                                        <button class="btn toggle-code-snippet"><span>Code</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                            <pre>
&lt;div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"&gt;
    &lt;ol class="carousel-indicators"&gt;
        &lt;li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active m"&gt;&lt;/li&gt;
        &lt;li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"&gt;&lt;/li&gt;
        &lt;li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"&gt;&lt;/li&gt;
    &lt;/ol&gt;
    &lt;div class="carousel-inner"&gt;
        &lt;div class="carousel-item active"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/2.jpg" alt="First slide"&gt;
        &lt;/div&gt;
        &lt;div class="carousel-item"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/1.jpeg" alt="Second slide"&gt;
        &lt;/div&gt;
        &lt;div class="carousel-item"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/3.jpeg" alt="Third slide"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev"&gt;
        &lt;span class="carousel-control-prev-icon" aria-hidden="true"&gt;&lt;/span&gt;
        &lt;span class="visually-hidden"&gt;Previous&lt;/span&gt;
    &lt;/a&gt;
    &lt;a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next"&gt;
        &lt;span class="carousel-control-next-icon" aria-hidden="true"&gt;&lt;/span&gt;
        &lt;span class="visually-hidden"&gt;Next&lt;/span&gt;
    &lt;/a&gt;
&lt;/div&gt;
</pre>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="with_captions" class="col-lg-12 col-md-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">                                
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>With captions</h4> 
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                                                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                                                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="../src/assets/img/1.jpeg" alt="First slide">
                                                        <div class="carousel-caption d-none d-sm-block">
                                                            <h3>First slide</h3>
                                                            <h5>Lorem ipsum dolor sit amet, dolore magna aliqua.</h5>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="../src/assets/img/3.jpeg" alt="Second slide">
                                                        <div class="carousel-caption d-none d-sm-block">
                                                            <h3>Second slide</h3>
                                                            <h5>Lorem ipsum dolor sit amet, dolore magna aliqua.</h5>
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="../src/assets/img/2.jpg" alt="Third slide">
                                                        <div class="carousel-caption d-none d-sm-block">
                                                            <h3>Third slide</h3>
                                                            <h5>Lorem ipsum dolor sit amet, dolore magna aliqua.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="code-section-container">
                                                
                                        <button class="btn toggle-code-snippet"><span>Code</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></button>

                                        <div class="code-section text-left">
                                            <pre>
&lt;div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"&gt;
    &lt;ol class="carousel-indicators"&gt;
        &lt;li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"&gt;&lt;/li&gt;
        &lt;li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"&gt;&lt;/li&gt;
        &lt;li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"&gt;&lt;/li&gt;
    &lt;/ol&gt;
    &lt;div class="carousel-inner"&gt;
        &lt;div class="carousel-item active"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/1.jpeg" alt="First slide"&gt;
            &lt;div class="carousel-caption d-none d-sm-block"&gt;
                &lt;h3&gt;First slide&lt;/h3&gt;
                &lt;h5&gt;Lorem ipsum dolor sit amet, dolore magna aliqua.&lt;/h5&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="carousel-item"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/3.jpeg" alt="Second slide"&gt;
            &lt;div class="carousel-caption d-none d-sm-block"&gt;
                &lt;h3&gt;Second slide&lt;/h3&gt;
                &lt;h5&gt;Lorem ipsum dolor sit amet, dolore magna aliqua.&lt;/h5&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="carousel-item"&gt;
            &lt;img class="d-block w-100" src="../src/assets/img/2.jpg" alt="Third slide"&gt;
            &lt;div class="carousel-caption d-none d-sm-block"&gt;
                &lt;h3&gt;Third slide&lt;/h3&gt;
                &lt;h5&gt;Lorem ipsum dolor sit amet, dolore magna aliqua.&lt;/h5&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev"&gt;
        &lt;span class="carousel-control-prev-icon" aria-hidden="true"&gt;&lt;/span&gt;
        &lt;span class="visually-hidden"&gt;Previous&lt;/span&gt;
    &lt;/a&gt;
    &lt;a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next"&gt;
        &lt;span class="carousel-control-next-icon" aria-hidden="true"&gt;&lt;/span&gt;
        &lt;span class="visually-hidden"&gt;Next&lt;/span&gt;
    &lt;/a&gt;
&lt;/div&gt;
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
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="../src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="../src/plugins/src/waves/waves.min.js"></script>
    <script src="../layouts/modern-light-menu/app.js"></script>
    
    <script src="../src/plugins/src/highlight/highlight.pack.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="../src/assets/js/scrollspyNav.js"></script>
</body>
</html>