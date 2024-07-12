<!--  BEGIN NAVBAR  -->
<div class="header-container container-xxl">
    <header class="header navbar navbar-expand-sm expand-header">

        <a href="javascript:void(0);" class="sidebarCollapse">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <div class="search-animated toggle-search">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <form class="form-inline search-full form-inline search" role="search">
                <div class="search-bar">
                    <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Arama...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x search-close">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </form>
            <span class="badge badge-secondary">Ctrl + /</span>
        </div>

        <ul class="navbar-item flex-row ms-lg-auto ms-0">

            <li class="nav-item theme-toggle-item">
                <a href="javascript:void(0);" class="nav-link theme-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                    
                </a>
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
                                <h5><?php $users_name = $_SESSION['users_name'];
                                    echo $users_name ?></h5>
                                <p><?php $users_role_session = $_SESSION['users_role'];

                                    if ($users_role_session == 1) {
                                        echo "Admin";
                                    } elseif ($users_role_session == 0) {
                                        echo "Personel";
                                    } else {
                                        echo "Bilinmeyen Rol";
                                    } ?></p>
                            </div>
                        </div>
                    </div>

                    
                    <?php
                                                if ($_SESSION['users_role'] == 0) {

                                                ?>
                                                <?php
                                                } else {
                                                ?>


                    <div class="dropdown-item">
                        <a href="app-product.php">
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
                            </svg> <span>Ürünler</span>
                        </a>
                    </div>

                    <div class="dropdown-item">
                        <a href="app-businesses.php">
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
                            </svg> <span>İşletmeler</span>
                        </a>
                    </div>

                    <div class="dropdown-item">
                        <a href="app-stock.php">
                            <svg width="64px" height="64px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7071 4.69719C19.0976 4.30667 19.7308 4.30667 20.1213 4.69719L28.6066 13.1825C28.9971 13.573 28.9971 14.2062 28.6066 14.5967C28.216 14.9872 27.5829 14.9872 27.1924 14.5967L18.7071 6.1114C18.3166 5.72088 18.3166 5.08771 18.7071 4.69719Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M28.7071 4.7068C29.0976 5.09733 29.0976 5.73049 28.7071 6.12102L20.2218 14.6063C19.8313 14.9968 19.1981 14.9968 18.8076 14.6063C18.4171 14.2158 18.4171 13.5826 18.8076 13.1921L27.2929 4.7068C27.6834 4.31628 28.3166 4.31628 28.7071 4.7068Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.3162 15.0513C24.111 14.9829 23.8891 14.9829 23.6838 15.0513L8.86851 19.9889C8.64603 20.063 8.463 20.2102 8.34247 20.3985L4.39805 25.4613C4.1985 25.7175 4.13573 26.0545 4.2297 26.3653C4.32367 26.6761 4.56269 26.922 4.87072 27.0246L8.19325 28.1319L8.19595 36.7634C8.19636 38.0544 9.02257 39.2003 10.2473 39.6085L23.6291 44.0691C23.7475 44.1164 23.8738 44.1406 24.0009 44.1405C24.1293 44.141 24.2569 44.1168 24.3765 44.069L37.7577 39.6086C38.9827 39.2003 39.8089 38.054 39.809 36.7628L39.8096 28.1328L43.1346 27.0246C43.4427 26.922 43.6817 26.6761 43.7757 26.3653C43.8696 26.0545 43.8069 25.7175 43.6073 25.4613L39.6117 20.3327C39.4927 20.176 39.3274 20.0542 39.1315 19.9889L24.3162 15.0513ZM9.54341 22.1112L22.346 26.378L19.6478 29.8413L6.8452 25.5745L9.54341 22.1112ZM24.0025 24.8203L35.6526 20.9376L24 17.0541L12.35 20.9367L24.0025 24.8203ZM10.196 36.7628L10.1935 28.7986L19.686 31.9622C20.088 32.0962 20.5307 31.9623 20.7911 31.6281L23.0003 28.7924L23.0001 41.7513L10.8797 37.7112C10.4715 37.5751 10.1961 37.1931 10.196 36.7628ZM37.8095 28.7993L28.3193 31.9622C27.9174 32.0962 27.4747 31.9623 27.2143 31.6281L25.0013 28.7876L25.0049 41.7514L37.1252 37.7113C37.5336 37.5752 37.809 37.1931 37.809 36.7627L37.8095 28.7993ZM28.3576 29.8413L25.6583 26.3767L38.4609 22.1099L41.1602 25.5745L28.3576 29.8413Z" fill="currentColor"></path>
                                </g>
                            </svg> <span>Stoklar</span>
                        </a>
                    </div>


                    <div class="dropdown-item">
                        <a href="app-day-transactions.php">
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
                            </svg> <span>Gün İşlemleri</span>
                        </a>
                    </div>


                    <?php
                                                }
                                                ?>
                    <div class="dropdown-item">
                        <a href="index.php?logout='1'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg> <span>Çıkış</span>
                        </a>
                    </div>

                </div>

            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->