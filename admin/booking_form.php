<?php
//session_start();
//include "db/connections.php";
//$book = new User();
//$doc = null;
//$query = null;

$log_user = $_SESSION['username'];

require('../admin/twilio-php/Services/Twilio.php');
require '../vendor/autoload.php';

use Mailgun\Mailgun;


$notice_id = null;

date_default_timezone_set("Australia/Sydney");

//echo $booking_id = $book -> generateNoticeID();

$time= date("h:i:sa");
$date = date("Y/m/d");
$datetime = $date." ".$time;

$arrerrors=array();
$i = $iDel = $iRet = 0;

if(!isset($_GET['name'])){
    $_GET['name'] =null;
    $_GET['contact']= null;
    $_GET['id'] = null;
}

$get_contact = $_GET['contact'];
$get_name = $_GET['name'];
$get_id = $_GET['id'];

if(isset($_GET['bid'])){
    $get_bid = $_GET['bid'];

    $rchkDel = $book -> chkDeliRec($get_bid);
    if($rchkDel==1){
        $iDel = 1;
    }
    $rchkRet = $book -> chkRetnRec($get_bid);
    if($rchkRet==1){
        $iRet = 1;
    }

    $rSelBook = $book -> viewBookedRecords($get_bid,$iDel,$iRet);

    $contactno = $rSelBook['mobile'];


}else{
    $get_bid = null;
}

$rowComments = $book -> selectViewRequest($get_id);

if(isset($rowComments)){
    $admin_comments = $rowComments['comments'];
}else{
    $admin_comments = null;
}

//$query = $book -> sel_booking_name($get_contact);

$fullname = $email = $idno = $doctype = $dob = $street = $suburb = $pcode = $state = $hiredate = null;
$vtype = $vrego = $vrate = $pickupbase = $dropbase = null;
$ddate = $dtime = $dampm = $dstreet = $dsuburb = $dpcode = $dstate = null;
$rdate = $rtime = $rampm = $rstreet = $rsuburb = $rpcode = $rstate = null;
$inideposit = $bookfare = $totalpay = $paymethod = null;
$post_contact = $post_name = null;


if(($get_contact != null) AND ($get_name != null))
{
    $updateView = $book -> updateViewStatus($get_contact,$get_id);
}

if(isset($_POST['btnComments'])){
    $admin_comments = $_POST['comments'];
    $updateComments = $book -> updateComments($get_contact,$get_id,$admin_comments,'Admin');
    $arrerrors['comments']= 'Your comments has been updated';
}

