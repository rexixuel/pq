<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q! Browse Reviews</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

$element = new ConstantElements();
$element->SetUser('Regular User');
print $element->GetHeader();

?>						
	<!-- Start Modal -->
	<!-- login modal	 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        </form>
                </div>
        </div>
       </div>
    </div>
  


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Search Results
				<small> [Product Name Review]</small>
				<div class="pq-page-instruction">
					<small class="pq-page-instruction"> 4 match(es) found!
					<br />
					Click on product review to see details.
				</div>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Search Results
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
                    <a href="browse-review.php" class="list-group-item active">Browse All Reviews</a>
                    <a href="categories.php" class="list-group-item">Browse Reviews By Category</a>
                    <a href="post-review.php" class="list-group-item">Post A Review</a>
                </div>
            </div>
            <!-- Content Column -->
			<!-- temporary list. replace with jQuery UI Autocomplete -->
			<datalist id="categoryList">
				<option value = "Sample Category 1" />
				<option value = "Sample Category 2" />
				<option value = "Sample Category 3" />
				<option value = "Sample Category 4" />
				<option value = "Sample Category 5" />
			</datalist>
            <div class="col-md-9">
				<!-- product row -->
				<div class="row">
					<div class="col-md-6 img-portfolio">
						<a href="portfolio-item.html">
							<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
						</a>
						<h3>
							<a href="portfolio-item.html">Product One</a>
						</h3>
						<form class="form-group">
							<div class = "form-group">
								<div class="">
									<label for="criteriaOverall" style = "clear: right;">Category 1</label>
									<input id="criteriaOverall" type="number" class="rating" data-size="xs" style="" value = 4.5 disabled/>
								</div>
							</div>
						</form>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
					</div>
					<div class="col-md-6 img-portfolio">
						<a href="portfolio-item.html">
							<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
						</a>
						<h3>
							<a href="portfolio-item.html">Product Two</a>
						</h3>
						<form class="form-group">
							<div class = "form-group">
								<div class="">
									<label for="criteriaOverall" style = "clear: right;">Category 1</label>
									<input id="criteriaOverall" type="number" class="rating" data-size="xs" style="" value = 5 disabled/>
								</div>
							</div>
						</form>						
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
					</div>
				</div>
				<!-- /.row product -->
				<!--  product row-->				
				<div class="row">
					<div class="col-md-6 img-portfolio">
						<a href="portfolio-item.html">
							<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
						</a>
						<h3>
							<a href="portfolio-item.html">Product Three</a>
						</h3>
						<form class="form-group">
							<div class = "form-group">
								<div class="">
									<label for="criteriaOverall" style = "clear: right;">Category 4</label>
									<input id="criteriaOverall" type="number" class="rating" data-size="xs" style="" value = 4 disabled/>
								</div>
							</div>
						</form>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
					</div>
					<div class="col-md-6 img-portfolio">
						<a href="portfolio-item.html">
							<img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
						</a>
						<h3>
							<a href="portfolio-item.html">Product 4</a>
						</h3>
						<form class="form-group">
							<div class = "form-group">
								<div class="">
									<label for="criteriaOverall" style = "clear: right;">Category 3</label>
									<input id="criteriaOverall" type="number" class="rating" data-size="xs" style="" value = 3 disabled/>
								</div>
							</div>
						</form>						
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
					</div>
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

</body>

</html>
