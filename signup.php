<?php


	
	include ('/include/pqControl.php');
	$loginModal='';
	$element = new elementControl();
	$userControl = new userControl();

	$userType = '';
	$loginResult = '';
	$user = ''; 
	$userTypeDescription = '';
	// step1: check if invoked via $_SELF
	// step2: if invoked, instantiate userControl class with $_POST values
	// step3: call signup
	// step4: return signup successful <div class='alert-success'> </div>
	// step5: 

	if (session_status() == PHP_SESSION_NONE) {
		session_start();		
	}
	if(!isset($_SESSION['logged'])){		
		$loginModal = $element->GetLoginModal();					
	}else{
		$userControl->InvalidAccess();
	}

	$userControl = new userControl();

	if(isset($_POST)){

		if (isset($_POST["signIn"])){

			$loginResult = $userControl->Login($_POST); 

		}
		else
		if(isset($_POST["register"])){
			$userControl->Register($_POST);
		}
	}

?>

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

	print $loginModal;
	$element->SetUser($userType, $user, $userTypeDescription);

	print $element->SetHomeActive('active');
	print $element->GetHeader();
?>

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
                <?php print $loginResult; ?>
			<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_now_accepting_pp_2line_w.png" border="0" alt="Now Accepting PayPal"></a><div style="text-align:center"><a href="https://www.paypal.com/webapps/mpp/how-paypal-works"><font size="2" face="Arial" color="#0079CD">How PayPal Works</font></a></div></td></tr></table><!-- PayPal Logo -->
            </div>
        </div>
        <!-- /.row -->
					
		<h3 class="dark-grey"></h3>
        <form  class="form-horizontal" id="registerHere" method="POST">
            <fieldset>
                  <div class="col-md-6">
                    
                    <div class="form-group col-lg-12">
                        <label>Username</label>
                        <input type="" name="username" class="form-control" id="username" value="" required="required" rel="tooltip"  title="Username must be unique" placeholder="Enter your Username">
                    </div>
                    
                    <div class="form-group">                                                        
	                    <div class="col-lg-6">
	                        <label>Password</label>
	                        <input type="password" name="password" class="form-control" id="password" placeholder="********" required="required" data-toggle="tooltip"  title="Password must be at least 8 characters long, containing a number and special character"
	                        		onchange = "validatePassword(this);">
	                    </div>
                    
	                    <div class="col-lg-6">
	                        <label>Confirm Password</label>
	                        <input type="password" name="password" class="form-control" id="cpassword" placeholder="********" required="required" data-toggle="tooltip"  title="Re-enter password to confirm">
	                    </div>
	                </div>
					<div class="form-group">                                    
	                    <div class="col-lg-6">
	                        <label>Email Address</label>
	                        <input type="email" name="email" class="form-control" id="email" value="" required="required" data-toggle="tooltip"  title="Enter e-mail address used for verification and account recovery">
	                    </div>
	                    
	                    <div class="col-lg-6">
	                        <label>Confirm Email Address</label>
	                        <input type="email" name="email" class="form-control" id="cemail" value="" data-toggle="tooltip"  title="Re-enter e-mail address">
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
							  <input id="birthday" name="birthday" class="form-control"  placeholder = "mm/dd/yyyy"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
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
											<input name="mobileNumber" class="form-control" id="mobileNumber" value="" rel="tooltip" data-toggle="tooltip"  title="Either Mobile Number or Landline Number must not be empty. This fields are used to contact winner of the sponsored prize of the month" placeholder = "xxx xxxx xxx" data-toggle="tooltip" />
									</div>
							

						</div>

	                    <div class="col-lg-6">
	                        <label>Landline Number</label>
							
									<div class="input-group">									
											<span class="input-group-addon">+63 </span>
											<input name="landlineNumber" class="form-control" id="landlineNumber" value="" rel="tooltip" data-toggle="tooltip"  title="Either Mobile Number or Landline Number must not be empty. This fields are used to contact winner of the sponsored prize of the month" placeholder = "xxx xxxx" data-toggle="tooltip" />
									</div>

							
						</div>
					</div>
                    <div class="form-group col-lg-12">
                        <label>Security Question</label>
                        <input type="text" name="secQuestion" class="form-control" id="" value=""
						placeholder = "Enter your Secret Security Question that is used to recover your account." rel="tooltip"
						data-toggle="tooltip" data-placement="top" title="TIP: Security question could be a personal detail only known to you ">
                    </div>          


                    <div class="form-group col-lg-12">
                        <label>Security Answer</label>
                        <input type="secAnswer" name="secAnswer" class="form-control" id="" value=""
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
                    <div class="col-lg-7">
                        <label> Sign up as Premium User </label>
						<span rel="tooltip"
						data-toggle="tooltip" data-placement="top" title="Premium Users can join in the monthly sponsored draw. Find out more benefits in the link to the right.">
						
						<input type="checkbox" data-toggle="switch" data-off-color="danger" data-on-color="success" data-size="mini" data-on-text = "Yes" data-off-text = "No"  name="premiumToggle" class="checkbox"/>
						</span>
                    </div>

                    <div class="col-lg-5">
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
						<button type="submit" name="register" value="register" class="btn btn-primary">Register</button>
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
