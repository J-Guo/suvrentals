<?php
//include "admin/db/connections.php";
$book = new User();
?>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hidden-xs">
                <div class="block random-cars">
                    <div class="title">
                        <h2>Popular Cars</h2>
                    </div><!-- /.title -->

                    <?php include"animate-car-details.php"; ?>

                </div><!-- /.block -->
            </div><!-- /.col-md-4 -->

            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="block">
                    <div class="title">
                        <h2>Subscribe to Newsletter</h2>
                    </div><!-- /.title -->

                    <form method="post">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your e-mail address" required="required">

                                      <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Submit</button><!-- /.btn -->
                                      </span><!-- /.input-group-btn -->
                        </div><!-- /.input-group -->
                    </form>

                    <br>

                    <div class="opening-hours">
                        <div class="day clearfix">
                            <span class="name">Monday</span><span class="hours">07:00 AM - 7:00 PM</span>
                        </div><!-- /.day -->

                        <div class="day clearfix">
                            <span class="name">Tuesday</span><span class="hours">07:00 AM - 7:00 PM</span>
                        </div><!-- /.day -->

                        <div class="day clearfix">
                            <span class="name">Wednesday</span><span class="hours">07:00 AM - 7:00 PM</span>
                        </div><!-- /.day -->

                        <div class="day clearfix">
                            <span class="name">Thursday</span><span class="hours">07:00 AM - 7:00 PM</span>
                        </div><!-- /.day -->

                        <div class="day clearfix">
                            <span class="name">Friday</span><span class="hours">07:00 AM - 7:00 PM</span>
                        </div><!-- /.day -->

                        <div class="day clearfix">
                            <span class="name">Saturday</span><span class="hours">11:00 AM - 5:00 PM</span>
                        </div><!-- /.day -->

                        <div class="day clearfix">
                            <span class="name">Sunday</span><span class="hours">11:00 AM - 5:00 PM</span>
                        </div><!-- /.day -->
                    </div><!-- /.opening-hours -->
                </div><!-- /.block -->
            </div><!-- /.col-md-4 -->

            <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 hidden-xs">
                <div class="block">
                    <div class="title center-sm">
                        <h2>SUV Rentalas - Location Map</h2>
                    </div><!-- /.title -->

                    <div class="opening-hours">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13243.227112410455!2d151.14745696714036!3d-33.92037222916809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12b08916f268ad%3A0x19164ce7d33a22d!2s148+Renwick+St%2C+Marrickville+NSW+2204!5e0!3m2!1sen!2sau!4v1463088692088" width="100%" height="280px" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div><!-- /.block -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <div class="copyright">
                        &copy; 2015<span class="separator">/</span> <a href="http://suvrentals.com.au">SUVRentals.com</a> <span class="separator">/</span> All rights reserved
                    </div><!-- /.pull-left -->

                    <ul class="nav nav-pills hidden-xs">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="fleet.php">Our Fleet</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                    </ul><!-- /.nav -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
</footer><!-- /#footer -->