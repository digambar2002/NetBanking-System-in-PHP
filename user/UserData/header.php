<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
        <div class="simplebar-content" style="padding: 0px;">
            <a class="sidebar-brand" href="../../index.php">
                <span class="align-middle">SKY BANK</span>
            </a>

            <ul class="navbar-nav align-self-stretch">

                <!-- <li class="sidebar-header">
                        Pages
                    </li> -->
                <li class="menuHover">

                    <a href="Dashboard.php" id="Dashboard" class="nav-link text-left " role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon-bar-chart-1"></i><i class="bx bxs-dashboard ico"></i> Dashboard
                    </a>
                </li>

                <li class="menuHover">
                    <a href="Transfer.php" id="Transfer" class="nav-link text-left" role="button">
                        <i class="flaticon-bar-chart-1"></i><i class="bx bx-transfer ico"></i> Transfer
                    </a>
                </li>

                <li class="menuHover box-icon">
                    <a href="saving.php" id="Saving" class="nav-link text-left" role="button">
                        <i class="flaticon-bar-chart-1"></i> <i class="bx bxs-coin-stack ico"></i> Saving
                    </a>
                </li>

                <li class="menuHover">
                    <a href="T_history.php" id="TransactionHistory" class="nav-link text-left" role="button">
                        <i class="flaticon-bar-chart-1"></i> <i class="bx bx-history ico"></i> Transaction History
                    </a>
                </li>

                <li class="has-sub menuHover">
                    <a class="nav-link collapsed text-left" href="#collapseExample2" role="button" data-toggle="collapse">
                        <i class="flaticon-user"></i> <i class="bx bx-user-circle Profile ico"></i> Profile
                    </a>
                    <div class="collapse menu mega-dropdown" id="collapseExample2">
                        <div class="dropmenu" aria-labelledby="navbarDropdown">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-lg-12 px-2">
                                        <div class="submenu-box">
                                            <ul class="list-unstyled m-0">
                                                <li><a id="Profile" class="" href="profile.php">Profile</a></li>
                                                <li><a id="SecureAccount" href="secureAccount.php">Secure Account</a></li>
                                                <!-- <li><a href="">Contact Us</a></li> -->
                                                <!-- <li><a href="">Feedback</a></li> -->
                                                <!-- <li><a href="">Help</a></li> -->
                                                <!-- <li><a href="">ReactJS</a></li> -->
                                                <!-- <li><a href="">Asp.net</a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>



                <li class="menuHover">
                    <a href="cards.php" id="Cards" class="nav-link text-left" role="button">
                        <i class="flaticon-bar-chart-1"></i> <i class="bx bxs-credit-card ico"></i>Cards
                    </a>
                </li>

                <!-- <li class="sidebar-header">
                        tools and component
                    </li> -->

                <li class="menuHover box-icon">
                    <a href="../../insurance.html" id="Insurance" class="nav-link text-left" role="button">
                        <i class="flaticon-bar-chart-1"></i> <i class="bx bx-dollar-circle ico"></i>Insurance
                    </a>
                </li>

                <li class="menuHover box-icon">
                    <a href="../../loans.html" id="Loans" class="nav-link text-left" role="button">
                        <i class="flaticon-bar-chart-1"></i><i class="bx bxs-coin ico"></i> Loans
                    </a>
                </li>

                <!-- <li class="sidebar-header">
                        tools and component
                    </li> -->
                <!-- <li id="Setting" class="menuHover">
                    <a class="nav-link text-left" role="button">
                        <i class="flaticon-bar-chart-1"></i> <i class="bx bxs-cog ico"></i> Setting
                    </a>
                </li> -->
                <li class="menuHover">
                    <a class="nav-link text-left" role="button" href="../logout.php">
                        <i class="flaticon-map"></i><i class="bx bx-log-out ico"></i> Logout
                    </a>
                </li>

            </ul>


        </div>


    </nav>
    <!-- /#sidebar-wrapper -->


    <!-- Page Content -->
    <div id="page-content-wrapper">


        <div id="content">

            <div class="container-fluid p-0 px-lg-0 px-md-0">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light my-navbar">

                    <!-- Sidebar Toggle (Topbar) -->
                    <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>


                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline navbar-search">
                        <div class="input-group">
                            <h1 id="bankBrand" style="font-size: 24px; color:blue" class="mt-2">SKY BANK</h1>
                            <!-- <input type="text" class="form-control bg-light " placeholder="Search for..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div> -->
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown  d-sm-none">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-icon dropdown" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                                <div class="position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle" style="color: gray;">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <span class="indicator">4</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li> -->
                        <!-- Nav Item - Messages -->
                        <!-- <li class="nav-item">
                            <a class="nav-link " href="#" role="button">
                                <i class="fas fa-envelope"></i>
                                
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                        </li> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username ?></span>
                                <img id="HeaderProfile" hidden class="img-profile rounded-circle">
                                <span id="HeaderProfileTag" class="btn btn-circle text-white" style="font-size: 13px; background-color: <?php echo $_SESSION['ProfileColor'] ?>;"><?php echo strtoupper($_SESSION['ProfileText']) ?></span>
                            </a>


                        </li>

                    </ul>

                </nav>