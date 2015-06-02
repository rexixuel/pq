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
		try{

        	$pqConn->beginTransaction();
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> BEGIN TRANSACTION ERROR! '.$e->getMessage().'</div>';
	    }
    }

	public function rollBackTransaction($pqConn){
     	try{
        	$pqConn->rollBack();
     	}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> ROLLBACK TRANSACTION ERROR! '.$e->getMessage().'</div>';
	    }
    }

	public function commitTransaction($pqConn){
        try{

        	$pqConn->commit();
        }
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> COMMIT TRANSACTION ERROR! '.$e->getMessage().'</div>';
	    }

    }


}

class sponsor{
	protected $statement;
	public function getLastId($pqConn){
		return $pqConn->lastInsertId("sponsor_id");
	}

	public function fetchSponsor(){
		try{

			return $this->statement->fetch(PDO::FETCH_LAZY);
            
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> PRIZE READ ERROR! '.$e->getMessage().'</div>';
	        return null;
		}		

	}

	public function readSponsor($pqConn, $sponsorId){

		try{
			$this->statement = $pqConn->prepare("SELECT * from sponsor WHERE (sponsor_id = :sponsorId) LIMIT 1");
			$this->statement->bindParam(":sponsorId", $sponsorId);
			$this->statement->execute();

			return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> SPONSOR ERROR! '.$e->getMessage().'</div>';

		    return false;
		}
		

	}

