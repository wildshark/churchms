<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11/08/2019
 * Time: 11:43 PM
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
                <div class="container">
                    <div class="p-y-lg text-center">
                        <h1 class="display-2">Sign Up</h1>
                        <p class="text-muted">Have an awesome idea for this project? Get in touch with us</p>
                    </div>
                </div>
            </div>
            <!-- End page header -->

            <div class="page-content bg-white">
                <div class="container">
                    <!-- Section Content -->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <form class="form-horizontal" action="index.php" method="post">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="frontend-contact-firstname">First name</label>
                                        <input class="form-control" required type="text" name="first-name" placeholder="Name"/>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="frontend-contact-lastname">Last name</label>
                                        <input class="form-control" required type="text" name="last-name" placeholder="Surname" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="frontend-contact-firstname">Church Name</label>
                                        <input class="form-control" required type="text" name="church" placeholder="Church Name"/>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="frontend-contact-lastname">Prefix</label>
                                        <input class="form-control" required type="text" name="prefix" placeholder="Church Prefix" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="frontend-contact-email">Mobile</label>
                                        <input class="form-control" required type="text" name="mobile" placeholder="+23354820000"/>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="frontend-contact-email">Country</label>
                                        <input class="form-control" required type="text" name="country" placeholder="Country" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="frontend-contact-email">Email</label>
                                        <input class="form-control" required type="email" name="email" placeholder="email" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="frontend-contact-email">Website</label>
                                        <input class="form-control" required type="text" name="website" placeholder="website; http://churchname.com" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="frontend-contact-email">Address</label>
                                        <input class="form-control" required type="text" name="address" placeholder="Address" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="frontend-contact-firstname">Username</label>
                                        <input class="form-control" required type="text" name="username" placeholder="username" />
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="frontend-contact-lastname">Password</label>
                                        <input class="form-control" required type="text" name="password" placeholder="password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-app btn-block" type="submit" name="submit" value="sign-up">Sign up</button>
                                    </div>
                                </div>
                                <span class="help-block">All field most be completed</span>
                            </form>
                        </div>
                    </div>
                    <!-- .row -->
                    <!-- End Section Content -->
                </div>
                <!-- .container -->
            </div>
            <!-- .section -->

        </main>

        <footer class="app-layout-footer">
            <div class="container p-y-md">

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

<!-- Page JS Plugins -->
<script src="http://maps.google.com/maps/api/js"></script>
<script src="assets/js/plugins/gmapsjs/gmaps.min.js"></script>

<!-- Page JS Code -->
<script src="assets/js/pages/frontend_contact.js"></script>

</body>

</html>
