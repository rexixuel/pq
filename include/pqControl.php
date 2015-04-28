<?php
include('/include/pqDatabase.php');
class userControl{
	public $username;
	public $password; 
	public $email; 
	public $firstName; 
	public $lastName; 
	public $address; 
	public $birthday; // should slashes be stripped?
	public $mobileNumber; 
	public $landlineNumber; 
	public $interests; 
	public $secQuestion;
	public $secAnswer;
	public $payMethodOptions;
	public $paySchedOptions;
	public $user_type_id;
	public $premium_plan_id;
	public $user_detail_id;
	public $security_id;


	public function _construct($userParms = array()){
		if( isset( $userParms['username'] ) ){
			$this->username = stripslashes( strip_tags( $userParms['username'] ) );			
		}

	    if( isset( $userParms['password'] ) ){
	    	 $this->password = stripslashes( strip_tags( $userParms['password'] ) );
	    }

	}	

	public function login($userParms = array()){
		$this->_construct($userParms);
		
		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();
		$pqUser = new user();
		$pqUserType = new userType();


		$pqDatabase->startTransaction($pqConn);
		
		$pqUserSuccess = $pqUser->read($pqConn, $this->username);

		if($pqUserSuccess){
			$pqDatabase->commitTransaction($pqConn);
			$user = $pqUser->fetchUser();
			$passHash = $user->password;			
			// verify password
			if (password_verify($this->password, $passHash)){
				$userType = $pqUserType->read($pqConn, $user['user_type_id']);
				if (session_status() == PHP_SESSION_NONE) {
				    session_start();
				}
				session_regenerate_id(true);
				$_SESSION['logged'] = true;
				$_SESSION['username'] = $user->username;
				$_SESSION['userType'] = $user->user_type_id;
				$_SESSION['userTypeDescription'] = $userType['description'];
			}
			else{
				print '<div class="alert alert-danger" role="alert"> Invalid Username and/or Password</div> '. password_hash($this->password, PASSWORD_BCRYPT). ' : '.$passHash;
			}
		}else{
			$pqDatabase->rollBackTransaction($pqConn);
			print '<div class="alert alert-danger" role="alert"> USER Transaction Error</div>';

		}
	}

	public function register($userParms = array()){
	// re-validate passed parameters
		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();
		$pqUser = new user();
		$userError = false;
		$errAlert = "";
		
		
		if( isset( $userParms['username'] ) ){
			$this->username = stripslashes( strip_tags( $userParms['username'] ) );

			$numberOfUsername = $pqUser->readUsername($pqConn, $this->username);
			
			if($numberOfUsername > 0){
				
				$userError = true;
				$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Username must be unique </div>';
			}


		}else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Username must not be empty </div>';
			$userError = true;			
		}

	    if( isset( $userParms['password'] ) ){
	    	 $this->password = stripslashes( strip_tags( $userParms['password'] ) );
            //uncomment for latest php version
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
	    }else{
			$errAlert =$errAlert. ' <div class="alert alert-danger" role="alert"> Password must not be empty </div>';
			$userError = true;			
		}