if(isset($_POST['booksuv'])){

    if($get_bid==null){
        $booking_id = $book -> generateNoticeID();
    }
    //$fullname = $_POST['book_name'];
    $email = $_POST['email'];

//    $idno = $_POST['idnumber'];
//    $doctype = $_POST['doctype'];

    $vrego = $_POST['vrego'];
    $vrate = $_POST['vrate'];

    if($vtype == 'Type')
    {
        $arrerrors['vtype']="Select vehicle type";
    }
    if($vrego =='Rego #')
    {
        $arrerrors['vrego']="Select vehicle rego";
    }
    if($vrate ==null)
    {
        $arrerrors['vrate']="Rate can't be null";
    }elseif($vrate ==0){
        $arrerrors['vrate']="Rate can't be 0";
    }

    if($get_contact == null){
        $post_contact = $_POST['book_number'];
    }else{
        $post_contact = $get_contact;
    }

    if($get_name == null){
        $post_name = $_POST['book_name'];
    }else{
        $post_name = $get_name;
    }

    $ddate = new DateTime($_POST['ddate']);
    $ddate = date_format( $ddate,'Y-m-d');

    $rdate = new DateTime($_POST['rdate']);
    $rdate = date_format( $rdate,'Y-m-d');

    $dtime = $_POST['dtime'];
    $rtime = $_POST['rtime'];

    $dstreet = $_POST['dstreet'];
    $dsuburb = $_POST['dsuburb'];
    $dpcode = $_POST['dpcode'];
    $dstate = $_POST['dstate'];

    $rstreet = $_POST['rstreet'];
    $rsuburb = $_POST['rsuburb'];
    $rpcode = $_POST['rpcode'];
    $rstate = $_POST['rstate'];

    $inideposit = $_POST['iniDeposit'];
    $bookfare = $_POST['bookingFare'];
    $totalpay = $_POST['totalFare'];
    $paymethod = $_POST['paymentType'];

    //$date = new DateTime($_POST['dob']);
    //$dob = date_format( $date,'Y-m-d');

//    $street = $_POST['street'];
//    $suburb = $_POST['suburb'];
//    $pcode = $_POST['pcode'];
//    $state = $_POST['state'];

    //echo $hiredate = $_POST['hiredatetime'];


    //$addAddress = $book -> saveCustomerAddress($get_contact,$street,$suburb,$pcode,$state,$datetime);
    if (!isset($_POST['pickup'])){
        //echo "Check box is checked";
        $pickupbase = 'AWAY';
    }else{
        $pickupbase = 'BASE';
    }

    if (!isset($_POST['drop'])){
        //echo "Check box is checked";
        $dropbase = 'AWAY';
    }else{
        $dropbase = 'BASE';
    }

    if (!preg_match('/^\(?(?:\+?61|0)(?:(?:2\)?[ -]?(?:3[ -]?[38]|[46-9][ -]?[0-9]|5[ -]?[0-35-9])|3\)?(?:4[ -]?[0-57-9]|[57-9][ -]?[0-9]|6[ -]?[1-67])|7\)?[ -]?(?:[2-4][ -]?[0-9]|5[ -]?[2-7]|7[ -]?6)|8\)?[ -]?(?:5[ -]?[1-4]|6[ -]?[0-8]|[7-9][ -]?[0-9]))(?:[ -]?[0-9]){6}|4\)?[ -]?(?:(?:[01][ -]?[0-9]|2[ -]?[0-57-9]|3[ -]?[1-9]|4[ -]?[7-9]|5[ -]?[018])[ -]?[0-9]|3[ -]?0[ -]?[0-5])(?:[ -]?[0-9]){5})$/', $post_contact))
    {
        $phoneErr = "Invalid Phone number";
    }

    //$addBooking = $book -> saveBooking($booking_id,$get_contact,$vtype,$vrego,$vrate,$pickupbase,$dropbase,$datetime);
    if(($post_name== null) or ($post_contact == null))
    {
        $arrerrors['get_booking']="Select a booking Name & Phone number first";

    }else{

        //echo $get_bid;
        if($get_bid != null){

            $editBooking = $book -> editBooking($get_bid,$vrego,$vrate,$pickupbase,$ddate,$dtime,$dropbase,$rdate,$rtime,$log_user);
            $editPayment = $book -> editPayment($get_bid,$paymethod,$inideposit,$bookfare,$totalpay);
            $editCustomer = $book -> editCustomerDetails($contactno,$post_name,$email);

//            $updateStatus = $book -> updateStatus($post_contact,$get_id,$admin_comments,'Admin');
            $arrerrors['success']= 'Booking has edited successfully.';

            if($rSelBook['pickupbase']=='AWAY'){
                if($pickupbase=='AWAY'){
                    $editDeliver = $book -> editDelivery($get_bid,$dstreet,$dsuburb,$dpcode,$dstate);
                    //echo "123";
                }else{
                    $delDeliver = $book -> delDelivery($get_bid);
                }
            }elseif($rSelBook['pickupbase']=='BASE'){
                if($pickupbase=='AWAY'){
                    $addDeliver = $book -> saveDelivery($get_bid,$dstreet,$dsuburb,$dpcode,$dstate);
                }
            }

            if($rSelBook['dropbase']=='AWAY'){
                //echo $rSelBook['dropbase'];
                if($dropbase=='AWAY'){
                    $editReturn = $book -> editReturn($get_bid,$dstreet,$dsuburb,$dpcode,$dstate);

                }else{
                    $delReturn = $book -> delReturn($get_bid);
                }
            }elseif($rSelBook['dropbase']=='BASE'){
                if($dropbase=='AWAY'){
                    $addReturn = $book -> saveReturn($get_bid,$dstreet,$dsuburb,$dpcode,$dstate);
                }
            }

        }else{
            $addBooking = $book -> saveBooking($booking_id,$post_contact,$vrego,$vrate,$pickupbase,$ddate,$dtime,$dropbase,$rdate,$rtime,$log_user);

            $addPayment = $book -> savePayment($booking_id,$paymethod,$inideposit,$bookfare,$totalpay);
            $addCustomer = $book -> saveCustomerDetails($post_name,$post_contact,$email);
            //$addBooking = $book -> saveBooking($booking_id,$get_contact,$vtype,$vrego,$vrate,$pickupbase,$ddate,$dtime,$dampm,$dropbase,$rdate,$rtime,$rampm);
            $updateStatus = $book -> updateStatus($post_contact,$get_id,$admin_comments,'Admin');
            $arrerrors['success']= 'Booking has made successfully.';

            if($pickupbase=='AWAY'){
                $addDeliver = $book -> saveDelivery($booking_id,$dstreet,$dsuburb,$dpcode,$dstate);
            }
            if($dropbase=='AWAY'){
                $addReturn = $book -> saveReturn($booking_id,$rstreet,$rsuburb,$rpcode,$rstate);
            }

            //==========================================================================================
            // SMS Gateway
            //==========================================================================================
            // Step 2: set our AccountSid and AuthToken
            $AccountSid = "ACd61bbdbf0ef9a9f000eaf80f7048be92";
            $AuthToken = "314d9d2649b50324a53e1e4af37d8767";
            //$number = '+61451112478';

            // Step 3: instantiate a new Twilio Rest Client
            $client = new Services_Twilio($AccountSid, $AuthToken);

            // Step 4: make an array of people we know, to send them a message.
            $people = array(
                $post_contact => "SUVRentals"
            );

            // Step 5: Loop over all our friends. $number is a phone number above, and
            // $name is the name next to it
            foreach ($people as $number => $name) {

                $suvMake= $book->getSuvMake($vrego);
                $startDate = date('l',strtotime($ddate)).", ".date('d-m-Y',strtotime($ddate));
                $endDate = date('l',strtotime($rdate)).", ".date('d-m-Y',strtotime($rdate));

                if($pickupbase=='AWAY')
                $deliveryAddress = $dstreet." ".$dsuburb." ".$dstate;
                else
                $deliveryAddress  ="148 Renwick St Marrickville NSW";

                if($dropbase=='AWAY')
                $returnAddress = $rstreet." ".$rsuburb." ".$rstate;
                else
                $returnAddress = "148 Renwick St Marrickville NSW";

                $messageBody = "Hi $post_name, Thanks for choosing SUV Rentals!You Booking has been confirmed:\n\nSuv:$suvMake\nDelivery Location:$deliveryAddress\nDelivery Date:$startDate $dtime\nDrop off Location:$returnAddress\nDrop off Date:$endDate $rtime\n\nIf you have any question, please feel free to contact us on 0415 230 462";
//                $messageBody = "Hi $post_name, thanks for SUV Rentals!You Booking has been confirmed! If you have any question, please feel free to contact us on 0415 230 462";

                try{
                $sms = $client->account->messages->sendMessage(

                // Step 6: Change the 'From' number below to be a valid Twilio number
                // that you've purchased, or the (deprecated) Sandbox number
                    "+61437825267",
                    // the number we are sending to - Any phone number
                    $number,
                    // the sms body
                    $messageBody
                );
                }
                catch(Exception $e){

                    echo $e;
                }


                // Display a confirmation message on the screen
//                echo $messageBody;
            }


            /**
             * Email Gateway
             */
            //Instantiate the Mailgun client.
            $client = new \Http\Adapter\Guzzle6\Client();
            $mailgun = new \Mailgun\Mailgun('key-8cf5f69a23968958aa763fd2d9aecd17', $client);
            $domain = "mg.orbella.com.au";

            //generate address detail for email message body
            if($pickupbase=='AWAY'){
                $deliveryStreet = $dstreet;
                $deliveryUrb =    $dsuburb." ".$dstate;
            }
            else{
                $deliveryStreet = "148 Renwick St";
                $deliveryUrb =    "Marrickville NSW";
            }

            if($dropbase=='AWAY'){
                $returnStreet = $rstreet;
                $returnUrb =    $rsuburb." ".$rstate;
            }
            else{
                $returnStreet = "148 Renwick St";
                $returnUrb =     "Marrickville NSW";
            }

            //generate date detail for email message body
            $startDate = date('l',strtotime($ddate)).", ".date('d-m-Y',strtotime($ddate));
            $endDate = date('l',strtotime($rdate)).", ".date('d-m-Y',strtotime($rdate));

            $dateDuration = abs(strtotime($ddate." ".$dtime) - strtotime($rdate." ".$rtime));
            $rentDays = floor($dateDuration /(60*60*24));

            $carMake = $book->getSuvMake($vrego);
            $carModel = $book->getSuvModel($vrego);

            $send_subject = "Suv Booking Confirmed";
            $send_message =
                "Hi $post_name,

Thank your for choosing Suv Rentals. Your booking has been confirmed.

Start Date: $startDate $dtime
Pick Up: $deliveryStreet, $deliveryUrb

End Date: $endDate $rtime
Drop Off: $returnStreet, $returnUrb

Number of Days: $rentDays
Car Make: $carMake
Car Model: $carModel
Registration Plate: $vrego

This is a system email, please do not reply this email.
If you have any question, please feel free to contact us on 0415 230 462
or send us email through info@suvrentals.com.au";

            //send email to user
            try{
                $emailResult =  $mailgun ->sendMessage($domain, array(
                    'from'    => 'Suv Rentals<info@suvrentals.com.au>',
                    'to'      => $email,
                    'subject' => $send_subject,
                    'text'    => $send_message
                ));


            }
            catch(Exception $e){

                echo $e;

            }


        }
    }
}

?>

<style type="text/css">
    .box{
        display: block;
    }
