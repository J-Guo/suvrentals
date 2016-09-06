<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes">

  <title>Dashboard - Online JOB - INVOICE Application</title>


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

  <link rel="stylesheet" href="styles/components.css">

  <link rel="stylesheet" href="styles/wrapkit.css">

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
          	<p class="logo">ONLINE JOB - INVOICE APP</p>
            <!--<img class="logo" src="images/logo/brand-text-dark.png" alt="Brand">-->
          </a>
          <button data-sidebar="toggleVisible" class="btn btn-icon navbar-btn">
            <i class="fa fa-bars"></i>
            <i class="fa fa-caret-down"></i>
          </button>
        </div>

        <!-- use .pull-*, couse we need this float on any screen size -->
        <div class="pull-right" role="navigation">
          

          
          <div class="dropdown">
            <a aria-label="More" class="btn btn-icon navbar-btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-ellipsis-v"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-profile.html"><span class="pull-right"><i class="fa fa-user text-muted"></i></span>Profile</a></li>
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

        <div class="content-body">

          <div class="row">
            <!-- LATEST SIGNUP -->
            <div class="col-md-6">
              <div class="panel" data-fill-color="true">
                <div class="col-md-12">
                  <div class="panel" data-fill-color="true">
                    <div class="embed-responsive embed-responsive-16by9 corner-top">
                      <img class="embed-responsive-item" src="images/dummy/people5.jpg" alt="cover">
                      <div class="embed-overlay bg-grd-dark"></div>
                      <div class="embed-bar text-light">
                        <h1>Todo Lists</h1>
                        <p class="mt-4x">
                          <a href="#" class="btn btn-icon btn-bordered btn-default border-light text-light mr-1x">11 <br>Business</a>
                          <a href="#" class="btn btn-icon btn-bordered btn-default border-light text-light">6 <br>Personal</a>
                        </p>
                      </div>
                      <div class="embed-badge embed-badge-right">
                        <div class="embed-badge-bg bg-red"></div>
                        <a href="#" class="embed-badge-content" rel="tooltip" title="Today tasks" data-container="body"><strong>+5</strong></a>
                      </div>
                      <div class="embed-bar embed-bar-bottom text-light">
                        <span class="pull-right">Sep 12, 2015</span>
                      </div>
                    </div><!-- /.embed -->
                    <div class="list-group">
                      <div class="list-group-item no-border bordered-left bordered-4x border-red">
                        <div class="todo-action pull-right">
                          <span class="label label-default">1:00 am</span>
                          <button class="btn btn-circle btn-nofill btn-default"><i class="icon_close"></i></button>
                        </div>
                        <div class="nice-checkbox help-inline">
                          <input type="checkbox" id="todo1" checked="checked" disabled="disabled">
                          <label for="todo1"><span class="pl-2x"><strike class="text-muted">Achive sales quota</strike></span></label>
                        </div>
                      </div><!-- /.list-group-item -->
                      <div class="list-group-item no-border bordered-left bordered-4x border-yellow">
                        <div class="todo-action pull-right">
                          <span class="label label-default">3:30 am</span>
                          <button class="btn btn-circle btn-nofill btn-default"><i class="icon-pencil"></i></button>
                        </div>
                        <div class="nice-checkbox help-inline">
                          <input type="checkbox" id="todo2">
                          <label for="todo2"><span class="pl-2x">Achive sales quota</span></label>
                        </div>
                      </div><!-- /.list-group-item -->
                      <div class="list-group-item no-border bordered-left bordered-4x border-teal">
                        <div class="todo-action pull-right">
                          <span class="label label-default">5:00 am</span>
                          <button class="btn btn-circle btn-nofill btn-default"><i class="icon-pencil"></i></button>
                        </div>
                        <div class="nice-checkbox help-inline">
                          <input type="checkbox" id="todo3">
                          <label for="todo3"><span class="pl-2x">Achive sales quota</span></label>
                        </div>
                      </div><!-- /.list-group-item -->
                      <div class="list-group-item no-border bordered-left bordered-4x border-blue">
                        <div class="todo-action pull-right">
                          <span class="label label-default">tommorow</span>
                          <button class="btn btn-circle btn-nofill btn-default"><i class="icon-pencil"></i></button>
                        </div>
                        <div class="nice-checkbox help-inline">
                          <input type="checkbox" id="todo4">
                          <label for="todo4"><span class="pl-2x">Achive sales quota</span></label>
                        </div>
                      </div><!-- /.list-group-item -->
                      <div class="list-group-item no-border bordered-left bordered-4x border-violet">
                        <div class="todo-action pull-right">
                          <span class="label label-default">tommorow</span>
                          <button class="btn btn-circle btn-nofill btn-default"><i class="icon-pencil"></i></button>
                        </div>
                        <div class="nice-checkbox help-inline">
                          <input type="checkbox" id="todo5">
                          <label for="todo5"><span class="pl-2x">Achive sales quota</span></label>
                        </div>
                      </div><!-- /.list-group-item -->
                      <button type="button" class="list-group-item"><i class="fa fa-plus ml-1x mr-2x"></i> Add New List</button><!-- /.list-group-item -->
                    </div><!-- /.panel-group -->
                  </div><!-- /.panel -->
                </div><!-- /.cols -->
              </div><!-- /.panel -->
            </div><!-- /.cols -->

            <!-- SOCIAL ACTIVITY -->
            <div class="col-md-6">
              <div class="panel" data-fill-color="true">
                <div class="panel-body">
                  <p class="title">Social Activity</p>
                  <div class="media">
                    <div class="media-left">
                      <div class="media-object mr-1x">
                        <div class="easyPieChart" data-percent="72" data-size="52" data-line-width="3" data-line-cap="square" data-scale-color="false" data-track-color="#F5F7FA" data-bar-color="#ED5565">
                          <span class="percentage text-red"><i class="fa fa-google-plus fa-lg"></i></span>
                        </div><!-- /.easyPieChart -->
                      </div>
                    </div>
                    <div class="media-body">
                      <h3 class="media-heading">864,591 <small></small></h3>
                      <p class="text-muted">+267 circle last week</p>
                    </div>
                  </div><!-- /.media -->

                  <div class="media">
                    <div class="media-left">
                      <div class="media-object mr-1x">
                        <div class="easyPieChart" data-percent="82" data-size="52" data-line-width="3" data-line-cap="square" data-scale-color="false" data-track-color="#F5F7FA" data-bar-color="#4FC1E9">
                          <span class="percentage text-cyan"><i class="fa fa-twitter fa-lg"></i></span>
                        </div><!-- /.easyPieChart -->
                      </div>
                    </div>
                    <div class="media-body">
                      <h3 class="media-heading">638,546</h3>
                      <p class="text-muted">+267 followers last week</p>
                    </div>
                  </div><!-- /.media -->

                  <div class="media">
                    <div class="media-left">
                      <div class="media-object mr-1x">
                        <div class="easyPieChart" data-percent="64" data-size="52" data-line-width="3" data-line-cap="square" data-scale-color="false" data-track-color="#F5F7FA" data-bar-color="#5D9CEC">
                          <span class="percentage text-blue"><i class="fa fa-facebook fa-lg"></i></span>
                        </div><!-- /.easyPieChart -->
                      </div>
                    </div>
                    <div class="media-body">
                      <h3 class="media-heading">528,693</h3>
                      <p class="text-muted">+267 friends last week</p>
                    </div>
                  </div><!-- /.media -->

                  <div class="media">
                    <div class="media-left">
                      <div class="media-object mr-1x">
                        <div class="easyPieChart" data-percent="47" data-size="52" data-line-width="3" data-line-cap="square" data-scale-color="false" data-track-color="#F5F7FA" data-bar-color="#48CFAD">
                          <span class="percentage text-teal"><i class="fa fa-instagram fa-lg"></i></span>
                        </div><!-- /.easyPieChart -->
                      </div>
                    </div>
                    <div class="media-body">
                      <h3 class="media-heading">324,863</h3>
                      <p class="text-muted">+267 followers last week</p>
                    </div>
                  </div><!-- /.media -->

                </div><!-- /.panel-body -->
              </div><!-- /.panel -->
            </div><!-- /.cols -->

            <div class="clearfix"></div>

            <!-- INQUIRIES -->
            <div class="col-md-6">
              <div class="panel" data-fill-color="true">
                <div class="panel-body">
                  <p class="pull-right">
                    <a href="#" class="btn btn-danger btn-bordered btn-circle btn-xs">7</a>
                  </p>
                  <p class="title">Inquiries</p>
                  <div class="clearfix"></div>
                  <div data-toggle="slimScroll" style="height:385px" data-color="#CCD1D9" data-allow-page-scroll="true">
                    <a href="#" class="media">
                      <div class="media-left">
                        <i class="fa fa-envelope-o fa-2x text-muted"></i>
                      </div>
                      <div class="media-body">
                        <p class="media-heading"><strong>Stacie Skates</strong> Quaerat quibusdam beatae assumenda atque voluptatum dolores!</p>
                        <p class="text-muted"><small>Just Now</small></p>
                      </div>
                    </a><!-- /.media -->
                    <a href="#" class="media">
                      <div class="media-left">
                        <i class="icon-speech fa-2x text-muted"></i>
                      </div>
                      <div class="media-body">
                        <p class="media-heading"><strong>Charles Ewing</strong> Architecto, neque, suscipit? Quo quibusdam placeat beatae.</p>
                        <p class="text-muted"><small>About 4 minutes ago</small></p>
                      </div>
                    </a><!-- /.media -->
                    <a href="#" class="media">
                      <div class="media-left">
                        <i class="fa fa-envelope-o fa-2x text-muted"></i>
                      </div>
                      <div class="media-body">
                        <p class="media-heading"><strong>Alene Notter</strong> Consequatur dolorum maxime voluptatum laborum maiores omnis.</p>
                        <p class="text-muted"><small>26 minutes ago</small></p>
                      </div>
                    </a><!-- /.media -->
                    <a href="#" class="media">
                      <div class="media-left">
                        <i class="fa fa-envelope-o fa-2x text-muted"></i>
                      </div>
                      <div class="media-body">
                        <p class="media-heading"><strong>Mozell Firestone</strong> Fuga, minima temporibus porro. Ipsam, blanditiis expedita.</p>
                        <p class="text-muted"><small>1 hours ago</small></p>
                      </div>
                    </a><!-- /.media -->
                    <a href="#" class="media">
                      <div class="media-left">
                        <i class="icon-speech fa-2x text-muted"></i>
                      </div>
                      <div class="media-body">
                        <p class="media-heading"><strong>Apolonia Mcnevin</strong> Nobis numquam alias voluptatum. Repudiandae, dolores, qui.</p>
                        <p class="text-muted"><small>2 hours ago</small></p>
                      </div>
                    </a><!-- /.media -->
                    <a href="#" class="media">
                      <div class="media-left">
                        <i class="fa fa-envelope-o fa-2x text-muted"></i>
                      </div>
                      <div class="media-body">
                        <p class="media-heading"><strong>Cassondra Hittman</strong> Consequuntur cupiditate ex quas, quia doloremque, quisquam.</p>
                        <p class="text-muted"><small>2 hours ago</small></p>
                      </div>
                    </a><!-- /.media -->
                    <a href="#" class="media">
                      <div class="media-left">
                        <i class="icon-speech fa-2x text-muted"></i>
                      </div>
                      <div class="media-body">
                        <p class="media-heading"><strong>Princess Faerber</strong> Nam, ipsam explicabo, similique obcaecati facere atque.</p>
                        <p class="text-muted"><small>4 hours ago</small></p>
                      </div>
                    </a><!-- /.media -->
                  </div>
                </div><!-- /.panel-body -->
              </div><!-- /.panel -->
            </div><!-- /.cols -->

            <!-- SITE RESUME -->
            <div class="col-md-6">
              <div class="panel" panel-fill-color="true">
                <div class="panel-body">
                  <ul class="list-inline pull-right">
                    <li class="active"><a href="#top-pages" class="dotted dotted-lg" aria-controls="top-pages" role="tab" data-toggle="tab"></a></li>
                    <li><a href="#top-refs" class="dotted dotted-lg" aria-controls="top-refs" role="tab" data-toggle="tab"></a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="top-pages" class="tab-pane active fade in">
                      <p class="title">Top Pages</p>
                      <hr class="mt-2x">
                      <ul class="media-list">
                        <li class="media">
                          <div class="media-left">1</div>
                          <div class="media-body">
                            <p class="pull-right">95,880</p>
                            <p class="media-heading">Landing Page</p>
                            <a href="#" class="help-block"><small>http://wrapkit.com</small></a>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">2</div>
                          <div class="media-body">
                            <p class="pull-right">69,189</p>
                            <p class="media-heading">Collections</p>
                            <a href="#" class="help-block"><small>http://wrapkit.com/collections</small></a>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">3</div>
                          <div class="media-body">
                            <p class="pull-right">48,238</p>
                            <p class="media-heading">Free Stuff</p>
                            <a href="#" class="help-block"><small>http://wrapkit.com/free-stuff</small></a>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">4</div>
                          <div class="media-body">
                            <p class="pull-right">29,616</p>
                            <p class="media-heading">About Us</p>
                            <a href="#" class="help-block"><small>http://wrapkit.com/about-us</small></a>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">5</div>
                          <div class="media-body">
                            <p class="pull-right">18,444</p>
                            <p class="media-heading">Our Works</p>
                            <a href="#" class="help-block"><small>http://wrapkit.com/our-works</small></a>
                          </div>
                        </li>
                      </ul>
                      <p class="text-center"><a href="#">View All <span class="fa fa-angle-double-down ml-1x"></span></a></p>
                    </div><!-- /.tab-pane -->

                    <div id="top-refs" class="tab-pane">
                      <p class="title">Top References</p>
                      <hr class="mt-2x">
                      <ul class="media-list">
                        <li class="media">
                          <div class="media-left">1</div>
                          <div class="media-body">
                            <p class="pull-right">367,923</p>
                            <p class="media-heading">Google</p>
                            <a href="#" class="help-block"><small>http://google.com</small></a>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">2</div>
                          <div class="media-body">
                            <p class="pull-right">163,394</p>
                            <p class="media-heading">Bing</p>
                            <a href="#" class="help-block"><small>http://bing.com</small></a>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">3</div>
                          <div class="media-body">
                            <p class="pull-right">82,399</p>
                            <p class="media-heading">Yahoo</p>
                            <a href="#" class="help-block"><small>http://yahoo.com</small></a>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">4</div>
                          <div class="media-body">
                            <p class="pull-right">44,960</p>
                            <p class="media-heading">Yandex</p>
                            <a href="#" class="help-block"><small>http://yandex.com</small></a>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">5</div>
                          <div class="media-body">
                            <p class="pull-right">19,862</p>
                            <p class="media-heading">Others</p>
                            <a href="#" class="help-block"><small>+24 another refs</small></a>
                          </div>
                        </li>
                      </ul>
                      <p class="text-center"><a href="#">View All <span class="fa fa-angle-double-down ml-1x"></span></a></p>
                    </div><!-- /.tab-pane -->
                  </div><!-- /.tab-content -->
                </div><!-- /.panel-body -->
              </div><!-- /.panel -->
            </div><!-- /.cols -->
          </div><!-- /.row -->
        </div><!-- /.content-body -->


      </div><!-- /.content -->
    </section><!-- /MAIN -->



    <!-- ============================================
    FOOTER SECTION
    =============================================== -->
    <footer class="footer-wrapper" role="contentinfo">
      <div class="footer">
        <div class="pull-right text-muted"><small>Currently v1.1</small></div>
        <div>IT Solution by <a href="http://www.nphasis.com">NPHASIS Technology Ltd</a></div>
      </div>
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
  <!-- Morris.js + Raphael -->
  <script src="scripts/morris.bundle.js"></script>
  <script src="scripts/jquery.sparkline.js"></script>
  <script src="scripts/jquery.easypiechart.js"></script>
  <!-- END COMPONENTS -->


  <!-- DUMMY: Use for demo -->
  <script src="scripts/demo/dashboard1-demo.js"></script>


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