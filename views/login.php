


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>460degree - Assessment test</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/assets/images/logo.png">
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="#"><img src="<?php echo base_url(); ?>/assets/images/logo-text.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <div id="lerror_login" style="width:100%; color:white; text-align: center; margin: 5px"></div>
                                    <form>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Username</strong></label>
                                            <input type="text" id="username" class="form-control" placeholder="admin">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" id="password" class="form-control" placeholder="*******">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" id="submitBtn" class="btn bg-white text-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>
                                    <a class="text-white mt-2" style="margin-top:5px" href="<?php echo base_url(); ?>/register">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url(); ?>/assets/vendor/global/global.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/dlabnav-init.js"></script>
    <script src="<?php echo base_url(); ?>/assets/app-js/login.js"></script>

</body>

</html>
