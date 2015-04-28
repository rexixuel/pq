<?php

include ('/pqDatabaseParams.php');	

class pqDatabase{

	protected $DBH;

	public function _constructor(){
		try{

		    $this->DBH = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD );
		    $this->DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> DATABASE CONNECTION ERROR! '.$e->getMessage().'</div>';
		}

	}

	public function connectDb(){
        
		// Database Contants
		$this->_constructor();
		// Database Connection and Handling

		return $this->DBH;

	}

	public function startTransaction($pqConn){
        //$this->DBH->beginTransaction();
        $pqConn->beginTransaction();

    }

	public function rollBackTransaction($pqConn){
        $pqConn->rollBack();

    }

	public function commitTransaction($pqConn){
        $pqConn->commit();

    }


}
class premiumPlan{

	public function insert($pqConn, $paySchedOptions, $payMethodOptions){

		try{
			$statement = $pqConn->prepare("INSERT into premium_plan (payment_schedule, payment_type ) VALUES (:paySchedOptions, :payMethodOptions)");
			$statement->bindParam(":paySchedOptions", $paySchedOptions);
			$statement->bindParam(":payMethodOptions", $payMethodOptions);

			$statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR! '.$e->getMessage().'</div>';
		    //$pqConn->rollBack();
            return false;
		}		
	}

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("premium_plan_id");
	}
}


class userDetail{

	public function insert($pqConn, $firstname, $lastname, $email, $birthday, $interests, $address, $mobileNumber, $landlineNumber){
		//insert encrypt here
		try{
			$statement = $pqConn->prepare("INSERT into user_detail (first_name, last_name, email, birthday, interests, address, mobile_number, landline_number)
			 VALUES (:firstname, :lastname, :email, :birthday,:address, :interests, :mobileNumber, :landlineNumber)");
			$statement->bindParam(":firstname", $firstname);
			$statement->bindParam(":lastname", $lastname);
			$statement->bindParam(":email", $email);
			$statement->bindParam(":birthday", $birthday);
			$statement->bindParam(":address", $address);
			$statement->bindParam(":interests", $interests);						
			$statement->bindParam(":mobileNumber", $mobileNumber);
			$statement->bindParam(":landlineNumber", $landlineNumber);

			$statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR! '.$e->getMessage().'</div>';
		    //$pqConn->rollBack();
            return false;
		}		
	}

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("user_detail_id");
	}
}


class security{

	public function insert($pqConn,$secQuestion, $secAnswer){

		//insert encrypt here

		try{
			$statement = $pqConn->prepare("INSERT into security (security_question, security_answer) VALUES (:secQuestion, :secAnswer)");
			$statement->bindParam(":secQuestion", $secQuestion);
			$statement->bindParam(":secAnswer", $secAnswer);
			$statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR! '.$e->getMessage().'</div>';
		    //$pqConn->rollBack();
            return false;
		}		
	}

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("security_id");
	}
}
class userType{
	public function read($pqConn,$user_type_id){ 
		try{

			$statement = $pqConn->prepare("SELECT * from user_type WHERE (user_type_id = :user_detail_id) LIMIT 1");
			$statement->bindParam(":user_detail_id", $user_type_id);

			$statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER TYPE READ ERROR! '.$e->getMessage().'</div>';

            return false;
		}		

	}
}
class user{	
	protected $statement;
	public function read($pqConn,$username){

		try{

			$this->statement = $pqConn->prepare("SELECT * from user WHERE (username = :username) LIMIT 1");
			$this->statement->bindParam(":username", $username);
			$this->statement->execute();

            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR! '.$e->getMessage().'</div>';
            return false;
		}		

	}

	public function fetchUser(){

		try{

			return $this->statement->fetch(PDO::FETCH_LAZY);
            
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR! '.$e->getMessage().'</div>';
	        return null;
		}		

	}


	public function readUsername($pqConn, $username){
		try{			
			$this->statement = $pqConn->prepare("SELECT COUNT(user_id), user_id from user WHERE (username = :username) LIMIT 1");
			$this->statement->bindParam(":username", $username);
            $this->statement->execute();
            
			$numberOfUsername = $this->statement->fetchColumn();
    

		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR! '.$e->getMessage().'</div>';
		}

		return $numberOfUsername;
	}
	public function insert($pqConn,$username,$password,$user_type_id,$premium_plan_id,$user_detail_id,$security_id){

		//insert encrypt here

		try{
			$this->statement = $pqConn->prepare("INSERT into user (username, password, user_type_id, premium_plan_id, user_detail_id, security_id) 
										VALUES (:username, :password, :user_type_id, :premium_plan_id, :user_detail_id, :security_id  )");
			$this->statement->bindParam(":username", $username);
			$this->statement->bindParam(":password", $password);
			$this->statement->bindParam(":user_type_id", $user_type_id);
			$this->statement->bindParam(":premium_plan_id", $premium_plan_id);
			$this->statement->bindParam(":user_detail_id", $user_detail_id);
			$this->statement->bindParam(":security_id", $security_id);
			$this->statement->execute();		

            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER WRITE ERROR! '.$e->getMessage().'</div>';
		    //$pqConn->rollBack();
            return false;
		}		


	}	
}

?>