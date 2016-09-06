<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="styles/bootstrap.css">

<link rel="stylesheet" href="styles/dependencies.css">

<link rel="stylesheet" href="styles/components.css">

<link rel="stylesheet" href="styles/wrapkit.css">

<link rel="stylesheet" href="styles/demo.css">

<!-- ============================================
SIDEBAR SECTION
=============================================== -->

<!-- profile -->

<div class="sidebar-block">
    <div class="media">
      	<div class="media-left">
        <a href="page-profile.html">
          <span class="status dotted dotted-success" data-toggle="tooltip" data-container="body" title="available"></span>
          <img class="media-object img-circle" src="images/dummy/profile.jpg" alt="photo profile">
        </a>
      	</div>
      	<div class="media-body">
        	<h4 class="media-heading"><?php echo $_SESSION['username']; ?>&nbsp;&nbsp;&nbsp;</h4>
            <p class="text-muted">
              <small><?php echo $_SESSION['email']; ?></small>
            </p>
      	</div>
    </div>
</div><!-- /.sidebar-block -->
<!-- /profile -->

<!-- /navigation -->
<div class="nav-wrapper">
    <ul class="nav nav-stacked" role="navigation">
        <li class="nav-item" role="presentation">
        <a href="dashboard.php">
          <span class="nav-icon"><i class="fa fa-cube"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        </li>

        <li class="divider"></li>
        <li class="nav-header" role="presentation">MASTER DATABASE</li>
        <li class="nav-item" role="presentation">
        <a href="#" data-toggle="nav-child">
          <span class="nav-icon"><i class="fa fa-book"></i></span>
          <span class="nav-text">User Management</span>
        </a>
        <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="user.php"><span class="nav-text"><span class="nav-icon"><i class="fa fa-user-plus"></i></span>&nbsp&nbspEdit Profile</span></a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="nav-text"><span class="nav-icon"><i class="fa fa-remove"></i></span>&nbsp&nbspDe-activate</span></a></li>
        </ul>
        </li>

        <li class="nav-item" role="presentation">
            <a href="#" data-toggle="nav-child">
                <span class="nav-icon"><i class="fa fa-book"></i></span>
                <span class="nav-text">SUV Bookings</span>
            </a>
            <ul class="nav nav-child level-1 nav-stacked nav-pills" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="suv-booking-list.php"><span class="nav-text"><span class="nav-icon"><i class="fa fa-list"></i></span>List of Bookings</span></a></li>
            </ul>
        </li>

        <li class="divider"></li>

        <li class="nav-item" role="presentation">
            <a href="page-help.html">
                <span class="nav-icon"><i class="fa fa-question-circle"></i></span>
                <span class="nav-text">Help</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="locked.php">
                <span class="nav-icon"><i class="fa fa-lock"></i></span>
                <span class="nav-text">Locked</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="signin.php">
                <span class="nav-icon"><i class="fa fa-lock"></i></span>
                <span class="nav-text">Sign Out</span>
            </a>
        </li>
        <li class="collapse-item" role="presentation">
            <a href="#" data-sidebar="toggleCollapse">
                <i class="fa fa-angle-double-left"></i>
            </a>
        </li>

    </ul>
</div>