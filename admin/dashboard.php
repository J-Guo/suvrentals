<?php
session_start();
include "db/connections.php";
$book = new User();


?>


<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes">

    <title>Dashboard - SUV Rentals</title>


    <!-- favicon.ico and apple-touch-icon.png -->
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="images/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-TileImage" content="images/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
<!--    <meta http-equiv="refresh" content="1200" >-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="styles/bootstrap.css">

    <link rel="stylesheet" href="styles/dependencies.css">

    <link rel="stylesheet" href="styles/components.css">

    <link rel="stylesheet" href="styles/wrapkit.css">

    <link rel="stylesheet" href="styles/demo.css">

    <!-- Full Calendar CSS-->
    <link rel="stylesheet" href="scripts/css/fullcalendar.css">
</head>
<body>
<!--[if lt IE 9]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<main class="wrapkit-wrapper" id="wrapper">

    <!-- ============================================
    HEADER SECTION
    =============================================== -->
    <!-- navigation -->
    <nav class="header navbar navbar-blue bg-grd-blue">
        <div class="container-fluid">
            <!-- use .pull-*, couse we need this float on any screen size -->
            <div class="pull-left">
                <a class="navbar-brand" href="index.php" role="logo" aria-label="Logo">
                    <p class="logo">SUV Rentals - Booking System</p>
                    <!--<img class="logo" src="images/logo/brand-text-dark.png" alt="Brand">-->
                </a>
                <button data-sidebar="toggleVisible" class="btn btn-icon navbar-btn">
                    <i class="fa fa-bars"></i>
                    <i class="fa fa-caret-down"></i>
                </button>
            </div>

            <!-- use .pull-*, couse we need this float on any screen size -->
            <!--        <div class="pull-right" role="navigation">-->
            <!--          <div class="dropdown">-->
            <!--            <a aria-label="More" class="btn btn-icon navbar-btn dropdown-toggle" data-toggle="dropdown" href="#">-->
            <!--              <i class="fa fa-ellipsis-v"></i>-->
            <!--            </a>-->
            <!--            <ul class="dropdown-menu dropdown-menu-right" role="menu">-->
            <!--              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-profile.html"><span class="pull-right"><i class="fa fa-user text-muted"></i></span>Profile</a></li>-->
            <!--              <li class="divider"></li>-->
            <!--              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-help.html"><span class="pull-right"><i class="fa fa-question-circle text-muted"></i></span>Help</a></li>-->
            <!--              <li class="divider"></li>-->
            <!--              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-locked.html"><span class="pull-right"><i class="fa fa-lock text-muted"></i></span>Locked</a></li>-->
            <!--              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-signin.html"><span class="pull-right"><i class="fa fa-sign-out text-muted"></i></span> Sign out</a></li>-->
            <!--            </ul>-->
            <!--          </div><!-- /.dropdown -->
            <!--        </div><!-- /navigation -->

            <div class="brand-search" id="brandSearchFrm">
                <form action="#" role="search">
                    <a href="#" class="search-close">&times;</a>
                    <input class="search-field" placeholder="Search for everything you want..." tabindex="-1">
                </form>
            </div><!-- /.brand-search -->
        </div><!-- /.container-fluid -->
    </nav><!-- /navigation -->

    <!-- ============================================
    SIDEBAR SECTION
    =============================================== -->
    <aside class="sidebar hidden-xs" role="complementary">

        <!-- profile -->
        <?php include"sidebar.php"; ?>
    </aside><!-- /.SIDEBAR -->



    <!-- ============================================
    MAIN CONTENT SECTION
    =============================================== -->
    <section class="content-wrapper" role="main">
        <div class="content">

            <div class="content-body">

                <div class="row">
                    <!-- LATEST SIGNUP -->

                    <div class="col-md-6">
                        <?php include"booking_form.php"; ?>
                    </div><!-- /.cols -->



                    <div class="col-md-6">
                        <?php include"list_booking.php"; ?>
                    </div><!-- /.cols -->

                    <div class="clearfix"></div>
                </div><!-- /.content-body -->


            </div><!-- /.content -->
    </section><!-- /MAIN -->



    <!-- ============================================
    FOOTER SECTION
    =============================================== -->
    <footer class="footer-wrapper" role="contentinfo">
        <?php include"footer.php"; ?>
    </footer><!-- /.FOOTER -->

</main><!-- /#MAIN -->



<!-- VENDORS : jQuery & Bootstrap -->
<script src="scripts/vendor.js"></script>
<!-- END VENDORS -->

<!-- DEPENDENCIES : Required plugins -->
<!--  <script src="scripts/dependencies.js"></script>-->
<!-- END DEPENDENCIES -->

<!-- WRAPKIT -->
<script src="scripts/wrapkit.js"></script>
<!-- END WRAPKIT -->

<!-- WRAPKIT SETUPS -->
<script src="scripts/wrapkit-setup.js"></script>
<!-- end WRAPKIT SETUPS -->

<!-- PLUGIN SETUPS: vendors & dependencies setups -->
<script src="scripts/plugin-setups.js"></script>
<!-- END PLUGIN SETUPS -->

<!-- COMPONENTS -->
<script src="scripts/dataTables.bootstrap.js"></script>
<script src="scripts/dataTables.tableTools.js"></script>
<script src="scripts/jquery.validate.js"></script>
<script src="scripts/bootbox.js"></script>
<script src="scripts/fullcalendar.min.js"></script>
<!-- END COMPONENTS -->

<!-- DUMMY: Use for demo -->
<script src="scripts/demo/table-datatables-extras.js"></script>
<script src="scripts/demo/table-datatables-demo.js"></script>



</body>
</html>