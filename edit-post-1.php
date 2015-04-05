<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q! Post Review</title>

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

$user = $_GET['username'];

$element = new ConstantElements();

$element->SetUser($user);
print $element->GetHeader();


?>			
	<!-- Start Modal -->
    <!-- Start Login Modal -->
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
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" />
                            </div>
                        </div>
                        <div class = "form-group">
                            <div class="">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Password" />
                            </div>
                        </div>
                        <div class = "form-group form-inline">
                                <button type="submit" class="btn btn-primary btn-sm" >Sign In</button>
                                <a href="signup.php"> <large> Sign Up Now! </large> </a>
                        </div>
                        <a href="signup.php"> <small> Forgot your password? </small></a>
                        </form>
                </div>
        </div>
   </div>
</div>
<!-- End Login Modal -->


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> <i class="glyphicon glyphicon-edit"></i> Edit Review
				<small> Sinigang na Lechon </small>
				<div class="pq-page-instruction">
					<small class="pq-page-instruction"> Enter description for product to be reviewed.
					<br />
					Assign number of stars for each criteria and add details of review for each criteria in the text area. 
					Overall stars are automatically computed - enter details for overall review. 
					<br />
					Click 'Update' to finalize changes. </small>
				</div>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <?php
	                  print '<li class=""> <a href="review-mgt.php?username='.$user.'"> Review Management </a> </li>';
                    ?>
                    
                    <li class="active">Edit Review
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
                    <?php						
						print $element->GetSidebar('','','','active','','');
                    ?>
                    
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

						<ul class="nav nav-pills">
							<li> <a href="#description"> Description  </a> </li>
							<li> <a href="#review"> Review </a> </li>							
						</ul> 
				
						<form>

							<hr>
							<span id="description" class="pq-offset-anchor">					
								<h3 class="pq-offset-anchor">Description</h3> 
							</span>
							<hr>

							<div class = "form-group">
								<div class="">
										<label for="productName">Product Name</label>
									
										<input type="text" id="productName" class="form-control" placeholder="Product Name" value="Sinigang na Lechon" required>
								</div>
							</div>

							<div class = "form-group">
								<div class="">
										<label for="category">Category</label>

										
										<input list = "categoryList" type="text" id="category" class="form-control" placeholder="Category" required value="Food and Restaurant">
								</div>
							</div>
							
							<div class = "form-group">
								<div class="">
										<label for="descriptionText">Product Description</label>
										<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
										<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>
										
										<textarea id="descriptionText" class="form-control" placeholder="Enter product description or introduction here. Use provided HTML5 tags for formatting." required rows="7">
<b>Nutrition Information/serving:</b>
<p>One of a kind Filipino recipe! Roasted suckling pig and fresh vegetables simmered in tamarind broth.</p>
<p>Calories 258, Carbohydrates 8g, Protein 25g, Fat 14g, Vitamin C 13mg, Iron 2mg, Vitamin A 358mcg</p> <p>To lessen fat intake when the soup is cold remove the layer of fat that has formed on the surface and reheat before serving.</p>

