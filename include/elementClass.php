<?php

class ConstantElements{
		public $homeActive;
		

	public function GetHeader(){
		$header = '	<!-- Navigation -->
		<!-- The Header  FIXED-->

		<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container">				

			<div class="row">	
			<!-- start row -->
				<div class="col-sm-11 col-md-11 ">
						<div class="navbar-header pq-navbar-header" >

						<div class="btn-group pull-right pq-responsive-user-menu"  >
								<button type="button" class="btn pq-btn-user dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-list-alt"></i> Menu
								</button>
								<ul class="dropdown-menu dropdown-menu-right " role="menu">
									<li> <a href="post-review.php"> Post Review </a> </li>
									<li> <a href="account-mgt.php"> Account Management </a> </li>
									<li> <a href="messages.php"> Messages <span class="badge">2</span></a> </li>
								</ul>
							</div>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand pq-navbar-brand" href="index-mock-reg-user.php"> <img src="img/pq-logo.png" /> </a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->		
						<div class="collapse navbar-collapse" id="navbarCollapse">
							<ul class="nav navbar-nav">
					
								<li '.$this->homeActive.'><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
								<li><a href="categories.php"><span class="glyphicon glyphicon-list"></span> Categories</a></li>
								<li><a href="faq.php" ><span class="glyphicon glyphicon-star"></span> FAQs</a></li>				
								<li><a href="about.php" ><span class="glyphicon glyphicon-star"></span> About Us</a></li>
								 <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Log Out</a></li>
							</ul>
							
							
								<div class="col-sm-3 col-md-3 pull-right" style="margin-right:0px;">
									<form class="navbar-form navbar-search" action="browse-review.php" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search keyword...." name="srch-term" id="srch-term">
										<div class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
										</div>
									</div>
									</form>				
								</div>							
						</div>
				</div>
				<div class="col-sm-1 col-md-1 pq-responsive-hide " style="margin-left:0px;">
					<div class="btn-group" >
						<button type="button" class="btn pq-btn-user dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-list-alt"></i> Menu
						</button>
						<ul class="dropdown-menu dropdown-menu-right " role="menu">
							<li> <a href="post-review.php"> Post Review </a> </li>
							<li> <a href="account-mgt.php"> Account Management </a> </li>
							<li> <a href="messages.php"> Messages <span class="badge">2</span></a> </li>
						</ul>
					</div>
				</div>			
			<!-- end row -->
			</div>
		</nav>   
		<!-- End of Header -->';
		return $header;
	}
	
	public function SetHomeActive($active){
		$this->homeActive = 'class = "'.$active.'" ';
	}
}
?>