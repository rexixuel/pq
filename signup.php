<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q!</title>


<link href="css/bootstrap.min.css" rel="stylesheet">   
<link href="css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">   
<link href="bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">   
<link href="css/modern-business.css" rel="stylesheet">   
<link href="css/pq.css" rel="stylesheet">   
<script src="imsky-holder-3023cee/holder.js"></script>



    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<?php

include ('/include/elementClass.php');

$element = new ConstantElements();
$element->SetUser('');
print $element->SetHomeActive('active');
print $element->GetHeader();


?>
<!-- Start Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
        <div class="modal-content pq-modal-body">
                <div class="modal-header pq-modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Log In
                </div>
                <div class="modal-body ">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <div class="">									
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        <div class = "form-group">
                            <div class="">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>
                        <div class = "form-group form-inline">
                                <button type="submit" class="btn btn-primary btn-sm" >Sign In</button>
                                <a href="signup.php"> <large> Sign Up Now! </large> </a>
                        </div>
                        <a href="account-recovery-password.php"> <small> Forgot your password? </small></a>
                        <a href="account-recovery-user.php"> <small> Forgot your username? </small></a>
                        </form>
                </div>
        </div>
   </div>
</div>
<!-- End Modal -->



	<div class="container">
                    <!-- Registration Area -->
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Registration
					<small> New User </small>
					<div class="pq-page-instruction">
						<small class="pq-page-instruction"> Enter details below to create a new account.  Click 'Register' to finalize registration. </small>
					</div>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active"> Sign up
                    </li>
                    
                </ol>
            </div>
        </div>
        <!-- /.row -->
					
		<h3 class="dark-grey"></h3>
        <form  class="form-horizontal" id="registerHere" method='post' action=''>
            <fieldset>
                  <div class="col-md-6">
                    
                    <div class="form-group col-lg-12">
                        <label>Username</label>
                        <input type="" name="" class="form-control" id="username" value="" required="required" rel="tooltip"  title="Username must be unique" placeholder="Enter your Username">
                    </div>
                    
                    <div class="form-group">                                                        
	                    <div class="col-lg-6">
	                        <label>Password</label>
	                        <input type="password" name="" class="form-control" id="password" placeholder="********" required="required" data-toggle="tooltip"  title="Password must be at least 8 characters long, containing a number and special character">
	                    </div>
                    
	                    <div class="col-lg-6">
	                        <label>Confirm Password</label>
	                        <input type="password" name="" class="form-control" id="cpassword" placeholder="********" required="required" data-toggle="tooltip"  title="Re-enter password to confirm">
	                    </div>
	                </div>
					<div class="form-group">                                    
	                    <div class="col-lg-6">
	                        <label>Email Address</label>
	                        <input type="email" name="" class="form-control" id="" value="" required="required" data-toggle="tooltip"  title="Enter e-mail address used for verification and account recovery">
	                    </div>
	                    
	                    <div class="col-lg-6">
	                        <label>Confirm Email Address</label>
	                        <input type="email" name="" class="form-control" id="" value="" data-toggle="tooltip"  title="Re-enter e-mail address">
	                    </div>          
                    </div>                    
                    <div class="form-group col-lg-12">
                        <label>First Name</label>
                        <input type="" name="firstName" class="form-control" id="firstName" value="" rel="tooltip"  title="This field is optional and is used for addressing. Default name addressed is username" placeholder = "Enter your first name" data-toggle="tooltip">
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Last Name</label>
                        <input type="" name="lastName" class="form-control" id="lastName" value="" rel="tooltip" data-toggle="tooltip"  title="This field is optional and is used for addressing. Default name addressed is username" placeholder = "Enter your last name" data-toggle="tooltip">
					</div>

					<div class="form-group col-lg-12">
                        <label>Birthday</label>
						<span rel="tooltip" data-toggle="tooltip"  title="This field is used to validate age of user">
							<div class="input-group date" id="birthdayForm">
							  <input type="text" id="birthday" name="birthday" class="form-control"  placeholder = "mm/dd/yyyy"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
							</div>
						</span>
					</div>

                    <div class="form-group col-lg-12">
                        <label>Interests</label>
                        <textarea type="" name="interests" class="form-control" id="interests" value="" rel="tooltip" data-toggle="tooltip"  title="This field is optional and is used for recommending categories." placeholder = "Enter interests, e.g., music, games, food and restaurant, etc." data-toggle="tooltip" row="4"></textarea>
					</div>

                    <div class="form-group col-lg-12">
                        <label>Address</label>
                        <input type="" name="address" class="form-control" id="address" value="" rel="tooltip" data-toggle="tooltip"  title="This field is required and is used to ship sponsored prizes won by premium users." placeholder = "Enter complete address" data-toggle="tooltip" />
					</div>
					<div class="form-group">
	                    <div class="col-lg-6">
	                        <label>Mobile Number</label>
							
									<div class="input-group">									
											<span class="input-group-addon">+63 </span>
											<input type="" name="mobileNumber" class="form-control" id="mobileNumber" value="" rel="tooltip" data-toggle="tooltip"  title="Either Mobile Number or Landline Number must not be empty. This fields are used to contact winner of the sponsored prize of the month" placeholder = "xxx xxxx xxx" data-toggle="tooltip" />
									</div>
							

						</div>

	                    <div class="col-lg-6">
	                        <label>Landline Number</label>
							
									<div class="input-group">									
											<span class="input-group-addon">+63 </span>
											<input type="" name="landlineNumber" class="form-control" id="landlineNumber" value="" rel="tooltip" data-toggle="tooltip"  title="Either Mobile Number or Landline Number must not be empty. This fields are used to contact winner of the sponsored prize of the month" placeholder = "xxx xxxx" data-toggle="tooltip" />
									</div>

							
						</div>
					</div>
                    <div class="form-group col-lg-12">
                        <label>Security Question</label>
                        <input type="secQuestion" name="" class="form-control" id="" value=""
						placeholder = "Enter your Secret Security Question that is used to recover your account." rel="tooltip"
						data-toggle="tooltip" data-placement="top" title="TIP: Security question could be a personal detail only known to you ">
                    </div>          


                    <div class="form-group col-lg-12">
                        <label>Security Answer</label>
                        <input type="secAnswer" name="" class="form-control" id="" value=""
						placeholder = "Enter Security Answer that is used to recover your account"
						rel="tooltip"
						data-toggle="tooltip" data-placement="top" title="This is the answer to your security question. TIP: Security question could be a personal detail only known to you">
                    </div>          
					                
                </div>
            
                <div class="col-md-6">
					<div class="col-lg-12">
						<h3 class="dark-grey">Terms and Conditions</h3>
						<p>
							By clicking on "Register" you agree to The Company's' Terms and Conditions
						</p>
						<p>
							While rare, prices are subject to change based on exchange rate fluctuations - 
							should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)
						</p>
						<p>
							Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
						</p>
						<p>
							Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
						</p>
                    </div>
                    <div class="col-lg-6">
                        <label> Sign up as Premium User </label>
						<span rel="tooltip"
						data-toggle="tooltip" data-placement="top" title="Premium Users can join in the monthly sponsored draw. Find out more benefits in the link to the right.">
						
						<input type="checkbox" data-toggle="switch" data-off-color="danger" data-on-color="success" data-size="mini" data-on-text = "Yes" data-off-text = "No"  name="premiumToggle" class="checkbox"/>
						</span>
                    </div>

                    <div class="col-lg-6">
                        <a href="premium-benefits.php"> <small>Why should I sign up as <strong>Premium User</strong>? </small> </a>
                    </div>              
					
					<!-- start panel -->
					<div class="col-lg-12">
						<div class="premiumOptions panel panel-primary form-group fade in" style="display:none; margin-top: 20px;">
							<div class="panel-heading">
								<h5><i class="fa fa-credit-card"></i> Premium Options</h5>
							</div>
							<div class="panel-body">
								<div class="col-sm-6">
									<label> Payment Schedule</label>
														<div class="radio">
															<label>
																<input type="radio" name="paySchedOptions" id="Monthly" value="monthly">
																Monthly
															</label>
														</div>
														<div class="radio">
															<label>
																<input type="radio" name="paySchedOptions" id="Quarterly" value="quarterly">
																Quarterly
															</label>
														</div>
														<div class="radio">
															<label>
																<input type="radio" name="paySchedOptions" id="Annually" value="annually">
																Annually
															</label>
														</div>
									
									</div>
									<div class="col-sm-6">
										<label> Payment Method</label>
										<div class="radio">
											<label>
												<input type="radio" name="payMethodOptions" id="paypal" value="paypal">
												<i class="fa fa-cc-paypal" > </i> PayPal 
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="payMethodOptions" id="fundTransfer" value="fundTransfer">
												<i class="fa fa-money"></i> Admin Fund Transfer
											</label>
										</div>
									</div>
							</div>
						</div>
					</div>
					<!-- end panel -->
					<div class="col-lg-12">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
                </div>

                    <div class="clearfix"> </div>

            </fieldset>
        </form>
            
        <div class="well">
            <div class="row">
                <div class="col-md-8">
					<div class="nav navbar" style="height:50%;">
						<ul class="nav navbar-nav navbar-left" >
							<li>
								<a href="about.html">About</a>
							</li>
							<li>
								<a href="categories.html">Categories</a>
							</li>
							<li>
								<a href="faq.html">FAQ</a>
							</li>
                            <li>
                                <a id="example" href="#" class="" data-container="body" data-toggle="modal" data-target="#login">
                            Log In</a>
							</li>
						</ul>
					</div>
                </div>
            </div>
        </div>	


        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Team CMC 2015</p>
                </div>
            </div>
        </footer>

    </div>
    </div> 
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="bootstrap-switch-master/dist/js/bootstrap-switch.js"></script>
	<script type="text/javascript">    
		$(function () {
			$("[data-toggle='switch']").bootstrapSwitch();
		});
		
		$("[data-toggle='switch']").on('switchChange.bootstrapSwitch', function (e, state) {
        
           if (state == true){
				$('.premiumOptions').show();
		   }else{
				$('.premiumOptions').hide();
		   }
       
			
		});
	</script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		

		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
		
	</script>
    <script src="js/bootstrap-datepicker.min.js"></script>
	<script>
		$('#birthdayForm.input-group.date').datepicker({
			startDate: "01/01/1980",
			defaultViewDate: { year: 1977, month: 04, day: 25 }
		});
	</script>
</body>

</html>
