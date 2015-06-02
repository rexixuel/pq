<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	
	include ('/include/pqControl.php');

	$element = new elementControl();
	$userControl = new userControl();
	$siteControl = new siteControl();
	$categoryControl = new categoryControl();
	// insert login scripts here

	// step1: check if invoked via $_SELF
	// step2: if invoked, instantiate userControl class with $_POST values
	// step3: call login
	// step4: validate user access
	// step5: call user access elements from elementClass
	$userType = '';
	$loginResult = '';
	$siteSetupResult = '';
	$categoryPollResult = '';
	$user = ''; 
	$userTypeDescription = '';

	if(isset($_POST)){
		if (isset($_POST["signIn"])){
			$loginResult = $userControl->Login($_POST); 
		}
		else
		if(isset($_POST["save"])){			
			$siteSetupResult = $siteControl->Save($_POST, $_FILES);
		}
		else
		if(isset($_POST["preview"])){
			$siteControl->Preview($_POST);
		}
		else
		if(isset($_POST["saveCategory"])){
			$categoryPollResult = $categoryControl->SetNewPoll($_POST);
		}		
		else
		if(isset($_GET["log"]) &&  $_GET["log"] == "out" && session_status() != PHP_SESSION_NONE){
			session_destroy();
		}
	}else
	if(isset($_GET["log"]) &&  $_GET["log"] == "out" && session_status() != PHP_SESSION_NONE){
			session_destroy();
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

    <title>People's Q! Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">   
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">   
    <link href="css/modern-business.css" rel="stylesheet">   
    <link href="css/pq.css" rel="stylesheet">   

    <link href="kartik-v-bootstrap-star-rating-v3.5.1-1-gc015b2b/kartik-v-bootstrap-star-rating-c015b2b/css/star-rating.min.css" media="all" rel="stylesheet">

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

if(isset($_SESSION['logged']) && $_SESSION['logged']) {	
	$userType = $_SESSION['userType'];
	$userTypeDescription = $_SESSION['userTypeDescription'];
	$user = $_SESSION['username'];
}

if(!isset($_SESSION['logged']) || $userType != 1)
{
		$userControl->invalidAccess();
}
	$element->SetSidebarActive('active');

	$element->SetUser($userType, $user, $userTypeDescription);

	print $element->SetHomeActive('active');
	print $element->GetHeader();


?>     

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <i class="fa fa-cogs"></i> Site Set-up
                	<span class="welcome-instruction">
                		<small> Welcome Page Set-up </small>
                		<div class="pq-page-instruction">
                			<small class="pq-page-instruction"> Enter details below to set up site's Welcome Page. 
                				<br />
                				Click 'Preview' to see changes and Submit' to finalize changes. </small>
                		</div>
                	</span>
                	<span class="category-instruction" style="display:none;">
						<small> Category Set-up </small>
						<div class="pq-page-instruction">
							<small class="pq-page-instruction"> Enter details below to create a new category. 
								<br />
								Approve a category poll winner to create the category. Input moderator for created category. 
								<br/>
								Click 'Submit' to finalize changes. </small>
						</div>
					</span>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Site Set-up
                    </li>
                    
                </ol>
    			<?php print $siteControl->GetErrorsFound().$siteSetupResult.$categoryPollResult; ?>

            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <?php                       
                        print $element->GetSidebar('','','','','','','');
                    ?>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9" role="tabpanel">
				

                <ul id="setupTab" class="nav nav-tabs nav-justified">
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
				
						<form method="POST" id="siteSetup" name="siteSetup" enctype="multipart/form-data">
						
							<hr>						
							<span id="sponsorOptions" class="pq-offset-anchor">					
								<h3 class="pq-offset-anchor">Sponsor Options</h3>
							</span>
							<hr>
							
							<div class = "form-group">
								<div class="">
										<label for="sponsorName">Name</label>
										<input type="text" id="sponsorName" name="sponsorName" class="form-control" placeholder="Sponsor" />
								</div>
								<?php print $siteControl->GetSponsorNameError(); ?>
							</div>
							<div class = "form-group">
								<div class="">
										<label for="prize">Prize Description</label>
										<textarea rows="7" id="prize" name="prize" class="form-control" placeholder="Specify prize to be given away by sponsor of the month"></textarea>
								</div>
								<?php print $siteControl->GetPrizeError(); ?>
							</div>
							<div class="form-group">
								<label for="mobile" >Mobile Number</label>
								<div class="input-group">									
										<span class="input-group-addon">+63 </span>
										<input type="text" id="mobile" name="mobile" class="form-control" placeholder="xxx xxxx xxx"/>
								</div>
								<?php print $siteControl->GetContactError(); ?>								
							</div>
							<div class = "form-group">
								<label for="landline" >Landline Number</label>
								<div class="input-group">									
										<span class="input-group-addon">+63 </span>
										<input type="text" id="landline" name="landline" class="form-control" placeholder="xxx xxxx"/>
								</div>
								<?php print $siteControl->GetContactError(); ?>								
							</div>
							<div class = "form-group">
								<div class="">
										<label for="address">Address</label>
										<input type="text" id="address" name="address" class="form-control" placeholder="Address" />
								</div>
								<?php print $siteControl->GetAddressError(); ?>								
							</div>
							<div class = "form-group">
								<div class="">
										<label for="prizeBanner">Prize Banner</label>
										<input type="file" id="prizeBanner" name="prizeBanner" class="form-control" />
										<p class="help-block"> Upload Prize Banner Image </p>
								</div>
								<?php print $siteControl->GetPrizeBannerError(); ?>								
							</div>						
							
							<hr>							
							<span id="messageOptions" class="pq-offset-anchor">					
								<h3 class="pq-offset-anchor">Message Options</h3>
							</span>
							<hr>
							
							<div class = "form-group">
								<div class="">
										<label for="welcomeMessage">Welcome Message</label>
										<textarea rows="7" id="welcomeMessage" name="welcomeMessage" class="form-control" placeholder="Welcome Message that shall appear in the welcome page. You can describe the website here or add links"></textarea>
								</div>
								<?php print $siteControl->GetWelcomeMessageError(); ?>								
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

							<div class = "form-group">
								<div class="">
										<label for="announcement">Announcement</label>
										<div class = "form-group form-inline">
											<input type="text" id="announcementTitle" name="announcementTitle" class="form-control" placeholder="Announcement Title" data-toggle="tooltip" title="This is the title of the announement." />
										</div>
										<?php print $siteControl->GetAnnouncementTitleError(); ?>								
										<div class = "form-group">										
											<textarea rows="7" id="announcement" name="announcement" class="form-control" placeholder="Enter announcements here. Announcements can be about site maintenance or any upgrades made in the site"></textarea>
										</div>
										<?php print $siteControl->GetAnnouncementError(); ?>								
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
							</div>

							<div class = "form-group">
								<div class="">
										
										<label for="news">News</label>
										<div class="form-group form-inline">
											<div>
												<label for="newsTitle" class="sr-only"> News Title </label>
												<input type="text" id="newsTitle" name="newsTitle" class="form-control" placeholder="News Title" data-toggle="tooltip" title="This is the title of the news." />																						
											</div>	
											<?php print $siteControl->GetNewsTitleError(); ?>								
										</div>
										<div class="form-group">
											<textarea rows="7" id="news" name="news" class="form-control" placeholder="Enter Site News Here. "></textarea>
										</div>
										<?php print $siteControl->GetNewsError(); ?>								
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
							</div>

							<hr>
							
							<div class = "form-group form-inline">
									<button type="submit" id="preview" name="preview" value="preview" class="btn  btn-default btn-sm" >Preview</button>                
									<button type="submit" id="save" name="save" value="save" class="btn btn-primary btn-sm" >Submit</button>           
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
							<form method="POST" enctype="multipart/form-data">
							
								<hr>
								<span id="pollOptions" class="pq-offset-anchor">					
									<h3 class="pq-offset-anchor">Create Category Poll</h3>
								</span>	
								<hr>
								
								<?php print $element->GetPollForm($categoryControl->GetCategoryPollError()); ?>								
								<hr>								
								<span id="approveOptions" class="pq-offset-anchor">					
									<h3 class="pq-offset-anchor"> Create Category </h3>
								</span>
								<hr>								
								
								<?php print $categoryControl->DisplayPollResult($categoryControl->GetPollResultError()); ?>								
								
								<div class = "form-group">
									
								</div>
																
								<hr> 
								
								<div class = "form-group form-inline">										                
										<button type="submit" id="saveCategory" name="saveCategory"  class="btn btn-primary btn-sm" >Submit</button>           
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
                    <p>Copyright &copy; Team CMC 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
		$('a[data-toggle="tab"]').on('hidden.bs.tab', function (e) {
		  $('.category-instruction').toggle();
		  $('.welcome-instruction').toggle();
		})

		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})

    </script>
</body>

</html>
