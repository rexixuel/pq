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
                <h1 class="page-header"> <i class="fa fa-search"></i> Sinigang na Lechon
            		<small> reviewed by username </small>
            		<div class="pq-page-instruction">
            			<small class="pq-page-instruction"> 
            				<ul class="list-unstyled">
            					<li> Click on tabs to view review for each criteria. </li>
            				
            					<li> Click 'Reply' and enter message to post comment. Click 'Send' to submit comment. </li>
        					</ul>
            			</small>
            		</div>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <?php
                      print '<li> <a href="category-2.php?username='.$user.'">Food and Restaurant</a>
                    		</li>';
                    ?>
                    <li class="active">Sinigang na Lechon
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
                		<h5 class="pq-carousel-header"> <strong> Message the Mods! </strong> </h5>
                		<div class="list-group" style="margin-top:10px;">
                			<a href="#" data-container="body" data-toggle="modal" data-recipient="@Jolli Man" data-target="#reply" 
                			class="list-group-item"><i class="fa fa-key"></i> Jolli Man </a>

                			<a href="#" data-container="body" data-toggle="modal" data-recipient="@Mc Donny" data-target="#reply" 
                			class="list-group-item"><i class="fa fa-key"></i> Mc Donny </a>

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
            	        <div class="panel panel-primary">
            	            <div class="panel-heading">Sinigang Na Lechon</div>
            	                <div class="panel-body">
            	                    <p><img src='../img/sinigawanglechon.jpeg'/></p> 
            	                    <b>Nutrition Information/serving:</b>
            	                    <p>One of a kind Filipino recipe! Roasted suckling pig and fresh vegetables simmered in tamarind broth.</p>
            	                    <p>Calories 258, Carbohydrates 8g, Protein 25g, Fat 14g, Vitamin C 13mg, Iron 2mg, Vitamin A 358mcg</p>
            	                     
            	                    <p>To lessen fat intake when the soup is cold remove the layer of fat that has formed on the surface and reheat before serving.</p>
            	                     
            	                    <p>Lechon's crispy brown skin is the result of the high temperature during roasting which cannot be achieved in other cooking methods. This gives the aroma and meaty flavor of roasted meats. So when used in stewed or simmered dishes like sinigang it adds a depth of flavor to the dish.</p>
            	                </div>
            	                
            	                <div class="panel-footer">

            	                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
            	                    
            	                        <div class="btn-group" role="group">
            	                            <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-thumbs-up"></i> Up</button>
            	                        </div>
            	                    
            	                        <div class="btn-group" role="group">
            	                            <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-thumbs-down"></i> Down</button>
            	                        </div>                    
            	                    </div>

            	                </div>
            	            </div>

            	<div class="container">
            	  <div class="row">
            	    <div class="col-md-8">
            	      <h2 class="page-header">Comments</h2>
            	        <section class="comment-list">
            	          <!-- First Comment -->
            	          <div class="row">
            	            <div class="col-md-2 col-sm-2 hidden-xs">
            	              <figure class="thumbnail">
            	                
            	                <figcaption class="text-center">username</figcaption>
            	              </figure>
            	            </div>
            	            <div class="col-md-10 col-sm-10">
            	              <div class="panel panel-default arrow left">
            	                <div class="panel-body">
            	                  <header class="text-left">
            	                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
            	                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
            	                  </header>
            	                  <div class="comment-post">
            	                    <p>
            	                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            	                    </p>
            	                  </div>
            	                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
            	                </div>
            	              </div>
            	            </div>
            	          </div>
            	          <!-- Second Comment Reply -->
            	          <div class="row">
            	            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
            	              <figure class="thumbnail">
            	                
            	                <figcaption class="text-center">username</figcaption>
            	              </figure>
            	            </div>
            	            <div class="col-md-9 col-sm-9">
            	              <div class="panel panel-default arrow left">
            	                <div class="panel-heading right">Reply</div>
            	                <div class="panel-body">
            	                  <header class="text-left">
            	                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
            	                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
            	                  </header>
            	                  <div class="comment-post">
            	                    <p>
            	                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            	                    </p>
            	                  </div>
            	                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
            	                </div>
            	              </div>
            	            </div>
            	          </div>
            	          <!-- Third Comment -->
            	          <div class="row">
            	            <div class="col-md-10 col-sm-10">
            	              <div class="panel panel-default arrow right">
            	                <div class="panel-body">
            	                  <header class="text-right">
            	                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
            	                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
            	                  </header>
            	                  <div class="comment-post">
            	                    <p>
            	                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            	                    </p>
            	                  </div>
            	                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
            	                </div>
            	              </div>
            	            </div>
            	            <div class="col-md-2 col-sm-2 hidden-xs">
            	              <figure class="thumbnail">
            	                
            	                <figcaption class="text-center">username</figcaption>
            	              </figure>
            	            </div>
            	          </div>
            	          <!-- Fourth Comment -->
            	          <div class="row">
            	            <div class="col-md-2 col-sm-2 hidden-xs">
            	              <figure class="thumbnail">
            	                
            	                <figcaption class="text-center">username</figcaption>
            	              </figure>
            	            </div>
            	            <div class="col-md-10 col-sm-10 col-xs-12">
            	              <div class="panel panel-default arrow left">
            	                <div class="panel-body">
            	                  <header class="text-left">
            	                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
            	                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
            	                  </header>
            	                  <div class="comment-post">
            	                    <p>
            	                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            	                    </p>
            	                  </div>
            	                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
            	                </div>
            	              </div>
            	            </div>
            	          </div>
            	          <!-- Fifth Comment -->
            	          <div class="row">
            	            <div class="col-md-10 col-sm-10">
            	              <div class="panel panel-default arrow right">
            	                <div class="panel-body">
            	                  <header class="text-right">
            	                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
            	                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
            	                  </header>
            	                  <div class="comment-post">
            	                    <p>
            	                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            	                    </p>
            	                  </div>
            	                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
            	                </div>
            	              </div>
            	            </div>
            	            <div class="col-md-2 col-sm-2 hidden-xs">
            	              <figure class="thumbnail">
            	                
            	                <figcaption class="text-center">username</figcaption>
            	              </figure>
            	            </div>
            	          </div>
            	          <!-- Sixth Comment Reply -->
            	          <div class="row">
            	            <div class="col-md-9 col-sm-9 col-md-offset-1 col-md-pull-1 col-sm-offset-0">
            	              <div class="panel panel-default arrow right">
            	                <div class="panel-heading">Reply</div>
            	                <div class="panel-body">
            	                  <header class="text-right">
            	                    <div class="comment-user"><i class="fa fa-user"></i> username</div>
            	                    <time class="comment-date" datetime="16-12-2015 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2015</time>
            	                  </header>
            	                  <div class="comment-post">
            	                    <p>
            	                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            	                    </p>
            	                  </div>
            	                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
            	                </div>
            	              </div>
            	            </div>
            	            <div class="col-md-2 col-sm-2 col-md-pull-1 hidden-xs">
            	              <figure class="thumbnail">            	                
            	                <figcaption class="text-center">username</figcaption>
            	              </figure>
            	            </div>
            	          </div>
            	        </section>
            	    </div>
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
