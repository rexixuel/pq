<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People's Q! Messages</title>

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
$element->SetSidebar2Active("active");
$element->SetUser($user);
print $element->GetHeader();

?>			
    <!-- Start Modal -->
    <!-- alert modal -->
    <div class="modal fade" id="confirmDowngrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog ">

            <div class="modal-content alert alert-dismissible alert-danger" role="alert">
                    <form class="form-group form-horizontal" action="" method="POST">
                        <label><i class="fa fa-exclamation-triangle"></i> Are you sure you want to DOWNGRADE User(s)? </label>

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
                <h1 class="page-header"> <i class="fa fa-users"></i> User Management
				<small> Downgrade Users</small>
				<div class="pq-page-instruction">
					<small class="pq-page-instruction"> Click on 'Downgrade' button to downgrade selected user(s).</small>
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
                        print $element->GetSidebar('','','','','','','active');
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
            	<table class="table table-hover table-striped">
        			<thead >
        				<tr class="info">
                            <!--<th> <a href="#"> All <span class="caret"> </span> </a> </th>  -->                          
                            <th> <label>
                                    <input type="checkbox" name="usersAll" id="usersAll" data-toggle="tooltip" title="Click here to select ALL"/>   
                                     <a href="#"> Username <span class="caret"> </span> </a> 
                                 </label>
                            </th>
        					<th> <a href="#"> Months Unpaid <span class="caret"> </span> </a> </th>        					
                            <th>  Options  
                                    <span data-toggle="tooltip" data-placement="top" title="Downgrade Selected Users" style="margin-left:10px;"> 
                                        <a href="#" data-target="#confirmDowngrade" class="btn btn-danger btn-xs" data-toggle="modal"> <i class="fa fa-undo"> </i> </a> 
                                    </span> 
                            </th> 

    					</tr>
        			</thead>
                    <form class="form-group">
                		<tbody class="">
                			<tr class="active">
                                <!--<td class="input-group form-inline"> <input type="checkbox" class="checkbox" name="message1" id="messages"/></td>-->
                                <?php
                				  print '<td>
                                            <label>
                                                <input type="checkbox" name="user1" id="user1" class="users"/>
                                                <i class="fa fa-user"></i>
                                                <a href="#"> User 1 </a>
                                            </label>
                                         </td>';
                                ?>
                                <td> <time> 3 month(s) </time></td>                             
                                <td>
                                    <span data-toggle="tooltip" data-placement="top" title="Downgrade User" style="margin-left:10px;"> 
                                        <a href="#" data-target="#confirmDowngrade" class="btn btn-danger btn-xs" data-toggle="modal"> <i class="fa fa-undo"></i> </a> 
                                    </span> 
                                </td>                                
                            </tr>
                            <tr>
                                <!--<td class="input-group form-inline"> <input type="checkbox" class="checkbox" name="message2" id="messages"/></td>-->
                                <?php
                                  print '<td>
                                            <label>
                                                <input type="checkbox" name="message2" id="message2" class="users"/>       
                                                <i class="fa fa-user"></i>
                                                <a href="#"> User 2 </a>
                                            </label>
                                         </td>';
                                ?>
                				<td> <time> 2 month(s) </time></td>                				
                                <td>
                                    <span data-toggle="tooltip" data-placement="top" title="Downgrade User" style="margin-left:10px;"> 
                                        <a href="#" data-target="#confirmDowngrade" class="btn btn-danger btn-xs" data-toggle="modal"> <i class="fa fa-undo"></i> </a> 
                                    </span> 
                                </td>                                
            				</tr>        				
            			</tbody>
                    </form>
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
        $('#usersAll').click(function() {
            
          if($('#usersAll').is(':checked')){
            $('.users').prop('checked', true);
          }else{
            $('.users').prop('checked', false);            
          }    
        });    
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
</body>

</html>
