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
          <div class="panel" data-fill-color="true">
            <div class="panel-heading">

              <h3 class="panel-title mt-2x ">SUV Booking History</h3>
              <hr class="mt-2x mb-2x">
            </div><!-- /.panel-heading -->

            <!-- datatables1 -->
              <table id="datatables2" class="table table-condensed table-noborder table-striped bordered-top">
                  <thead>
                  <tr>
                      <th width="7%">Book ID</th>
                      <th width="15%">Name</th>
                      <th width="12%">Phone</th>
                      <th width="5%">Vehicle</th>
                      <th width="14%">Booking From</th>
                      <th width="4%">Pick Up</th>
                      <th width="14%">Booking To</th>
                      <th width="4%">Drop At</th>
                      <th width="4%">Days</th>
                      <th width="5%">View </th>
                      <th width="5%">Status</th>
                      <th width="5%">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php
                  $query = $book -> selectBookingDetails();
                  foreach ($query as $row)
                  {

                      $startDate = strtotime($row['delivery_date']." ".$row['delivery_time']);
                      $endDate =  strtotime($row['drop_date']." ".$row['drop_time']);
                      $diff = $endDate - $startDate;
                      $days = floor($diff/(60*60*24));
                      $hours = $diff/(60*60) - 24*$days;

//                      echo $hours;
                      //format phone number
                      $mobile = $row['mobile'];
                      $firstPart = substr($mobile,0,4);
                      $secondPart = substr($mobile,4,3);
                      $thirdPart = substr($mobile,7);
                      //$dAddress = $row['delivery_street'].", ".$row['delivery_suburb'].", ".$row['delivery_pcode'].", ".$row['delivery_state'];
                      //$rAddress = $row['return_street'].", ".$row['return_suburb'].", ".$row['return_pcode'].", ".$row['return_state'];
                      ?>
                      <form name="form" method="post" action="">
                          <td class="bookingid_row"><?php echo $row['bid']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $firstPart." ".$secondPart.' '.$thirdPart; ?></td>
                          <td><?php echo $row['vrego']; ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row['delivery_date']))." - " .$row['delivery_time']; ?></td>

                          <td><?php echo $row['pickupbase']; ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row['drop_date']))." - " .$row['drop_time']; ?></td>
                          <td><?php echo $row['dropbase']; ?></td>
                          <td><?php echo $days.'D '.$hours.'H'; ?></td>
                          <td>
                              <input type="hidden" name="rid" value="">
                              <a href="dashboard.php?bid=<?php echo $row['bid']; ?>">View</a>
<!--                              <button type="submit" name="btnDelete" class="btn btn-link" style="color: red;padding: 0;">View</button>-->
                          </td>
                          <td>
                              <input type="hidden" name="rid" value="">
                              <span class="label label-success">Success</span>
                          </td>
                          <td>
                              <button name="btnDelete"  class="deleteBtn btn btn-info btn-xs">Delete</button>
                          </td>
                      </form>
                      </tr>
                  <?php
                  }
                  ?>
                  </tbody>
              </table><!-- /.table -->
          </div><!-- /.panel -->

        </div><!-- /.content-body -->


        <!-- Template Setups -->
        <div class="modal fade" id="templateSetup">
          <div class="modal-dialog">
            <!-- modal-content -->
            <div class="modal-content"></div>
          </div><!-- /.modal-dialog -->
        </div><!-- /.templateSetup -->

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
  <script src="scripts/dependencies.js"></script>
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
  <!-- END COMPONENTS -->

  <!-- DUMMY: Use for demo -->
  <script src="scripts/demo/table-datatables-extras.js"></script>
  <script src="scripts/demo/table-datatables-demo.js"></script>


  <!-- Google Analytics: change UA-48454066-1 to be your site's ID. -->
  <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-48454066-1');ga('send','pageview');
  </script>

  <!-- Customize JS-->
  <script>

      $(document).ready(function(){
          $("#datatables2").on('click','.deleteBtn',function(){

              var $row = $(this).closest("tr");    // Find the row
              var $booking_id = $row.find(".bookingid_row").text(); // Find the text

              if (!confirm("Do you want to delete this booking? ID is "+$booking_id)){
                  return false;
              }

              //send ajax to backend to delete booking
              $.ajax({
                  url: 'booking_delete.php',
                  type: 'POST',
                  data:{booking_id:$booking_id},
                  success: function(result) {
//                      redirect page
                      window.location.href = "suv-booking-list.php";
//                     console.log(result);
                  },
                  error:function(result){
                      alert('Delete request is failed. '+result);
                  }
              })
          });
      });

  </script>
</body>
</html>