</style>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<script type="text/javascript">
    $(function () {
        $("input[name='chkPassPort']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
</script>

<script type="text/javascript">

    var TRANSFER_FEE =1.98;


    $(document).ready(function(){
        $('input[name="pickup"]').click(function(){
            $("#pickupLocation").toggle();
        });
        $('input[name="drop"]').click(function(){
            $("#dropLocation").toggle();
        });


        //trigger car calendar when modal is on
        $('#availabilityModal').on('shown.bs.modal', function () {
            $("#calendar").fullCalendar('render');
        });

        //destory car calendar when modal is off
        $('#availabilityModal').on('hidden.bs.modal', function () {
            $("#calendar").fullCalendar('destroy');
        });

        //vehicle availability check button function
        $("#checkButton").on('click',function(){

            var chosenRego = $('#carRego').val();

            //if admin does not choose any rego number
            if(chosenRego == ""){
                alert('Please choose a rego number');
            }
            else{

            //get the data of car availability
            var carDateAvailability = $.parseJSON($('#vehicelAvailability').val());

            var carAvailabilityArray = null;

            //get all the rent date based on rego number
            for(var i = 0 ; i<carDateAvailability.length;i++){

                if(carDateAvailability[i]['vrego'] == chosenRego) {
                    carAvailabilityArray = carDateAvailability[i]['occupiedDate'];
                    console.log("The Rego "+chosenRego+" occupied dates are: ");
                    console.log(carAvailabilityArray);
                }

            }

            //create events for calendar, car delivery time and drop time are events respectively
            var calEvents = [];
            for(var j=0; j<carAvailabilityArray.length;j++){
                calEvents.push({
                    title  : 'Delivery',
                    start  : moment(carAvailabilityArray[j]['delivery'],'YYYY-MM-DD H:mm').format(),
                    allDay : false
                });
                calEvents.push({
                    title  : 'Drop',
                    start  : moment(carAvailabilityArray[j]['drop'],'YYYY-MM-DD H:mm').format(),
                    allDay : false,
                    color  : '#FC6E51'
                });
            }

//             calEvents.push({
//                 start  : '2016-07-01T09:30:00',
//                 end    : '2016-07-11T17:30:00'
//             });


            //initialize calendar
            $('#calendar').fullCalendar({
                header:{
                    left:   'title',
                    center: chosenRego+'',
                    right:  'today prev,next'
                },

                events:calEvents,
                timeFormat: 'H:mm', // uppercase H for 24-hour clock
                displayEventEnd:true,

                dayRender: function (date, cell) {

                    var cellDate = moment(moment(date).format('DD-MM-YYYY'),'DD-MM-YYYY');
                    console.log('Cell Date is :'+cellDate+" "+moment(date).format('DD-MM-YYYY H:mm:ss'));

                    //check all occupied date
                    for(var i=0; i<carAvailabilityArray.length;i++){

                        var deliveryDate = moment(carAvailabilityArray[i]['delivery'],'YYYY-MM-DD');
                        console.log('Delivery Date is'+deliveryDate+" "+carAvailabilityArray[i]['delivery']);

                        var dropDate = moment(carAvailabilityArray[i]['drop'],'YYYY-MM-DD');
//                        console.log("Drop Date is: "+dropDate);

                        if(cellDate >= deliveryDate && cellDate <= dropDate)
                            cell.css("background-color","silver"); //set cell color

                    }

//                    var myDate = moment('11-07-2016','DD-MM-YYYY');

//                    console.log(cellDate);
//                    console.log(myDate);
//                    console.log( myDate.diff(cellDate,'hours') );

                }

            });

            //add car delivery and drop events to calendar
//            $('#calendar').fullCalendar('addEventSource', calEvents);

            $('#myModalLabel').text("Vehicle "+chosenRego+" Availability Calendar");

            //trigger modal
            $("#availabilityModal").modal("show");

            }

        });


        // Please refer a two functions for datepicker changing is in frm-advance-demo.js line number - 306

        //rate selector function
        $('#vrego').on('change',function(){
            // alert($(this).find(':selected').data('rate'));
            var rate = $(this).find(':selected').data('rate');
            $('#vrate').val(rate);

            calculateFare();
        });

        //change booking fare when input new rate
        $('#vrate').on('keypress', _.debounce(function(){
            calculateFare();
        }, 1000));

        //change booking fare when delivery time changes
        $('#dtime').on('change',function(){

            //calcuate booking fare
            calculateFare();
            checkAvailability();

        });

        //change booking fare when return time changes
        $('#rtime').on('change',function(){

            //calcuate booking fare when return time changes
            calculateFare();
            checkAvailability();

            $('#myBtn').prop('disabled',false);
        });

        $('#iniDeposit').on('change',function(){

            var totalFare = 0;
            var bookingFare = 0;

            var iniDeposit =  parseFloat($('#iniDeposit').val()) ;

            if(!$('#bookingFare').val().trim().length == 0 )
                bookingFare =  parseFloat($('#bookingFare').val()) ;

            if($('#paymentType').val() == 'card')
                totalFare = bookingFare+iniDeposit+TRANSFER_FEE;
            else
                totalFare = bookingFare+iniDeposit;

            $('#totalFare').val(totalFare);

        });

        $('#paymentType').on('change',function(){

            var totalFare = 0;
            var bookingFare = 0;

            var iniDeposit =  parseFloat($('#iniDeposit').val()) ;

            if(!$('#bookingFare').val().trim().length == 0 )
                bookingFare =  parseFloat($('#bookingFare').val()) ;

            if($('#paymentType').val() == 'card')
                totalFare = bookingFare+iniDeposit+TRANSFER_FEE;
            else
                totalFare = bookingFare+iniDeposit;

            $('#totalFare').val(totalFare);

        });




    });

    //fare calculator
    function calculateFare(){

        var rate;

        //if rego rate is null
        if(!$('#vrate').val()){

//            alert('Please set rate value');
            return;
        }
        else
            rate = parseFloat($('#vrate').val()) ;

        var deliveryDate = $('#ddate').val();
        var deliveryTime = $('#dtime').val();
        var deliveryDateString = deliveryDate+" "+deliveryTime;
        var delivery = new Date(deliveryDateString);

        var returnDate = $('#rdate').val();
        var returnTime = $('#rtime').val();
        var returnDateString = returnDate+" "+returnTime;
        var returnD = new Date(returnDateString);

        var diff = returnD - delivery;

        if(diff<=0){

            //if booking fare is empty
            if(!$('#bookingFare').val())
                return;
            else{
                alert('Please make sure return date is affter pick date!');
                return;
            }

        }
        else{

            var hours = diff/1000/60/60;

            console.log(delivery);
            console.log(returnD);
            console.log('rate hours: '+hours);
            console.log('price rate: '+rate);

            var bookingFare = fareCalculate(hours,rate);

            $('#bookingFare').val(bookingFare);

            console.log('booking fare: '+bookingFare);

            var totalFare = 0;
            var deposit =  parseFloat($('#iniDeposit').val());

            if($('#paymentType').val() == 'card')
                totalFare = bookingFare+deposit +1.98;
            else
                totalFare = bookingFare+deposit ;

            console.log('total fare: '+totalFare);
            $('#totalFare').val(totalFare);

        }

    }

    //fare calculator
    function fareCalculate(hours,rate){

        var fare =0;

        var  base = Math.floor(hours/24);

        var reminder = hours % 24;

        if(base < 1){

            fare = 1*rate;
            return fare;
        }
        else{
            //less than half hour
            if( reminder<=0.5 )
                fare = base * rate;
            else
            //less than 4 hours
            if(reminder<=4)
                fare = (base+0.5) * rate;
            //calculate as one more day
            else {
                fare = (base+1) * rate;
            }


            return fare;
        }

    }

    //check the availability of each car
    function checkAvailability(){

        var carDateAvailability = $.parseJSON($('#vehicelAvailability').val());
        //get prefered delivery date
        var pdelivery = $('#ddate').val()+" "+$('#dtime').val();
        //get prefered drop date
        var pdrop = $('#rdate').val()+" "+$('#rtime').val();

        //clear current vrego selector
         $('#vrego').find('option').remove().end()
                    .append($('<option>', {
                        'selected': true,
                        'hidden':true,
                        'text': 'Rego #'
                    }));

        console.log('Prefered Deliver Date is: '+$('#ddate').val()+" "+$('#dtime').val());
        console.log('Prefered Drop Date is: '+$('#rdate').val()+" "+$('#rtime').val());

        for(var i = 0;i<carDateAvailability.length;i++){

            var vrego = carDateAvailability[i]['vrego'];
            var vrate = carDateAvailability[i]['vrate'];

            console.log('vrego is: '+vrego);
            console.log('rate is: '+vrate);

            //if current car is not booked by anyone
            if(carDateAvailability[i]['occupiedDate'].length == 0){
                $('#vrego').append($('<option>', {
                    'value': vrego,
                    'data-rate': vrate,
                    'text': vrego
                }))
            }
            //if current is booked by someone, check date range overlap
            else{

                var overlapResult = false;
                //check date range overlap
                for(var k = 0; k<carDateAvailability[i]['occupiedDate'].length;k++){

                    var booked_delivery_date = carDateAvailability[i]['occupiedDate'][k]['delivery'];
                    var booked_drop_date = carDateAvailability[i]['occupiedDate'][k]['drop'];

                    console.log('booked_delivery_date: '+booked_delivery_date);
                    console.log('booked_drop_date: '+booked_drop_date );

                    //check overlap
                     overlapResult = checkOverlap(pdelivery,pdrop,booked_delivery_date,booked_drop_date)
                    console.log("Overlap check result is: "+overlapResult);

                    //if car is not available for one date range. stop checking
                    if( overlapResult ){
                        break;
                    }

                }

                //if no any overlap,  append car to selector
                if(!overlapResult)
                $('#vrego').append($('<option>', {
                    'value': vrego,
                    'data-rate': vrate,
                    'text': vrego
                }))

            }

        }



    }

    //check whether two dates have overlap
    function checkOverlap(pdelivery,pdrop,odelivery,odrop){

        var prefered_delivery = moment(pdelivery,'MM/DD/YYYY h:mm').format('YYYY-MM-DD h:mm');
        var prefered_drop = moment(pdrop,'MM/DD/YYYY h:mm').format('YYYY-MM-DD h:mm');

        var occupied_delivery = moment(odelivery,'YYYY-MM-DD h:mm').format('YYYY-MM-DD h:mm');
        var occupied_drop = moment(odrop,'YYYY-MM-DD h:mm').format('YYYY-MM-DD h:mm');

        if(prefered_delivery <= occupied_drop && prefered_drop >= occupied_delivery )
            return true;  //date is overlap
        else
            return false; //date is not overlap

    }


</script>

<!-- Testing Output Part-->
<?php

//echo $results =  $book->getVehicels();

?>


<input type="hidden" id="vehicelAvailability" value='<?php echo $results =  $book->getVehicels();?>'>

<div class="panel" data-fill-color="true" xmlns="http://www.w3.org/1999/html">
<div class="panel-heading">
    <h3 class="panel-title mt-2x"><i class="fa fa-filter fa-fw"></i>BOOKING DETAILS <?php if(isset($arrerrors['success']) && count($arrerrors['success']) !=0){
            ?><p class="alert alert-success mt-2x"><?php echo 'Booking ID :'; if(isset($get_bid)){ echo $get_bid; }else{ echo $booking_id; } echo '&nbsp; - &nbsp;'; echo $arrerrors['success']; ?></p><?php } ?></h3><hr class="mb-1x">
</div>

<div class="panel-body">
<?php
if(isset($arrerrors['get_booking']) && count($arrerrors['get_booking']) !=0){?>
    <div class="row">
        <div class="col-md-12 mb-2x">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><strong>Warning!</strong> Better check yourself, <?Php echo $arrerrors['get_booking']; ?></p>
            </div>
        </div>
    </div>
<?php
}elseif(isset($arrerrors['comments']) && count($arrerrors['comments']) !=0){?>
    <div class="row">
        <div class="col-md-12 mb-2x">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p><strong>SUCCESS!</strong> Hey !!!,&nbsp; <?Php echo $arrerrors['comments']; ?></p>
            </div>
        </div>
    </div>
<?php
}
?>

<form  role="form" id="basic-validate" name="form" action="" method="post">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="mask-date">Booking Name </label>
            <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="icon-user"></i></span>
                <input name="book_name" id="basicText" class="form-control" placeholder="Booking Name" <?php if(isset($get_bid)){?> value="<?php echo $rSelBook['name']; ?>" <?php }else{ ?> value="<?php echo $get_name; ?>"<?php } ?> >
            </div><!-- /input-group-in -->
            <!--                        <div id="basicText-error" class="text-danger">This field is required.</div>-->
        </div><!--/form-group-->
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="mask-date">Contact # (ex:0451112478) </label>
            <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <input name="book_number" id="typeahead-local" class="form-control" maxlength="10" placeholder="Phone # without space" <?php if(isset($rSelBook['name'])){?> value="<?php echo $rSelBook['mobile']; ?>" <?php }else{ ?> value="<?php echo $get_contact; ?>"<?php } ?> >
            </div><!-- /input-group-in -->
        </div><!--/form-group-->
    </div>
    <?php if(isset($_GET['id'])){ if($rowComments['geoAddress']!= null){ ?>
    <div class="col-md-12">
        <div class="form-group infobar">
            <label class="control-label" for="mask-date">Approximate Location</label>
            <p class="text-blue"><i class="fa fa-globe">&nbsp;</i> <?php echo $rowComments['geoAddress']; ?></p>
        </div><!--/form-group-->
    </div>
    <?php }} ?>
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="mask-date">Valid Email ID</label>
            <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input name="email" id="typeahead-local" class="form-control" placeholder="Email ID" <?php if(isset($rSelBook['name'])){?> value="<?php echo $rSelBook['email']; ?>" <?php } ?> >
            </div><!-- /input-group-in -->
        </div><!--/form-group-->
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Comment Here</label>
            <textarea name="comments" rows="2" class="form-control" id="inputTextarea" ><?php echo $admin_comments; ?></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-bordered" name="btnComments">Update your entered comments</button>
        </div>
        <hr class="mt-2x mb-2x">
    </div>

</div>
<!--<div class="form-group">
    <label class="control-label" for="mask-date">Date / Time of contact </label>
    <div class="input-group input-group-in">
        <span class="input-group-addon"><i class="icon-clock"></i></span>
        <input id="typeahead-local" class="form-control" placeholder="Look a team...">
    </div><!-- /input-group-in -->
<!--</div> --><!--/form-group-->

<!-- Check Car Availability-->
<p class="title mt-2x">Check Vehicle Availability </p><hr class="mt-1x">

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-6">
            <select name="carRego" id="carRego" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Rego#">
                <option hidden="" selected="" value="">Vehicle Rego #</option>
<!--                 <option  value="CH05NF">CH05NF </option>-->
<!--                 <option  value="BT46CQ">BT46CQ </option>-->
<!--                 <option  value="CYS64U">CYS64U </option>-->
<!--                 <option  value="WSC95E">WSC95E </option>-->
                <?php

                $cars = $book->selectVehicle();

                foreach($cars as $car)
                 echo "<option  value='$car[0]'>$car[0]</option>";

                ?>
            </select>
            </div>
            <div class="col-md-4">
            <button class="btn btn-info btn-block" type="button" id="checkButton">Check</button>
            </div>
        </div>

    </div>

</div>


<p class="title mt-2x">Hire Details </p><hr class="mt-1x">

<div class="panel mt-2x">
<ul class="nav nav-tabs" data-context="blue" id="demo1-tabs" style="background-color:#F5F7FA">
    <li class="active"><a href="#botabs1" data-toggle="tab">Hiring Details (Delivery)</a></li>
    <li><a href="#botabs2" data-toggle="tab">Return Details (Drop Back)</a></li>
</ul>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="botabs1">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Delivery Date</label>
                <div class="input-group input-group-in">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name="ddate"  id="ddate" data-input="daterangepicker" data-btn-apply="btn-primary" data-single-date-picker="true" data-show-dropdowns="true" class="form-control"  <?php if(isset($rSelBook['name'])) { ?> value="<?php echo $rSelBook['delivery_date'] ?>" <?php }else{ ?> value="<?php echo date('m-d-Y'); ?>" <?php } ?> >
                </div><!-- /input-group-in -->
            </div><!--/form-group-->
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Time</label>
                <select name="dtime" id="dtime" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Time">

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="midnight"){?> value="00:00" selected="selected"  <?php }
                    } else {?> value="00:00" <?php } ?> >midnight</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="00:30"){?> value="00:30" selected="selected"  <?php }
                    } else {?> value="00:30" <?php } ?> >00:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="01:00"){?> value="01:00" selected="selected"  <?php }
                    } else {?> value="01:00" <?php } ?> >01:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="01:30"){?> value="01:30" selected="selected"  <?php }
                    } else {?> value="01:30" <?php } ?> >01:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="02:00"){?> value="02:00" selected="selected"  <?php }
                    } else {?> value="02:00" <?php } ?> >02:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="02:30"){?> value="02:30" selected="selected"  <?php }
                    } else {?> value="02:30" <?php } ?> >02:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="03:00"){?> value="03:00" selected="selected"  <?php }
                    } else {?> value="03:00" <?php } ?> >03:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="03:30"){?> value="03:30" selected="selected"  <?php }
                    } else {?> value="03:30" <?php } ?> >03:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="04:00"){?> value="04:00" selected="selected"  <?php }
                    } else {?> value="04:00" <?php } ?> >04:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="04:30"){?> value="04:30" selected="selected"  <?php }
                    } else {?> value="04:30" <?php } ?> >04:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="05:00"){?> value="05:00" selected="selected"  <?php }
                    } else {?> value="05:00" <?php } ?> >05:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="05:30"){?> value="05:30" selected="selected"  <?php }
                    } else {?> value="05:30" <?php } ?> >05:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="06:00"){?> value="06:00" selected="selected"  <?php }
                    } else {?> value="06:00" <?php } ?> >06:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="06:30"){?> value="06:30" selected="selected"  <?php }
                    } else {?> value="06:30" <?php } ?> >06:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="07:00"){?> value="07:00" selected="selected"  <?php }
                    } else {?> value="07:00" <?php } ?> >07:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="07:30"){?> value="07:30" selected="selected"  <?php }
                    } else {?> value="07:30" <?php } ?> >07:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="08:00"){?> value="08:00" selected="selected"  <?php }
                    } else {?> value="08:00" <?php } ?> >08:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="08:30"){?> value="08:30" selected="selected"  <?php }
                    } else {?> value="08:30" <?php } ?> >08:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="09:00"){?> value="09:00" selected="selected"  <?php }
                    } else {?> value="09:00" <?php } ?> >09:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="09:30"){?> value="09:30" selected="selected"  <?php }
                    } else {?> value="09:30" <?php } ?> >09:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="10:00"){?> value="10:00" selected="selected"  <?php }
                    } else {?> value="10:00" <?php } ?> >10:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="10:30"){?> value="10:30" selected="selected"  <?php }
                    } else {?> value="10:30" <?php } ?> >10:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="11:00"){?> value="11:00" selected="selected"  <?php }
                    } else {?> value="11:00" <?php } ?> >11:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="11:30"){?> value="11:30" selected="selected"  <?php }
                    } else {?> value="11:30" <?php } ?> >11:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="12:00"){?> value="12:00" selected="selected"  <?php }
                    } else {?> value="12:00" <?php } ?> >12:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="12:30"){?> value="12:30" selected="selected"  <?php }
                    } else {?> value="12:30" <?php } ?> >12:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="13:00"){?> value="13:00" selected="selected"  <?php }
                    } else {?> value="13:00" <?php } ?> >01:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="13:30"){?> value="13:30" selected="selected"  <?php }
                    } else {?> value="13:30" <?php } ?> >01:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="14:00"){?> value="14:00" selected="selected"  <?php }
                    } else {?> value="14:00" <?php } ?> >02:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="14:30"){?> value="14:30" selected="selected"  <?php }
                    } else {?> value="14:30" <?php } ?> >02:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="15:00"){?> value="15:00" selected="selected"  <?php }
                    } else {?> value="15:00" <?php } ?> >03:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="15:30"){?> value="15:30" selected="selected"  <?php }
                    } else {?> value="15:30" <?php } ?> >03:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="16:00"){?> value="16:00" selected="selected"  <?php }
                    } else {?> value="16:00" <?php } ?> >04:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="16:30"){?> value="16:30" selected="selected"  <?php }
                    } else {?> value="16:30" <?php } ?> >04:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="17:00"){?> value="17:00" selected="selected"  <?php }
                    } else {?> value="17:00" <?php } ?> >05:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="17:30"){?> value="17:30" selected="selected"  <?php }
                    } else {?> value="17:30" <?php } ?> >05:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="18:00"){?> value="18:00" selected="selected"  <?php }
                    } else {?> value="18:00" <?php } ?> >06:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="18:30"){?> value="18:30" selected="selected"  <?php }
                    } else {?> value="18:30" <?php } ?> >06:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="19:00"){?> value="19:00" selected="selected"  <?php }
                    } else {?> value="19:00" <?php } ?> >07:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="19:30"){?> value="19:30" selected="selected"  <?php }
                    } else {?> value="19:30" <?php } ?> >07:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="20:00"){?> value="20:00" selected="selected"  <?php }
                    } else {?> value="20:00" <?php } ?> >08:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="20:30"){?> value="20:30" selected="selected"  <?php }
                    } else {?> value="20:30" <?php } ?> >08:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="21:00"){?> value="21:00" selected="selected"  <?php }
                    } else {?> value="21:00" <?php } ?> >09:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="21:30"){?> value="21:30" selected="selected"  <?php }
                    } else {?> value="21:30" <?php } ?> >09:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="22:00"){?> value="22:00" selected="selected"  <?php }
                    } else {?> value="22:00" <?php } ?> >10:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="22:30"){?> value="22:30" selected="selected"  <?php }
                    } else {?> value="22:30" <?php } ?> >10:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="23:00"){?> value="23:00" selected="selected"  <?php }
                    } else {?> value="23:00" <?php } ?> >11:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['delivery_time']=="23:30"){?> value="23:30" selected="selected"  <?php }
                    } else {?> value="23:30" <?php } ?> >11:30 PM</option>

                </select>
            </div><!--/form-group-->
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 mt-2x">
            <div class="form-group">
                <label>
                <?php if(isset($rSelBook)){
                    if($rSelBook['pickupbase']=='BASE'){
                        ?>
                            <input name="pickup" type="checkbox" name="colorCheckbox"
                               value="pickup" checked="checked">&nbsp;Vehicle pickup from SUV Rentals BASE<br>
                        <?php
                        }elseif($rSelBook['pickupbase']=='AWAY'){
                            ?>
                            <input name="pickup" type="checkbox" name="colorCheckbox"
                                   value="pickup" >&nbsp;Vehicle pickup from SUV Rentals BASE<br>
                        <?php
                        }
                    }else{
                    ?>
                    <input name="pickup" type="checkbox" name="colorCheckbox"
                           value="pickup" checked="checked">&nbsp;Vehicle pickup from SUV Rentals BASE<br>
                    <?php
                } ?>
                </label>
            </div>
        </div>

        <div id="pickupLocation" class="col-md-12 box pickup mt-2x"
            <?php if(isset($rSelBook))
                    {
                        if($rSelBook['pickupbase']=='BASE')
                            {
                                ?>
                                    style="display:none;"
                                <?php
                            }
                    }
                    else
                    {
                        ?>
                            style="display:none;"
                        <?php
                    }
            ?> >
            <div class="form-group">
                <div class="form-group">
                    <div class="input-group input-group-in">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <input name="dstreet" class="form-control" placeholder="Street No. and Name"  <?php if(isset($rSelBook['delivery_street'])){?> value="<?php echo $rSelBook['delivery_street']; ?>" <?php } ?>>
                    </div><!-- /input-group-in -->
                </div><!--/form-group-->

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group input-group-in">
                                    <span class="input-group-addon" id="typeahead-nosuggest-helper" data-toggle="tooltip" data-trigger="focus" data-container="body" data-context="danger" title="unable to find any Suburb that match the current query!"><i class="icon-flag"></i></span>
                                    <input name="dsuburb" id="typeahead-prefetches" class="form-control" placeholder="Suburb" <?php if(isset($rSelBook['delivery_suburb'])){?> value="<?php echo $rSelBook['delivery_suburb']; ?>" <?php } ?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-in">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input name="dpcode" id="typeahead-local" class="form-control" placeholder="Post Code" <?php if(isset($rSelBook['delivery_pcode'])){?> value="<?php echo $rSelBook['delivery_pcode']; ?>" <?php } ?>>
                                </div><!-- /input-group-in -->
                            </div><!--/form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="dstate" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Select State">
                                    <option hidden selected="" value="">State</option>

                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="NSW"){?> value="NSW" selected="selected"  <?php }}}else{ ?> value="NSW" <?php } ?> >NSW</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="Queensland"){?> value="Queensland" selected="selected"  <?php }}}else{ ?> value="Queensland" <?php } ?> >Queensland</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="SA"){?> value="SA" selected="selected"  <?php }}}else{ ?> value="SA" <?php } ?> >SA</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="Tasmania"){?> value="Tasmania" selected="Tasmania"  <?php }}}else{ ?> value="Tasmania" <?php } ?> >Tasmania</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="Victoria"){?> value="Victoria" selected="selected"  <?php }}}else{ ?> value="Victoria" <?php } ?> >Victoria</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="WA"){?> value="WA" selected="selected"  <?php }}}else{ ?> value="WA" <?php } ?> >WA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div><!--/form-group-->
            </div>
        </div>
    </div>


