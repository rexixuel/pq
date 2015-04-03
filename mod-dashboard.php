<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q! Moderator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
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

			
<?php

include ('/include/elementClass.php');

$element = new ConstantElements();
$element->SetUser('moderator');

print $element->GetHeader();

?>   
    <!-- login modal -->
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
                                    <input type="text" id="password" class="form-control" placeholder="Password" />
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
                <h1 class="page-header">Category Set-up
				<small> Category 1</small>
				<div class="pq-page-instruction">
					<small class="pq-page-instruction"> Enter details below to set-up category.  Click 'Submit' to finalize changes. </small>
				</div>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a> </li>                    
                    <li class="active">Category Set-up
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
                    <a href="mod-dashboard.php" class="list-group-item active">Games</a>
                    <a href="mod-dashboard.php" class="list-group-item">Music</a>
                    <a href="mod-dashboard.php" class="list-group-item">Gadgets</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9" role="tabpanel">
                    
						<ul class="nav nav-pills">
							<li> <a href="#criteriaOptions"> Criteria  </a> </li>
							<li> <a href="#rulesOptions"> Category Rules and Description </a> </li>
							<li> <a href="#modOptions"> Moderators </a> </li>				
						</ul> 
				
						<form>

							<hr>
							<span id="criteriaOptions" class="pq-offset-anchor">										
									<h3 class="pq-offset-anchor">Criteria </h3>
							</span>
							<hr>
							
							<div class = "form-group">
								<div class="">
										<label for="criteria1">Criteria 1</label>
										<input type="text" id="criteria1" class="form-control" placeholder="Criteria Name" />
								</div>
							</div>
							<div class = "form-group">
								<div class="">
										<label for="criteria2">Criteria 2</label>
										<input type="text" id="criteria2" class="form-control" placeholder="Criteria Name" />
								</div>
							</div>
							<div class="form-group">
								<div class="">									
										<label for="criteria3">Criteria 3</label>
										<input type="text" id="criteria3" class="form-control" placeholder="Criteria Name" />
								</div>
							</div>
							<div class = "form-group">
								<div class="">
										<label for="criteria4">Criteria 4</label>
										<input type="text" id="criteria4" class="form-control" placeholder="Criteria Name" />
								</div>
							</div>
							<div class = "form-group">
								<div class="">
										<label for="criteria5">Criteria 5</label>
										<input type="text" id="criteria5" class="form-control" placeholder="Criteria Name" />
								</div>
							</div>
							
							<hr>
							<span id="rulesOptions" class="pq-offset-anchor">					
								<h3 class="pq-offset-anchor">Category Rules and Description</h3>
							</span>
							<hr>
							
							<div class = "form-group">
								<div class="">
										<label for="rules">Category Rules</label>
										<textarea id="rules" class="form-control" placeholder="Enter category description and site rules here. This will be displayed in the category sidebar. Use provided HTML5 tags for formatting."></textarea>
										
								</div>
								<div class="pq-format-tags">
									<label> <small> Format: </small> </label>
									<a href=""> <code> List </code> </a>
									<a href=""> <code> Header 1 </code> </a>
									<a href=""> <code> Header 2 </code> </a>
									<a href=""> <code> Header 3 </code> </a>
									<a href=""> <code> Bold </code> </a>
									<a href=""> <code> Italize </code> </a>
									<a href=""> <code> Large Font </code> </a>
									<a href=""> <code> Small Font </code> </a>
								</div>
							</div>
							
							<hr>
							<span id="modOptions" class="pq-offset-anchor">					
								<h3 class="pq-offset-anchor">Moderators</h3>
							</span>
							<hr>
							
							<div class = "form-group">
								<div class="input-group">
										<label for="modNumber">Number of Moderators</label>
										<input type="number" class="form-control" id="modNumber" min=0 max = 9 />
								</div>
							</div>
							<!-- must be dynamic -->
							<div class = "form-group">
								<div class="">
										<label for="mod1">Moderator 1</label>
										<input type='text' id="mod1" class="form-control" placeholder="Moderator Name">
								</div>
							</div>
							<div class="form-group">
								<div class="">									
										<label for="mod2">Moderator 2</label>
										<input type='text' id="mod2" class="form-control" placeholder="Moderator Name">
								</div>
							</div>
							
							<hr>
								
							<div class = "form-group form-inline">										                
									<button type="submit" class="btn btn-primary btn-sm" >Submit</button>           
							</div>							
							
							<hr>
						</form>
															
						<ul class="nav nav-pills">
							<li> <a href="#criteriaOptions"> Criteria  </a> </li>
							<li> <a href="#rulesOptions"> Category Rules and Description </a> </li>
							<li> <a href="#modOptions"> Moderators </a> </li>				
						</ul> 					
							
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
                                <a id="example" href="index.php" class="" data-container="body">
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
