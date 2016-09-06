
<div class="content-body">
    <!-- WIZARD
    ================================================== -->
    <div id="rootwizard" class="panel">
        <a href="#" class="pull-right btn btn-icon btn-default" data-toggle="panel-expand" rel="tooltip" title="expand" data-placement="bottom" data-container="body"><i class="arrow_expand fa-lg text-muted"></i></a>
        <ul>
            <li>
                <a href="#wizard1" data-toggle="tab">
                    <span class="number">1</span>
                    <span class="desc">Account Setup</span>
                </a>
            </li>
            <li>
                <a href="#wizard2" data-toggle="tab">
                    <span class="number">2</span>
                    <span class="desc">Profile Setup</span>
                </a>
            </li>
            <li>
                <a href="#wizard3" data-toggle="tab">
                    <span class="number">3</span>
                    <span class="desc">Billing Setup</span>
                </a>
            </li>
            <li>
                <a href="#wizard4" data-toggle="tab">
                    <span class="number">4</span>
                    <span class="desc">Confirmation</span>
                </a>
            </li>
        </ul><!-- /wizard-nav -->

        <div class="panel-body">
            <div class="progress">
                <div class="progress-bar progress-bar-success"></div>
            </div><!-- /.progressbar -->
        </div>

        <div class="panel-body">
            <form action="#" role="form" class="form-horizontal">
                <div class="tab-content">
                    <div class="tab-pane fade in" id="wizard1">
                        <h3 class="lead">Provide your account details</h3>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="username">User name <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <div class="input-group input-group-in">
                                    <input class="form-control" id="username" name="username">
                                    <span class="input-group-addon"><i class="icon-user text-muted"></i></span>
                                </div>
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="passwd">Password <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <div class="input-group input-group-in">
                                    <input class="form-control" id="passwd" name="passwd" type="password">
                                    <span class="input-group-addon"><i class="icon-lock text-muted"></i></span>
                                </div>
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="confirm_passwd">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <div class="input-group input-group-in">
                                    <input class="form-control" id="confirm_passwd" name="confirm_passwd" type="password" equalto="#passwd">
                                    <span class="input-group-addon"><i class="icon-lock text-muted"></i></span>
                                </div>
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Email <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <div class="input-group input-group-in">
                                    <input class="form-control" id="email" name="email" type="email">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o text-muted"></i></span>
                                </div>
                            </div>
                        </div><!-- /form-group -->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane fade" id="wizard2">
                        <h3 class="lead">Provide your profile details</h3>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fullname">Fullname <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" id="fullname" name="fullname">
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="phoneNumber">Phone Number <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" id="phoneNumber" name="phoneNumber" type="tel">
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="gender">Gender <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <div class="nice-radio nice-radio-inline">
                                    <input id="genderMale" name="gender" type="radio" value="Male" checked="checked">
                                    <label for="genderMale">Male</label>
                                </div>
                                <div class="nice-radio nice-radio-inline">
                                    <input id="genderFemale" name="gender" value="Female" type="radio">
                                    <label for="genderFemale">Female</label>
                                </div>
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="address">Address <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" id="address" name="address">
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="country">Country <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="hidden" name="country" id="country" style="width:100%">
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="briefNotes">Brief Notes</label>
                            <div class="col-md-8">
                                <textarea class="autogrow form-control" name="briefNotes" id="briefNotes" rows="3"></textarea>
                            </div>
                        </div><!-- /form-group -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane fade" id="wizard3">
                        <h3 class="lead">Provide your payment details</h3>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cardName">Name on card <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" id="cardName" name="cardName">
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cardNumber">Card Number <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input class="form-control" id="cardNumber" name="cardNumber">
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" id="cvc" name="cvc" placeholder="CVV2">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cardExpired">Card Expired <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" id="cardExpired" name="cardExpired" type="date">
                            </div>
                        </div><!-- /form-group -->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cardExpired">Auto-pay</label>
                            <div class="col-md-8">
                                <div class="nice-checkbox">
                                    <input type="checkbox" name="autoPay" id="autoPay1" value="1">
                                    <label for="autoPay1">Yes, with this Credit Card</label>
                                </div>
                                <div class="nice-checkbox">
                                    <input type="checkbox" name="autoPay" id="autoPay0" value="0">
                                    <label for="autoPay0">Send me an email about Payment</label>
                                </div>
                            </div>
                        </div><!-- /form-group -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane fade" id="wizard4">
                        <h3 class="lead">Make sure you entered the correct data!</h3>
                        <h4 class="page-header lead">Account</h4>
                        <h4 class="page-header lead">Profile</h4>
                        <h4 class="page-header lead">Billing</h4>
                    </div><!-- /.tab-pane -->

                    <div class="wizard-actions">
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="button" class="btn btn-default wizard-prev"><i class="fa fa-arrow-circle-o-left"></i> Back</button>
                                <button type="button" class="btn btn-primary wizard-next">Continue <i class="fa fa-arrow-circle-o-right"></i></button>
                                <button type="submit" class="btn btn-success finish">Submit</button>
                            </div><!-- /.cols -->
                        </div><!-- /form-group -->
                    </div><!-- /.wizard-actions -->

                </div><!-- /.tab-content -->
            </form><!-- /form -->
        </div><!-- /.panel-body -->
    </div><!-- /.panel -->


</div><!-- /.content-body -->


<!-- Template Setups -->
<div class="modal fade" id="templateSetup">
    <div class="modal-dialog">
        <!-- modal-content -->
        <div class="modal-content"></div>
    </div><!-- /.modal-dialog -->
</div><!-- /.templateSetup -->





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
<script src="scripts/select2.js"></script>
<script src="scripts/jquery.bootstrap.wizard.js"></script>
<!-- END COMPONENTS -->

<!-- DUMMY: Use for demo -->
<script src="scripts/demo/frm-wizard-demo.js"></script>


<!-- Google Analytics: change UA-48454066-1 to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-48454066-1');ga('send','pageview');
</script>