</div>

<div class="tab-pane fade" id="botabs2">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Return Date</label>
                <div class="input-group input-group-in">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name="rdate" id="rdate" data-input="daterangepicker" data-btn-apply="btn-primary" data-single-date-picker="true" data-show-dropdowns="true" class="form-control" <?php if(isset($rSelBook['name'])) { ?> value="<?php echo $rSelBook['drop_date'] ?>" <?php }else{ ?> value="<?php echo date('m-d-Y'); ?>" <?php } ?> >
                </div><!-- /input-group-in -->
            </div><!--/form-group-->
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Time</label>
                <select name="rtime" id="rtime"  class="form-control" data-down-arrow-icon="fa fa-angle-down"  data-default-text="Time">

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="midnight"){?> value="00:00" selected="selected"  <?php }
                    } else {?> value="00:00" <?php } ?> >midnight</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="00:30"){?> value="00:30" selected="selected"  <?php }
                    } else {?> value="00:30" <?php } ?> >00:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="01:00"){?> value="01:00" selected="selected"  <?php }
                    } else {?> value="01:00" <?php } ?> >01:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="01:30"){?> value="01:30" selected="selected"  <?php }
                    } else {?> value="01:30" <?php } ?> >01:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="02:00"){?> value="02:00" selected="selected"  <?php }
                    } else {?> value="02:00" <?php } ?> >02:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="02:30"){?> value="02:30" selected="selected"  <?php }
                    } else {?> value="02:30" <?php } ?> >02:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="03:00"){?> value="03:00" selected="selected"  <?php }
                    } else {?> value="03:00" <?php } ?> >03:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="03:30"){?> value="03:30" selected="selected"  <?php }
                    } else {?> value="03:30" <?php } ?> >03:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="04:00"){?> value="04:00" selected="selected"  <?php }
                    } else {?> value="04:00" <?php } ?> >04:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="04:30"){?> value="04:30" selected="selected"  <?php }
                    } else {?> value="04:30" <?php } ?> >04:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="05:00"){?> value="05:00" selected="selected"  <?php }
                    } else {?> value="05:00" <?php } ?> >05:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="05:30"){?> value="05:30" selected="selected"  <?php }
                    } else {?> value="05:30" <?php } ?> >05:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="06:00"){?> value="06:00" selected="selected"  <?php }
                    } else {?> value="06:00" <?php } ?> >06:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="06:30"){?> value="06:30" selected="selected"  <?php }
                    } else {?> value="06:30" <?php } ?> >06:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="07:00"){?> value="07:00" selected="selected"  <?php }
                    } else {?> value="07:00" <?php } ?> >07:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="07:30"){?> value="07:30" selected="selected"  <?php }
                    } else {?> value="07:30" <?php } ?> >07:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="08:00"){?> value="08:00" selected="selected"  <?php }

                    } else {?> value="08:00" <?php } ?> >08:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="08:30"){?> value="08:30" selected="selected"  <?php }
                    } else {?> value="08:30" <?php } ?> >08:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="09:00"){?> value="09:00" selected="selected"  <?php }
                    } else {?> value="09:00" <?php } ?> >09:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="09:30"){?> value="09:30" selected="selected"  <?php }
                    } else {?> value="09:30" <?php } ?> >09:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="10:00"){?> value="10:00" selected="selected"  <?php }
                    } else {?> value="10:00" <?php } ?> >10:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="10:30"){?> value="10:30" selected="selected"  <?php }
                    } else {?> value="10:30" <?php } ?> >10:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="11:00"){?> value="11:00" selected="selected"  <?php }
                    } else {?> value="11:00" <?php } ?> >11:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="11:30"){?> value="11:30" selected="selected"  <?php }
                    } else {?> value="11:30" <?php } ?> >11:30 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="12:00"){?> value="12:00" selected="selected"  <?php }
                    } else {?> value="12:00" <?php } ?> >12:00 AM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="12:30"){?> value="12:30" selected="selected"  <?php }
                    } else {?> value="12:30" <?php } ?> >12:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="13:00"){?> value="13:00" selected="selected"  <?php }
                    } else {?> value="13:00" <?php } ?> >01:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="13:30"){?> value="13:30" selected="selected"  <?php }
                    } else {?> value="13:30" <?php } ?> >01:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="14:00"){?> value="14:00" selected="selected"  <?php }
                    } else {?> value="14:00" <?php } ?> >02:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="14:30"){?> value="14:30" selected="selected"  <?php }
                    } else {?> value="14:30" <?php } ?> >02:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="15:00"){?> value="15:00" selected="selected"  <?php }
                    } else {?> value="15:00" <?php } ?> >03:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="15:30"){?> value="15:30" selected="selected"  <?php }
                    } else {?> value="15:30" <?php } ?> >04:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="16:00"){?> value="16:00" selected="selected"  <?php }
                    } else {?> value="16:00" <?php } ?> >04:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="16:30"){?> value="16:30" selected="selected"  <?php }
                    } else {?> value="16:30" <?php } ?> >04:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="17:00"){?> value="17:00" selected="selected"  <?php }
                    } else {?> value="17:00" <?php } ?> >05:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="17:30"){?> value="17:30" selected="selected"  <?php }
                    } else {?> value="17:30" <?php } ?> >05:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="18:00"){?> value="18:00" selected="selected"  <?php }
                    } else {?> value="18:00" <?php } ?> >06:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="18:30"){?> value="18:30" selected="selected"  <?php }
                    } else {?> value="18:30" <?php } ?> >06:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="19:00"){?> value="19:00" selected="selected"  <?php }
                    } else {?> value="19:00" <?php } ?> >07:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="19:30"){?> value="19:30" selected="selected"  <?php }
                    } else {?> value="19:30" <?php } ?> >07:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="20:00"){?> value="20:00" selected="selected"  <?php }
                    } else {?> value="20:00" <?php } ?> >08:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="20:30"){?> value="20:30" selected="selected"  <?php }
                    } else {?> value="20:30" <?php } ?> >08:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="21:00"){?> value="21:00" selected="selected"  <?php }
                    } else {?> value="21:00" <?php } ?> >09:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="21:30"){?> value="21:30" selected="selected"  <?php }
                    } else {?> value="21:30" <?php } ?> >09:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="22:00"){?> value="22:00" selected="selected"  <?php }
                    } else {?> value="22:00" <?php } ?> >10:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="22:30"){?> value="22:30" selected="selected"  <?php }
                    } else {?> value="22:30" <?php } ?> >10:30 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="23:00"){?> value="23:00" selected="selected"  <?php }
                    } else {?> value="23:00" <?php } ?> >11:00 PM</option>

                    <option <?php if(isset($rSelBook)){
                        if($rSelBook['drop_time']=="23:30"){?> value="23:30" selected="selected"  <?php }
                    } else {?> value="23:30" <?php } ?> >11:30 PM</option>

                </select>
            </div><!--/form-group-->
        </div>

    </div>

    <div class="row mt-2x">
        <div class="col-md-12">
            <div class="form-group">
                <label>
                    <?php if(isset($rSelBook)){
                        if($rSelBook['dropbase']=='BASE'){
                            ?>
                            <input name="drop" type="checkbox" name="colorCheckbox"
                                   value="red" checked="checked">&nbsp;Vehicle drop at SUV Rentals BASE<br>
                        <?php
                        }elseif($rSelBook['dropbase']=='AWAY'){
                            ?>
                            <input name="drop" type="checkbox" name="colorCheckbox"
                                   value="red" >&nbsp;Vehicle drop at SUV Rentals BASE<br>
                        <?php
                        }
                    }else{
                        ?>
                        <input name="drop" type="checkbox" name="colorCheckbox"
                               value="red" checked="checked">&nbsp;Vehicle drop at SUV Rentals BASE<br>
                    <?php
                    } ?>
                </label>

