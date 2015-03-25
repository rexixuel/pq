<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!--<link href="dist/css/flat-ui.min.css" rel="stylesheet"> -->
    <link href="css/modern-business.css" rel="stylesheet">   
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

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle toggle-button-bottom-align" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
				<button type="button" class="btn navbar-left navbar-toggle btn-link
				toggle-button-bottom-align" data-toggle="collapse" data-target="#test" style="padding:6px 6px;">
                    <span class="sr-only">Toggle search</span>
                     Find Out! 
                </button>
                <a class="navbar-brand" href="index.html" > <img class="header-logo" src="img/pq-logo.png" alt=""></a>
            </div>
			
            <form class="nav navbar-form navbar-left navbar-search bottom-align form-inline collapse navbar-collapse"  id="test">
                <div class="form-group form-group-sm">
                    <div class="input-group">

                        <label for="reviewSearch" class="sr-only">Search</label>
                        <input type="text" id="reviewSearch" class="form-control" placeholder="Search" />
                        <span class="input-group-btn ">
                            <button type="submit" class="btn btn-default btn-sm">Find Out!</button>
                        </span>
                    </div>

                </div>
            </form>
			
            <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right" >
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
                            Log In</a>
						</li>						
					</ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
        <!-- /.navbar-collapse -->
            
        </div>
        <!-- /.container -->
    </nav>
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
								<a href="signup.php"> <small> Forgot your password? </small></a>
                                </form>
                        </div>
                </div>
               </div>
            </div>
    <!-- Header Carousel -->
    <header id="" class="carousel push-down">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            
            <div class="item active">
                
                <div class="fill" style="background-image:url('img/test2.jpg');">

                    <div class="pq-carousel-text">
                        <h1 class="pq-carousel-header"> You Review. </h1>

                        <h1 class="pq-carousel-header"> You Decide. </h1>

                        <h1 class="pq-carousel-header"> Is It Worth It? </h1>

                    </div>
                    <div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
                        <a id="example" href="#" class="" data-container="body" data-toggle="modal" data-target="#myModal">
                        Login Here </a> or
                        <a href="signup.php"> Sign up </a> now as a premium user and get a chance to win monthly prizes!
                    </div>
					<div class="pq-carousel-caption " >
						<h1 class="pq-carousel-caption-header">Sponsored Prize of the Month</h1>
						<h2 class="pq-carousel-caption-header">25% OFF on IMAGINARY TRAVEL AGENCY!!!</h2>
					</div>
                </div>
                <div class="clearfix"> </div>
    
            </div>
	

        </div>

    </header>

    <!-- Page Content -->
    <div class="container">


        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">
                    Welcome to People's Q!
                </h1>
				
				<p> <lead> Lorem ipsum dolor sit amet, </lead> consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
            </div>
			
            <div class="col-lg-12">
                <h1 class="page-header">
                    Latest Reviews:
                </h1>
            </div>
			
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Sample Product Review 1</h4>
						<h6> Category 1 </h6>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
						<div class="clearfix"> </div>
						<h4> Verdict: <h5 style="clear:left; display=inline;"> Worth it! </h5> </h4>
                        <a href="#" class="btn btn-default">Read Full Review</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Sample Product Review 2</h4>
						<h6> Category 1 </h6>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
						<div class="clearfix"> </div>
						<h4> Verdict: <h5 style="clear:left; display=inline;"> Worth it! </h5> </h4>
                        <a href="#" class="btn btn-default">Read Full Review</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>Sample Product Review 3</h4>
						<h6> Category 2</h6>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
						<div class="clearfix"> </div>
						<h4> Verdict: <h5 style="clear:left; display=inline;"> Worth it! </h5> </h4>
                        <a href="#" class="btn btn-default">Read Full Review</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
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
                            Login</a>
							</li>
						</ul>
					</div>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-primary btn-block" href="#">Sign Up!</a>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
        $('#example').popover(options)
    </script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
