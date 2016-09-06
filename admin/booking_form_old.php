<?php
//include "db/connections.php";
//$book = new User();
//$doc = null;
//$query = null;

date_default_timezone_set("Australia/Sydney");
//$notice_id = $notice->generateNoticeID();

$time= date("h:i:sa");
$date = date("Y/m/d");
$datetime = $date." ".$time;

if(!isset($_GET['name'])){
    $_GET['name'] =null;
    $_GET['contact']= null;
}

$get_contact = $_GET['contact'];
$get_name = $_GET['name'];
//$query = $book -> sel_booking_name($get_contact);

$fullname = $idno = $doctype = $dob = $street = $suburb = $pcode = $state = $hiredate = null;


if(isset($_POST['booksuv'])){

    $fullname = $_POST['fullname'];
    $idno = $_POST['idnumber'];
    $doctype = $_POST['doctype'];

    $date = new DateTime($_POST['dob']);
    $dob = date_format( $date,'Y-m-d');

    $street = $_POST['street'];
    $suburb = $_POST['suburb'];
    $pcode = $_POST['pcode'];
    $state = $_POST['state'];

    echo $hiredate = $_POST['hiredatetime'];

    //$addCustomer = $book -> saveCustomerDetails($get_contact,$fullname,$idno,$doctype,$dob,$datetime);
    //$addAddress = $book -> saveCustomerAddress($get_contact,$street,$suburb,$pcode,$state,$datetime);
}

?>

<style type="text/css">
    .box{
        display: block;
    }
</style>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

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
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
                $(".red").toggle();
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $('input[name="hiredatetime"]').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
        });
    });
</script>


<div class="panel" data-fill-color="true" xmlns="http://www.w3.org/1999/html">
    <div class="panel-heading">
        <h3 class="panel-title mt-2x"><i class="fa fa-filter fa-fw"></i>BOOKING DETAILS</h3><hr class="mb-1x">
    </div>

    <div class="panel-body">
        <form role="form" name="form" action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="mask-date">Booking Name </label>
                        <div class="input-group input-group-in">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input name="book_name" id="typeahead-local" class="form-control" value="<?php echo $get_name; ?>">
                        </div><!-- /input-group-in -->
                    </div><!--/form-group-->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="mask-date">Contact Number </label>
                        <div class="input-group input-group-in">
                            <span class="input-group-addon"><i class="glyphicon-phone-alt"></i></span>
                            <input name="book_number" id="typeahead-local" class="form-control" value="<?php echo $get_contact; ?>">
                        </div><!-- /input-group-in -->
                    </div><!--/form-group-->
                </div>
            </div>
            <!--<div class="form-group">
                <label class="control-label" for="mask-date">Date / Time of contact </label>
                <div class="input-group input-group-in">
                    <span class="input-group-addon"><i class="icon-clock"></i></span>
                    <input id="typeahead-local" class="form-control" placeholder="Look a team...">
                </div><!-- /input-group-in -->
            <!--</div> --><!--/form-group-->


            <p class="title mt-2x">Hire Details </p><hr class="mt-1x">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Vehicle Type</label>
                        <select name="dropSuburb" data-input="selectboxit" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Select city">
                            <option value="">Suburb</option>
                            <option value="New South Wales">Guildford</option>
                            <option value="Queensland">Granville</option>
                            <option value="South Australia">Marrick</option>
                            <option value="Tasmania">Sydney</option>
                            <option value="Victoria">Mount Druitt</option>
                            <option value="Western Australia">Blacktown</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Vehicle</label>
                        <select name="dropSuburb" data-input="selectboxit" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Select city">
                            <option value="">Suburb</option>
                            <option value="New South Wales">Guildford</option>
                            <option value="Queensland">Granville</option>
                            <option value="South Australia">Marrick</option>
                            <option value="Tasmania">Sydney</option>
                            <option value="Victoria">Mount Druitt</option>
                            <option value="Western Australia">Blacktown</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Rate/Day</label>
                        <div class="input-group input-group-in">
                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            <input name="totalrate" data-mask="money" id="mask-money" class="form-control" placeholder="0,000.00">
                        </div><!-- /input-group-in -->
                    </div>
                </div>
            </div>

