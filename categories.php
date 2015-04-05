<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q! Review Management</title>

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
if(!empty($_GET['username'])){

    $user = $_GET['username'];
}

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

<!-- End Login Modal -->

	<!-- alert modal -->
    <div class="modal fade" id="confirmUnsubscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog ">

            <div class="modal-content alert alert-dismissible alert-danger" role="alert">
                    <form class="form-group form-horizontal" action="" method="POST">
                        <label><i class="fa fa-exclamation-triangle"></i> Are you sure you want to DELETE Post(s)? </label>

                        <button type="submit" class="btn btn-danger"> Yes </button>
                        <button type="submit" class="btn btn-warning"> No </button>
                    </form>
                
            </div>
      </div>
    </div>
<!-- end alert modal -->

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><i class="fa fa-list-ul"></i> Categories
				<small> All Reviews </small>
				<div class="pq-page-instruction">
					<small class="pq-page-instruction"> 
                        <ul class="list-unstyled">
                            <li>Click on category to view reviews.</li>
                            <li> Click on 'Subscribe' or 'Unsubscribe' to subscribe or unsubscribe from category </li>
                        </ul>
                    </small>
				</div>
                </h1>
				
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Messages
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
                        print $element->GetSidebar('','active','','','','');
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
                <form class="form-group">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                                <div class="form-group form-inline">
                                    <label> See: </label>
                                    <div class="btn-group" data-toggle="buttons">
                                      <label class="btn btn-primary btn-sm">
                                        <input type="radio" autocomplete="off" id="subFilter" class="success"> Subscribed
                                      </label>
                                      <label class="btn btn-info btn-sm active">
                                        <input type="radio" autocomplete="off" id="subFilter" class="danger" checked> ALL
                                      </label>
                                    </div>
                                </div>                                
                        </div>
                        <div class="col-lg-6 col-sm-6">                                
                                <div class="form-group btn-group form-inline">
                                    <label> Subscription Options: </label>
                                    <span data-toggle="tooltip" data-placement="top" title="Unsubscribe from selected categories" style="margin-left:10px;"> 
                                            <a href="#" data-target="#confirmUnsubscribe" class="btn btn-danger btn-sm" data-toggle="modal"> <i class="fa fa-sign-out"></i> Unsubscribe</a> 
                                     </span>
                                     <span data-toggle="tooltip" data-placement="top" title="Subscribe to selected categories"> 
                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"> <i class="fa fa-sign-in"></i> Subscribe</a> 
                                     </span> 
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">                                

                                <div class="form-group form-inline">
                                    <div class="">
                                        <label for="searchMessages"> Search: </label>
                                        <input type="text" id="searchMessages" class="form-control" placeholder="Enter keyword" required>                        
                                        <select class="form-control">
                                            <option class="form-control"> Categories </option>
                                            <option class="form-control"> Subscription </option>
                                        </select>
                                    </div>
                                </div>
                        </div>                        
                    </form>                     
                    <!--
                    <div class="col-lg-8 col-sm-8">

                        <form class="form-group">
                            <div class="form-group form-inline">
                                <label> Sort by: </label>
                                <div class="btn-group" data-toggle="buttons">
                                  <label class="btn btn-primary">
                                    <input type="checkbox" autocomplete="off" class="" checked> Category
                                  </label>
                                  <label class="btn btn-success active">
                                    <input type="checkbox" autocomplete="off" class="success" checked> Worth It?
                                  </label>
                                  <label class="btn btn-danger">
                                    <input type="checkbox" autocomplete="off" class="danger"> Not Worth It?
                                  </label>
                                </div>
                            </div>
                        </form>
                    </div>-->
                </div>                
            	<table class="table table-condensed table-hover table-striped">
        			<thead >
        				<tr class="info">
                            <!--<th> <a href="#"> All <span class="caret"> </span> </a> </th>  -->                          
        					<th> 
                                <a href="#"> Categories <span class="caret"> </span> </a> 
                            </th>
        					<th> <a href="#"> Description <span class="caret"> </span> </a> </th> 
                            <th> <a href="#"> Subscription <span class="caret"> </span> </a> 
                            </th>
                            <th>
                                    <a href="#"> # of Worth It? <span class="caret"> </span> </a> 
                            </th>
                            <th>
                                    <a href="#"> # of Not Worth It? <span class="caret"> </span> </a> 
                            </th>                            
    					</tr>
        			</thead>
            		<tbody class="">
                        <form class="form-group">                            
                			<tr>
                                <!-- <td class="input-group form-inline"> <input type="checkbox" class="checkbox" name="review1" id="reviews"/> </td>-->
                                <?php
                				  print '<td class=""> 
                                  
                                    <label>
                                        <input type="checkbox" name="review1" id="review1" class="reviews"/>  
                                        <a href="category-1.php?username='.$user.'"> Games </a> 
                                    </label>
                                 
                                   </td>';
                                ?>
                				<td> Description extracted from category setup </td>
                                 <td><span data-toggle="tooltip" data-placement="left" title="Unsubscribe to categories"> 
                                        <a href="#" data-target="#confirmUnsubscribe" class="btn btn-danger btn-xs" data-toggle="modal"> <i class="fa fa-sign-out"></i> Unsubscribe</a> 
                                     </span>
                                     <!--<span data-toggle="tooltip" data-placement="right" title="Edit Post"> -->
                                        <?php
                                        // print '<a href="edit-post-1.php?username='.$user.'" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i> Subscribe </a>';
                                        ?>
                                     <!--</span>-->
                                </td>
                                <td>
                                    55
                                </td>
                                <td>
                                    100
                                </td>
            				</tr>
                			<tr>
                                <!--<td class="input-group form-inline"> <input type="checkbox" class="checkbox" name="review2" id="reviews"/> </td>-->
                				<?php
                                  print '<td class=""> 
                                  <label>
                                    <input type="checkbox" name="review2" id="review2" class="reviews"/> 
                                    <a href="category-2.php?username='.$user.'"> Food and Restaurant </a>
                                  </label>
                                  </td>';
                                ?>
                                <td> Description extracted from category setup </td>
                                <td><!--<span data-toggle="tooltip" data-placement="left" title="Delete Post">
                                        <a href="#" data-target="#confirmUnsubscribe" class="btn btn-danger btn-xs" data-toggle="modal"> <i class="fa fa-sign-out"></i> </a>
                                    </span>-->
                                    <span data-toggle="tooltip" data-placement="left" title="Subscribe to categories">
                                        <?php
                                         print '<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-sign-in"></i> Subscribe </a>';
                                         ?>
                                    </span>
                                </td>
                                <td>
                                    110
                                </td>
                                <td>
                                    40
                                </td>                                
            				</tr>
                        </form>
        			</tbody>
        		</table>
        		<div class="col-lg-4 col-sm-4">

        		</div>
        		<div class="col-lg-4 col-sm-4">
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
            <hr>
        </div>
        <!-- /.row -->
        

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

    <script type="text/javascript">
        $('#reviewAll').click(function() {
            
          if($('#reviewAll').is(':checked')){
            $('.reviews').prop('checked', true);
          }else{
            $('.reviews').prop('checked', false);            
          }    
        });    

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        
    </script>

</body>

</html>
