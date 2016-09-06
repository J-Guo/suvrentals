<?php
session_start();
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes">

  <title>Page Logged - SUV Rentals Dashboard</title>


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

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="styles/bootstrap.css">

  <link rel="stylesheet" href="styles/dependencies.css">

  <link rel="stylesheet" href="styles/wrapkit.css">

  <link rel="stylesheet" href="styles/pages.css">
</head>
<body class="bg-grd-blue">
  <!--[if lt IE 9]>
  <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <main class="locked-wrapper">
    <section class="locked-container">
      <p class="text-center p-1x">
        <img src="images/logo/brand-text-color.png" alt="wrapkit" height="64px">
      </p>
      <div class="locked-actions">
        <a href="signin.php" class="btn btn-sm btn-danger" rel="tooltip" data-container="body" title="Sign out"><i class="fa fa-sign-out"></i></a>
      </div>
      <div class="locked-avatar">
        <img class="img-circle" src="images/dummy/profile.jpg" alt="photo profile">
      </div>
      <p class="locked-username"><?php echo $_SESSION['username']; ?></p>
      <p class="locked-email"><?php echo $_SESSION['email']; ?></p>
      <p class="locked-status">Locked</p>
      <form id="lockeForm" role="form" action="#">
        <div id="lockedInput" class="form-group">
          <div class="input-group input-group-in">
            <input type="password" name="lockPasswd" id="lockPasswd" class="form-control" placeholder="Password">
            <div class="input-group-btn">
              <button type="submit" class="btn"><i class="icon-lock-open"></i></button>
            </div>
          </div>
        </div>
        <div id="lockedLoader" class="form-group hide">
          <div class="locked-loader">
            <span class="fa fa-spin fa-spinner"></span>
          </div>
        </div>
      </form>
    </section><!-- /.locked-container -->
  </main><!--/#wrapper-->
  <div class="locked-cr text-light">&copy; 2014 Wrapkit. with Love from Stilearning team.</div>



  <!-- VENDORS : jQuery & Bootstrap -->
  <script src="scripts/vendor.js"></script>
  <!-- END VENDORS -->

  <!-- DEPENDENCIES : Required plugins -->
  <script src="scripts/dependencies.js"></script>
  <!-- END DEPENDENCIES -->


  <!-- PLUGIN SETUPS: vendors & dependencies setups -->
  <script src="scripts/plugin-setups.js"></script>
  <!-- END PLUGIN SETUPS -->

  <script type="text/javascript">
    $(function(){
      'use strict';
      $( '#lockeForm' ).on( 'submit', function(){

        $( '#lockedInput' ).addClass( 'hide' );
        $( '#lockedLoader' ).removeClass( 'hide' );

        setTimeout( function(){
          window.location.href = 'index.php';
        }, 3000);
        return false;
      });
    });
  </script>


  <!-- Google Analytics: change UA-48454066-1 to be your site's ID. -->
  <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-48454066-1');ga('send','pageview');
  </script>
</body>
</html>