<!--                <label>-->
<!--                    <input name="drop" type="checkbox" name="colorCheckbox"-->
<!--                           value="red" checked="checked">&nbsp;Vehicle drop at SUV Rentals BASE<br>-->
<!--                </label>-->
            </div>
        </div>

        <div id="dropLocation" class="col-md-12 box drop mt-3x" <?php if(isset($rSelBook))
        {
            if($rSelBook['dropbase']=='BASE')
            {
                ?>
                style="display:none;"
            <?php
            }
        }
        else
        {
            ?>
            style="display:none;"
        <?php
        }
        ?> >
            <div class="form-group">
                <div class="form-group">
                    <div class="input-group input-group-in">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <input name="rstreet" class="form-control" placeholder="Street No. and Name"  <?php if(isset($rSelBook['return_street'])){?> value="<?php echo $rSelBook['return_street']; ?>" <?php } ?>>
                    </div><!-- /input-group-in -->
                </div><!--/form-group-->

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group input-group-in">
                                    <span class="input-group-addon" id="typeahead-nosuggest-helper" data-toggle="tooltip" data-trigger="focus" data-container="body" data-context="danger" title="unable to find any Suburb that match the current query!"><i class="icon-flag"></i></span>
                                    <input name="rsuburb" id="typeahead-prefetches2" class="form-control" placeholder="Suburb"  <?php if(isset($rSelBook['return_suburb'])){?> value="<?php echo $rSelBook['return_suburb']; ?>" <?php } ?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group input-group-in">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input name="rpcode" id="typeahead-local" class="form-control" placeholder="Post Code"   <?php if(isset($rSelBook['return_pcode'])){?> value="<?php echo $rSelBook['return_pcode']; ?>" <?php } ?>>
                                </div><!-- /input-group-in -->
                            </div><!--/form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="rstate" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Select State">
                                    <option hidden selected="" value="">State</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="NSW"){?> value="NSW" selected="selected"  <?php }}}else{ ?> value="NSW" <?php } ?> >NSW</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="Queensland"){?> value="Queensland" selected="selected"  <?php }}}else{ ?> value="Queensland" <?php } ?> >Queensland</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="SA"){?> value="SA" selected="selected"  <?php }}}else{ ?> value="SA" <?php } ?> >SA</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="Tasmania"){?> value="Tasmania" selected="Tasmania"  <?php }}}else{ ?> value="Tasmania" <?php } ?> >Tasmania</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="Victoria"){?> value="Victoria" selected="selected"  <?php }}}else{ ?> value="Victoria" <?php } ?> >Victoria</option>
                                    <option <?php if($iDel!=0){ if(isset($rSelBook)){ if($rSelBook['delivery_state']=="WA"){?> value="WA" selected="selected"  <?php }}}else{ ?> value="WA" <?php } ?> >WA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div><!--/form-group-->
            </div>
        </div>
    </div>

