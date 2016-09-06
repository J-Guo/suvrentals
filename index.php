<?php
require('admin/twilio-php/Services/Twilio.php');

include "admin/db/connections.php";
$book = new User();

date_default_timezone_set("Australia/Sydney");

$time= date("h:i:sa");
$date = date("Y/m/d");
$datetime = $date." ".$time;

$contact_name=null;
$contact_number = null;
$error_name = null;
$error_number = null;
$success = null;
$headers=null;
$arrerrors=array();
$nameErr = null;
$phoneErr = null;

$email_address = "info@orbella.com.au";
//$email_address = "jp@orbella.com.au";

$store = $book -> selectVehicleDetails();

if(isset($_GET['reachby']))

if(isset($_POST['latitude']))
$latitude = $_POST['latitude'];
if(isset($_POST['longitude']))
$longitude = $_POST['longitude'];

if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    //Send request and receive json data by latitude and longitude
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if($status=="OK"){
        //Get address from json data
        $geoAddress = $data->results[0]->formatted_address;
    }else{
        $geoAddress =  'Unknown Location';
    }
    //Print address

}

if(isset($_POST['submit']))
{//1st

    $contact_name= trim($_POST['contact_name']);
    $contact_phone = $_POST['contact_phone'];

    if($contact_name!="")
    {

        //echo "ingaiyum vara venum";

        /*  ==========================================================================
        Send Message
        ========================================================================== */
        $send_subject = "You've been contacted by: " . $contact_name. " From ".$geoAddress;
        $send_message =
            "You have been contacted by $contact_name with regards to Request a call back and the details as follows:

        Contact details:

        Name: $contact_name
        Mobile: $contact_phone
        ";

        $headers .= 'To: ' .$email_address. "\r\n";
        $headers .= 'From: '.$contact_name. "\r\n";

        //$name = test_input($_POST["$contact_name"]);
//    if((!preg_match("/^[a-zA-Z ]*$/",$contact_name)) and (!preg_match('/^\(?(?:\+?61|0)(?:(?:2\)?[ -]?(?:3[ -]?[38]|[46-9][ -]?[0-9]|5[ -]?[0-35-9])|3\)?(?:4[ -]?[0-57-9]|[57-9][ -]?[0-9]|6[ -]?[1-67])|7\)?[ -]?(?:[2-4][ -]?[0-9]|5[ -]?[2-7]|7[ -]?6)|8\)?[ -]?(?:5[ -]?[1-4]|6[ -]?[0-8]|[7-9][ -]?[0-9]))(?:[ -]?[0-9]){6}|4\)?[ -]?(?:(?:[01][ -]?[0-9]|2[ -]?[0-57-9]|3[ -]?[1-9]|4[ -]?[7-9]|5[ -]?[018])[ -]?[0-9]|3[ -]?0[ -]?[0-5])(?:[ -]?[0-9]){5})$/', $contact_phone))) {
//        echo $nameErr = "Error";
//    }


        //australian all phone number validation
        if (!preg_match('/^\(?(?:\+?61|0)(?:(?:2\)?[ -]?(?:3[ -]?[38]|[46-9][ -]?[0-9]|5[ -]?[0-35-9])|3\)?(?:4[ -]?[0-57-9]|[57-9][ -]?[0-9]|6[ -]?[1-67])|7\)?[ -]?(?:[2-4][ -]?[0-9]|5[ -]?[2-7]|7[ -]?6)|8\)?[ -]?(?:5[ -]?[1-4]|6[ -]?[0-8]|[7-9][ -]?[0-9]))(?:[ -]?[0-9]){6}|4\)?[ -]?(?:(?:[01][ -]?[0-9]|2[ -]?[0-57-9]|3[ -]?[1-9]|4[ -]?[7-9]|5[ -]?[018])[ -]?[0-9]|3[ -]?0[ -]?[0-5])(?:[ -]?[0-9]){5})$/', $contact_phone))
        {
            $phoneErr = "Invalid Phone number";
        }


        if($phoneErr==NULL)
        {
            $store = $book -> contactBooking($datetime,$contact_name,$contact_phone,'SUV',$latitude,$longitude,$geoAddress);
            $arrerrors['success'] = "Thank you for choosing SUVrentals. One of our representatives will get back to you with your booking shortly.";

            //==========================================================================================
            // SMS Gateway
            //==========================================================================================
            // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
            $AccountSid = "ACd61bbdbf0ef9a9f000eaf80f7048be92";
            $AuthToken = "314d9d2649b50324a53e1e4af37d8767";
            //$number = '+61451112478';

            // Step 3: instantiate a new Twilio Rest Client
            $client = new Services_Twilio($AccountSid, $AuthToken);

            // Step 4: make an array of people we know, to send them a message.
            // Feel free to change/add your own phone number and name here.
            $people = array(
                "+61415230462" => "SUVRentals"
                //"+61451112478" => "JP"

                //        "+61451112478" => "JP",
                //        "+14158675310" => "Boots",
                //        "+14158675311" => "Virgil",

            );

            // Step 5: Loop over all our friends. $number is a phone number above, and
            // $name is the name next to it
            foreach ($people as $number => $name) {

                $sms = $client->account->messages->sendMessage(

                // Step 6: Change the 'From' number below to be a valid Twilio number
                // that you've purchased, or the (deprecated) Sandbox number
                    "+61437825267",
                    // the number we are sending to - Any phone number
                    $number,
                    // the sms body
                    "Hi, Call $contact_name on $contact_phone from $geoAddress in regard to a recent SUV Booking query at $datetime"
                );

                // Display a confirmation message on the screen
                //echo "Sent message to $name";
            }


            //==========================================================================================
            // Email Gateway
            //==========================================================================================
            if (mail($email_address, $send_subject, $send_message, $headers))
            {

                ?>
                <script>
                    //                window.alert('Thank you. We will get back you soon.');
                    //window.location.href="online-booking.php";
                </script>
            <?php
            } else {
                $error_msg = 'Please make sure PHP mail() is enabled.';
            }

            if(isset($arrerrors['success']) && count($arrerrors['success']) !=0)
            {
                if(isset($_GET['reachby']))
                { ?>
                    <script>window.location.href = 'thankyou.php?reachby=<?php echo $_GET['reachby']; ?>';</script>
                <?php
                }else{
                    ?>
                    <script>window.location.href = 'thankyou.php';</script>
                <?php
                }
            }
        }

    }else
    {
        $arrerrors['namenull']="Enter your name";
    }
}
?>


