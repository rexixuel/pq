<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q!</title>

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

$element = new ConstantElements();
$element->SetUser('admin');
print $element->SetHomeActive('active');
print $element->GetHeader();

?>			
    <!-- Header Carousel -->
    <header id="" class="carousel push-down">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            
            <div class="item active ">
                
                <div class="fill pq-carousel" style="background-image:url('img/test1.jpg');">

					<!-- start 1st row -->
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 pull-right">
							<div class="pq-carousel-text">
								<h1 class="pq-carousel-header"> You Review. </h1>

								<h1 class="pq-carousel-header"> You Decide. </h1>

								<h1 class="pq-carousel-header"> Is It Worth It? </h1>

							</div>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 push-down">
							<div class="pq-carousel-caption" >
								<h2 class="pq-carousel-caption-header">Sponsored Prize of the Month</h2>
								<h1 class="pq-carousel-caption-header">25% OFF on IMAGINARY TRAVEL AGENCY!!!</h1>
							</div>
						</div>
					</div>
					<!--end 1st row -->
					<div class="clearfix"> </div>
					<!--start 2nd row -->
					<div class="row">	
						<div class="col-md-12 col-sm-12 col-xs-12  pull-right ">
							<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
								
									Logged In as Administrator
								
							</div>
							
							<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
								You can set-up the site<a href="admin-dashboard.php"> Here </a>
							</div>					
						</div>
					</div>
					<!-- end 2nd row -->

                </div>
				
				<div class="carousel-caption pq-carousel-poll-announcement">
					<p> New Category Poll Available! Scroll Down and Vote! </p>
				</div>
                <div class="clearfix"> </div>
    
            </div>
	

        </div>

    </header>

    <!-- Page Content -->
    <div class="container">


        <!-- Marketing Icons Section -->
        <div class="row">
				<div class="col-lg-2">
                    <div class="row">
                        <div class="col-lg-12 col-md-4 col-sm-4">
                            <h3 class="page-header">
                                    Category Poll 
									<small> Vote Now! </small>
                            </h3>
                            <form>
                                <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pollCategOptions" id="category1" value="categKey1">
                                                Ramen Noodles
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pollCategOptions" id="category2" value="categKey2">
                                                Guitars
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pollCategOptions" id="category3" value="categKey3">
                                                Consumer Speakers
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary"> Submit Vote </button>
                                </div>
                            </form>
						</div>
                        <div class="col-lg-12 col-md-4 col-sm-4">
                            <h3 class="page-header">
                                Announcements
                            </h3>
                            <ul class="list-unstyled">							
                                <li> 03/30/2015 <a href="announcement-1.php?username=admin"> New Category is now up </a> </li>
                                <li> 03/29/2015 <a href="announcement-2.php?username=admin"> People's Q! is live! </a> </li>
                                <li> <a href="announcement-list.php?username=admin"> See all announcements... </a> </li>
                            </ul>
						</div>
                        <div class="col-lg-12 col-md-4 col-sm-4">
                            <h3 class="page-header">
                                News
                            </h3>
                            <ul class="list-unstyled">							
                                <li> 03/30/2015 <a href="news-1.php?username=admin"> New Features available </a> </li>
                                <li> 03/29/2015 <a href="news-2.php?username=admin"> People's Q! is live! </a> </li>
                                <li> <a href="news-list.php?username=admin"> See all news... </a> </li>
                            </ul>	
                        </div>
                    </div>
				</div>
				<div class="col-lg-10">
					<!--<div class="col-lg-12">
						<h1 class="page-header">
							Welcome to People's Q!
						</h1>
						
						<p> <lead> Lorem ipsum dolor sit amet, </lead> consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
					</div>
					-->					
					<div class="col-lg-12">
						<h1 class="page-header">
							Latest Reviews
						</h1>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4><i class="fa fa-fw fa-check"></i>Sample Product Review 1</h4>
								<h6> Category 1 </h6>
							</div>
							<div class="panel-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
								<div class="clearfix"> </div>
								<h4> Verdict: <!--<h5 style="clear:left; display=inline;"> Worth it! </h5> --></h4>
								<input id="criteriaOverall1" type="number" class="rating" data-size="xs" style="" value = 4.5 disabled/>
								<a href="reviewdetails.php" class="btn btn-info" role="button"><i class="glyphicon glyphicon-share-alt"></i> Details </a></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4><i class="fa fa-fw fa-check"></i>Sample Product Review 2</h4>
								<h6> Category 1 </h6>
							</div>
							<div class="panel-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
								<div class="clearfix"> </div>
								<h4> Verdict:<!--<h5 style="clear:left; display=inline;"> Worth it! </h5> --></h4>
								<input id="criteriaOverall1" type="number" class="rating" data-size="xs" style="" value = 5 disabled/>
								<a href="reviewdetails.php" class="btn btn-info" role="button"><i class="glyphicon glyphicon-share-alt"></i> Details </a></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4><i class="fa fa-fw fa-check"></i>Sample Product Review 3</h4>
								<small> Category 2</small>
							</div>
							<div class="panel-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
								<div class="clearfix"> </div>
								<h4> Verdict:<!--<h5 style="clear:left; display=inline;"> Worth it! </h5> --></h4>
								<input id="criteriaOverall1" type="number" class="rating" data-size="xs" style="" value = 4.5 disabled/>
								<a href="reviewdetails.php" class="btn btn-info" role="button"><i class="glyphicon glyphicon-share-alt"></i> Details </a></p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4><i class="fa fa-fw fa-check"></i>Sample Product Review 4</h4>
								<small> Category 3</small>
							</div>
							<div class="panel-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
								<div class="clearfix"> </div>
								<h4> Verdict:<!--<h5 style="clear:left; display=inline;"> Worth it! </h5> --></h4>
								<input id="criteriaOverall1" type="number" class="rating" data-size="xs" style="" value = 4.5 disabled/>
								<a href="reviewdetails.php" class="btn btn-info" role="button"><i class="glyphicon glyphicon-share-alt"></i> Details </a></p>
							</div>
						</div>
					</div>
										
					<div class="col-lg-12 pull-left">
						<h1 class="page-header">
							Announcements
						</h1>
						
						<p> <lead> Lorem ipsum dolor sit amet, </lead> consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
					</div>
					
					<div class="col-lg-12 pull-left">
						<h1 class="page-header">
							News
						</h1>
						
						<p> <lead> Lorem ipsum dolor sit amet, </lead> consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
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