	    if( isset( $userParms['email'] ) ){
	    	 $this->email = stripslashes( strip_tags( $userParms['email'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Email must not be empty </div>';
			$userError = true;		
		}		

	    if( isset( $userParms['firstName'] ) ){
	    	 $this->firstName = stripslashes( strip_tags( $userParms['firstName'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> First Name must not be empty </div>';
			$userError = true;			
		}				

	    if( isset( $userParms['lastName'] ) ){
	    	 $this->lastName = stripslashes( strip_tags( $userParms['lastName'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Last Name must not be empty </div>';
			$userError = true;			
		}				


	    if( isset( $userParms['birthday'] ) ){
	    	 $this->birthday = stripslashes( strip_tags( $userParms['birthday'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Birthday must not be empty </div>';
			$userError = true;			
		}		

	    if( isset( $userParms['address'] ) ){
	    	 $this->address = stripslashes( strip_tags( $userParms['address'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Address must not be empty </div>';
			$userError = true;			
		}		

	    if( isset( $userParms['mobileNumber'] ) || isset( $userParms['landlineNumber'] ) ){
	    	 $this->mobileNumber = stripslashes( strip_tags( $userParms['mobileNumber'] ) );
	    	 $this->landlineNumber = stripslashes( strip_tags( $userParms['landlineNumber'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Contact details must not be empty </div>';
			$userError = true;			
		}	

	    if( isset( $userParms['secQuestion'] )  ){
	    	 $this->secQuestion = stripslashes( strip_tags( $userParms['secQuestion'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Security Question must not be empty </div>';
			$userError = true;			
		}	


	    if( isset( $userParms['secAnswer'] )  ){
	    	 $this->secAnswer = stripslashes( strip_tags( $userParms['secAnswer'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Security Answer must not be empty </div>';
			$userError = true;			
		}			

		if( isset( $userParms['premiumToggle'] ) ){
		    if( isset( $userParms['paySchedOptions'] ) && isset( $userParms['payMethodOptions'] ) ){
		    	 $this->paySchedOptions = stripslashes( strip_tags( $userParms['paySchedOptions'] ) );
		    	 $this->payMethodOptions = stripslashes( strip_tags( $userParms['payMethodOptions'] ) );
		    	 
	 	         $pqPremiumPlan = new premiumPlan();
	 			 $pqPremiumPlanSuccess = $pqPremiumPlan->insert($pqConn, $this->paySchedOptions, $this->payMethodOptions);
				 $this->premium_plan_id = $pqPremiumPlan->getLastId($pqConn);

		    }else{
				$errAlert = $errAlert.' <div class="alert alert-danger" role="alert"> Please select a Payment Option and Schedule</div>';
				$userError = true;			
			}				
			$this->user_type_id = 3;
		}else{
			$this->user_type_id = 4;
		}
		$this->interests = $userParms['interests']; //change later to table for category poll aggregates
		if(!$userError){
	        // start transactions:

			$pqDatabase->startTransaction($pqConn);

			$pqUserDetail = new userDetail();			
			$pqSecurity = new security();

			

			$pqUserDetailSuccess = $pqUserDetail->insert($pqConn, $this->firstName, $this->lastName, $this->email, $this->birthday, $this->interests /*temporary, can be shipped to different table*/, 
									$this->address, $this->mobileNumber, $this->landlineNumber);
			$this->user_detail_id = $pqUserDetail->getLastId($pqConn);
			//for test only
			$pqSecuritySuccess = $pqSecurity->insert($pqConn,$this->secQuestion, $this->secAnswer);
			$this->security_id = $pqSecurity->getLastId($pqConn);

			
			$pqUserSuccess = $pqUser->insert($pqConn,$this->username, $this->password, $this->user_type_id, $this->premium_plan_id, $this->user_detail_id, $this->security_id);
			
            if($pqUserDetailSuccess && $pqSecuritySuccess && $pqUserSuccess){
                if (!isset($pqPremiumPlanSuccess) || $pqPremiumPlanSuccess){
                	//commit if successful
                	$pqDatabase->commitTransaction($pqConn);
                	print '<div class="alert alert-success"> User '.$this->username.' successfuly registered! </div>';
    //                $pqConn->commit();
                }
            }else{
            	// rollback if failed
                $pqDatabase->rollBackTransaction($pqConn);
            }
		}else{
            print $errAlert;
        }
  
		//use last id
		// insert write to security
		// insert write to user_details
		// insert write to user

		
	}
}

class elementControl{
		public $homeActive;
		public $user;
		public $userType;
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

	public function GetLoginModal(){
		$loginModal = '<!-- Start Modal -->
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
                    <form id="loginHere" method="POST">
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
                                <button type="submit" name="signIn" value="signin" class="btn btn-primary btn-sm" >Sign In</button>
                                <a href="signup.php"> <large> Sign Up Now! </large> </a>
                        </div>
                        <a href="account-recovery-password.php"> <small> Forgot your password? </small></a>
                        <a href="account-recovery-user.php"> <small> Forgot your username? </small></a>
                        </form>
                </div>
        </div>
   </div>
</div>
<!-- End Modal -->';

	return $loginModal;
	}
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
									<a href="categories.php?" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-list"></span> Categories <span class="caret"> </span> </a>
									<ul class="dropdown-menu" role="menu">'.$this->categoryDropDown.'
								  </ul>
								</li>
								<li><a href="about.php" ><i class="fa fa-bookmark-o"></i> About Us</a></li>
								<li><a href="faq.php" ><span class="glyphicon glyphicon-star"></span> FAQs</a></li>				
								 '.$this->log.'
							</ul>
							
							
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 pull-right" style="margin-right:0px;">
									<form class="navbar-form navbar-search" action="browse-review.php?" method="POST" role="search">
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
	public function SetUser($userType, $username, $userTypeDescription){
		// fix default dropdowns
		$this->userType  = $userType;
		$this->categoryDropDown ='	<li><a href="category-1.php?categoryKey=">Games</a></li>
							    	<li><a href="category-1.php?categoryKey=">Music</a></li>
									<li><a href="category-1.php?categoryKey=">Gadgets</a></li>
									<li class="divider"></li>
									<li><a href="categories.php?">See All Subscription</a></li>';		
		if ($userType == 3 )
		{
			$this->menu = '<li> <a href="account-mgt.php"> Account Management </a> </li>';
			$this->userIndex = 'index-mock-reg-user.php';
			$this->userSidebar = '<a href="account-mgt.php" class="list-group-item"> Account Management </a>';
			$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="account-mgt.php">Upgrade Now!</a>';
		}
		else
			if ($userType == 2)
			{
				$this->menu = '<li> <a href="mod-dashboard.php">  Category Set-up </a> </li>
							   <li> <a href="account-mgt.php"> Account Management </a> </li>';		
				$this->userIndex = 'index-mock-moderator.php';
				$this->userSidebar = '<a href="mod-dashboard.php" class="list-group-item '.$this->userSidebarActive.'"> Category Set-up </a>';
				$this->userSidebar2 = '<a href="account-mgt.php" class="list-group-item '.$this->userSidebar2Active.'"> Account Management </a>';
				$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="account-mgt.php">Upgrade Now!</a>';

			}
			else
				if ($userType == 1)
				{
					$this->menu = '<li> <a href="admin-dashboard.php"> Site Set-up </a> </li>
								   <li> <a href="user-mgt.php"> User Management </a> </li>';			
					$this->userIndex = 'index-mock-admin.php';
					$this->userSidebar = '<a href="admin-dashboard.php" class="list-group-item '.$this->userSidebarActive.'"> Site-setup </a>';
					$this->userSidebar2 = '<a href="user-mgt.php" class="list-group-item '.$this->userSidebar2Active.'"> User Management </a>';
					$this->callToAction = '';

				}
				else
				{
					$this->userIndex = 'index.php';					
					$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="signup.php">Signup Now!</a>';
					$this->categoryDropDown = '<li class=""><a href="category-2.php">Food and Restaurants</a></li>
                        <li><a href="category-1.php">Sports</a></li>
                        <li><a href="category-1.php">Entertainment & Movies</a></li>
                        <li><a href="category-1.php">Health and Fitness</a></li>
                        <li><a href="category-1.php">Music</a></li>
                        <li><a href="category-1.php">Games</a></li>
                        <li><a href="category-1.php">Social Networking</a></li>
                        <li class="divider"></li>
                        <li><a href="categories.php?">See All...</a></li>';
				}
	
		if(!empty($userType))
		{
			$this->menuButton = '<div class="col-sm-1 col-md-1 pq-responsive-hide " style="margin-left:0px;">
			<div class="btn-group" >
				<button type="button" class="btn pq-btn-user dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-list-alt"></i> Menu <span class="badge">2</span></a>
				</button>
				<ul class="dropdown-menu dropdown-menu-right " role="menu">
				  <li role="presentation" class="dropdown-header">Hi '.$username.'!</li>
				  <li role="presentation" class="divider"></li>
				  '.$this->menu.'
				  <li> <a href="browse-review.php?">Browse All Reviews</a> </li>
                  <li> <a href="categories.php??">Browse Reviews By Category</a> </li>
				  <li> <a href="post-review.php?"> Post Review </a> </li>
										
					<li> <a href="review-mgt.php?"> Review Management </a> </li>
					<li> <a href="messages.php?"> Messages <span class="badge">2</span></a> </li>
				</ul>
			</div>
		</div>';
		
			$this->menuResponsive = '<div class="btn-group pull-right pq-responsive-user-menu"  >
								<button type="button" class="btn pq-btn-user dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-list-alt"></i> Menu <span class="badge">2</span></a>
								</button>
								<ul class="dropdown-menu dropdown-menu-right " role="menu">
									<li role="presentation" class="dropdown-header">Hi '.$username.'!</li>
									<li role="presentation" class="divider"></li>
									'.$this->menu.'
				  					<li> <a href="browse-review.php?">Browse All Reviews</a> </li>
                  <li> <a href="categories.php??">Browse Reviews By Category</a> </li>
				  <li> <a href="post-review.php?"> Post Review </a> </li>						
					<li> <a href="review-mgt.php"> Review Management </a> </li>
					<li> <a href="messages.php?"> Messages <span class="badge">2</span></a> </li>
								</ul>
							</div>';
			$this->log = '<li><a href="index.php?log=out"><span class="glyphicon glyphicon-user"></span> Log Out</a></li>';
		}
		else
			{
				$this->log = '<li><a data-toggle="modal" href="#login" data-target=""><span class="glyphicon glyphicon-user"></span> Login</a></li>';
			}
		
	}

	public function GetSidebar($list1,$list2,$list3,$list4,$list5,$list6)
	{
		$userSidebar='';
		if(!empty($this->user))
		{
        	$userSidebar = '<a href="post-review.php?" class="list-group-item '.$list3.'">Post A Review</a>
                    		<a href="review-mgt.php?" class="list-group-item '.$list4.'"> Review Management </a>    							
			                <a href="messages.php?" class="list-group-item '.$list6.'">Messages <span class="badge">2</span></a>';

		}
		$this->sidebar = $this->userSidebar.'
    							'.$this->userSidebar2.'
		                    <a href="browse-review.php?" class="list-group-item '.$list1.'">Browse All Reviews</a>
                    <a href="categories.php?" class="list-group-item '.$list2.'">Browse Reviews By Category</a>'.$userSidebar;                   
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
                                    <label for="message-body" class="">Message</label>

									<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
									<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>


                                    <textarea id="message-body" class="form-control" placeholder="Enter message here" rows="5"> </textarea>
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
                        <div class = "form-group form-inline">
                                <button type="submit" class="btn btn-primary btn-sm" > Send </button>
                                <button type="submit" class="btn btn-default btn-sm" > Cancel </button>
                        </div>
                        </form>
                </div>
        </div>
       </div>
    </div>
  <!-- end modal -->

  <!-- Start Modal -->
	<!-- reply modal	 -->
    <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="replyLabel" aria-hidden="true">
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
                                    <label for="message-body">Message</label>

									<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
									<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>


                                    <textarea id="message-body" class="form-control" placeholder="Enter message here" rows="5"> </textarea>
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

	public function GetReportModal()
	{
		$reportModal = '	<!-- Start Modal -->
	<!-- reply modal	 -->
    <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="replyLabel" aria-hidden="true">
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
                                    <label for="message-body">Message</label>

									<a href="formatting-help.php" class="pq-form-misc-links"> <small> Formatting Help </small> </a>
										
									<a href="etiquette.php" class="pq-form-misc-links"> <small> PQetiquette </small> </a>

                                    <textarea id="message-body" class="form-control" placeholder="Enter message here" rows="5"> </textarea>
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
  		return $reportModal;
	}

	public function PrintReport(){		
		if(empty($this->user)){
			return "";
		}
        else
            if($this->user == "admin" || $this->user == "moderator"){
                return '<a href="#" data-container="body" data-type="block" data-toggle="modal" data-recipient="@user" data-user="@user" data-target="#report" 
                                class="btn btn-link">
                              <small>  <i class="fa  fa-lock"></i> block </small> </a>';
            }
                else{
                    return '<a href="#" data-container="body" data-toggle="modal" data-recipient="@FNR_Mod; @Admin" data-user="@user" data-target="#report" 
                                                    class="btn btn-link">
                                                  <small>  <i class="fa fa-flag"></i> report </small> </a>';
                }
	}

	public function PrintReviewReport(){		
		if(empty($this->user)){
			return "";
		}else{
			return '<a href="#" style="color:#fff;" data-container="body" data-toggle="modal" data-recipient="@FNR_Mod; @Admin" data-user="@user" data-target="#report" 
                                            class="">
                                          <small>  <i class="fa fa-flag"></i> report </small> </a>';
		}
	}

	public function SetDisabled(){		
		if(empty($this->user)){
			return "disabled";
		}else{
			return "";
		}
	}
	public function GetBrowseFilter(){
		if(!empty($this->user)){
			$browserFilter = '	        		<div class="col-lg-5 col-sm-5">
	        			<form class="form-group">
	        				<div class="row">
			        			<div class="form-group form-inline col-lg-12">
			        				<label> See Categories: </label>
									<div class="btn-group" data-toggle="buttons">
									  <label class="btn btn-primary btn-xs active">
									    <input type="checkbox" autocomplete="off" class="success" checked> Subscribed
									  </label>
									  <label class="btn btn-info btn-xs">
									    <input type="checkbox" autocomplete="off" class="danger"> ALL
									  </label>
									</div>
		        				</div>
			        			<div class="form-group form-inline col-lg-12">
			        				<label> Search in: </label>
									<div class="btn-group" data-toggle="buttons">
									  <label class="sr-only" for "category"> Subscribed Categories
									  </label>
									    <input list = "categoryList" type="text" id="category" class="form-control" placeholder="Enter subscribed categories here" required>
									</div>
		        				</div>		        				
		        			</div>
        				</form>	        			
        			</div>';
		}else{
			$browserFilter = '';
		}

		return $browserFilter;
	}
}

?>