<?php

?>

<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="ROBOTS" content="ALL">
    <meta name="keywords" content="suv rentals, suv rental sydney, 4wd hire sydney, 4wd hire, car rental, car rental sydney">
    <meta name="description" content="Looking for a 4WD or SUV hire in Sydney? Here at SUV Rentals, we deliver anywhere in Sydney! Call 0415 230 462 to book your car rental now! From $89/day">
    <meta name="generator" content="www.suvrentals.com.au">
    <meta name="author" content="www.suvrentals.com.au">
    <meta name="rating" content="General">
    <meta name="distribution" content="Global">
    <title>SUV Rentals | SUV & 4wd Hire Sydney</title>
    <link rel="alternate" href="http://suvrentatls.com.au" hreflang="en-au">
    <link rel="amphtml" href="https://www.suvrentals.com.au/url/to/amp-version.html">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="libraries/chosen/chosen.min.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="libraries/pictopro-outline/pictopro-outline.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="libraries/pictopro-normal/pictopro-normal.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="libraries/colorbox/colorbox.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="libraries/jslider/bin/jquery.slider.min.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="assets/css/carat.css" media="screen, projection">


    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,400,700,400italic,700italic" rel="stylesheet" type="text/css"  media="screen, projection">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link href="assets/css/themes/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="assets/css/themes/abootstrap.min.css" rel="stylesheet">
    <link href="assets/css/themes/simple.min.css" rel="stylesheet">

    <!--Start of Zopim Live Chat Script-->
