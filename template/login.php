<?

?>
<!DOCTYPE html>

<html class="app-ui">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <!-- Document title -->
    <title><?php echo $bio['name'];?></title>

    <meta name="description" content="AppUI - Frontend Template & UI Framework" />
    <meta name="robots" content="noindex, nofollow" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" href="assets/img/favicons/favicon.ico" />

    <!-- Google fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="assets/css/font-awesome.css" />
    <link rel="stylesheet" id="css-ionicons" href="assets/css/ionicons.css" />
    <link rel="stylesheet" id="css-bootstrap" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" id="css-app" href="assets/css/app.css" />
    <link rel="stylesheet" id="css-app-custom" href="assets/css/app-custom.css" />
    <!-- End Stylesheets -->
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Dosis'>
    <style>
        #loading{
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #fff
            url('https://loading.io/spinners/vortex/lg.vortex-spiral-spinner.gif')
            no-repeat center center;
            z-index: 99999;
        }
    </style>
</head>

<body class="app-ui">
<div class="app-layout-canvas">
    <div class="app-layout-container">

        <!-- Header -->
        <header class="app-layout-header">
            <nav class="navbar navbar-default p-y">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Header logo -->
                    </div>

                    <div class="collapse navbar-collapse" id="header-navbar-collapse">

                    </div>
                </div>
                <!-- .container -->
            </nav>
            <!-- .navbar -->
        </header>
        <!-- End header -->

        <main class="app-layout-content">

            <!-- Page header -->
            <div class="page-header bg-green bg-inverse">
                <div class="container">
                    <!-- Section Content -->
                    <div class="p-y-lg text-center">
                        <h1 class="display-2">Helping people. Changing lives | Church MS</h1>
                    </div>
                    <!-- End Section Content -->
                </div>
            </div>
            <!-- End Page header -->

            <!-- Page content -->
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <!-- Login card -->
                        <div class="col-md-6">
                            <img src="assets/img/logo2.png" width="450" height="273" class="center-block">
                            <!-- .card -->
                        </div>
                        <!-- .col-md-6 -->
                        <!-- End login -->

                        <!-- Sign up -->
                        <div class="col-md-6">
                            <div class="card">
                                <h3 class="card-header h4">Login</h3>
                                <div class="card-block">
                                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="application/x-www-form-urlencoded">
                                        <div class="form-group">
                                            <label class="sr-only" for="frontend_login_email">Username</label>
                                            <input type="text" name="username" class="form-control" id="frontend_login_email" placeholder="Username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="frontend_login_password">Password</label>
                                            <input type="password" name="password" class="form-control" id="frontend_login_password" placeholder="Password" />
                                        </div>
                                        <div class="form-group">
                                            <label for="frontend_login_remember" class="css-input switch switch-sm switch-app">
                                                <input type="checkbox" id="frontend_login_remember" /><span></span> Remember me</a>
                                            </label>
                                        </div>
                                        <button type="submit" name="submit" value="login" class="btn btn-app btn-block">Login</button>
                                        <a href="?_route=sign-up"  class="btn btn-app btn-block btn-primary">Sign up</a>
                                    </form>
                                </div>
                                <!-- .card-block -->
                            </div>
                            <!-- .card -->
                        </div>
                        <!-- .col-md-6 -->
                        <!-- End sign up -->

                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </div>
            <!-- End page content -->

            <!-- Modal -->
            <div class="modal" id="modal-signup-terms" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="card-header bg-blue bg-inverse">
                            <h4>Terms &amp; Conditions</h4>
                            <ul class="card-actions">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-block">
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant
                                quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant
                                quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-sm btn-app" type="button" data-dismiss="modal"><i class="ion-checkmark"></i> Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal -->

        </main>

        <footer class="app-layout-footer">
            <div class="container p-y-md">
                <div class="pull-right hidden-sm hidden-xs">
                    <a href="?_route=purchase" target="_blank" rel="nofollow">Purchase a license</a>
                </div>
                <div class="pull-left text-center text-md-left">
                    iQuipe Digital &copy; <span class="js-year-copy"><?php echo date("Y")?></span>
                </div>
            </div>
        </footer>

    </div>
    <!-- .app-layout-container -->
</div>
<!-- .app-layout-canvas -->

<!-- Apps Modal -->
<!-- Opens from the button in the header -->
<div id="apps-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-sm modal-dialog modal-dialog-top">
        <div class="modal-content">
            <!-- Apps card -->
            <div class="card m-b-0">
                <div class="card-header bg-app bg-inverse">
                    <h4>Apps</h4>
                    <ul class="card-actions">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-secondary bg-inverse" href="index.html">
                                <i class="ion-speedometer fa-4x"></i>
                                <p>Admin</p>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-tertiary bg-inverse" href="frontend_home.html">
                                <i class="ion-laptop fa-4x"></i>
                                <p>Frontend</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- .card-block -->
            </div>
            <!-- End Apps card -->
        </div>
    </div>
</div>
<!-- End Apps Modal -->

<!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/core/jquery.slimscroll.min.js"></script>
<script src="assets/js/core/jquery.scrollLock.min.js"></script>
<script src="assets/js/core/jquery.placeholder.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/app-custom.js"></script>

</body>

</html>