<!--            <div class="form-group">-->
<!--                <div class="col-md-6">-->
<!--                    <label for="chkNo">-->
<!--                        <input type="radio" id="chkNo" name="chkPassPort" checked="true" value="base" />&nbsp; Pick up from BASE</label>-->
<!--                </div>-->
<!--                <div class="col-md-6">-->
<!--                    <label for="chkYes">-->
<!--                        <input type="radio" id="chkYes" name="chkPassPort" value="drop" /> &nbsp; Deliver at customer address</label>-->
<!--                </div>-->
<!--            </div>-->

            <div class="form-group dvPassport" id="dvPassport" style="display: none; padding-bottom: 0px;">
                <div class="row well">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>
                                <input name="chkDrop" type="checkbox" name="colorCheckbox" value="red">&nbsp;Need to drop vehicle at above same address<br>
                            </label>
                        </div>
                    </div>

                    <div id="dvLocation" class="box red">
                        <br>
                        <div class="form-group">
                            <div class="input-group input-group-in">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input name="dropStreet" data-mask="date_time" id="mask-datetime" class="form-control" placeholder="Street No. and Name">
                            </div><!-- /input-group-in -->
                        </div><!--/form-group-->

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <select name="dropSuburb" data-input="selectboxit" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Select city">
                                            <option value="">Suburb</option>
                                            <option value="New South Wales">Guildford</option>
                                            <option value="Queensland">Granville</option>
                                            <option value="South Australia">Marrick</option>
                                            <option value="Tasmania">Sydney</option>
                                            <option value="Victoria">Mount Druitt</option>
                                            <option value="Western Australia">Blacktown</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group input-group-in">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <input name="dropPostcode" id="typeahead-local" class="form-control" placeholder="Post Code">
                                        </div><!-- /input-group-in -->
                                    </div><!--/form-group -->
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="dropState" data-input="selectboxit" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Select city">
                                            <option value="">State</option>
                                            <option value="New South Wales">NSW</option>
                                            <option value="Queensland">Queensland</option>
                                            <option value="South Australia">SA</option>
                                            <option value="Tasmania">Tasmania</option>
                                            <option value="Victoria">Victoria</option>
                                            <option value="Western Australia">WA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!--/form-group-->
                    </div>

                </div>
            </div>

            <br>
            <p class="title">SUV Hire Details</p><hr class="mt-2x">

            <div class="panel">
                <ul class="nav nav-tabs" data-context="blue" id="demo1-tabs" style="background-color:#F5F7FA">
                    <li class="active"><a href="#botabs1" data-toggle="tab">Hiring Details (Delivery)</a></li>
                    <li><a href="#botabs2" data-toggle="tab">Return Details (Drop Back)</a></li>
                </ul>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="botabs1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="mask-date">ID Number</label>
                                    <div class="input-group input-group-in">
                                        <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
                                        <input name="idnumber" id="typeahead-local" class="form-control" placeholder="Licence/Passport Number">
                                    </div><!-- /input-group-in -->
                                </div><!--/form-group-->
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="mask-date">ID Number</label>
                                    <select name="doctype" data-input="selectboxit" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Type">
                                        <option value="Driving Licence">Driving Licence</option>
                                        <option value="Passport">Passport</option>
                                    </select>
                                </div><!--/form-group-->
                            </div>

                        </div>
                        <div class="tab-pane fade" id="botabs2">
                            <p><strong>Tabs #2</strong>, Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        </div>
                    </div><!-- /tab-content -->
                </div><!-- /panel-body -->
            </div><!-- /.panel -->

            <div class="form-group">
                <label class="control-label" for="mask-date">Full Name as in ID Document</label>
                <div class="input-group input-group-in">
                    <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                    <input name="fullname" id="typeahead-local" class="form-control" placeholder="Full Name">
                </div><!-- /input-group-in -->
            </div><!--/form-group-->

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="mask-date">ID Number</label>
                            <div class="input-group input-group-in">
                                <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
                                <input name="idnumber" id="typeahead-local" class="form-control" placeholder="Licence/Passport Number">
                            </div><!-- /input-group-in -->
                        </div><!--/form-group-->
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="mask-date">ID Number</label>
                            <select name="doctype" data-input="selectboxit" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Type">
                                <option value="Driving Licence">Driving Licence</option>
                                <option value="Passport">Passport</option>
                            </select>
                        </div><!--/form-group-->
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="mask-date">Date of Birth</label>
                            <div class="input-group input-group-in">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input name="dob" data-input="daterangepicker" data-btn-apply="btn-primary" data-single-date-picker="true" data-show-dropdowns="true" class="form-control">
                            </div><!-- /input-group-in -->
                        </div><!--/form-group-->
                    </div>
                </div>
            </div><!--/form-group-->

            <div class="form-group">
                <label class="control-label" for="mask-datetime">Address</label>
                <div class="input-group input-group-in">
                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input name="street" class="form-control" placeholder="Street No. and Name">
                </div><!-- /input-group-in -->
            </div><!--/form-group-->

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="suburb" data-input="selectboxit" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Select city">
                                <option value="">Suburb</option>
                                <option value="New South Wales">Guildford</option>
                                <option value="Queensland">Granville</option>
                                <option value="South Australia">Marrick</option>
                                <option value="Tasmania">Sydney</option>
                                <option value="Victoria">Mount Druitt</option>
                                <option value="Western Australia">Blacktown</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="input-group input-group-in">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input name="pcode" id="typeahead-local" class="form-control" placeholder="Post Code">
                            </div><!-- /input-group-in -->
                        </div><!--/form-group -->
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="state" data-input="selectboxit" class="form-control" data-down-arrow-icon="fa fa-angle-down" data-default-text="Select city">
                                <option value="">State</option>
                                <option value="New South Wales">NSW</option>
                                <option value="Queensland">Queensland</option>
                                <option value="South Australia">SA</option>
                                <option value="Tasmania">Tasmania</option>
                                <option value="Victoria">Victoria</option>
                                <option value="Western Australia">WA</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div><!--/form-group-->



            <button name="booksuv" type="submit" class="btn btn-success">BOOK A SUV NOW</button>
        </form><!--/form-->
    </div><!-- /panel-body -->
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

<!-- END COMPONENTS -->


<!-- DUMMY: Use for demo -->
<script src="scripts/demo/frm-advance-demo.js"></script>

