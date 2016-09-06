<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes">

  <title>Form Validator - Wrapkit Admin Template</title>


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

  <link rel="stylesheet" href="styles/components.css">

  <link rel="stylesheet" href="styles/demo.css">
</head>
<body>
  <!--[if lt IE 9]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <main class="wrapkit-wrapper" id="wrapper">

    <!-- ============================================
    HEADER SECTION
    =============================================== -->
    <!-- navigation -->
    <nav class="header navbar">
      <div class="container-fluid">
        <!-- use .pull-*, couse we need this float on any screen size -->
        <div class="pull-left">
          <a class="navbar-brand" href="index.php" role="logo" aria-label="Logo">
            <img class="logo" src="images/logo/brand-text-dark.png" alt="Brand">
          </a>
          <button data-sidebar="toggleVisible" class="btn btn-icon navbar-btn">
            <i class="fa fa-bars"></i>
            <i class="fa fa-caret-down"></i>
          </button>
        </div>

        <!-- use .pull-*, couse we need this float on any screen size -->
        <div class="pull-right" role="navigation">
          <a aria-label="Search" id="brandSearchNav" class="btn btn-icon navbar-btn" href="#"><i class="fa fa-search"></i></a>

          <div class="dropdown-ext">
            <a aria-label="notifications" class="btn btn-icon navbar-btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-inbox"></i>
              <span class="dotted dotted-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-ext dropdown-menu-right" role="menu">
              <div class="dd-head">
                <div class="dd-head-actions">
                  <a href="#" class="btn btn-xs btn-default">Compose</a>
                </div>
                <p><a href="#">Inbox (2)</a></p>
              </div>
              <div class="dd-body">
                <ul class="media-list">
                  <li class="media unread">
                    <a href="#">
                      <div class="media-left">
                        <img class="media-object img-circle" width="32" src="images/dummy/unknown-profile.jpg" alt="user">
                      </div>
                      <div class="media-body">
                        <p class="pull-right"><small>6m</small></p>
                        <h4 class="media-heading body-text">Stilearning</h4>
                        <p>Newest Themes & Templates - Et est, sed mattis, donec hac</p>
                      </div>
                    </a>
                    <span class="dd-actions">
                      <a href="#" title="mark as read" data-toggle="tooltip" data-container="body" data-placement="bottom"><i class="fa fa-circle-o"></i></a>
                    </span>
                  </li>
                  <li class="media">
                    <a href="#">
                      <div class="media-left">
                        <img class="media-object img-circle" width="32" src="images/dummy/uifaces7.jpg" alt="user">
                      </div>
                      <div class="media-body">
                        <p class="pull-right"><small>Today, 03:11am</small></p>
                        <h4 class="media-heading body-text">Eugene Barnett</h4>
                        <p>Service Update: added support for Angular - Sed ultricies nibh, in feugiat</p>
                      </div>
                    </a>
                    <span class="dd-actions">
                      <a href="#" title="mark as unread" data-toggle="tooltip" data-container="body" data-placement="bottom"><i class="fa fa-circle"></i></a>
                    </span>
                  </li>
                  <li class="media">
                    <a href="#">
                      <div class="media-left">
                        <img class="media-object img-circle" width="32" src="images/dummy/uifaces4.jpg" alt="user">
                      </div>
                      <div class="media-body">
                        <p class="pull-right"><small>Today, 02:47am</small></p>
                        <h4 class="media-heading body-text">bent10@stilearning.com</h4>
                        <p>Spread the Word & Earn! - Dapibus nec. Integer sed purus</p>
                      </div>
                    </a>
                    <span class="dd-actions">
                      <a href="#" title="mark as unread" data-toggle="tooltip" data-container="body" data-placement="bottom"><i class="fa fa-circle"></i></a>
                    </span>
                  </li>
                  <li class="media unread">
                    <a href="#">
                      <div class="media-left">
                        <img class="media-object img-circle" width="32" src="images/dummy/uifaces3.jpg" alt="user">
                      </div>
                      <div class="media-body">
                        <p class="pull-right"><small>Yesterday, 11:41pm</small></p>
                        <h4 class="media-heading body-text">David Lloyd</h4>
                        <p>Say thanks for your awesome works! - Viverra fermentum ac. Litora mauris elit</p>
                      </div>
                    </a>
                    <span class="dd-actions">
                      <a href="#" title="mark as read" data-toggle="tooltip" data-container="body" data-placement="bottom"><i class="fa fa-circle"></i></a>
                    </span>
                  </li>
                  <li class="media">
                    <a href="#">
                      <div class="media-left">
                        <img class="media-object img-circle" width="32" src="images/dummy/unknown-profile.jpg" alt="user">
                      </div>
                      <div class="media-body">
                        <p class="pull-right"><small>Yesterday, 10:04pm</small></p>
                        <h4 class="media-heading body-text">Dribbble</h4>
                        <p>Design brief from Apple - Quis in nonummy. Ut augue, proident habitant</p>
                      </div>
                    </a>
                    <span class="dd-actions">
                      <a href="#" title="mark as unread" data-toggle="tooltip" data-container="body" data-placement="bottom"><i class="fa fa-circle-o"></i></a>
                    </span>
                  </li>
                  <li class="media">
                    <a href="#">
                      <div class="media-left">
                        <img class="media-object img-circle" width="32" src="images/dummy/uifaces16.jpg" alt="user">
                      </div>
                      <div class="media-body">
                        <p class="pull-right"><small>Yesterday, 08:55pm</small></p>
                        <h4 class="media-heading body-text">Olivia Gonzales</h4>
                        <p>Updating some of the designs! - Commodo non ac, sem netus adipiscing</p>
                      </div>
                    </a>
                    <span class="dd-actions">
                      <a href="#" title="mark as unread" data-toggle="tooltip" data-container="body" data-placement="bottom"><i class="fa fa-circle"></i></a>
                    </span>
                  </li>
                  <li class="media">
                    <a href="#">
                      <div class="media-left">
                        <img class="media-object img-circle" width="32" src="images/dummy/uifaces20.jpg" alt="user">
                      </div>
                      <div class="media-body">
                        <p class="pull-right"><small>Yesterday, 03:57pm</small></p>
                        <h4 class="media-heading body-text">Marco Auer</h4>
                        <p>Request custom designs! - Adipiscing pellentesque cum, proin luctus</p>
                      </div>
                    </a>
                    <span class="dd-actions">
                      <a href="#" title="mark as unread" data-toggle="tooltip" data-container="body" data-placement="bottom"><i class="fa fa-circle"></i></a>
                    </span>
                  </li>
                </ul>
              </div><!-- /.dd-body -->
            </div><!-- /.dropdown-menu -->
          </div><!-- /.dropdown -->

          <div class="dropdown">
            <a aria-label="More" class="btn btn-icon navbar-btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-ellipsis-v"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-profile.html"><span class="pull-right"><i class="fa fa-user text-muted"></i></span>Profile</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-timeline.html"><span class="pull-right"><i class="fa fa-clock-o text-muted"></i></span>Timeline</a></li>
              <li class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-help.html"><span class="pull-right"><i class="fa fa-question-circle text-muted"></i></span>Help</a></li>
              <li class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-locked.html"><span class="pull-right"><i class="fa fa-lock text-muted"></i></span>Locked</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-signin.html"><span class="pull-right"><i class="fa fa-sign-out text-muted"></i></span> Sign out</a></li>
            </ul>
          </div><!-- /.dropdown -->
        </div><!-- /navigation -->

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
    <aside class="sidebar" role="complementary">

        <!-- profile -->
        <?php include"sidebar.php"; ?>
    </aside><!-- /.SIDEBAR -->



    <!-- ============================================
    MAIN CONTENT SECTION
    =============================================== -->
    <section class="content-wrapper" role="main">
      <div class="content">
        <div class="content-bar">
          <div class="pull-right" role="group">
            <a data-toggle="modal" href="#" data-scripts="_includes/setups.js" data-target="#templateSetup" title="Template Setups" aria-label="template setups" class="btn btn-nofill btn-sm btn-default" href="#"><span class="icon-settings fa-lg text-muted"></span></a>
          </div>
          <ul class="breadcrumb breadcrumb-angle">
            <li><a href="index.php" aria-label="home"><i class="fa fa-home"></i> &nbsp; Dashboard </a></li>
            <li class="active">Edit user details</li>
          </ul>
        </div><!-- /.content-bar -->


        <div class="content-body">
          <div class="row">
            <div class="col-md-6">
              <div class="panel" data-fill-color="true">
                <div class="panel-heading">
                  <div class="panel-control pull-right">
                    <a href="#" class="btn btn-default btn-icon" data-toggle="panel-expand" rel="tooltip" data-placement="bottom" title="expand"><i class="arrow_expand"></i></a>
                    <a href="#" class="btn btn-default btn-icon" data-toggle="panel-collapse" rel="tooltip" data-placement="bottom" title="collapse"><i class="icon_minus_alt2"></i></a>
                  </div>
                  <h3 class="panel-title">Edit user details</h3>
                </div>
                <div class="panel-body">
                  <form role="form" id="basic-validate">
                    <div class="form-group">
                      <label class="control-label" for="basicName">User Full Name</label>
                      <input class="form-control" name="basicText" id="basicText"> </div>
                    <!-- /.form-group -->
                      <div class="form-group">
                          <label class="control-label" for="basicEmail">Enter Your Email</label>
                          <input id="basicEmail" class="form-control" name="basicEmail" type="email"> </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label class="control-label" for="basicPasswd">Enter Password</label>
                      <input id="basicPasswd" class="form-control" name="basicPasswd" type="password"> </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label class="control-label" for="confirmBasicPasswd">Confirm password</label>
                      <input id="confirmBasicPasswd" class="form-control" name="confirmBasicPasswd" type="password"> </div>
                    <!-- /.form-group -->
                    <div class="form-group clearfix">
                      <div class="pull-left">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div><!-- /.form-group -->
                  </form><!-- /form -->
                </div><!-- /.panel-body -->
              </div><!-- /.panel -->
            </div><!-- /.cols -->

            <div class="col-md-6">
              <div class="panel" data-fill-color="true">
                <div class="panel-heading">
                  <div class="panel-control pull-right">
                    <a href="#" class="btn btn-default btn-icon" data-toggle="panel-expand" rel="tooltip" data-placement="bottom" title="expand"><i class="arrow_expand"></i></a>
                    <a href="#" class="btn btn-default btn-icon" data-toggle="panel-collapse" rel="tooltip" data-placement="bottom" title="collapse"><i class="icon_minus_alt2"></i></a>
                  </div>
                  <h3 class="panel-title">Using tooltip</h3>
                </div>
                <div class="panel-body">
                  <form role="form" id="tip-validate">
                    <div class="form-group">
                      <label class="control-label" for="tipName">Text</label>
                      <div class="input-group input-group-in">
                        <input class="form-control" name="tipText" id="tipText">
                        <span class="input-group-addon"><span class="dotted"></span></span>
                      </div><!-- /.input-group -->
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label class="control-label" for="tipPasswd">Password</label>
                      <div class="input-group input-group-in">
                        <input id="tipPasswd" class="form-control" name="tipPasswd" type="password">
                        <span class="input-group-addon"><span class="dotted"></span></span>
                      </div><!-- /.input-group -->
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label class="control-label" for="confirmTipPasswd">Confirm password</label>
                      <div class="input-group input-group-in">
                        <input id="confirmTipPasswd" class="form-control" name="confirmTipPasswd" type="password">
                        <span class="input-group-addon"><span class="dotted"></span></span>
                      </div><!-- /.input-group -->
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label class="control-label" for="tipEmail">Email</label>
                      <div class="input-group input-group-in">
                        <input id="tipEmail" class="form-control" name="tipEmail" type="email">
                        <span class="input-group-addon"><span class="dotted"></span></span>
                      </div><!-- /.input-group -->
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label class="control-label" for="tipSelect">Select</label>
                      <label class="select">
                        <select id="tipSelect" name="tipSelect">
                          <option value="">- Select One -</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select> <span class="fake-addon"></span> </label>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label class="control-label" for="tipFile">File</label>
                      <div class="input-group input-group-in">
                        <input id="tipFile" class="form-control" name="tipFile" type="file" accept="image/*">
                        <span class="input-group-addon"><span class="dotted"></span></span>
                      </div><!-- /.input-group -->
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label class="control-label">Checkbox</label>
                      <div class="nice-checkbox">
                        <input type="checkbox" id="tipAgree" name="tipAgree">
                        <label for="tipAgree"> Please agree to our policy <span class="fake-addon"></span> </label>
                      </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group clearfix">
                      <div class="pull-right">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    <!-- /.form-group -->

                  </form><!-- /form -->
                </div><!-- /.panel-body -->
              </div><!-- /.panel -->
            </div><!-- /.cols -->

            <div class="clearfix"></div>
          </div><!-- /.row -->
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
  <script src="scripts/jquery.validate.js"></script>
  <script src="scripts/typeahead.bundle.js"></script>
  <script src="scripts/jquery.tagsinput.js"></script>
  <script src="scripts/jquery.mask.js"></script>
  <script src="scripts/select2.js"></script>
  <script src="scripts/jquery.selectBoxit.js"></script>
  <!-- END COMPONENTS -->

  <!-- DUMMY: Use for demo -->
  <script src="scripts/demo/frm-validator-demo.js"></script>


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