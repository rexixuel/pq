<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q! Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
$element->SetUser('admin');
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
                <h1 class="page-header">Site Set-up
					<small> Category Set-up </small>
					<div class="pq-page-instruction">
						<small class="pq-page-instruction"> Enter details below to create a new category. Approve a category poll winner to create the category. Input moderator for created category. Click 'Submit' to finalize changes. </small>
					</div>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Site Set-up
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
                    <a href="admin-dashboard.php" class="list-group-item active">Site Set-up</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9" role="tabpanel">
				

                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#welcomepageSetup" data-toggle="tab"><i  class="glyphicon glyphicon-home"></i> Welcome Page Set-up</a>
                    </li>
                    <li class=""><a href="#categoriesSetup" data-toggle="tab"><i class="glyphicon glyphicon-list"></i> Categories Set-up</a>
                    </li>
                </ul>				
			
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="welcomepageSetup">				
						<ul class="nav nav-pills">
							<li> <a href="#sponsorOptions"> Sponsor </a> </li>
							<li> <a href="#messageOptions"> Message </a> </li>
							
						</ul> 
				
						<form>
						
							<hr>						
							<span id="sponsorOptions" class="pq-offset-anchor">					
								<h3 class="pq-offset-anchor">Sponsor Options</h3>
							</span>
							<hr>
							
							<div class = "form-group">
								<div class="">
										<label for="sponsorName">Name</label>
										<input type="text" id="sponsorName" class="form-control" placeholder="Sponsor" />
								</div>
							</div>
							<div class = "form-group">
								<div class="">
										<label for="prize">Prize Description</label>
										<textarea id="prize" class="form-control" placeholder="Specify prize to be given away by sponsor of the month"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="mobile" >Mobile Number</label>
								<div class="input-group">									
										<span class="input-group-addon">+63 </span>
										<input type="text" id="mobile" class="form-control" placeholder="xxx xxxx xxx"/>
								</div>
							</div>
							<div class = "form-group">
								<div class="">
										<label for="password">Password</label>
										<input type="text" id="password" class="form-control" placeholder="Password" />
								</div>
							</div>
							<div class = "form-group">
								<div class="">
										<label for="address">Address</label>
										<input type="text" id="address" class="form-control" placeholder="Address" />
								</div>
							</div>
							<div class = "form-group">
								<div class="">
										<label for="prizeBanner">Prize Banner</label>
										<input type="file" id="address" />
										<p class="help-block"> Upload Prize Banner Image </p>
								</div>
							</div>						
							
							<hr>							
							<span id="messageOptions" class="pq-offset-anchor">					
								<h3 class="pq-offset-anchor">Message Options</h3>
							</span>
							<hr>
							
							<div class = "form-group">
								<div class="">
										<label for="welcomeMessage">Welcome Message</label>
										<textarea id="welcomeMessage" class="form-control" placeholder="Welcome Message that shall appear in the welcome page. You can describe the website here or add links"></textarea>
								</div>
							</div>

							<div class = "form-group">
								<div class="">
										<label for="announcement">Announcement</label>
										<textarea id="announcement" class="form-control" placeholder="Enter announcements here. Announcements can be about site maintenance or any upgrades made in the site"></textarea>
								</div>
							</div>

							<div class = "form-group">
								<div class="">
										<label for="news">News</label>
										<textarea id="news" class="form-control" placeholder="Enter Site News Here. "></textarea>
								</div>
							</div>

							<hr>
							
							<div class = "form-group form-inline">
									<button type="submit" class="btn  btn-default btn-sm" >Preview</button>                
									<button type="submit" class="btn btn-primary btn-sm" >Submit</button>           
							</div>
							
							<hr>							
							
						</form>
															
						<ul class="nav nav-pills">
							<li> <a href="#sponsorOptions"> Sponsor </a> </li>
							<li> <a href="#messageOptions"> Message </a> </li>					
						</ul>
					
					</div>
					<div class="tab-pane fade" id="categoriesSetup">
							<ul class="nav nav-pills">
								<li> <a href="#pollOptions"> Create Category Poll </a> </li>
								<li> <a href="#approveOptions"> Approve </a> </li>					
							</ul>
							<form>
							
								<hr>

								<h3 id="pollOptions">Create Category Poll</h3>
								
								<hr>
								
								<div class = "form-group">
									<div class="input-group">
											<div>
													<label for="pollNumber">Number of Categories</label>
													<input type="number" id="pollNumber" class="form-control" min=2 max=5 value=2/>
											</div>
									</div>
								</div>
								<!-- must be dynamic -->
								<div class = "form-group">
									<div class="">
											<label for="category1">Category 1</label>
											<input type='text' id="category1" class="form-control" placeholder="Category Name">
									</div>
								</div>
								<div class="form-group">
									<div class="">									
											<label for="category2">Category 2</label>
											<input type='text' id="category2" class="form-control" placeholder="Category Name">
									</div>
								</div>
								<div class = "form-group">
									<div class="">
											<label for="category3">Category 3</label>
											<input type='text' id="category3" class="form-control" placeholder="Category Name">
									</div>
								</div>
								
								<hr>								
								
								<h3 id="approveOptions"> Create Category </h3>
								
								<hr>								
								
								<div class="">
									<ul>
										<li class="progress-bar" style="width:50%; margin-bottom:5px;"> Poll Category 1 - 50%</li>
										<div class="clearfix"> </div>
										<li class="progress-bar" style="width:30%; margin-bottom:5px;"> Poll Category 2 - 30%</li>
										<div class="clearfix"> </div>
										<li class="progress-bar" style="width:20%; margin-bottom:5px;"> Poll Category 3 - 20%</li>
										<div class="clearfix"> </div>
									</ul>
								</div>
								<div class="form-inline">
										<label for="winner">New Category: </label>
										<input id="winner" class="form-control bg-success" placeholder="Poll Category" value="Category 1" disabled /> 										
								</div>
								<div class = "form-group">
									
								</div>
								
								<div class = "form-group">
									<div class="">
											<label for="moderator">Moderator</label>
											<input id="moderator" class="form-control" placeholder="Moderator" /> 
									</div>
								</div>
								
								<hr> 
								
								<div class = "form-group form-inline">										                
										<button type="submit" class="btn btn-primary btn-sm" >Submit</button>           
								</div>
							</form>
							
							<hr>
							
							<ul class="nav nav-pills">
								<li> <a href="#pollOptions"> Create Category Poll </a> </li>
								<li> <a href="#approveOptions"> Approve </a> </li>					
							</ul>

						</div>
						
				</div>
				
				
										
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