<p>Lechon's crispy brown skin is the result of the high temperature during roasting which cannot be achieved in other cooking methods. This gives the aroma and meaty flavor of roasted meats. So when used in stewed or simmered dishes like sinigang it adds a depth of flavor to the dish.</p>
										</textarea>
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
							
							<div class = "form-group">
								<div class="">
										<label for="productImage">Product Image</label>
										<input type="file" id="productImage" />
										
										<p class="help-block"> Upload Product Image </p>
								</div>
							</div>						
							
							<hr>
							<span id="review" class="pq-offset-anchor">					
								<h3 class="pq-offset-anchor">Review</h3>
							</span>
							<hr>
							<div class = "form-group">
								<div class="">
										<label for="criteria1" style = "clear: right;">Criteria 1</label>
										<input id="criteriaStar1" type="number" class="rating" data-size="xs" style="" required/>
										<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
										<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>
																				
										
										<textarea rows="7" id="criteria1" class="form-control" placeholder="Enter review details for Criteria 1" required></textarea>
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
							
							<div class = "form-group">
								<div class="">
										<label for="criteria2">Criteria 2</label>
										<input id="criteriaStar2" type="number" class="rating" data-size="xs" style="" required/>
										
										<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
										<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>
																				
										<textarea rows="7" id="criteria2" class="form-control" placeholder="Enter review details for Criteria 2" required></textarea>
								</div>
								
								<div class="pq-format-tags">
									<label> <small> Format: </small> </label>
									<a href=""> <code> List </code> </a>
									<a href=""> <code> Header 1 </code> </a>
									<a href=""> <code> Header 2 </code> </a>
									<a href=""> <code> Header 3 </code> </a>
									<a href=""> <code> Large Font </code> </a>
									<a href=""> <code> Small Font </code> </a>
								</div>
								
							</div>
							<div class="form-group">
								<div class="">									
										<label for="criteria3">Criteria 3</label>
										<input id="criteriaStar3" type="number" class="rating" data-size="xs" style="" required/>
										
										<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
										<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>
																				
										
										<textarea rows="7" id="criteria3" class="form-control" placeholder="Enter review details for Criteria 3" required></textarea>
								</div>
								
								<div class="pq-format-tags">
									<label> <small> Format: </small> </label>
									<a href=""> <code> List </code> </a>
									<a href=""> <code> Header 1 </code> </a>
									<a href=""> <code> Header 2 </code> </a>
									<a href=""> <code> Header 3 </code> </a>
									<a href=""> <code> Large Font </code> </a>
									<a href=""> <code> Small Font </code> </a>
								</div>
								
							</div>
							<div class = "form-group">
								<div class="">
										<label for="criteria4">Criteria 4</label>
										<input id="criteriaStar4" type="number" class="rating" data-size="xs" style="" required/>
										
										<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
										<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>
																				
										
										<textarea rows="7" id="criteria4" class="form-control" placeholder="Enter review details for Criteria 4" required></textarea>
								</div>
								
								<div class="pq-format-tags">
									<label> <small> Format: </small> </label>
									<a href=""> <code> List </code> </a>
									<a href=""> <code> Header 1 </code> </a>
									<a href=""> <code> Header 2 </code> </a>
									<a href=""> <code> Header 3 </code> </a>
									<a href=""> <code> Large Font </code> </a>
									<a href=""> <code> Small Font </code> </a>
								</div>
								
							</div>
							<div class = "form-group">
								<div class="">
										<label for="criteria5">Criteria 5</label>
										<input id="criteriaStar5" type="number" class="rating" data-size="xs" style="" required/>
										
										<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
										<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>
																				
										
										<textarea rows="7" id="criteria5" class="form-control" placeholder="Enter review details for Criteria 5" required></textarea>
								</div>
								
								<div class="pq-format-tags">
									<label> <small> Format: </small> </label>
									<a href=""> <code> List </code> </a>
									<a href=""> <code> Header 1 </code> </a>
									<a href=""> <code> Header 2 </code> </a>
									<a href=""> <code> Header 3 </code> </a>
									<a href=""> <code> Large Font </code> </a>
									<a href=""> <code> Small Font </code> </a>
								</div>
								
							</div>
							
							<hr>
							
							<h3 id="">Overall</h3>

							<hr>
							
							<div class = "form-group">
								<div class="">
										<label for="overall">Overall Review</label>
										<input id="overallStar" type="number" class="rating" data-size="xs" style="" />
										
										<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
										<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>
										
										
										<textarea rows="7" id="overall" class="form-control" placeholder="Enter overall review details - this could inlcude summary, conclusions or final thoughts on the product. Use provided HTML5 tags for formatting."required ></textarea>
										
								</div>
								<div class="pq-format-tags">
									<label> <small> Format: </small> </label>
									<a href=""> <code> List </code> </a>
									<a href=""> <code> Header 1 </code> </a>
									<a href=""> <code> Header 2 </code> </a>
									<a href=""> <code> Header 3 </code> </a>
									<a href=""> <code> Large Font </code> </a>
									<a href=""> <code> Small Font </code> </a>
								</div>
							</div>
														
							<hr>
							
							<div class = "form-group form-inline">										                
									<button type="submit" class="btn btn-primary btn-sm" >Update</button>
							</div>
							
						</form>
															
						<ul class="nav nav-pills">
							<li> <a href="#description"> Description  </a> </li>
							<li> <a href="#review"> Review </a> </li>							
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
                                <a id="example" href="#" class="" data-container="body" data-toggle="modal" data-target="#myModal">
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
