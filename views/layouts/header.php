
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>460degree - Assessment test</title>
    <!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/logo.png">
	<link href="<?php echo base_url(); ?>/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/vendor/chartist/css/chartist.min.css">
	<!-- Vectormap -->
    <link href="<?php echo base_url(); ?>/assets/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="<?php echo base_url(); ?>" class="brand-logo">
                <img class="logo-abbr" src="<?php echo base_url(); ?>/assets/images/logo.png" alt="">
                <img class="logo-compact" src="<?php echo base_url(); ?>/assets/images/logo-text.png" alt="">
                <img class="brand-title" src="<?php echo base_url(); ?>/assets/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <!-- <img src="<?php echo base_url(); ?>/assets/images/profile/aplog.png" width="20" alt=""/> -->
									<div class="header-info">
										<span class="text-black"><?php echo $_SESSION['fullname']; ?></span>
										<p class="fs-12 mb-0"><?php echo $_SESSION['role']; ?></p>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?php echo base_url(); ?>/logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
			</div>
			<div class="flash-msg">
            <div>
                <span class="res-msg"></span>
                <span class="fa fa-times" onclick="clearMessage()"
                    style="margin-left:10px; display:inline-block;"></span>
            </div>
        </div>
		</div>
		
		
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li><a href="<?php echo base_url(); ?>" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
                    
					<li><a href="<?php echo base_url(); ?>/users/transaction" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">My Transactions</span>
						</a>
					</li>
					<?php if ($_SESSION['role'] === 'Super seller') { ?>
					<li><a href="<?php echo base_url(); ?>/users/reseller" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">All Resselers</span>
						</a>
					</li>
					<?php } ?>
					<li><a href="<?php echo base_url(); ?>/logout" class="ai-icon" aria-expanded="false">
							<i class="fa fa-power-off"></i>
							<span class="nav-text">Logout</span>
						</a>
					</li>
                </ul>
				<div class="copyright">
					<p>&copy;
                    <script>
                        document.write(new Date().getFullYear() + " 460degree | All Right Reserved");
                    </script></p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->



















