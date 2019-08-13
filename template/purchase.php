<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/05/2019
 * Time: 6:43 AM
 */
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
                        <a class="navbar-brand" href="javascript:void(0)">
                            <img class="img-responsive" src="assets/img/logo2.png" title="AppUI" alt="AppUI" />
                        </a>
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
            <div class="page-header bg-app bg-inverse">
                <section class="container">
                    <!-- Section Content -->
                    <div class="p-y-lg text-center">
                        <h1 class="display-2">Flexible plans just for you</h1>
                        <p class="text-muted">Choose the one that fits you best and start building your web application today.</p>
                    </div>
                    <!-- End Section Content -->
                </section>
            </div>
            <!-- End Page header -->

            <!-- Pricing -->
            <div class="page-content bg-white">
                <section class="container">
                    <!-- Section Content -->
                    <div class="row m-y">
                        <div class="col-sm-6 col-lg-3">
                            <!-- Developer Plan -->
                            <a class="card hover-shadow-3 text-center" href="?_route=pos&tran=donation">
                                <div class="card-header">
                                    <h3>Donation</h3>
                                </div>
                                <div class="card-block bg-gray-lighter-o">
                                    <div class="h1 m-y-sm">FREE</div>
                                    <div class="h5 font-300 text-muted m-t-0">per month</div>
                                </div>
                                <div class="card-block">
                                    <table class="table table-borderless table-condensed">
                                        <tbody>
                                        <tr>
                                            <td><strong>1</strong> User Account</td>
                                        </tr>
                                        <tr>
                                            <td>Build-in Membership</td>
                                        </tr>
                                        <tr>
                                            <td>Build-in Cashbook </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong> Support</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-block bg-gray-lighter-o">
                                    <span class="btn btn-default">Sign Up</span>
                                </div>
                            </a>
                            <!-- End Developer Plan -->
                        </div>
                        <!-- .col-sm-6 -->

                        <div class="col-sm-6 col-lg-3">
                            <!-- Startup Plan -->
                            <a class="card hover-shadow-3 text-center" href="frontend_login_signup.html">
                                <div class="card-header">
                                    <h3>Startup</h3>
                                </div>
                                <div class="card-block bg-green bg-inverse">
                                    <div class="h1 m-y-sm">$29</div>
                                    <div class="h5 font-300 text-muted m-t-0">per month</div>
                                </div>
                                <div class="card-block">
                                    <table class="table table-borderless table-condensed">
                                        <tbody>
                                        <tr>
                                            <td><strong>4</strong> User Account</td>
                                        </tr>
                                        <tr>
                                            <td>Build-in Membership</td>
                                        </tr>
                                        <tr>
                                            <td>Build-in Bookkeeping </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong> Support</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-block bg-gray-lighter-o">
                                    <span class="btn btn-app">Sign Up</span>
                                </div>
                            </a>
                            <!-- End Startup Plan -->
                        </div>
                        <!-- .col-sm-6 -->

                        <div class="col-sm-6 col-lg-3">
                            <!-- Business Plan -->
                            <a class="card hover-shadow-3 text-center" href="javascript:void(0)">
                                <div class="card-header">
                                    <h3>Business</h3>
                                </div>
                                <div class="card-block bg-gray-lighter-o">
                                    <div class="h1 m-y-sm">$49</div>
                                    <div class="h5 font-300 text-muted m-t-0">per month</div>
                                </div>
                                <div class="card-block">
                                    <table class="table table-borderless table-condensed">
                                        <tbody>
                                        <tr>
                                            <td><strong>10</strong> User Account</td>
                                        </tr>
                                        <tr>
                                            <td>Build-in Membership</td>
                                        </tr>
                                        <tr>
                                            <td>Build-in Account </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong> Support</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-block bg-gray-lighter-o">
                                    <span class="btn btn-default">Sign Up</span>
                                </div>
                            </a>
                            <!-- End Business Plan -->
                        </div>
                        <!-- .col-sm-6 -->

                        <div class="col-sm-6 col-lg-3">
                            <!-- Premium Plan -->
                            <a class="card hover-shadow-3 text-center" href="javascript:void(0)">
                                <div class="card-header">
                                    <h3>Premium</h3>
                                </div>
                                <div class="card-block bg-gray-lighter-o">
                                    <div class="h1 m-y-sm">$99</div>
                                    <div class="h5 font-300 text-muted m-t-0">per month</div>
                                </div>
                                <div class="card-block">
                                    <table class="table table-borderless table-condensed">
                                        <tbody>
                                        <tr>
                                            <td><strong>50</strong> User Account</td>
                                        </tr>
                                        <tr>
                                            <td>Build-in Membership</td>
                                        </tr>
                                        <tr>
                                            <td>Build-in Account </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong> Support</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-block bg-gray-lighter-o">
                                    <span class="btn btn-default">Sign Up</span>
                                </div>
                            </a>
                            <!-- End Premium Plan -->
                        </div>
                        <!-- .col-sm-6 -->
                    </div>
                    <!-- .row -->

                    <!-- End Section Content -->
                </section>
            </div>
            <!-- End Pricing -->

        </main>

        <footer class="app-layout-footer">
            <div class="container p-y-md">
                <div class="pull-right hidden-sm hidden-xs">
                    <a href="#" target="_blank" rel="nofollow"></a>
                </div>
                <div class="pull-left text-center text-md-left">
                    <a href="#" target="_blank" rel="nofollow">iQuipe Digital</a> &copy; <span class="js-year-copy"></span>
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
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-b01ba74c-09f7-46a8-88c7-9dc1218929b9"></div>
</body>
</html>
