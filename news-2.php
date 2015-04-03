<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q! Announcements</title>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">-->

<link href="css/bootstrap.min.css" rel="stylesheet">   
<link href="css/bootstrap-theme.min.css" rel="stylesheet">   
<link href="css/modern-business.css" rel="stylesheet">   
<link href="css/pq.css" rel="stylesheet">   

<link href="kartik-v-bootstrap-star-rating-v3.5.1-1-gc015b2b/kartik-v-bootstrap-star-rating-c015b2b/css/star-rating.min.css" media="all" rel="stylesheet">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php

include ('/include/elementClass.php');
$user = '';
if(!empty($_GET['username']))
{
	$user = $_GET['username'];
}
$element = new ConstantElements();
$element->SetUser($user);
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
    <!-- Page Content -->
    <div class="container">


        <!-- Marketing Icons Section -->
        <div class="row">
				<div class="col-lg-2">
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-4 col-sm-4">
                            <h3 class="page-header">
                                Announcements
                            </h3>
                            <ul class="list-unstyled">							
                                <?php print '<li> 03/30/2015 <a href="announcement-1.php?username='.$user.'"> New Category is now up </a> </li>
                                <li> 03/29/2015 <a href="announcement-2.php?username='.$user.'"> People\'s Q! is live! </a> </li>
                                <li> <a href="announcement-list.php?username='.$user.'"> See all announcements... </a> </li>';
                                ?>
                            </ul>
						</div>
                        <div class="col-lg-12 col-md-4 col-sm-4">
                            <h3 class="page-header">
                                News
                            </h3>
                            <ul class="list-unstyled">						
                            <?php	
                              print '<li> 03/30/2015 <a href="news-1.php?username='.$user.'"> New Features available </a> </li>
                                <li> 03/29/2015 <a href="news-2.php?username='.$user.'"> People\'s Q! is live! </a> </li>
                                <li> <a href="news-list.php?username='.$user.'"> See all news... </a> </li>';
                            ?>
                            </ul>	
                        </div>
                    </div>
				</div>
				<div class="col-lg-10">
					<div class="col-lg-12">
						<h1 class="page-header">
							People's Q! is live! <small> 03/29/2015 </small>
						</h1>
						
						<p> <lead> Lorem ipsum dolor sit amet, </lead> consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?
							consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?
							consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?
						</p>
					</div>
					
				</div>
				<!-- end main column-->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
					<div class="nav navbar" >
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
                                <a href="index.php" class="" >
                            Log Out</a>
							</li>
						</ul>
					</div>
                </div>
                <div class="col-md-4">
                	<?php
                		print $element->GetCallToAction();
                	?>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Team CMC 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

	<!-- star rating script -->
	<script src="kartik-v-bootstrap-star-rating-v3.5.1-1-gc015b2b/kartik-v-bootstrap-star-rating-c015b2b/js/star-rating.min.js" type="text/javascript"></script>
   
   <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
