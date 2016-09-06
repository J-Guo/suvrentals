<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes">

  <title>Datatables - Wrapkit Admin Template</title>


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

    <!-- /navigation -->
      <div class="nav-wrapper">
        <ul class="nav nav-stacked" role="navigation">
          <li class="nav-item" role="presentation">
            <a href="#" data-toggle="nav-child">
              <span class="nav-icon"><i class="fa fa-dashcube"></i></span>
              <span class="nav-text">Dashboard</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php"><span class="nav-text">Dashboard 1</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="index-2.html"><span class="nav-text">Dashboard 2</span></a></li>
            </ul>
          </li>

          <li class="divider"></li>
          <li class="nav-header" role="presentation">GET STARTED</li>
          <li class="nav-item" role="presentation">
            <a href="layout.html">
              <span class="nav-icon"><i class="fa fa-object-group"></i></span>
              <span class="nav-text">Layout</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a href="ecosystem.html">
              <span class="nav-icon"><i class="fa fa-cubes"></i></span>
              <span class="nav-text">Ecosystem</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a href="panels.html">
              <span class="nav-icon"><i class="fa fa-puzzle-piece"></i></span>
              <span class="nav-text">Panels</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a href="#" data-toggle="nav-child">
              <span class="nav-icon"><i class="fa fa-align-left"></i></span>
              <span class="nav-text">Level Menu</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="nav-text">Lorem ipsum</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="nav-text">Dolor sit</span></a></li>
              <li role="presentation">
                <a role="menuitem" tabindex="-1" data-toggle="nav-child" href="#"><span class="nav-text">Node</span></a>
                <ul class="nav nav-child level-2 nav-stacked nav-pills" role="menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="nav-text">Consectetur</span></a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="nav-text">Assumenda</span></a></li>
                </ul>
              </li> <!-- /node -->
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="nav-text">Amet</span></a></li>
            </ul>
          </li>

          <li class="divider"></li>
          <li class="nav-header" role="presentation">USER INTERFACES</li>
          <li class="nav-item" role="presentation">
            <a href="#" data-toggle="nav-child">
              <span class="nav-icon"><i class="fa fa-briefcase"></i></span>
              <span class="nav-text">Components</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-grid.html"><span class="nav-text">Grids</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-type.html"><span class="nav-text">Type</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-button.html"><span class="nav-text">Buttons</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-icons.html"><span class="nav-text">Icons</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-modal.html"><span class="nav-text">Modal</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-tooltip-popover.html"><span class="nav-text">Tooltips & Popovers</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-alert-callout.html"><span class="nav-text">Alerts & Callout</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-progressbar.html"><span class="nav-text">Progress bar</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-label-badge.html"><span class="nav-text">Label & Badge</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-navbar.html"><span class="nav-text">Navbar</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-nav.html"><span class="nav-text">Nav</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="component-tabs-collapse.html"><span class="nav-text">Tabs & Collapse</span></a></li>
            </ul>
          </li>
          <li class="nav-item" role="presentation">
            <a href="#" data-toggle="nav-child">
              <span class="nav-icon"><i class="fa fa-check-square"></i></span>
              <span class="nav-text">Forms</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="frm-basic.html"><span class="nav-text">Basic Elements</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="frm-advance.html"><span class="nav-text">Advance Elements</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="frm-uploader.html"><span class="nav-text">Uploader</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="frm-xeditable.html"><span class="nav-text">x-Editable</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="frm-wizard.html"><span class="nav-text">Wizard</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="frm-editor.html"><span class="nav-text">Editor</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="frm-imagecropping.html"><span class="nav-text">Image Cropping</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="frm-validator.html"><span class="nav-text">Validator</span></a></li>
            </ul>
          </li>
          <li class="nav-item" role="presentation">
            <a href="#" data-toggle="nav-child">
              <span class="nav-icon"><i class="fa fa-line-chart"></i></span>
              <span class="nav-text">Charts</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="chart-js.html"><span class="nav-text">ChartJs</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="chart-morris.html"><span class="nav-text">Morris</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="chart-inline.html"><span class="nav-text">Inline Charts</span></a></li>
            </ul>
          </li>
          <li class="nav-item open active" role="presentation">
            <a href="#" data-toggle="nav-child">
              <span class="nav-icon"><i class="fa fa-database"></i></span>
              <span class="nav-text">Tables</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="table-basic.html"><span class="nav-text">Basic Table</span></a></li>
              <li role="presentation" class="active"><a role="menuitem" tabindex="-1" href="table-datatables.html"><span class="nav-text">DataTables</span></a></li>
            </ul>
          </li>

          <li class="divider"></li>
          <li class="nav-header" role="presentation">DEVELOPMENT</li>
          <li class="nav-item" role="presentation">
            <a href="ui-kits.html">
              <span class="nav-icon"><i class="fa fa-cube"></i></span>
              <span class="nav-text">Widgets</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a href="#" data-toggle="nav-child">
              <span class="nav-icon"><i class="fa fa-plug"></i></span>
              <span class="nav-text">Plugins</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="plugin-animate.html"><span class="nav-text">Animated</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="plugin-bootbox.html"><span class="nav-text">Bootbox</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="plugin-calendar.html"><span class="nav-text">Calendar</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="plugin-maps.html"><span class="nav-text">Maps</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="plugin-nestable.html"><span class="nav-text">Nestable List</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="plugin-session-timeout.html"><span class="nav-text">Session Timeout</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="plugin-toastr.html"><span class="nav-text">Toastr</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="plugin-treeview.html"><span class="nav-text">Tree View</span></a></li>
            </ul>
          </li>
          <li class="nav-item" role="presentation">
            <a href="#" data-toggle="nav-child">
              <span class="nav-icon"><i class="fa fa-file-text-o"></i></span>
              <span class="nav-text">Pages</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-signin.html"><span class="nav-text">Signin</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-locked.html"><span class="nav-text">Lock Screen</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-error.html"><span class="nav-text">Error Page</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-profile.html"><span class="nav-text">Profile</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-inbox.html"><span class="nav-text">Inbox</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-timeline.html"><span class="nav-text">Timeline</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-gallery.html"><span class="nav-text">Gallery</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-pricing.html"><span class="nav-text">Pricing</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-invoice.html"><span class="nav-text">Invoice</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-search.html"><span class="nav-text">Search Result</span></a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="page-help.html"><span class="nav-text">Help</span></a></li>
            </ul>
          </li>
          <li class="collapse-item" role="presentation">
            <a href="#" data-sidebar="toggleCollapse">
              <i class="fa fa-angle-double-left"></i>
            </a>
          </li>
        </ul>
      </div>
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
            <li><a href="#" aria-label="home"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Datatables</li>
          </ul>
        </div><!-- /.content-bar -->


        <div class="content-body">
          <div class="panel" data-fill-color="true">
            <div class="panel-heading">
              <div class="panel-control pull-right">
                <a href="#" class="btn btn-icon" data-toggle="panel-refresh" rel="tooltip" data-placement="bottom" title="refresh"><i class="icon-refresh"></i></a>
                <a href="#" class="btn btn-icon" data-toggle="panel-expand" rel="tooltip" data-placement="bottom" title="expand"><i class="arrow_expand"></i></a>
                <a href="#" class="btn btn-icon" data-toggle="panel-collapse" rel="tooltip" data-placement="bottom" title="collapse"><i class="icon_minus_alt2"></i></a>
              </div>
              <h3 class="panel-title">Datatables</h3>
            </div><!-- /.panel-heading -->

            <div class="panel-body">
              <div class="btn-toolbar clearfix" role="toolbar">
                <div class="btn-group pull-right" style="direction: ltr">
                  <label class="text-muted" style="margin-right:10px">Multiple select:</label>
                  <input id="allowMultipleSelect" type="checkbox" class="js-switch" data-class-name="switchery switchery-alt"><!-- /switcher-flat -->
                </div>

                <div class="btn-group btn-group-sm pull-left">
                  <button data-toggle="tooltip" data-container="body" title="add new record" id="add-datatables1" class="btn btn-default" role="button">
                    <i class="fa fa-plus"></i>
                  </button>
                </div>
                <div class="btn-group btn-group-sm pull-left">
                  <button id="edit-datatables1" data-toggle="tooltip" data-container="body" title="edit record" class="btn btn-default datatables1-actions disabled" role="button">
                    <i class="fa fa-edit"></i>
                  </button>
                  <button id="delete-datatables1" data-toggle="tooltip" data-container="body" title="delete record(s)" class="btn btn-default datatables1-actions disabled" role="button">
                    <i class="fa fa-trash-o"></i>
                  </button>
                </div>
                <div class="btn-group pull-left">
                  <input id="filterDatatables1" class="form-control input-sm" placeholder="Filter">
                </div>
              </div><!-- /btn-toolbar -->
            </div><!-- /.panel-body -->

            <div class="panel-body hide" id="addFormContainer">
              <form id="formAddDatatables1" action="#" method="POST">
                <div class="form-group">
                  <p class="lead">Add new record</p>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <input name="addEngine" id="addEngine" class="form-control input-sm" placeholder="Rendering engine" autocomplete="off" required="">
                      </div>
                    </div><!-- /.cols -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <input name="addBrowser" id="addBrowser" class="form-control input-sm" placeholder="Browser" autocomplete="off" required="">
                      </div>
                    </div><!-- /.cols -->
                    <div class="col-md-2">
                      <div class="form-group">
                        <input name="addPlatform" id="addPlatform" class="form-control input-sm" placeholder="Platform" autocomplete="off" required="">
                      </div>
                    </div><!-- /.cols -->
                    <div class="col-md-2">
                      <div class="form-group">
                        <input name="addVersion" id="addVersion" class="form-control input-sm" placeholder="Engine version" autocomplete="off" required="">
                      </div>
                    </div><!-- /.cols -->
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="select select-sm">
                          <select name="addGrade" id="addGrade" required="">
                            <option value="">CSS grade</option>
                            <option value="A"> A </option>
                            <option value="B"> B </option>
                            <option value="C"> C </option>
                            <option value="D"> D </option>
                            <option value="E"> E </option>
                            <option value="X"> X </option>
                            <option value="C/A1"> C/A<sup>1</sup> </option>
                          </select>
                        </label>
                      </div>
                    </div><!-- /.cols -->
                  </div><!-- /.row -->
                </div><!-- /.form-group -->

                <div class="form-grouphide">
                  <button id="hideAddDatatables1" class="btn btn-default btn-sm">Cancel</button>
                  <button type="submit" class="btn btn-success btn-sm">Create</button>
                </div><!-- /.form-group -->
              </form><!-- /#formAddDatatables1 -->
            </div><!-- /.panel-body -->

            <div class="panel-body hide" id="editFormContainer">
              <form id="formEditDatatables1" action="#" method="POST">
                <div class="form-group">
                  <p class="lead">Edit selected row</p>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="hidden" name="datatables1ID" id="datatables1ID">
                        <input name="editEngine" id="editEngine" class="form-control input-sm" placeholder="Rendering engine" autocomplete="off" required="">
                      </div>
                    </div><!-- /.cols -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <input name="editBrowser" id="editBrowser" class="form-control input-sm" placeholder="Browser" autocomplete="off" required="">
                      </div>
                    </div><!-- /.cols -->
                    <div class="col-md-2">
                      <div class="form-group">
                        <input name="editPlatform" id="editPlatform" class="form-control input-sm" placeholder="Platform" autocomplete="off" required="">
                      </div>
                    </div><!-- /.cols -->
                    <div class="col-md-2">
                      <div class="form-group">
                        <input name="editVersion" id="editVersion" class="form-control input-sm" placeholder="Engine version" autocomplete="off" required="">
                      </div>
                    </div><!-- /.cols -->
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="select select-sm">
                          <select name="editGrade" id="editGrade" required="">
                            <option value="">CSS grade</option>
                            <option value="A"> A </option>
                            <option value="B"> B </option>
                            <option value="C"> C </option>
                            <option value="D"> D </option>
                            <option value="E"> E </option>
                            <option value="X"> X </option>
                            <option value="C/A1"> C/A<sup>1</sup> </option>
                          </select>
                        </label>
                      </div>
                    </div><!-- /.cols -->
                  </div><!-- /.row -->
                </div><!-- /.form-group -->

                <div class="form-group">
                  <button id="hideEditDatatables1" class="btn btn-default btn-sm">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-sm">Save Change</button>
                </div><!-- /.form-group -->
              </form><!-- /#formAddDatatables1 -->
            </div><!-- /.panel-body -->

            <!-- datatables1 -->
            <table id="datatables1" class="table table-noborder table-hover bordered-top">
              <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
              </thead>

              <tbody></tbody>

              <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.panel -->



          <!-- TABLE TOOLS -->
          <div class="panel" data-fill-color="true" id="panel-datatableTools">
            <div class="panel-heading mb-2x">
              <div class="panel-control-input pull-right" id="tt-actions"></div>
              <h3 class="panel-title">Table Tools</h3>
            </div><!-- /.panel-heading -->

            <!-- datatables2 -->
            <table id="datatables2" class="table table-condensed table-noborder table-striped bordered-top">
              <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
              </thead>

              <tbody></tbody>

              <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
              </tfoot>
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
      <div class="footer">
        <div class="pull-right text-muted"><small>Currently v1.1</small></div>
        <div>Wrapkit Template  &copy; 2015</div>
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
</body>
</html>