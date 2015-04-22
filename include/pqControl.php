<?php

class userControl{
	$username;
	$password; 
	$email; 
	$firstname; 
	$lastname; 
	$address; 
	$birthday; // should slashes be stripped?
	$mobileNumber; 
	$landlineNumber; 
	$secQuestion;
	$secAnswer;
	$payMethodOptions;
	$paySchedOptions;
	$user_type_id;
	$premium_plan_id;
	$user_detail_id;
	$security_id;


	public function _construct($userParms = array()){
		if( isset( $userParms['username'] ) ){
			$this->username = stripslashes( strip_tags( $data['username'] ) );			
		}

	    if( isset( $userParms['password'] ) ){
	    	 $this->password = stripslashes( strip_tags( $data['password'] ) );
	    }

	}	


	public void register($userParms = array()){
	// re-validate passed parameters
		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();
		$pqUser = new user();
		$userError = false;
		if( isset( $userParms['username'] ) ){
			$this->username = stripslashes( strip_tags( $data['username'] ) );
			
			$statement->bindParam(":username", $this->username);

			$userExists = $pqUser->readUsername($pqConn, $this->username);

			if($userExists){
				$userError = true;
				$errAlert = '<div class="alert alert-danger" role="alert"> Username must be unique </div>';
			}


		}else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Username must not be empty </div>';
			$userError = true;			
		}

	    if( isset( $userParms['password'] ) ){
	    	 $this->password = stripslashes( strip_tags( $data['password'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Password must not be empty </div>';
			$userError = true;			
		}

	    if( isset( $userParms['email'] ) ){
	    	 $this->email = stripslashes( strip_tags( $data['email'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Email must not be empty </div>';
			$userError = true;		
		}		

	    if( isset( $userParms['firstname'] ) ){
	    	 $this->firstname = stripslashes( strip_tags( $data['firstname'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> First Name must not be empty </div>';
			$userError = true;			
		}				

	    if( isset( $userParms['lastname'] ) ){
	    	 $this->lastname = stripslashes( strip_tags( $data['lastname'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Last Name must not be empty </div>';
			$userError = true;			
		}				


	    if( isset( $userParms['birthday'] ) ){
	    	 $this->birthday = stripslashes( strip_tags( $data['birthday'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Birthday must not be empty </div>';
			$userError = true;			
		}		

	    if( isset( $userParms['address'] ) ){
	    	 $this->address = stripslashes( strip_tags( $data['address'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Address must not be empty </div>';
			$userError = true;			
		}		

	    if( isset( $userParms['mobileNumber'] ) || isset( $userParms['landlineNumber'] ) ){
	    	 $this->mobileNumber = stripslashes( strip_tags( $data['mobileNumber'] ) );
	    	 $this->landlineNumber = stripslashes( strip_tags( $data['landlineNumber'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Contact details must not be empty </div>';
			$userError = true;			
		}	

	    if( isset( $userParms['secQuestion'] )  ){
	    	 $this->secQuestion = stripslashes( strip_tags( $data['secQuestion'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Security Question must not be empty </div>';
			$userError = true;			
		}	


	    if( isset( $userParms['secAnswer'] )  ){
	    	 $this->secAnswer = stripslashes( strip_tags( $data['secAnswer'] ) );
	    }else{
			$errAlert = '<div class="alert alert-danger" role="alert"> Security Answer must not be empty </div>';
			$userError = true;			
		}			

		if( isset( $userParms['premiumToggle'] ) ){
		    if( isset( $userParms['paySchedOptions'] ) && isset( $userParms['payMethodOptions'] ) ){
		    	 $this->paySchedOptions = stripslashes( strip_tags( $data['paySchedOptions'] ) );
		    	 $this->payMethodOptions = stripslashes( strip_tags( $data['payMethodOptions'] ) );
		    }else{
				$errAlert = '<div class="alert alert-danger" role="alert"> Please select a Payment Option and Schedule</div>';
				$userError = true;			
			}				
			$user_type_id = 3;				
		}else{
			$user_type_id = 4;
		}

		if(!$userError){
			$pqPremiumPlan = new premiumPlan();
			$pqUserDetail = new userDetail();			
			$pqSecurity = new security();

			$pqPremiumPlan->insert($pqConn, $this->paySchedOptions, $this->payMethodOptions);
			$this->premium_plan_id = $pqPremiumPlan->getLastId();

			$pqUserDetail->insert($pqConn, $this->firstname, $this->lastname, $this->email, $this->birthday, $this->interests /*temporary, can be shipped to different table*/, 
									$this->address, $this->mobileNumber, $this->landlineNumber);
			$this->user_detail_id = $pqUserDetail->getLastId();
			
			$pqSecurity->insert($pqConn,$this->secQuestion, $this->secAnswer);
			$this->security_id = $pqSecurity->getLastId();

			
			$pqUser->insert($pqConn,$this->username, $this->password, $this->user_type_id, $this->premium_plan_id, $this->user_detail_id, $this->security_id);
		}

		//use last id
		// insert write to security
		// insert write to user_details
		// insert write to user

		
	}
}

?>