<!--    <script type="text/javascript">-->
<!--        window.$zopim||(function(d,s){var z=$zopim=function(c){-->
<!--            z._.push(c)},$=z.s=-->
<!--            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.-->
<!--            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');-->
<!--            $.src='//v2.zopim.com/?3vfpVFvrHL9TUarIzOEKhS55dP6Rk4ZF';z.t=+new Date;$.-->
<!--                type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');-->
<!--    </script>-->
    <!--End of Zopim Live Chat Script-->

</head>
<body>


<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75073481-1', 'auto');
    ga('send', 'pageview');

</script>



<!-- header -->

<?php include('header.php'); ?>

<!--end header -->

<div class="highlighted-wrapper gray">
    <div class="highlighted section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div id="overviews">
                        <?php
                        $query = $book -> selectVehicleDetails();
                        foreach ($query as $row)
                        {
                        ?>
                            <div class="overview <?php if($row['id']=='1'){ ?> active <?php } ?>">
                                <div class="overview-table">
                                    <div class="item title">
                                        <h2 style="text-transform: uppercase;"><?php echo $row['brand']." ".$row['vname']." (".$row['vtype'].")"; ?></h2>
<!--                                        <div class="subtitle">--><?php //echo $row['vtype']; ?><!--</div>-->
                                    </div><!-- /.item -->

<!--                                    <div class="item tags">-->
<!--                                        <div class="price">$14,986</div>-->
<!--                                        <div class="type">Sale</div>-->
<!--                                    </div><!-- /.item -->

                                    <div class="item line">
                                        <span class="property">Year</span>
                                        <span class="value"><?php echo $row['year'] ?></span>
                                    </div><!-- /.item -->

                                    <div class="item line">
                                        <span class="property">Kilometres</span>
                                        <span class="value"><?php echo $row['km']."km"; ?></span>
                                    </div><!-- /.item -->

                                    <div class="item line">
                                        <span class="property">Seats</span>
                                        <span class="value"><?php echo $row['seats']." Seats"; ?></span>
                                    </div><!-- /.item -->

                                    <?php if($row['babyseat']!='No') { ?>
                                    <div class="item line">
                                        <span class="property">Baby seat</span>
                                        <span class="value"><?php echo $row['babyseat']; ?></span>
                                    </div><!-- /.item -->
                                    <?php } ?>

                                    <?php if($row['towbar']!='No') { ?>
                                    <div class="item line">
                                        <span class="property">Tow Bar</span>
                                        <span class="value"><?php echo $row['towbar']; ?></span>
                                    </div><!-- /.item -->
                                    <?php } ?>
                                    <div class="item line">
                                        <span class="property">Fuel Type</span>
                                        <span class="value"><?php echo $row['fuel'] ?></span>
                                    </div><!-- /.item -->

                                    <div class="item line">
                                        <span class="property">Transmission</span>
                                        <span class="value"><?php echo $row['transmission'] ?></span>
                                    </div><!-- /.item -->

                                    <div class="item line">
                                        <span class="property">Drive Train / Engine</span>
                                        <span class="value"><?php echo $row['drivetrain']." / ".$row['engine']; ?></span>
                                    </div><!-- /.item -->

                                    <div class="item line">
                                        <span class="property">Condition</span>
                                        <span class="value"><?php echo $row['vcondition'] ?></span>
                                    </div><!-- /.item -->
                                </div><!-- /.overview-table -->
                            </div><!-- /.overview -->
                        <?php
                        }
                        ?>


                        <div id="slider-navigation">
                            <div class="prev"></div><!-- /.prev -->
                            <div class="next"></div><!-- /.next -->
                        </div><!-- /.slider-navigation -->
                    </div><!-- /.overviews -->
                </div>


                <div class="col-md-7 col-sm-7">
                    <div id="slider">
                        <?php
                        $query = $book -> selectVehicleDetails();
                        foreach ($query as $row)
                        {
                        ?>
                            <div class="slide <?php if($row['id']=='1'){ ?> active <?php } ?>">
                                <a href="#"><img src="admin/photos/vehicles/<?php echo $row['image']; ?>" alt="#"></a>
                                <div class="color-overlay"></div><!-- /.color-overlay -->
                            </div><!-- /.slide -->
                        <?php
                        }
                        ?>
                    </div><!-- /#slider -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.highligted -->

    <div class="filter-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12 pull-right">
                    <div class="filter-block">
                        <div class="block">
                            <div class="content">
                                <div class="inner">
                                    <div class="page-header-inner">
                                        <div class="heading">
                                            <h3>Feel free to request a call</h3>
                                        </div><!-- /.heading -->
                                        <div class="line"><hr/></div>
                                    </div>
                                    <form method="post" action="">
                                        <div class="row">

                                            <div class="form-group col-sm-12 col-md-12">
                                                <label>Name</label>
                                                <input name="contact_name" id="suv-get-name" value="<?php echo $contact_name; ?>" class="input form-control contact-name" placeholder="Name">
                                                <?php if(isset($arrerrors['namenull'])){ ?>
                                                    <span class="error-control" style="color:#ff6166;"><h4><?php echo $arrerrors['namenull']; ?></h4></span>
                                                <?php } ?>
                                            </div><!-- /.form-group -->

                                            <div class="form-group col-sm-12 col-md-12">
                                                <label>Contact Number</label>
                                                <input type="tel" name="contact_phone" id="contact_phone" maxlength="10" value="<?php echo $contact_number; ?>" class="input form-control contact_phone" placeholder="Mobile Number">
                                                <?php if($phoneErr!=NULL){ ?>
                                                    <span class="error-control" style="color:#ff6166;"><h4><?php echo $phoneErr; ?></h4></span>
                                                <?php } ?>
                                            </div><!-- /.form-group -->

                                            <input type="hidden" id='latitude' name='latitude' value="">
                                            <input type="hidden" id='longitude' name='longitude' value="">

                                        </div><!-- /.row -->

                                        <hr>

                                        <!--<div class="line"><hr/></div>-->
                                        <div class="form-group">
                                            <button type="submit" name="submit"  class="send btn btn-primary btn-primary-color">
                                                Book A SUV <i class="icon icon-normal-right-arrow-small"></i>
                                            </button>
                                        </div><!-- /.form-group -->

                                    </form>
                                </div><!-- /.inner -->
                            </div><!-- /.content -->
                        </div><!-- /.block -->
                    </div><!-- /.filter-block -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.highlighted -->
    </div><!-- /.slider-filter -->
</div><!-- /.highlighted-wrapper -->


<div id="content" class="frontpage">
    <div class="section gray-light">
        <div class="container">
            <div class="row">

                <div class="hidden">
                    <span>
                        <p>
                            If any 4WD series equipped you fully with the best outdoor gear, it is functional, recreational and reasonable SUV Cars that really live up to its premium expectations for long and leisurely trips to prove that someone in their car is reliable.

                            And Latest 5 or 7 Seater SUV/ 4WD, with a wide range of models from Mazda, BMW, Range Rover to Ford and much more, with SUVrentals.com.au, are clearly affordable. And with SUVrentals.com.au, we are absolutely a fast, efficient and easy car rental booking service with no hidden charges.

                            In all weather conditions, SUV/ 4WDs are reliable and safe, with plenty of safety features and capabilities for off-road adventure, which is incredibly impressive for the fact that their stability control and traction systems made late models much safer and better.

                            It is not easy to make your choice of special vehicle, SUVrentals.com.au helps you find out the right vehicle to hire to suit your specific driving needs. We are 4WD & SUV Rental Specialist!

                            If you want more cargo space, higher seating, better visibility, greater towing capacity, better in snow and more passenger seating, in which case, grab an SUV/4WD.
                        </p>

                        <p>
                            SUVrentals.com.au, specialize in providing its customers with wide range of 5 -7 seater SUV/4WD models. Our fleet consists of full size 5 -7 seater SUV/4WD models, unlimited KMs and off road capabilities. Perfect for camping for individual or family adventure trips.

                            Our SUVs come with enough headroom and legroom in all two seating rows, which allow kids to have more room at the back. Even two rows in use, you will get enough cargo space for your luggages. Our SUVs/4WD are equipped with heaps of modern safety gear including braking system, air-conditioning, Bluetooth, music streaming, alloy wheels, front fog lights plus many more features.
                        </p>
                    </span>
                </div>

                <div class="col-lg-4">

                    <div class="inner">
                        <div class="picture">
                            <img src="assets/img/circle.png" alt="#">
                        </div><!-- /.picture -->
                    </div><!-- /.inner -->

                </div>



                <div class="col-xs-12 col-sd-4 col-md-4">
                    <div class="inner-block white" style="padding: 2px 10px 2px 10px;border: 1px solid #d5d6d2">
                        <div class="product-info">
                            <div class="title">
                                <h2>4WD & SUV RENTAL SPECIALIST <br>Delivered FREE Anywhere in Sydney* </h2>
                            </div>

                            <div class="title">
                                <div class="call"><h2>call <span>&nbsp;<a class="underline" href="tel:0415230462">0415230462</a></span> to book now</h2></div>
                            </div>

                            <div class="description">
                                <ul>
                                    <li>Latest Model 5 or 7 seater SUV and 4wd</li>
                                    <li>Unlimited KMs</li>
                                    <li>Delivered Free anywhere in Sydney*</li>
                                </ul>
                            </div>
                            <hr>
                            <span class="center">
                                <div class="map-icon center">
                                    <p class="text-center text-success"><small>Click here to direct you to us:</small></p>
                                    <a class="underline text-center" href="https://www.google.com.au/maps/place/148+Renwick+St,+Marrickville+NSW+2204/@-33.9213851,151.1514022,15.25z/data=!4m5!3m4!1s0x6b12b08916f268ad:0x19164ce7d33a22d!8m2!3d-33.9203767!4d151.1562117" target="_blank">
                                        <img src="assets/img/map.png" alt="">148 Renwick St, Marrickville NSW 2204
                                    </a>
                                </div>

                            </span>


                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sd-4 col-md-4 hidden-xs">
                    <div class="testimonials-block block">
                        <div class="page-header-inner">
                            <?php
                            $query = $book -> selectTestimonials();
                            foreach ($query as $row)
                            {
                            ?>
                            <div class="testimonial white">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-4">
                                            <div class="picture">
                                                <img src="admin/photos/testimonial/male.png" width="100" alt="#">
                                            </div><!-- /.picture -->
                                            <br>
                                            <div class="author center">
                                                <strong><?php echo $row['name']; ?></strong>
                                            </div><!-- /.author -->
                                        </div><!-- /.col-md-4 -->

                                        <div class="col-sm-9 col-md-8">
                                            <div class="description quote">
                                                <p>
                                                    "<?php echo $row['testimonial']; ?>"
                                                </p>
                                            </div><!-- /.description -->

                                            <div class="star-rating">
                                                <span class="star-rating-control"><div class="rating-cancel" style="display: none;"><a title="Cancel Rating"></a></div><div role="text" aria-label="" class="star-rating rater-0 star icon-normal-star star-rating-applied star-rating-readonly star-rating-on"><a title="on">on</a></div><div role="text" aria-label="" class="star-rating rater-0 star icon-normal-star star-rating-applied star-rating-readonly star-rating-on"><a title="on">on</a></div><div role="text" aria-label="" class="star-rating rater-0 star icon-normal-star star-rating-applied star-rating-readonly star-rating-on"><a title="on">on</a></div><div role="text" aria-label="" class="star-rating rater-0 star icon-normal-star star-rating-applied star-rating-readonly star-rating-on"><a title="on">on</a></div><div role="text" aria-label="" class="star-rating rater-0 star icon-normal-star star-rating-applied star-rating-readonly star-rating-on"><a title="on">on</a></div></span><input name="star0" type="radio" class="star icon-normal-star star-rating-applied star-rating-readonly" checked="checked" disabled="disabled" style="display: none;">
                                                <input name="star0" type="radio" class="star icon-normal-star star-rating-applied star-rating-readonly" checked="checked" disabled="disabled" style="display: none;">
                                                <input name="star0" type="radio" class="star icon-normal-star star-rating-applied star-rating-readonly" checked="checked" disabled="disabled" style="display: none;">

                                            </div><!-- /.star-rating -->


                                        </div><!-- /.col-md-8 -->
                                    </div><!-- /.row -->
                                </div><!-- /.inner -->
                            </div>

                            <?php
                            }
                            ?>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- /#content -->

<?php include('footer.php') ?>

<script>
    validationLength = 10;
    $('#contact_phone').on('keyup change', function () {
        if ($(this).val().length == validationLength) {
            if($.isNumeric($(this).val())){
                document.activeElement.blur();
            }
        }
//            val = $(this).val().substr(0, $(this).val().length - 1);
//            $(this).val(val);
    });
</script>

<!--    <script>-->
<!--        $(document).ready(function(){-->
<!---->
<!--            $('#myModal').modal('show');-->
<!---->
<!---->
<!--            $('#onlinebooking').on('click',function(){-->
<!--                location.href = "online-booking.php";-->
<!--            });-->
<!---->
<!---->
<!---->
<!---->
<!--        });-->
<!--    </script>-->


<script src="assets/js/jquery.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<script src="assets/js/jquery.ui.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/cycle.js"></script>
<script src="libraries/jquery.bxslider/jquery.bxslider.js"></script>
<script src="libraries/easy-tabs/lib/jquery.easytabs.min.js"></script>
<script src="libraries/chosen/chosen.jquery.js"></script>
<script src="libraries/star-rating/jquery.rating.js"></script>
<script src="libraries/colorbox/jquery.colorbox-min.js"></script>
<script src="libraries/jslider/bin/jquery.slider.min.js"></script>
<script src="libraries/ezMark/js/jquery.ezmark.js"></script>

<script type="text/javascript" src="libraries/flot/jquery.flot.js"></script>
<script type="text/javascript" src="libraries/flot/jquery.flot.canvas.js"></script>
<script type="text/javascript" src="libraries/flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="libraries/flot/jquery.flot.time.js"></script>


<script src="http://maps.googleapis.com/maps/api/js?sensor=true&amp;v=3.13"></script>
<script type="text/javascript" src="assets/js/jquery.marquee.js"></script>
<script src="assets/js/carat.js"></script>
<script src="assets/js/geoloc.js"></script>

<script type="text/javascript">

        $(function(){


            $('#marquee-vertical').marquee();
            $('#marquee-horizontal').marquee({direction:'horizontal', delay:3000, timing:10000});

        });

</script>

</body>
</html>