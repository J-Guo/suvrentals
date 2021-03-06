<?php
session_start();
include "db/connections.php";
$book = new User();

$userid = NULL;
$password = NULL;

$userid_msg = NULL;
$password_msg = NULL;


if(isset($_POST['btnSignin']))
{
    $userid = $_POST['username'];
    $password = $_POST['passwd'];

   $x = 0;
    if($userid == NULL)
    {
        $userid_msg = "Enter your User ID";
        $x++;
    }
    if($password == NULL)
    {
        $password_msg = 'Enter your Password';
        $x++;
    }


    if($x == 0)
    {
        $resultUser = $book -> loginUser($userid,$password);
        if($resultUser == 0)
        {
            $message = "User ID or Password Incorrect";
        }
        else
        {
            $getUser = $book -> selectUserDeatails($userid);
            $_SESSION['username'] = $getUser['username'];
            $_SESSION['email'] = $userid;
            ?>
                <script>window.location.href='dashboard.php'</script>
            <?php
        }
    }


}

?>

<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes">

    <title>Login - SUV Rentals Dashboard</title>


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
  <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <main class="signin-wrapper">
    <div class="tab-content">
      <p class="text-center p-4x">
        <!-- <img src="images/logo/brand-text-color.png" alt="wrapkit" height="28px"> -->
      </p>
      <div class="tab-pane fade in active" id="signin">
          <div class="locked-avatar">
              <img src="images/logo/brand-text-color.png" alt="wrapkit" height="100px">
          </div>
        <form id="signinForm" action="" method="post">
          <p class="signin-cr lead">Login to your account</p>
          <div class="form-group">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="icon-user"></i></span>
              <input name="username" id="username" class="form-control" placeholder="Username">
            </div>
          </div><!-- /.form-group -->
          <div class="form-group">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="icon-lock"></i></span>
              <input type="password" name="passwd" id="password" class="form-control" placeholder="Password">
            </div>
          </div><!-- /.form-group -->
          <div class="form-group clearfix">
            <div class="animated-hue pull-right">
              <button id="btnSignin" type="submit" name="btnSignin" class="btn btn-primary">Signin</button>
            </div>
            <div class="nice-checkbox nice-checkbox-inline">
              <input type="checkbox" name="keepSignin" id="keepSignin" checked="checked">
              <label for="keepSignin">Keep me sign in</label>
            </div>
          </div><!-- /.form-group -->

          <hr>

          <p><a href="#recoverAccount" data-toggle="modal">Can't Access your Account?</a></p>
          
        </form><!-- /#signinForm -->
      </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
  </main><!--/#wrapper-->
  <p class="signin-cr text-light small">&copy; 2016 Traxnet Technology P/L</p>


  <!-- Modal Recover -->
  <div class="modal fade" id="recoverAccount" tabindex="-1" role="dialog" aria-labelledby="recoverAccountLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="recoverForm" action="index.php">
          <div class="modal-header">
            <h4 class="modal-title" id="recoverAccountLabel">Reset Password</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-envelope-o text-muted"></i></span>
                <input type="email" name="recoverEmail" id="recoverEmail" class="form-control" placeholder="Enter your email address">
              </div>
            </div><!-- /.form-group -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send reset link</button>
          </div>
        </form><!-- /#recoverForm -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /#recoverAccount -->


  <!-- VENDORS : jQuery & Bootstrap -->
  <script src="scripts/vendor.js"></script>
  <!-- END VENDORS -->

  <!-- DEPENDENCIES : Required plugins -->
  <script src="scripts/dependencies.js"></script>
  <!-- END DEPENDENCIES -->


  <!-- PLUGIN SETUPS: vendors & dependencies setups -->
  <script src="scripts/plugin-setups.js"></script>
  <!-- END PLUGIN SETUPS -->


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