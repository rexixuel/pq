<?php

class pqDatabase{

include ('/pqDatabaseParams.php');	

	public function connectDb(){
		// Database Contants


		// Database Connection and Handling
		try{

		    $DBH = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword );
		    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> DATABASE CONNECTION ERROR!</div>';
		}

		return $DBH;

	}


}

class user{

	public function read($pqConn,$username,$password){

		$statement->bindParam(":username", $username);
		$statement->bindParam(":password", $password);
		//insert decrypt here

		try{

			$statement = $pqConn->prepare("SELECT * from user WHERE (username = :username && password = :password) LIMIT ONE")
			try{

				$statement->execute();

			}
			catch(PDOException $e) {
			    print '<div class="alert alert-danger" role="alert"> USER READ ERROR!</div>';
			}		
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR!</div>';
		}		

	}

	public function readUsername($pqConn, $username){
		try{

			$statement = $pqConn->prepare("SELECT COUNT(user_id) from user WHERE (username = :username) LIMIT ONE")
			$statement->execute();

			if($statement > 0){
				$userExists = true;					
			}
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR!</div>';
		}

		return $userExists;
	}
	public function insert($pqConn,$username,$password,$user_type_id,$premium_plan_id,$user_detail_id,$security_id){

		$statement->bindParam(":username", $username);
		$statement->bindParam(":password", $password);
		$statement->bindParam(":user_type_id", $user_type_id);
		$statement->bindParam(":premium_plan_id", $premium_plan_id);
		$statement->bindParam(":user_detail_id", $user_detail_id);
		$statement->bindParam(":security_id", $security_id);
		//insert encrypt here

		try{
			$statement = $pqConn->prepare("INSERT into user (username, password, user_type_id, premium_plan_id, user_detail_id, security_id) 
										VALUES (:username, :password, :user_type_id, :premium_plan_id, :user_detail_id, :security_id  )")			
			try{
				$statement->execute();
			}
			catch(PDOException $e) {
			    print '<div class="alert alert-danger" role="alert"> USER READ ERROR!</div>';
			}		
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR!</div>';
		}		


	}	
}

?>