</div>

</div><!-- /tab-content -->
</div><!-- /panel-body -->
</div><!-- /.panel -->

<!-- -->
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Vehicle Type</label>
            <select name="vtype" class="form-control" data-down-arrow-icon="fa fa-angle-down">
                <option hidden selected=""> Type</option>
                <?php
                $query = $book -> selectVehicle();
                foreach ($query as $row)
                {
                    ?>
                    <option
                        <?php if(isset($rSelBook['name']))
                        {
                            if($rSelBook['vtype']==$row['vtype'])
                            {
                                ?> value="<?php echo $rSelBook['vtype']; ?> " selected="selected"  <?php
                            }
                        }
                        else
                        {
                            ?> value="<?php echo $row['vtype']; ?> " <?php
                        } ?>> <?php echo $row['vtype'];
                        ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <?php if(isset($arrerrors['vtype']) && count($arrerrors['vtype']) !=0){
                ?>
                <div id="basicText-error" class="text-danger"><?php echo $arrerrors['vtype']; ?></div>
                <?php
            } ?>
        </div>



    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Vehicle</label>
            <select name="vrego" id="vrego" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Rego#">
                <option hidden selected=""> Rego #</option>

<!--              <option data-rate="79" value="CH779D">CH779D </option>-->
<!--              <option data-rate="89" value="CH123Q">CH123Q </option>-->

            </select>
            <?php if(isset($arrerrors['vrego']) && count($arrerrors['vrego']) !=0){
                ?>
                <div id="basicText-error" class="text-danger"><?php echo $arrerrors['vrego']; ?></div>
                <?php
            } ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Rate/Day</label>
            <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input name="vrate" id="vrate" class="form-control"   placeholder="0,000.00" <?php if(isset($rSelBook['name'])){?> value="<?php echo $rSelBook['rate']; ?>" <?php } ?> >
            </div><!-- /input-group-in -->
            <?php if(isset($arrerrors['vrate']) && count($arrerrors['vrate']) !=0){
                ?>
                <div id="basicText-error" class="text-danger"><?php echo $arrerrors['vrate']; ?></div>
                <?php
            } ?>
        </div>
    </div>
</div>


<div class="row">


    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Initial Deposit</label>
            <select name="iniDeposit" id="iniDeposit" class="form-control" data-down-arrow-icon="fa fa-angle-down">

                <option hidden selected="" value="0"> Select</option>
                <option <?php if(isset($rSelBook)){
                    if($rSelBook['deposit']=='500'){?> value="500" selected="selected"  <?php }
                } else {?> value="500" <?php } ?> >500</option>
                <option <?php if(isset($rSelBook)){
                    if($rSelBook['deposit']=='2500'){?> value="2500" selected="selected"  <?php }
                } else { ?> value="2500" <?php } ?> >2500</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Booking Fare</label>
            <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input name="bookingFare" id="bookingFare" class="form-control" placeholder="Total Fare" <?php if(isset($rSelBook['totalfare'])){?> value="<?php echo $rSelBook['totalfare']; ?>" <?php } ?> readonly>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-group">
                <label class="control-label">Payment Method</label>
                <select name="paymentType" id="paymentType" class="form-control" data-down-arrow-icon="fa fa-angle-down">


                    <option hidden selected="">Select</option>

                    <option value="cash" <?php

                    if(isset($rSelBook))
                    if($rSelBook['paymethod']=="cash")
                        echo ' selected="selected" ';

                    ?>>Cash</option>
                    <option value="card" <?php

                    if(isset($rSelBook))
                        if($rSelBook['paymethod']=="card")
                            echo ' selected="selected" ';

                    ?> >Card</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <div class="form-group">
                <label class="control-label">Total Booking Amount</label>
                <div class="input-group input-group-in">
                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                    <input name="totalFare" id="totalFare" class="form-control" placeholder="Total Fare" <?php if(isset($rSelBook['totalpay'])){?> value="<?php echo $rSelBook['totalpay']; ?>" <?php } ?>>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">

        <div class="col-md-12"><hr class="mt-2x">
            <button name="booksuv" id="myBtn" type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o fa-fw"></i> <?php if(isset($rSelBook['name'])) { ?> EDIT YOUR BOOKING NOW <?php } else { ?> BOOK A SUV NOW <?php } ?> </button>
        </div>
    </div>
</div>


</form><!--/form-->
</div><!-- /panel-body -->

<!--Vehicle Availability Modal -->
<div class="modal fade" id="availabilityModal" tabindex="-1" role="dialog" aria-labelledby="availabilityModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Modal title</h3>
            </div>
            <div class="modal-body">
                <div id="calendar"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



</div><!-- /panel-inputmask -->


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
<script src="scripts/typeahead.bundle.js"></script>
<script src="scripts/jquery.tagsinput.js"></script>
<script src="scripts/jquery.mask.js"></script>
<script src="scripts/select2.js"></script>
<script src="scripts/jquery.selectBoxit.js"></script>
<script src="scripts/moment.js"></script>
<script src="scripts/daterangepicker.js"></script>
<script src="scripts/jquery-minicolors.js"></script>
<script src="scripts/underscore.js"></script>

<!-- END COMPONENTS -->

<script>


    var startdate = $("#ddate").val();

    if(startdate  == null)
        startdate = moment();
    else
        startdate = moment(startdate);

    $('#ddate').daterangepicker({

      startDate:moment($("#ddate").val())

    });

    $('#rdate').daterangepicker({
        startDate:moment($("#rdate").val())
    });
</script>

<!-- DUMMY: Use for demo -->
<script src="scripts/demo/frm-advance-demo.js"></script>