<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q! Food and Restaurant</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="kartik-v-bootstrap-star-rating-v3.5.1-1-gc015b2b/kartik-v-bootstrap-star-rating-c015b2b/css/star-rating.min.css" media="all" rel="stylesheet">
    <link href="css/pq.css" rel="stylesheet">
		
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
print $element->GetHeader();

print $element->GetReplyModal();
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

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <i class="glyphicon glyphicon-search"></i> Food and Restaurant
				<small> All Reviews </small>
				<span data-toggle="tooltip" data-placement="right" title="Subscribe to Food and Restaurant!"> 
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"> <i class="fa fa-sign-in"></i> Subscribe</a> 
                </span> 
				<div class="pq-page-instruction">
					<small class="pq-page-instruction"> 
					
					Click on product review to see details.
				</div>
                </h1>
				
                <ol class="breadcrumb">
                	<?php
	                  print ' <li><a href="index.php?username='.$user.'">Home</a>
	                    </li>
	                    <li><a href="categories.php?username='.$user.'">Categories</a>
	                    </li>';
                    ?>
                    <li class="active"> Foods and Restaurant
                    </li>
                    
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-4">
                <div class="panel panel-info">
                	<div class="panel-heading panel-primary"> <strong> Food and Restaurant Sidebar </strong> </div>
                	<div class="panel-body">
	                	<p> <mark> Hi and welcome to Food and Restaurant category! <br /> <br /> Please see <strong> rules </strong> below for a happier community!</mark> </p>
	                	<strong> The Rules </strong>
	                	<dl class="list-unstyled">
	                		<dt> Rule 1. No Fast foods </dt>
	                		<dd> This means no mainstream fast food joints </dd>
	                		<dt> Rule 2. Lorem ipsum dolor sit amet </dt>
	                		<dd> Some description describing the rule above</dd>                		
	                		<dt> Rule 3. Lorem ipsum dolor sit amet </dt>
	                		<dd> Some description describing the rule above</dd>                		
	                		<dt> Rule 4. Lorem ipsum dolor sit amet </dt>
	                		<dd> Some description describing the rule above</dd>                		
	                		<dt> Rule 5. Lorem ipsum dolor sit amet </dt>
	                		<dd> Some description describing the rule above</dd>                		

	                	</dl>
                	</div>
				</div>            	
				<div class="panel panel-info">
                	<div class="panel-heading panel-primary"> <strong> Food and Restaurant Moderators </strong> </div>
                	<div class="panel-body">
                		<h5 class="pq-header"> <strong> Message the Mods! </strong> </h5>
                		<div class="list-group" class="pq-mod-list">
                			<a href="#" data-container="body" data-toggle="modal" data-recipient="@Jolli Man" data-target="#message" 
                			class="btn list-group-item  <?php print $element->SetDisabled(); ?>" ><i class="fa fa-key"></i> Jolli Man </a>

                			<a href="#" data-container="body" data-toggle="modal" data-recipient="@Mc Donny" data-target="#message" 
                			class="btn list-group-item  <?php print $element->SetDisabled(); ?>" ><i class="fa fa-key"></i> Mc Donny </a>

            			</div>
                	</div>
            	</div>
                <div class="list-group">
                    <?php                       
                        print $element->GetSidebar('','active','','','','');
                    ?>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-8">
            	<div class="row">
	        		<div class="col-lg-4 col-sm-4">
	        			<form class="form-group">
		        			<div class="form-group form-inline">
		        				<label> See: </label>
								<div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-success btn-xs active">
								    <input type="checkbox" autocomplete="off" class="success" checked> Worth It?
								  </label>
								  <label class="btn btn-danger btn-xs active">
								    <input type="checkbox" autocomplete="off" class="danger" checked> Not Worth It?
								  </label>
								</div>
	        				</div>
        				</form>	        			
        			</div>
	        		<div class="col-lg-8 col-sm-8">
	        			<form class="form-group">
		        			<div class="form-group form-inline">
		        				<label> Sort by: </label>
								<div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-success btn-xs active">
								    <input type="checkbox" autocomplete="off" class="success" checked> Worth It?
								  </label>
								  <label class="btn btn-danger btn-xs">
								    <input type="checkbox" autocomplete="off" class="danger"> Not Worth It?
								  </label>
								  <label class="btn btn-primary btn-xs">
								    <input type="checkbox" autocomplete="off" class="warning"> Product Name
								  </label>
								  <label class="btn btn-info btn-xs">
								    <input type="checkbox" autocomplete="off" class="info"> Date Posted
								  </label>						  
								</div>
	        				</div>
        				</form>
	        		</div>
        		</div>
        		<div class="row">
	        		<div class="col-lg-3 col-sm-3">
        			</div>
	        		<div class="col-lg-5 col-sm-5">
		        		<nav>
		        		  <ul class="pagination">
		        		    <li class="disabled">
		        		      <a href="#" aria-label="Previous">
		        		        <span aria-hidden="true">&laquo;</span>
		        		      </a>
		        		    </li>
		        		    <li class="active"><a href="#">1</a></li>
		        		    <li class="disabled"><a href="#">2</a></li>
		        		    <li class="disabled"><a href="#">3</a></li>
		        		    <li class="disabled"><a href="#">4</a></li>
		        		    <li class="disabled"><a href="#">5</a></li>
		        		    <li class="disabled">
		        		      <a href="#" aria-label="Next">
		        		        <span aria-hidden="true">&raquo;</span>
		        		      </a>
		        		    </li>
		        		  </ul>
		        		</nav>
	        		</div>			
	        	</div>
				<!-- product row -->
				<div class="row">
					<div class="col-md-6 img-portfolio">
						
						<a href="review-details-1.php">
							<img class="img-responsive img-hover" src="http://placehold.it/350x200" alt=""> <p class="pq-header pq-thumbnail-user-post" style=""> username, Apr 04, 2015 </p>

							
						</a>
						<h3>
							<?php
								print '<a href="review-details-1.php?username='.$user.'">Sinigang na Lechon</a>';
							?>
						</h3>
						<form class="form-group">
							<div class = "form-group">
								<div class="">
									<label for="criteriaOverall" class="sr-only" style = "clear: right;">Verdict</label>
									<input id="criteriaOverall" type="number" class="rating" data-size="xs" style="" value = 4.5 disabled/>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
			                <p><a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-success" role="button"><i class="glyphicon glyphicon-thumbs-up"></i></a>
			                 <a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-danger" role="button"><i class="glyphicon glyphicon-thumbs-down"></i></a>
			                 <?php
			                 	print '<a href="review-details-1.php?username='.$user.'#commentsAnchor" '.$element->SetDisabled().'  class="btn btn-primary" role="button"><i class="glyphicon glyphicon-pencil"></i></a>';
			                 ?>
                            <?php
			                 print' <a href="review-details-1.php?username='.$user.' '. $element->SetDisabled().'" class="btn btn-info" role="button"><i class="glyphicon glyphicon-share-alt"></i> Details</a>';
                            ?>
                            <?php print $element->PrintReport(); ?></p>
						</form>
					
					</div>
					<div class="col-md-6 img-portfolio">
						<a href="review-details-.php">
							<img class="img-responsive img-hover" src="http://placehold.it/350x200" alt=""> <p class="pq-header pq-thumbnail-user-post" style=""> username, Apr 04, 2015 </p>
						</a>
						<h3>
							<a href="review-details-.php">Product Two</a>
						</h3>
						<form class="form-group">
							<div class = "form-group">
								<div class="">
									<label for="criteriaOverall" class="sr-only" style = "clear: right;">Verdict</label>
									<input id="criteriaOverall" type="number" class="rating" data-size="xs" style="" value = 5 disabled/>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
			                <p><a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-success" role="button"><i class="glyphicon glyphicon-thumbs-up"></i></a> <a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-danger" role="button"><i class="glyphicon glyphicon-thumbs-down"></i></a> <a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-primary" role="button"><i class="glyphicon glyphicon-pencil"></i></a> <a href="reviewdetails.php" <?php print $element->SetDisabled(); ?> class="btn btn-info" role="button"><i class="glyphicon glyphicon-share-alt"></i> Details</a> <?php print $element->PrintReport(); ?></p>
						</form>						
					</div>
					<div class="col-md-6 img-portfolio">
						<a href="review-details-.php">
							<img class="img-responsive img-hover" src="http://placehold.it/350x200" alt=""> <p class="pq-header pq-thumbnail-user-post" style=""> username, Apr 04, 2015 </p>
						</a>
						<h3>
							<a href="review-details-.php">Product Three</a>
						</h3>
						<form class="form-group">
							<div class = "form-group">
								<div class="">
									<label for="criteriaOverall" class="sr-only" style = "clear: right;">Verdict</label>
									<input id="criteriaOverall" type="number" class="rating" data-size="xs" style="" value = 4 disabled/>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
							<p><a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-success" role="button"><i class="glyphicon glyphicon-thumbs-up"></i></a> <a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-danger" role="button"><i class="glyphicon glyphicon-thumbs-down"></i></a> <a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-primary" role="button"><i class="glyphicon glyphicon-pencil"></i></a> <a href="reviewdetails.php" <?php print $element->SetDisabled(); ?> class="btn btn-info" role="button"><i class="glyphicon glyphicon-share-alt"></i> Details</a> <?php print $element->PrintReport(); ?></p>	
						</form>
					</div>
					<div class="col-md-6 img-portfolio">
						<a href="review-details-.php">
							<img class="img-responsive img-hover" src="http://placehold.it/350x200" alt=""> <p class="pq-header pq-thumbnail-user-post" style=""> username, Apr 04, 2015 </p>
						</a>
						<h3>
							<a href="review-details-.php">Product 4</a>
						</h3>
						<form class="form-group">
							<div class = "form-group">
								<div class="">
									<label for="criteriaOverall" class="sr-only" style = "clear: right;">Verdict</label>
									<input id="criteriaOverall" type="number" class="rating" data-size="xs" style="" value = 3 disabled/>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
							<p><a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-success" role="button"><i class="glyphicon glyphicon-thumbs-up"></i></a> <a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-danger" role="button"><i class="glyphicon glyphicon-thumbs-down"></i></a> <a href="#" <?php print $element->SetDisabled(); ?> class="btn btn-primary" role="button"><i class="glyphicon glyphicon-pencil"></i></a> <a href="reviewdetails.php" <?php print $element->SetDisabled(); ?> class="btn btn-info" role="button"><i class="glyphicon glyphicon-share-alt"></i> Details</a> <?php print $element->PrintReport(); ?></p>
						</form>						
					</div>
				</div>
        		<div class="col-lg-3 col-sm-3">

        		</div>
        		<div class="col-lg-5 col-sm-5">
	        		<nav>
	        		  <ul class="pagination">
	        		    <li class="disabled">
	        		      <a href="#" aria-label="Previous">
	        		        <span aria-hidden="true">&laquo;</span>
	        		      </a>
	        		    </li>
	        		    <li class="active"><a href="#">1</a></li>
	        		    <li class="disabled"><a href="#">2</a></li>
	        		    <li class="disabled"><a href="#">3</a></li>
	        		    <li class="disabled"><a href="#">4</a></li>
	        		    <li class="disabled"><a href="#">5</a></li>
	        		    <li class="disabled">
	        		      <a href="#" aria-label="Next">
	        		        <span aria-hidden="true">&raquo;</span>
	        		      </a>
	        		    </li>
	        		  </ul>
	        		</nav>
        		</div>				
				<!-- /.row product -->				
				
            </div>
        </div>
        <!-- /.row -->

        <hr>
		
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
                                <a id="example" href="#" class="" data-container="body" data-toggle="modal" data-target="#myModal">
                            Log Out</a>
							</li>
						</ul>
					</div>
                </div>        
            </div>
        </div>
		
		<hr>
		
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
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
    <script type="text/javascript">
        $('#message').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('recipient') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('Message ' + recipient)
          modal.find('#recipient').val(recipient)
        })

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
</body>

</html>