	public function insert($pqConn, $sponsorName, $address, $mobileNumber, $landlineNumber){

		try{
			$this->statement = $pqConn->prepare("INSERT into sponsor (name, address, mobile_number, landline_number ) VALUES (:sponsorName, :address, :mobileNumber, :landlineNumber)");
			$this->statement->bindParam(":sponsorName", $sponsorName);
			$this->statement->bindParam(":address", $address);
			$this->statement->bindParam(":mobileNumber", $mobileNumber);
			$this->statement->bindParam(":landlineNumber", $landlineNumber);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> SPONSOR INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

}


class banner{
	protected $statement;

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("banner_id");
	}

	public function fetchBanner(){
		try{

			return $this->statement->fetch(PDO::FETCH_LAZY);
            
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> PRIZE READ ERROR! '.$e->getMessage().'</div>';
	        return null;
		}		

	}

	public function readBanner($pqConn, $selectParms, $bannerId){

		try{
			$sql = "SELECT ".$selectParms." from banner WHERE (banner_id = :bannerId) LIMIT 1";

			$this->statement = $pqConn->prepare($sql);
			$this->statement->bindParam(":bannerId", $bannerId);
			$this->statement->execute();

			return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> BANNER ERROR! '.$e->getMessage().'</div>';

		    return false;
		}
		

	}


	public function insert($pqConn, $imgfp, $type, $fileName, $fileSize){

		try{
			$this->statement = $pqConn->prepare("INSERT into banner (image, type, name, size ) VALUES (:imgfp, :type, :fileName, :fileSize)");
			$this->statement->bindParam(":imgfp", $imgfp, PDO::PARAM_LOB);
			$this->statement->bindParam(":type", $type);
			$this->statement->bindParam(":fileName", $fileName);
			$this->statement->bindParam(":fileSize", $fileSize);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> BANNER INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

}

class prize{
	protected $statement;

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("prize_id");
	}

	public function fetchPrize(){
		try{

			return $this->statement->fetch(PDO::FETCH_LAZY);
            
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> PRIZE READ ERROR! '.$e->getMessage().'</div>';
	        return null;
		}		

	}

	public function readPrize($pqConn, $prizeId){

		try{
			$this->statement = $pqConn->prepare("SELECT * from prize WHERE (prize_id = :prizeId) LIMIT 1");
			$this->statement->bindParam(":prizeId", $prizeId);
			$this->statement->execute();

			return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> PRIZE ERROR! '.$e->getMessage().'</div>';

		    return false;
		}
		

	}

	public function getMaxId($pqConn){

		try{
			$this->statement = $pqConn->prepare("SELECT MAX(prize_id) from prize");			

			$this->statement->execute();

			$maxId = $this->statement->fetchColumn();			
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> PRIZE ERROR! '.$e->getMessage().'</div>';
		}

		return $maxId;		

	}

	public function insert($pqConn, $prize, $bannerId, $sponsorId){

		try{
			$this->statement = $pqConn->prepare("INSERT into prize (description, banner_id, sponsor_id ) VALUES (:prize, :bannerId, :sponsorId)");
			$this->statement->bindParam(":prize", $prize);
			$this->statement->bindParam(":sponsorId", $sponsorId);
			$this->statement->bindParam(":bannerId", $bannerId);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> PRIZE INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

}

class news{
	protected $statement;

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("news_id");
	}

	public function getMaxId($pqConn){

		try{
			$this->statement = $pqConn->prepare("SELECT MAX(news_id) from news");

			$this->statement->execute();

			$maxId = $this->statement->fetchColumn();			
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> NEWS ERROR! '.$e->getMessage().'</div>';
		}

		return $maxId;		

	}

	public function insert($pqConn, $newsTitle, $news){

		try{
			$this->statement = $pqConn->prepare("INSERT into news (title, news ) VALUES (:newsTitle, :news)");
			$this->statement->bindParam(":newsTitle", $newsTitle);
			$this->statement->bindParam(":news", $news);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> NEWS INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

}

class announcement{
	protected $statement;

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("announcement_id");
	}

	public function getMaxId($pqConn){

		try{
			$this->statement = $pqConn->prepare("SELECT MAX(announcement_id) from announcement");			

			$this->statement->execute();

			$maxId = $this->statement->fetchColumn();			
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> ANNOUNCEMENT ERROR! '.$e->getMessage().'</div>';
		}

		return $maxId;		

	}

	public function insert($pqConn, $announcementTitle, $announcement){

		try{
			$this->statement = $pqConn->prepare("INSERT into announcement (title, announcement ) VALUES (:announcementTitle, :announcement)");
			$this->statement->bindParam(":announcementTitle", $announcementTitle);
			$this->statement->bindParam(":announcement", $announcement);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> ANNOUNCEMENT INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

}

class welcomeMessage{
	protected $statement;

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("welcome_message_id");
	}

	public function getMaxId($pqConn){

		try{
			$this->statement = $pqConn->prepare("SELECT MAX(welcome_message_id) from welcome_message");			

			$this->statement->execute();

			$maxId = $this->statement->fetchColumn();			
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> WELCOME MESSAGE ERROR! '.$e->getMessage().'</div>';
		}

		return $maxId;		

	}

	public function insert($pqConn, $message){

		try{
			$this->statement = $pqConn->prepare("INSERT into welcome_message (message) VALUES (:message)");
			$this->statement->bindParam(":message", $message);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> WELCOME MESSAGE INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

}


class siteSetup{
	protected $statement;

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("site_setup_id");
	}

	public function getMaxId($pqConn){

		try{
			$this->statement = $pqConn->prepare("SELECT MAX(site_setup_id) from site_setup");			

			$this->statement->execute();

			$maxId = $this->statement->fetchColumn();			
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> SITE SETUP ARCHIVE INSERT ERROR! '.$e->getMessage().'</div>';
		}

		return $maxId;		

	}

	public function read($pqConn){

		try{
			$this->statement = $pqConn->prepare("SELECT *,MAX(site_setup_id) from site_setup");			

			$this->statement->execute();

			return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> SITE SETUP READ ERROR! '.$e->getMessage().'</div>';
			return false;		
		}

	}

	public function fetchSiteSetup(){
		try{

			return $this->statement->fetch(PDO::FETCH_LAZY);
            
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> SITE SETUP READ ERROR! '.$e->getMessage().'</div>';
	        return null;
		}		

	}

	public function archive($pqConn,$siteSetupId){
		try{
			$this->statement = $pqConn->prepare("INSERT into site_setup_archive (select * from site_setup WHERE site_setup_id = :siteSetupId)");
			$this->statement->bindParam(":siteSetupId", $siteSetupId);			

			$this->statement->execute();

			$this->statement = $pqConn->prepare("DELETE from site_setup WHERE site_setup_id = :siteSetupId");
			$this->statement->bindParam(":siteSetupId", $siteSetupId);			

			$this->statement->execute();

            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> SITE SETUP ARCHIVE INSERT ERROR! '.$e->getMessage().'</div>';
		    //$pqConn->rollBack();
            return false;
		}		
	}

	public function insert($pqConn, $prizeId, $newsId, $announcementId, $welcomeMessageId){

		try{
			$this->statement = $pqConn->prepare("INSERT into site_setup (prize_id, news_id, announcement_id, welcome_message_id) VALUES (:prizeId, :newsId, :announcementId, :welcomeMessageId)");
			$this->statement->bindParam(":prizeId", $prizeId);
			$this->statement->bindParam(":newsId", $newsId);
			$this->statement->bindParam(":announcementId", $announcementId);
			$this->statement->bindParam(":welcomeMessageId", $welcomeMessageId);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> SITE SETUP INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
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
		    print '<div class="alert alert-danger" role="alert"> PREMIUM PLAN INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("premium_plan_id");
	}
}

class category{
	protected $statement;
	
	public function getLastId($pqConn){
		return $pqConn->lastInsertId("category_id");
	}

	public function insert($pqConn, $categoryName){

		try{
			$this->statement = $pqConn->prepare("INSERT into category (name) VALUES (:categoryName)");
			$this->statement->bindParam(":categoryName", $categoryName);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY POLL ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}



	public function readCategoryName($pqConn, $categoryName){
		try{

			$this->statement = $pqConn->prepare("SELECT COUNT(category_id) , category_id from category WHERE (name = :categoryName) LIMIT 1");
			$this->statement->bindParam(":categoryName", $categoryName);

			$this->statement->execute();

			$numberOfCategory = $this->statement->fetchColumn();

            return $numberOfCategory;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY READ ERROR! '.$e->getMessage().'</div>';
		}		
        return $numberOfCategory;

	}

}

class categoryModerator{
	protected $statement;

	public function insert($pqConn, $categoryId, $userId){
		try{
			$this->statement = $pqConn->prepare("INSERT into category_moderator (category_id,user_id) VALUES (:categoryId, :userId)");
			$this->statement->bindParam(":categoryId", $categoryId);
			$this->statement->bindParam(":userId", $userId);
			
			$this->statement->execute();

            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY MODERATOR INSERT ERROR! '.$e->getMessage().'</div>';
		}		
        return false;

	}

}
class categoryPoll{
	protected $statement;

	public function getLastId($pqConn){
		return $pqConn->lastInsertId("category_poll_id");
	}

	public function insert($pqConn, $dateClose){

		try{
			$this->statement = $pqConn->prepare("INSERT into category_poll (date_close) VALUES (:dateClose)");
			$this->statement->bindParam(":dateClose", $dateClose);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY POLL INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

	public function update($pqConn, $fields, $values, $numberOfFields, $categoryPollId){
		try{
			$sql = "UPDATE category_poll SET ".$fields." WHERE (category_poll_id = ?) LIMIT 1";

			$this->statement = $pqConn->prepare($sql);
			$field = 1;
			for($x = 0; $x <= $numberOfFields; $x++){
				$this->statement->bindParam($field, $values[$x]);
				$field++;
			}

			$field = $numberOfFields + 1;
			$this->statement->bindParam($field, $categoryPollId);

			$this->statement->execute();

			return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY POLL UPDATE ERROR! '.$e->getMessage().'</div>';

		    return false;
		}

	}


	public function readEntries($pqConn, $categoryPollId){

		try{
			$this->statement = $pqConn->prepare("SELECT * FROM category_poll_entry WHERE (category_poll_id = :categoryPollId)");			
			$this->statement->bindParam(":categoryPollId", $categoryPollId);
			
			$this->statement->execute();            

            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY POLL INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

	public function readEntriesVote($pqConn, $categoryPollId){

		try{
			$this->statement = $pqConn->prepare("SELECT SUM(votes) FROM category_poll_entry WHERE (category_poll_id = :categoryPollId)");			
			$this->statement->bindParam(":categoryPollId", $categoryPollId);
			
			$this->statement->execute();
			return $this->statement->fetchColumn();
            
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY POLL INSERT ERROR! '.$e->getMessage().'</div>';
            return null;
		}		
	}

	public function readEntriesMaxVote($pqConn, $categoryPollId){

		try{
			$this->statement = $pqConn->prepare("SELECT *, MAX(votes) FROM category_poll_entry WHERE (category_poll_id = :categoryPollId) LIMIT 1");
			$this->statement->bindParam(":categoryPollId", $categoryPollId);
			
			$this->statement->execute();

			return true;
            
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY POLL INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

	public function insertEntries($pqConn, $categoryEntry, $categoryPollId){

		try{
			$this->statement = $pqConn->prepare("INSERT into category_poll_entry (name, category_poll_id) VALUES (:categoryEntry, :categoryPollId)");
			$this->statement->bindParam(":categoryEntry", $categoryEntry);
			$this->statement->bindParam(":categoryPollId", $categoryPollId);

			$this->statement->execute();
            return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY POLL INSERT ERROR! '.$e->getMessage().'</div>';
            return false;
		}		
	}

	public function fetchCategoryEntry(){
		return $this->fetchCategoryPoll();
	}
	
	public function fetchCategoryPoll(){

		try{

			return $this->statement->fetch(PDO::FETCH_LAZY);
            
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> CATEGORY POLL READ ERROR! '.$e->getMessage().'</div>';
	        return null;
		}		

	}


	public function getLatestPoll($pqConn){

		try{
			$this->statement = $pqConn->prepare("SELECT *, MAX(date_posted) from category_poll HAVING  COUNT(*) > 0");

			$this->statement->execute();

			return true;
                    
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER READ ERROR! '.$e->getMessage().'</div>';            
		    return false;
		}		

	}
}

class userDetail{

	public function insert($pqConn, $firstname, $lastname, $email, $birthday, $interests, $address, $mobileNumber, $landlineNumber){
		//insert encrypt here
		try{
			$statement = $pqConn->prepare("INSERT into user_detail (first_name, last_name, email, birthday, interests, address, mobile_number, landline_number)
			 VALUES (:firstname, :lastname, :email, :birthday, :interests, :address, :mobileNumber, :landlineNumber)");
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

	public function update($pqConn, $fields, $values, $numberOfFields, $username){
		try{
			$sql = "UPDATE user SET ".$fields." WHERE (username = ?) LIMIT 1";

			$this->statement = $pqConn->prepare($sql);
			$field = 1;
			for($x = 0; $x <= $numberOfFields; $x++){
				$this->statement->bindParam($field, $values[$x]);
				$field++;
			}

			$field = $numberOfFields + 1;
			$this->statement->bindParam($field, $username);

			$this->statement->execute();

			return true;
		}
		catch(PDOException $e) {
		    print '<div class="alert alert-danger" role="alert"> USER UPDATE ERROR! '.$e->getMessage().'</div>';

		    return false;
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