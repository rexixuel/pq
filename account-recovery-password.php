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
                    <form>
                        <div class="form-group">
                            <div class="">									
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" id="username" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        <div class = "form-group">
                            <div class="">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>
                        <div class = "form-group form-inline">
                                <button type="button" class="btn btn-primary btn-sm" >Sign In</button>
                                <a href="signup.php"> <large> Sign Up Now! </large> </a>
                        </div>
                        <a href="account-mgt.php"> <small> Forgot your password? </small></a>
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
                <h1 class="page-header"> <i class="fa fa-user"> </i> Account Recovery
					<small> Forgot Password</small>
					<div class="pq-page-instruction">
						<small class="pq-page-instruction"> Enter username of whom password you forgot.  Click 'Reset Password' to reset password.  <br /> 
						Email confirmation shall be sent to your registered email for further instruction. </small>
					</div>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
					<li><a id="example" href="#" class="" data-container="body" data-toggle="modal" data-target="#login">
                            Log In</a>
                    </li>
                    <li class="active"> Forgot Password
                    </li>
                    
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item active">Forgot Password?</a>
                    <a href="account-recovery-user.php" class="list-group-item">Forgot Username?</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
					
				<h3 class="dark-grey"></h3>
				<form  class="form-horizontal" id="registerHere" method='post' action=''>
					<fieldset>
						  <div class="col-md-12">
							
							<div class="form-group col-lg-12">
								<label>Username</label>
								<input type="" name="usernameRecover" class="form-control" id="usernameRecover" value="" required="required" rel="tooltip" data-toggle="tooltip"  title="Username of account you want to recover" placeholder="Enter your Username">
							</div>
							<!-- end panel -->
							<div class="form-group col-lg-12">
								<button type="submit" class="btn btn-warning">Reset Password</button>
							</div>
						</div>

							<div class="clearfix"> </div>

					</fieldset>
				</form>
			</div>
        </div>    
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
