<?php

class ConstantElements{
		public $homeActive;
		public $user;
		public $menu;
		public $menuButton;
		public $menuResponsive;
		public $log;
		public $userIndex;
		public $sidebar;
		public $userSidebar;
		public $userSidebarActive;
		public $userSidebar2;
		public $userSidebar2Active;
		public $callToAction;
		public $categoryDropDown;
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
							'.$this->menuResponsive.'
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand pq-navbar-brand" href="'.$this->userIndex.'"> <img src="img/pq-logo.png" /> </a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->		
						<div class="collapse navbar-collapse" id="navbarCollapse">
							<ul class="nav navbar-nav">
					
								<li '.$this->homeActive.'><a href="'.$this->userIndex.'"><span class="glyphicon glyphicon-home"></span> Home</a></li>
								<li class="dropdown">
									<a href="categories.php" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-list"></span> Categories <span class="caret"> </span> </a>
									<ul class="dropdown-menu" role="menu">'.$this->categoryDropDown.'
								  </ul>
								</li>
								<li><a href="about.php" ><i class="fa fa-bookmark-o"></i> About Us</a></li>
								<li><a href="faq.php" ><span class="glyphicon glyphicon-star"></span> FAQs</a></li>				
								 '.$this->log.'
							</ul>
							
							
								<div class="col-sm-3 col-md-3 pull-right" style="margin-right:0px;">
									<form class="navbar-form navbar-search" action="browse-review.php?username='.$this->user.'" method="GET" role="search">
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
				'.$this->menuButton.'
			<!-- end row -->
			</div>
		</nav>   
		<!-- End of Header -->';
		return $header;
	}
	public function SetUser($user){
		$this->user  = $user;
		$this->categoryDropDown ='	<li><a href="categories.php?categoryKey=">Gaming</a></li>
							    	<li><a href="categories.php?categoryKey=">Music</a></li>
									<li><a href="categories.php?categoryKey=">Gadgets</a></li>
									<li class="divider"></li>
									<li><a href="categories.php">See All Subscription</a></li>';		
		if ($user == "Regular User" )
		{
			$this->menu = '<li> <a href="account-mgt.php?username='.$user.'"> Account Management </a> </li>';
			$this->userIndex = 'index-mock-reg-user.php';
			$this->userSidebar = '<a href="account-mgt.php?username='.$user.'" class="list-group-item"> Account Management </a>';
			$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="account-mgt.php">Upgrade Now!</a>';
		}
		else
			if ($user == "moderator")
			{
				$this->menu = '<li> <a href="mod-dashboard.php">  Category Set-up </a> </li>
							   <li> <a href="account-mgt.php?username='.$user.'"> Account Management </a> </li>';		
				$this->userIndex = 'index-mock-moderator.php';
				$this->userSidebar = '<a href="mod-dashboard.php" class="list-group-item '.$this->userSidebarActive.'"> Category Set-up </a>';
				$this->userSidebar2 = '<a href="account-mgt.php?username='.$user.'" class="list-group-item '.$this->userSidebar2Active.'"> Account Management </a>';
				$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="account-mgt.php">Upgrade Now!</a>';

			}
			else
				if ($user == "admin")
				{
					$this->menu = '<li> <a href="admin-dashboard.php"> Site Set-up </a> </li>';		
					$this->userIndex = 'index-mock-admin.php';
					$this->userSidebar = '<a href="admin-dashboard.php" class="list-group-item '.$this->userSidebarActive.'"> Site-setup </a>';
					$this->userSidebar2 = '<a href="user-mgt.php?username='.$user.'" class="list-group-item '.$this->userSidebar2Active.'"> User Management </a>';
					$this->callToAction = '';

				}
				else
				{
					$this->userIndex = 'index.php';					
					$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="signup.php">Signup Now!</a>';
					$this->categoryDropDown = '<li class=""><a href="fnr.php">Food and Restaurants</a></li>
                        <li><a href="sports.php">Sports</a></li>
                        <li><a href="entertainment.php">Entertainment & Movies</a></li>
                        <li><a href="hnf.php">Health and Fitness</a></li>
                        <li><a href="music.php">Music</a></li>
                        <li><a href="olgames.php">Online Games</a></li>
                        <li><a href="socialnet.php">Social Networking</a></li>
                        <li class="divider"></li>
                        <li><a href="allcategories.php">See All..</a></li>';
				}
	
		if($user == "Regular User" || $user == "admin" || $user == "moderator")
		{
			$this->menuButton = '<div class="col-sm-1 col-md-1 pq-responsive-hide " style="margin-left:0px;">
			<div class="btn-group" >
				<button type="button" class="btn pq-btn-user dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-list-alt"></i> Menu <span class="badge">2</span></a>
				</button>
				<ul class="dropdown-menu dropdown-menu-right " role="menu">
				  <li role="presentation" class="dropdown-header">Hi '.$this->user.'!</li>
				  <li role="presentation" class="divider"></li>
				  '.$this->menu.'
				  <li> <a href="browse-review.php?username='.$this->user.'">Browse All Reviews</a> </li>
                  <li> <a href="categories.php?username='.$this->user.'">Browse Reviews By Category</a> </li>
				  <li> <a href="post-review.php?username='.$this->user.'"> Post Review </a> </li>
										
					<li> <a href="review-mgt.php?username='.$this->user.'"> Review Management </a> </li>
					<li> <a href="messages.php?username='.$this->user.'"> Messages <span class="badge">2</span></a> </li>
				</ul>
			</div>
		</div>';
		
			$this->menuResponsive = '<div class="btn-group pull-right pq-responsive-user-menu"  >
								<button type="button" class="btn pq-btn-user dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-list-alt"></i> Menu <span class="badge">2</span></a>
								</button>
								<ul class="dropdown-menu dropdown-menu-right " role="menu">
									<li role="presentation" class="dropdown-header">Hi '.$this->user.'!</li>
									<li role="presentation" class="divider"></li>
									'.$this->menu.'
				  					<li> <a href="browse-review.php?username='.$this->user.'">Browse All Reviews</a> </li>
                  <li> <a href="categories.php?username='.$this->user.'">Browse Reviews By Category</a> </li>
				  <li> <a href="post-review.php?username='.$this->user.'"> Post Review </a> </li>						
					<li> <a href="review-mgt.php?username='.$user.'"> Review Management </a> </li>
					<li> <a href="messages.php?username='.$this->user.'"> Messages <span class="badge">2</span></a> </li>
								</ul>
							</div>';
			$this->log = '<li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Log Out</a></li>';
		}
		else
			{
				$this->log = '				 <li><a data-toggle="modal" href="#login" data-target=""><span class="glyphicon glyphicon-user"></span> Login</a></li>';
			}
		
	}

	public function GetSidebar($list1,$list2,$list3,$list4,$list5,$list6)
	{
		$this->sidebar = $this->userSidebar.'
    							'.$this->userSidebar2.'
		                    <a href="browse-review.php" class="list-group-item '.$list1.'">Browse All Reviews</a>
                    <a href="categories.php" class="list-group-item '.$list2.'">Browse Reviews By Category</a>

                    	<a href="post-review.php?username='.$this->user.'" class="list-group-item '.$list3.'">Post A Review</a>
                    		   <a href="review-mgt.php?username='.$this->user.'" class="list-group-item '.$list4.'"> Review Management </a>    							
			                   <a href="messages.php?username='.$this->user.'" class="list-group-item '.$list6.'">Messages <span class="badge">2</span></a>
    							';                   
       return $this->sidebar;
	}

	public function GetCallToAction(){
		return $this->callToAction;
	}

	public function SetHomeActive($active){
		$this->homeActive = 'class = "'.$active.'" ';
	}
	public function SetSidebarActive($active){
		$this->userSidebarActive = $active;
	}
	public function SetSidebar2Active($active){
		$this->userSidebar2Active = $active;
	}	

	public function GetReplyModal()
	{
		$replyModal = '	<!-- Start Modal -->
	<!-- reply modal	 -->
    <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="replyLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content pq-modal-body">
                <div class="modal-header pq-modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-title">
                        Reply to Message
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form-group">
	                  <div class="form-group form-inline">
	                       <div class="">									
	                                <label for="recipient">To:</label>
	                                <input type="text" id="recipient" class="form-control" placeholder="Recipient" />
	                        </div>
	                  </div>

                      <div class="form-group form-inline">
                            <div class="">									
                                    <label for="subject">Subject:</label>
                                    <input type="text" id="subject" class="form-control" placeholder="Enter subject here" />
                            </div>
                        </div>
                        <div class = "form-group">
                            <div class="">
                                    <label for="message-body" class="sr-only">Message</label>
                                    <textarea id="message-body" class="form-control" placeholder="Enter message here" row="5"> </textarea>
                            </div>
                        </div>
                        <div class = "form-group form-inline">
                                <button type="submit" class="btn btn-primary btn-sm" > Send </button>
                                <button type="submit" class="btn btn-default btn-sm" > Cancel </button>
                        </div>
                        </form>
                </div>
        </div>
       </div>
    </div>
  <!-- end modal -->';
  		return $replyModal;
	}
}
?>