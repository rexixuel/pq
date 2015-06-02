<?php
include('/include/pqDatabase.php');
include('/include/password_compat-master/lib/password.php');
date_default_timezone_set('Asia/Manila');

class siteControl{

	public $sponsorName;
	public $sponsorNameError;
	public $prize;
	public $prizeError;
	public $mobileNumber;
	public $contactError;
	public $landlineNumber;
	public $address;
	public $addressError;
	public $prizeBanner;
	public $prizeBannerError;
	public $welcomeMessage;
	public $welcomeMessageError;
	public $announcementTitle;
	public $announcementTitleError;
	public $announcement;
	public $announcementError;
	public $newsTitle;
	public $newsTitleError;
	public $news;
	public $newsError;
	public $siteParmsError;	
	public $emptyTableError;

	public $sponsorUpdate;
	public $welcomeMessageUpdate;
	public $announcementUpdate;
	public $newsUpdate;

	public function _construct($siteParms = array(), $siteFile){
		if( !empty( $siteParms['sponsorName'] ) ){
			$this->sponsorName = stripslashes( strip_tags( $siteParms['sponsorName'] ) );			
		}

	    if( !empty( $siteParms['prize'] ) ){
	    	 $this->prize = stripslashes( strip_tags( $siteParms['prize'] ) );
	    }

	    if( !empty( $siteParms['mobile'] ) ){
	    	 $this->mobileNumber = stripslashes( strip_tags( $siteParms['mobile'] ) );
	    }
	    
	    if( !empty( $siteParms['landline'] ) ){
	    	 $this->landlineNumber = stripslashes( strip_tags( $siteParms['landline'] ) );
	    }

	    if( !empty( $siteParms['address'] ) ){
	    	 $this->address = stripslashes( strip_tags( $siteParms['address'] ) );
	    }

	    if( !empty( $siteFile['prizeBanner']['tmp_name']) ){
	    	 $this->prizeBanner =  $siteFile['prizeBanner'];	    	 
	    }
	    
	    
	    if( !empty( $siteParms['welcomeMessage'] ) ){
	    	 $this->welcomeMessage = stripslashes( strip_tags( $siteParms['welcomeMessage'] ) );
	    }

	    if( !empty( $siteParms['announcementTitle'] ) ){
	    	 $this->announcementTitle = stripslashes( strip_tags( $siteParms['announcementTitle'] ) );
	    }

	    if( !empty( $siteParms['announcement'] ) ){
	    	 $this->announcement = stripslashes( strip_tags( $siteParms['announcement'] ) );
	    }

	    if( !empty( $siteParms['newsTitle'] ) ){
	    	 $this->newsTitle = stripslashes( strip_tags( $siteParms['newsTitle'] ) );
	    }


	    if( !empty( $siteParms['news'] ) ){
	    	 $this->news = stripslashes( strip_tags( $siteParms['news'] ) );
	    }

	    // continue adding category fields
	}

	public function Save($siteParms = array(), $siteFile){
		
		$this->_construct($siteParms, $siteFile);
		if(isset($this->sponsorName) || isset( $this->prize ) || isset($this->mobileNumber) || isset($this->landlineNumber) || isset(  $this->address ) || isset( $this->prizeBanner ) )
		{
			if( !isset( $this->sponsorName ) ){
				$this->sponsorNameError = 
				'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Sponsor Name </strong> is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				$this->siteParmsError += 1;
			}

		    if( !isset( $this->prize ) ){
				$this->prizeError = 
				'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Prize </strong> is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				$this->siteParmsError += 1;
		    }

		    if( !isset($this->mobileNumber) && !isset( $this->landlineNumber ) ){
				$this->contactError = 
				'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Contact Details </strong> is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				$this->siteParmsError += 1;
		    }
		    
		    if( !isset(  $this->address ) ){
				$this->addressError = 
				'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Address </strong> is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				$this->siteParmsError += 1;
		    }

		    if( !isset( $this->prizeBanner) ){
				$this->prizeBannerError = 
				'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Prize Banner </strong>  is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				$this->siteParmsError += 1;
		    }else{
		    	//validates image size and type and returns error	    	
				$size = $this->ValidateImg($this->prizeBanner);
		    }

			$this->sponsorUpdate = true;
		}else{
			$this->sponsorUpdate = false;
		}
	    if( isset(  $this->welcomeMessage ) ){
	    	$this->welcomeMessageUpdate = true;
	    }else{
	    	$this->welcomeMessageUpdate = false;	    	
	    }
	    /*if( !isset(  $this->welcomeMessage ) ){
			$this->welcomeMessageError = 
			'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Welcome Message </strong>  is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
			$this->siteParmsError += 1;
	    }*/

	    if(isset( $this->announcementTitle ) || isset( $this->announcement ))
		{

		    if( !isset( $this->announcementTitle ) && isset( $this->announcement ) ){
				$this->announcementTitleError = 
				'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Announcement Title </strong>  is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				$this->siteParmsError += 1;
		    }

		    if( !isset( $this->announcement ) && isset( $this->announcementTitle ) ){
				$this->announcementError = 
				'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Announcement </strong>  is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				$this->siteParmsError += 1;
		    }
		    $this->announcementUpdate = true;
		}else{
		    $this->announcementUpdate = false;			
		}	    	
	    if( !isset( $this->newsTitle ) && isset( $this->news ) ){
			$this->newsTitleError = 
			'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> News Title </strong>  is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
			$this->siteParmsError += 1;
	    }

	    if(isset( $this->news  )  || isset( $this->newsTitle ) )
    	{    		
		    if( !isset( $this->news  )  && isset( $this->newsTitle ) ){
				$this->newsError = 
				'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> News </strong>  is <u> required </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				$this->siteParmsError += 1;	    
			}
   			$this->newsUpdate = true;
		}else{
		    $this->newsUpdate = false;			
		}	    	
    	

		if($this->siteParmsError == 0 && ($this->newsUpdate || $this->announcementUpdate || $this->welcomeMessageUpdate || $this->sponsorUpdate)){
			/** instantiate connection **/
			$pqDatabase = new pqDatabase();
			$pqConn = $pqDatabase->connectDb();
		    
			$pqDatabase->startTransaction($pqConn);
	
			$pqArchiveSuccess = $this->ArchiveSiteSetup($pqConn);

			
			if($pqArchiveSuccess){
				$siteSetupSuccess = $this->InsertSiteSetup($pqConn);

				if($siteSetupSuccess){
					$pqDatabase->commitTransaction($pqConn);

					return '<div class="alert alert-success text-center" role="alert"> <i class="fa fa-check"></i> <strong> Site setup successful! </strong> <i class="fa fa-check"></i> </div> ';
				}else{
					$pqDatabase->rollBackTransaction($pqConn);
					return $this->emptyTableError;
				}
			}else{
				$pqDatabase->rollBackTransaction($pqConn);
				return '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> Archive Error! <i class="fa fa-exclamation-triangle"></i> </div> ';							
			}
		}

	}

	public function InsertSiteSetup($pqConn){
		
		$pqSiteSetup = new siteSetup();
		$pqSponsor = new sponsor();
		$pqPrize = new prize();
		$pqBanner = new banner();
		$pqNews = new news();
		$pqAnnouncement = new announcement();
		$pqWelcomeMessage = new welcomeMessage();
		
		if($this->sponsorUpdate)
		{
			$sponsorSuccess = $pqSponsor->insert($pqConn, $this->sponsorName, $this->address, $this->mobileNumber, $this->landlineNumber);
			$sponsorId = $pqSponsor->getLastId($pqConn);

				/***  get the image info. ***/
			    $image = getimagesize($this->prizeBanner['tmp_name']);

			    /*** assign our variables ***/
			    $type = $image['mime'];
			    $height = $image[0];
			    $width = $image[1];
			    $fileSize = $image[3];
			    $fileName = $this->prizeBanner['name'];

			    $imgfp = fopen($this->prizeBanner['tmp_name'], 'rb');		    

			$bannerSuccess = $pqBanner->insert($pqConn, $imgfp, $type, $fileName, $fileSize);
			$bannerId = $pqBanner->getLastId($pqConn);

			$prizeSuccess = $pqPrize->insert($pqConn, $this->prize, $bannerId, $sponsorId);
			$prizeId = $pqPrize->getLastId($pqConn);
		}else{
			$prizeId = $pqPrize->getMaxId($pqConn);
			if(!empty($prizeId))
			{
				$sponsorSuccess = true;
				$bannerSuccess = true;
				$prizeSuccess = true;
			}else{
				$sponsorSuccess = false;
				$bannerSuccess = false;
				$prizeSuccess = false;				

				$this->emptyTableError = $this->emptyTableError.' <div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Prize Table </strong> is <u> empty </u> ! <i class="fa fa-exclamation-triangle"></i> </div> ';							

			}
		}

		if($this->newsUpdate){
			$newsSuccess = $pqNews->insert($pqConn, $this->newsTitle, $this->news);			
			$newsId = $pqNews->getLastId($pqConn);
		}else{
			$newsId = $pqNews->getMaxId($pqConn);
			if(!empty($newsId))
			{
				$newsSuccess = true;			
			}else{
				$newsSuccess = false;				
				$this->emptyTableError = $this->emptyTableError.' <div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> News Table </strong> is <u> empty </u> ! <i class="fa fa-exclamation-triangle"></i> </div> ';											
			}
		}


		if($this->announcementUpdate){
			$announcementSuccess = $pqAnnouncement->insert($pqConn, $this->announcementTitle, $this->announcement);
			$announcementId = $pqAnnouncement->getLastId($pqConn);
		}else{
			$announcementId = $pqAnnouncement->getMaxId($pqConn);
			if(!empty($announcementId))
			{
				$announcementSuccess = true;
			}else{
				$announcementSuccess = false;		
				$this->emptyTableError = $this->emptyTableError.' <div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Announcement Table </strong> is <u> empty </u> ! <i class="fa fa-exclamation-triangle"></i> </div> ';							

			}

		}

		if($this->welcomeMessageUpdate)
		{
			$welcomeMessageSuccess = $pqWelcomeMessage->insert($pqConn, $this->welcomeMessage);
			$welcomeMessageId = $pqWelcomeMessage->getLastId($pqConn);
		}else{
			$welcomeMessageId = $pqWelcomeMessage->getMaxId($pqConn);
			if(!empty($announcementId))
			{
				$welcomeMessageSuccess = true;
			}else{
				$welcomeMessageSuccess = false;				
				$this->emptyTableError = $this->emptyTableError.' <div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Welcome Message Table </strong> is <u> empty </u> ! <i class="fa fa-exclamation-triangle"></i> </div> ';											
			}
		}



		if($sponsorSuccess && $bannerSuccess && $prizeSuccess && $newsSuccess && $announcementSuccess && $welcomeMessageSuccess)
		{
			$siteSetupSuccess = $pqSiteSetup->insert($pqConn, $prizeId, $newsId, $announcementId, $welcomeMessageId );		
		}

		if(isset($siteSetupSuccess) && $siteSetupSuccess){
			return true;
		}
		else{
			return false;
		}


	}

	public function ArchiveSiteSetup($pqConn){
		$pqSiteSetup = new siteSetup();

		$siteSetupId = $pqSiteSetup->getMaxId($pqConn);
		if(empty($siteSetupId) ){
			$pqArchiveSuccess = true;
		}else{
			$pqArchiveSuccess = $pqSiteSetup->archive($pqConn, $siteSetupId);
		}

		return $pqArchiveSuccess;

			



	}

	public function ValidateImg($prizeBanner){
		if(is_uploaded_file($prizeBanner['tmp_name']) && getimagesize($prizeBanner['tmp_name']) != false){
		    $image = getimagesize($prizeBanner['tmp_name']);
		    /*** assign our variables ***/
		    $type = $image['mime'];
		    $width = $image[0];
		    $height = $image[1];
		    $fileSize = $image[3];
		    $fileName = $prizeBanner['name'];
		    $maxsize = 99999999;

		    if($height < 800 || $width < 1080){
				$this->siteParmsError +=1;										
				
				$this->prizeBannerError = $this->prizeBannerError.'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> '.$fileName.' </strong>  
					resolution should be greater than is <u> 1080 x 800 </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
		    }		    
		    else
		    	if($fileSize > $maxsize)
			    {
					$this->siteParmsError +=1;
					$this->prizeBannerError = $this->prizeBannerError.'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> '.$fileName.' </strong>  
						file size is <u> too large </u> <i class="fa fa-exclamation-triangle"></i>  </div>';

			    }

		}
		else
		{
			$this->siteParmsError +=1;
			$fileName = $prizeBanner['name'];
			$this->prizeBannerError = $this->prizeBannerError.'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> '.$fileName.' </strong>  file type is <u> not supported </u> <i class="fa fa-exclamation-triangle"></i>  </div>';
		}
	}
	public function GetErrorsFound(){
		
		if($this->siteParmsError > 0)
		{			
			return '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong>'.$this->siteParmsError.' </strong> Error Found! <i class="fa fa-exclamation-triangle"></i>  </div>';
		}else{
			return '';
		}
	}

	public function GetSponsorNameError(){
		return $this->sponsorNameError;
	}

	public function GetPrizeError(){
		return $this->prizeError;
	}

	public function GetContactError(){
		return $this->contactError;
	}

	public function GetAddressError(){
		return $this->addressError;
	}

	public function GetPrizeBannerError(){
		return $this->prizeBannerError;
	}

	public function GetWelcomeMessageError(){
		return $this->welcomeMessageError;
	}

	public function GetAnnouncementTitleError(){
		return $this->announcementTitleError;
	}

	public function GetAnnouncementError(){
		return $this->announcementError;
	}

	public function GetNewsTitleError(){
		return $this->newsTitleError;
	}

	public function GetNewsError(){
		return $this->newsError;
	}

}

class categoryControl{
	public $newPollAnnouncement;
	public $pollNumber;
	public $newCategoryName;
	public $categoryPoll;
	public $categoryModerator = array();
	public $pollCategory = array();
	public $categoryPollError;
	public $categoryModError;
	public $pollEntry = array();

	public function _construct($categoryParms){
		if(!empty($categoryParms['pollNumber']))
		{
			$this->pollNumber = $categoryParms['pollNumber'];

			for($x=1; $x <= $this->pollNumber; $x++){
				$categoryIndex = "category".$x;
			
				if(!empty($categoryParms[$categoryIndex]))
				{
					$this->pollCategory[$categoryIndex] = $categoryParms[$categoryIndex];					
				}
				
			}
		}
		
		if(!empty($categoryParms['categoryName']))
		{
			$this->newCategoryName = $categoryParms['categoryName'];
		}

		if(!empty($categoryParms['moderator']))
		{
			// head first. should loop for moderator setup
			$this->categoryModerator[0] = $categoryParms['moderator'];
		}		
	}

	public function SetNewPollAnnouncement($lastLog){
		$userControl = new userControl();

		//$lastLog = $userControl->GetLastLog();

		if(!isset($this->categoryPoll)){ // do prevent multiple database requests
			$this->SetPoll();
		} 
		$pollDatePosted = $this->GetPollDatePosted();	

		$dateComp1 = new DateTime($lastLog);
		$dateComp2 = new DateTime($pollDatePosted);

		if($dateComp1 < $dateComp2){

			$this->newPollAnnouncement = '	<div class="carousel-caption pq-carousel-poll-announcement">
						<p> New Category Poll Available! Scroll Down and Vote! </p>
					</div>';
		}else{
			$this->newPollAnnouncement = '';
		}
		return $this->newPollAnnouncement;
	}

	public function SetPollSidebar(){
		$pollSidebar = '';
		$pollEntriesTag = '';

		if(!isset($this->categoryPoll)){ // do prevent multiple database requests
			$this->SetPoll();
		} 


		if(isset($this->categoryPoll)){

			if(!isset($this->pollEntry)){ // do prevent multiple database requests
				$this->SetPollEntry();
			} 

			$pollId = $this->GetPollId();
			$pollStatus = $this->GetPollStatus();

			if($pollStatus == 'open')
			{
				$pqCategoryPoll =  $this->SetPollEntries($pollId);

				$pollCategoryEntries = $this->GetPollEntries($pqCategoryPoll);
				$x = 1;			
				while(!empty($pollCategoryEntries)){
					
					$categoryPollEntryId = $pollCategoryEntries->category_poll_entry_id;
					$categoryPollEntryName = $pollCategoryEntries->name;
					$pollEntriesTag = $pollEntriesTag.'<div class="radio">
	                                            <label>
	                                                <input type="radio" name="pollCategOptions" id="'.$categoryPollEntryId.'" value="'.$categoryPollEntryId.'">
	                                                '.$categoryPollEntryName.'
	                                            </label>
	                                   </div>';
					$pollCategoryEntries = $this->GetPollEntries($pqCategoryPoll);
					$x++;
				}
				$pollSidebar = '
	                        <div class="col-lg-12 col-md-4 col-sm-4">
	                            <h3 class="page-header">
	                                    Category Poll 
										<small> Vote Now! </small>
	                            </h3>
	                            <form>
	                                <div class="form-group">'.$pollEntriesTag.'
	                                        <button type="submit" class="btn btn-sm btn-primary"> Submit Vote </button>
	                                </div>
	                            </form>
							</div>';
			}else{
				$pollSidebar = '
	                        <div class="col-lg-12 col-md-4 col-sm-4">
	                            <div class="alert alert-warning text-center"> <strong> Poll </strong> has been <u> closed </u></div>
	                        </div>';				
			}
		}
		return $pollSidebar;

	}

	public function SetPollEntries($pollId){
		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();

		$pqCategoryPoll = new categoryPoll();

		$pqCategoryPoll->getLatestPoll($pqConn);

		$categoryEntry = $pqCategoryPoll->readEntries($pqConn, $pollId);
						
		$x=0;

		return $pqCategoryPoll;


	}

	public function GetPollEntries($pqCategoryPoll){
		return $pqCategoryPoll->fetchCategoryEntry();
	}

	public function GetPollStatus(){
		return $this->categoryPoll->status;
	}
	public function GetPollId(){
		return $this->categoryPoll->category_poll_id;
	}

	public function GetPollDatePosted(){
		return $this->categoryPoll->date_posted;
	}

	public function GetPollDateClose(){
		return $this->categoryPoll->date_close;
	}

	public function SetPoll(){
		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();

		$pqCategoryPoll = new categoryPoll();

		$pqCategoryPoll->getLatestPoll($pqConn);

		$this->categoryPoll = $pqCategoryPoll->fetchCategoryPoll();

	}

	public function SetNewPoll($categoryParms){
		$this->_construct($categoryParms);



		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();

		$pqCategory = new category();

		$categoryExists = false;

		$pqDatabase->startTransaction($pqConn);

		if(isset($this->categoryModerator[0])){
			$newMod = $this->categoryModerator[0];
			$userControl = new userControl();

			$userExists = $userControl->ReadUser($newMod);

			$userId = $userControl->GetUserId();

		}else{
			$this->categoryModError = '<div class="alert alert-danger text-center" role="alert"> 
								<i class="fa fa-exclamation-triangle"></i> 
								<strong> Moderator </strong> is <u> empty</u>!
								<i class="fa fa-exclamation-triangle"></i> 
							</div> ';			

			$userExists = false;			
		}

		
		if(!$userExists && isset($newMod)){
			$this->categoryModError = '<div class="alert alert-danger text-center" role="alert"> 
								<i class="fa fa-exclamation-triangle"></i> 
								<strong> User '.$newMod.' </strong> <u> does not exist</u> ! 
								<i class="fa fa-exclamation-triangle"></i> 
							</div> ';			
		}


		if(isset($this->pollNumber) && $userExists)
		{
			$categoryEntriesComplete = true;
			if($this->pollNumber > 1 ){

				// check if every entry is filled
				for($x=1; $x <= $this->pollNumber; $x++){
					$categoryIndex = "category".$x;
				
					if(!isset($this->pollCategory[$categoryIndex]))
					{
						$categoryEntriesComplete = false;		
					}else{
						$numberOfCategory = $pqCategory->readCategoryName($pqConn, $this->pollCategory[$categoryIndex]);	

						if($numberOfCategory > 0){
							$this->categoryPollError =  $this->categoryPollError.'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Category '.$this->pollCategory[$categoryIndex].' </strong> <u> already exists! </u> <i class="fa fa-exclamation-triangle"></i> </div> ';
							$categoryExists = true;
						}
					}
					
				}
				
				if($categoryEntriesComplete && !$categoryExists){
					$insertSuccess = $this->InsertCategoryPoll($pqConn);

					if(isset($insertSuccess) && $insertSuccess){
						$insertCategorySuccess = $this->InsertCategory($pqConn, $this->newCategoryName, $userId);

						if(isset($insertCategorySuccess) && $insertCategorySuccess){
							$user = new userControl();

							$userModSuccess = $userControl->UpdateModerator($pqConn,$newMod);
							
							if($userModSuccess){

								$pqDatabase->commitTransaction($pqConn);


								return '<div class="alert alert-success text-center"> <i class="fa fa-check"></i> <strong> Category Poll </strong> <u> successfuly created! </u> <i class="fa fa-check"></i> </div>';
								
							}else{
								$pqDatabase->rollBackTransaction($pqConn);								
								$this->categoryPollError = $this->categoryPollError.'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Moderator </strong> <u> Error! </u> <i class="fa fa-exclamation-triangle"></i> </div> ';
							}

						}else{
							$pqDatabase->rollBackTransaction($pqConn);								
							$this->categoryPollError = $this->categoryPollError.'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Poll Creation Error! </strong> <i class="fa fa-exclamation-triangle"></i> </div> ';
						}
					}

				}else{
					$this->categoryPollError =  $this->categoryPollError.'<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Category entries </strong> <u> not complete </u> <i class="fa fa-exclamation-triangle"></i> </div> ';
					return '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Category errors found!  </strong> <i class="fa fa-exclamation-triangle"></i> </div> ';
				}
			}else{			
				$this->categoryPollError = '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Number of categories </strong> <u> should be greater than 1 </u> <i class="fa fa-exclamation-triangle"></i> </div> ';
				return '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Category errors found!  </strong> <i class="fa fa-exclamation-triangle"></i> </div> ';
			}

		}else{			
			$this->categoryPollError = '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Number of categories </strong> is <u> empty </u> ! <i class="fa fa-exclamation-triangle"></i> </div> ';
			return '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> <strong> Category errors found!  </strong> <i class="fa fa-exclamation-triangle"></i> </div> ';
		}

	}

	public function GetCategoryPollError(){
		return $this->categoryPollError;
	}	

	public function GetPollResultError(){
		return $this->categoryModError;
	}

	public function InsertCategory($pqConn, $categoryName, $userId){
		$pqCategory = new category();
		$pqCategoryModerator = new categoryModerator();

		$insertCategorySuccess = $pqCategory->insert($pqConn, $categoryName);
		$categoryId = $pqCategory->getLastId($pqConn);

		$insertCategoryModSuccess = $pqCategoryModerator->insert($pqConn, $categoryId, $userId); 

		if($insertCategoryModSuccess && $insertCategorySuccess){
			return true;
		}else{
			return false;
		}

	}

	public function InsertCategoryPoll($pqConn)
	{

		$pqCategoryPoll = new categoryPoll();


		$pqPollCloseSuccess = $this->ClosePreviousPoll($pqConn, $pqCategoryPoll);		


		$dateClose = new DateTime("now");
		$dateClose = $dateClose->add(new DateInterval("P1MT6H"));
		$dateClose = $dateClose->format('Y-m-d H:i:s');
		
		
		$pqCategoryPollSuccess = $pqCategoryPoll->insert($pqConn, $dateClose );

		if($pqCategoryPollSuccess && $pqPollCloseSuccess){

			$categoryPollId = $pqCategoryPoll->getLastId($pqConn);
			$pqCategoryPollEntriesSuccess = true;
			for($x=1; $x <= $this->pollNumber; $x++){
				$categoryIndex = "category".$x;				
				$categoryEntry = $this->pollCategory[$categoryIndex];

				$pqCategoryPollEntriesSuccessTemp = $pqCategoryPoll->insertEntries($pqConn, $categoryEntry, $categoryPollId);

				if(!$pqCategoryPollEntriesSuccessTemp)
				{
					$pqCategoryPollSuccess = false;
				}else{

				}

			}

			if($pqCategoryPollSuccess){
				return true;
			}else{
				//$pqDatabase->rollBackTransaction($pqConn);						
				return false;
			}									
		}else{
			//$pqDatabase->rollBackTransaction($pqConn);
			return false;
		}

	}

	public function ClosePreviousPoll($pqConn, $pqCategoryPoll){
		$fields = "status = ?";
		$values[0] = "close";
		$numberOfFields = 1;
		
		$pqCategoryPoll->getLatestPoll($pqConn);

		$latestCategoryPoll = $pqCategoryPoll->fetchCategoryPoll();

		$categoryPollId = $latestCategoryPoll->category_poll_id;

		return $pqCategoryPoll->update($pqConn, $fields, $values, $numberOfFields, $categoryPollId);
		

	}

	public function SetPollForm($pollFormError){
		$pollResults = '';

		if(!isset($this->categoryPoll)){ // do prevent multiple database requests
			$this->SetPoll();
		} 
		$pollStatus = $this->GetPollStatus();
		
		$pollDateClose = $this->GetPollDateClose();

		$dateComp1 = new DateTime($pollDateClose);
		$dateComp2 = new DateTime("now");

		if($dateComp1 > $dateComp2)		
		{
			$pollForm = '<div class="alert alert-warning text-center"> <strong> Category Poll  </strong> is  <u> not yet closed </u> </div>';
		}else{
			$pollForm ='<div class = "form-group">
									<div class="input-group">
											<div> <!--jquery dynamic number of category polls -->

													<!-- also add dynamic aggregation of interests thru php -->
													<label for="pollNumber">Number of Categories</label>
													<input type="number" id="pollNumber" name="pollNumber" class="form-control" min=2 max=5 value=2/>
													'.$pollFormError.'
											</div>
									</div>
						</div>
								<!-- must be dynamic -->
						<div class = "form-group">
									<div class="">
											<label for="category1">Category 1</label>
											<input type="text" id="category1" name="category1"class="form-control" placeholder="Category Name">
									</div>
						</div>
						<div class="form-group">
									<div class="">									
											<label for="category2">Category 2</label>
											<input type="text" id="category2" name="category2" class="form-control" placeholder="Category Name">
									</div>
						</div>
								<div class = "form-group">
									<div class="">
											<label for="category3">Category 3</label>
											<input type="text" id="category3" name="category3" class="form-control" placeholder="Category Name">
									</div>
						</div>';

		}				

		return $pollForm;
	}

	public function DisplayPollResult($pollResultError){
		$pollResults = '';

		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();

		$pqCategoryPoll = new categoryPoll();

		$pqCategoryPoll->getLatestPoll($pqConn);

		$latestCategoryPoll = $pqCategoryPoll->fetchCategoryPoll();
		
		if(empty($latestCategoryPoll)){
			$pollResults = '<div class="alert alert-warning text-center"> No Category Poll has been started. Please create poll through categories set-up. </div>';
		}
		else
		{
			$categoryTotalVote = $pqCategoryPoll->readEntriesVote($pqConn, $latestCategoryPoll->category_poll_id);
			
			$categoryEntry = $pqCategoryPoll->readEntries($pqConn, $latestCategoryPoll->category_poll_id);
			
			
			$pollEntry = '';

			$category = $pqCategoryPoll->fetchCategoryEntry();

			while(!empty($category)) {

				
				$percentage = ($category->votes / $categoryTotalVote) * 100;
				$pollEntry = $pollEntry.'<li class="progress-bar" style="width:'.$percentage.'%; margin-bottom:5px;"> '.$category->name.' - '.$percentage.'% </li>
														<div class="clearfix"> </div>';

				$category = $pqCategoryPoll->fetchCategoryEntry();


			}


			$pollResults = '<div class="">
									<ul>'.$pollEntry.'
									</ul>
								</div>';
			$dateComp1 = new DateTime($latestCategoryPoll->date_close);
			$dateComp2 = new DateTime("now");

			if($dateComp1 > $dateComp2){
				$pollResults = $pollResults.'<div class="alert alert-warning text-center"> <strong> Category Poll  </strong> is  <u> not yet closed </u> </div>';
			}else{

				$pqCategoryPoll->readEntriesMaxVote($pqConn, $latestCategoryPoll->category_poll_id);

				$category = $pqCategoryPoll->fetchCategoryEntry();

				$pollResults = $pollResults.'<div class="form-inline">
										<label for="categoryName">New Category: </label>
										<input class="form-control bg-success" placeholder="Poll Category" value="'.$category->name.'" disabled />
										<input class="form-control" id="categoryName" type="hidden" name="categoryName" value="'.$category->name.'" />
								</div>
								<div class = "form-group">
									<div class="">
											<label for="moderator">Moderator</label>
											<input id="moderator" name="moderator" category="moderator" class="form-control" placeholder="Moderator" />'.$pollResultError.'
									</div>
								</div>';
			}
		}

		return $pollResults;

	}
}
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
	public $lastLog;
	public $userId;

	public $loginResult;
	public function _construct($userParms = array()){
		if( isset( $userParms['username'] ) ){
			$this->username = stripslashes( strip_tags( $userParms['username'] ) );			
		}

	    if( isset( $userParms['password'] ) ){
	    	 $this->password = stripslashes( strip_tags( $userParms['password'] ) );
	    }

	}	

	public function InvalidAccess(){
		header("Location: invalidAccess.php"); /* Redirect browser */
		exit();		
	}
	public function Logout(){
		session_destroy();
		header("Location: index.php"); /* Redirect browser */
		exit();

	}

	public function UpdateLastLog($username){
			$pqDatabase = new pqDatabase();
			$pqConn = $pqDatabase->connectDb();
			$pqUser = new user();

			$pqDatabase->startTransaction($pqConn);

			$fields = "last_log = ?";
			$dateNow = new DateTime("now");
			$values[0] = $dateNow->format('Y-m-d H:i:s'); 
			$numberOfFields = 1;
			$userUpdateSuccessful = $pqUser->update($pqConn, $fields, $values, $numberOfFields, $username);
	

			if($userUpdateSuccessful)
			{
				$pqDatabase->commitTransaction($pqConn);
				$this->lastLog = $dateNow->format('Y-m-d H:i:s');  
				return '';				
			}
			else
			{
				$pqDatabase->rollBackTransaction($pqConn);
				return '<div class="alert alert-danger text-center" role="alert"> USER Transaction Error</div>';
			}

	}

	public function GetLastLog(){

		return $this->lastLog;
	}

	public function GetUserId(){		
		return $this->userId;
	}

	public function GetLoginResult(){
		return $this->loginResult;
	}
	public function ReadUser($username){
		
		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();
		$pqUser = new user();
		$pqUserType = new userType();


		$pqDatabase->startTransaction($pqConn);
		
		$pqUserSuccess = $pqUser->read($pqConn, $username);
		$user = $pqUser->fetchUser();
		$this->userId = $user->user_id;
		return $pqUserSuccess;
	}

	public function UpdateModerator($pqConn, $username){
		$pqUser = new user();

		$fields = "user_type_id = ?";
		$values[0] = 2; 
		$numberOfFields = 1;
		$userUpdateSuccessful = $pqUser->update($pqConn, $fields, $values, $numberOfFields, $username);
	
		return $userUpdateSuccessful;	

	}
	public function Login($userParms = array()){
		$this->_construct($userParms);
		
		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();
		$pqUser = new user();
		$pqUserType = new userType();


		$pqDatabase->startTransaction($pqConn);
		
		$pqUserSuccess = $pqUser->read($pqConn, $this->username);

		if($pqUserSuccess){
			$user = $pqUser->fetchUser();
			if(!empty($user)){
				$passHash = $user->password;							
			}else{
				$this->loginResult = '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> Invalid <u> Username</u> <i class="fa fa-exclamation-triangle"></i> </div> ';				
				return false;
			}
			// verify password
			if (password_verify($this->password, $passHash)){
				$pqDatabase->commitTransaction($pqConn);
				
				$userType = $pqUserType->read($pqConn, $user['user_type_id']);
				if (session_status() == PHP_SESSION_NONE) {
				    session_start();
					session_regenerate_id(true);
				}
				$_SESSION['logged'] = true;
				$_SESSION['username'] = $user->username;
				$_SESSION['userType'] = $user->user_type_id;				
				$_SESSION['userTypeDescription'] = $userType['description'];

				// set variables for last_log checking and setting
				$this->userId = $user->user_id;
				$this->lastLog = $user->last_log;
				$_SESSION['lastLog'] = $this->lastLog;
				$_SESSION['userId'] = $this->userId;

				if($user->user_type_id == 1){
					header("Location: admin-dashboard.php"); /* Redirect browser */
					exit();
				}else
					if($user->user_type_id == 2){
						header("Location: mod-dashboard.php"); /* Redirect browser */
						exit();
					}else{						
						header("Location: index.php"); /* Redirect browser */					
						exit();
					}
				return true;
			}
			else{
				$pqDatabase->rollBackTransaction($pqConn);			
				$this->loginResult = '<div class="alert alert-danger text-center" role="alert"> <i class="fa fa-exclamation-triangle"></i> Invalid <u> Password</u> <i class="fa fa-exclamation-triangle"></i>  </div>';
				return false;
			}
		}else{
			$pqDatabase->rollBackTransaction($pqConn);			
			$this->loginResult = '<div class="alert alert-danger text-center" role="alert"> USER Transaction Error</div>';
			return false;

		}
	}

	public function Register($userParms = array()){
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
				$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Username must be unique </div>';
			}


		}else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Username must not be empty </div>';
			$userError = true;			
		}

	    if( isset( $userParms['password'] ) ){
	    	 $this->password = stripslashes( strip_tags( $userParms['password'] ) );
            //uncomment for latest php version
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
	    }else{
			$errAlert =$errAlert. ' <div class="alert alert-danger text-center" role="alert"> Password must not be empty </div>';
			$userError = true;			
		}

	    if( isset( $userParms['email'] ) ){
	    	 $this->email = stripslashes( strip_tags( $userParms['email'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Email must not be empty </div>';
			$userError = true;		
		}		

	    if( isset( $userParms['firstName'] ) ){
	    	 $this->firstName = stripslashes( strip_tags( $userParms['firstName'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> First Name must not be empty </div>';
			$userError = true;			
		}				

	    if( isset( $userParms['lastName'] ) ){
	    	 $this->lastName = stripslashes( strip_tags( $userParms['lastName'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Last Name must not be empty </div>';
			$userError = true;			
		}				


	    if( isset( $userParms['birthday'] ) ){
	    	 $this->birthday = stripslashes( strip_tags( $userParms['birthday'] ) );
	    	 $this->birthday = date('Y-m-d', strtodate($this->birthday));
	    	 
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Birthday must not be empty </div>';
			$userError = true;			
		}		

	    if( isset( $userParms['address'] ) ){
	    	 $this->address = stripslashes( strip_tags( $userParms['address'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Address must not be empty </div>';
			$userError = true;			
		}		

	    if( isset( $userParms['mobileNumber'] ) || isset( $userParms['landlineNumber'] ) ){
	    	 $this->mobileNumber = stripslashes( strip_tags( $userParms['mobileNumber'] ) );
	    	 $this->landlineNumber = stripslashes( strip_tags( $userParms['landlineNumber'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Contact details must not be empty </div>';
			$userError = true;			
		}	

	    if( isset( $userParms['secQuestion'] )  ){
	    	 $this->secQuestion = stripslashes( strip_tags( $userParms['secQuestion'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Security Question must not be empty </div>';
			$userError = true;			
		}	

	    if( isset( $userParms['secAnswer'] )  ){
	    	 $this->secAnswer = stripslashes( strip_tags( $userParms['secAnswer'] ) );
	    }else{
			$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Security Answer must not be empty </div>';
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
				$errAlert = $errAlert.' <div class="alert alert-danger text-center" role="alert"> Please select a Payment Option and Schedule</div>';
				$userError = true;			
			}				
			$this->user_type_id = 3;
		}else{
			$this->user_type_id = 3;
		}
		$this->interests = $userParms['interests']; //change later to table for category poll aggregates
		if(!$userError){
	        // start transactions:

			$pqDatabase->startTransaction($pqConn);

			$pqUserDetail = new userDetail();			
			$pqSecurity = new security();

			

			/*temporary, can be shipped to different table*/
			$pqUserDetailSuccess = $pqUserDetail->insert($pqConn, $this->firstName, $this->lastName, $this->email, $this->birthday, $this->interests, 
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
                	print '<div class="alert alert-success text-center"> User '.$this->username.' successfuly registered! </div>';
                }
            }else{
            	// rollback if failed
                $pqDatabase->rollBackTransaction($pqConn);
            }
		}else{
            print $errAlert;
        }
  
		
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
		public $indexCarousel;
		public $categoryDropDown;


		public $prizeId;
		public $newsId;
		public $announcementId;
		public $welcomeMessageId;

	public function SetupSite(){
		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();

		$pqSiteSetup = new siteSetup();

		$pqSiteSetupSuccess = $pqSiteSetup->read($pqConn);
		$siteSetup = $pqSiteSetup->fetchSiteSetup();

		if(!empty($siteSetup)){
			$this->prizeId = $siteSetup->prize_id;
			$this->newsId = $siteSetup->news_id;
			$this->announcementId = $siteSetup->announcement_id;
			$this->welcomeMessageId = $siteSetup->welcome_message_id;			
		}


	}

	public function GetPrizeId(){
		return $this->prizeId;
	}

	public function GetAnnouncementId(){
		return $this->announcementId;
	}


	public function GetNewsId(){
		return $this->newsId;
	}

	public function GetWelcomeMessageId(){
		return $this->welcomeMessageId;
	}

	public function GetPrizeDetails($prizeId){

		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();

		$pqPrize = new prize();
		$pqSponsor = new sponsor();

		$pqPrizeSuccess = $pqPrize->readPrize($pqConn, $prizeId); 
		$prize = $pqPrize->fetchPrize();

		if(!empty($prize))
		{
			$sponsorSuccess = $pqSponsor->readSponsor($pqConn, $prize->sponsor_id);
			$sponsor = $pqSponsor->fetchSponsor();		
		}else{
			$sponsorSuccess = false;
		}

		if($pqPrizeSuccess && !empty($prize) && $sponsorSuccess && !empty($sponsor))
		{
			$prizeDetails = '<h2 class="pq-carousel-caption-header"> Sponsored Prize of the Month by '.$sponsor->name.'</h2>
							<h1 class="pq-carousel-caption-header text-center">'.$prize->description.'</h1>';

		}else{
			$prizeDetails = '<h2 class="pq-carousel-caption-header"> Error Retrieving Setup Info </h2>
							<h1 class="pq-carousel-caption-header text-center">Site needs to be setup!</h1>';
		}

		return $prizeDetails;
	}

	public function GetBanner($prizeId){

		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();

		$pqBanner = new banner();
		$pqPrize = new prize();

		$pqPrizeSuccess = $pqPrize->readPrize($pqConn, $prizeId); 
		$prize = $pqPrize->fetchPrize();

		if(!empty($prize))
		{
			$selectParms = "banner_id, name";
			$bannerSuccess = $pqBanner->readBanner($pqConn, $selectParms, $prize->banner_id);
			$banner = $pqBanner->fetchBanner();

			$_SESSION['bannerId'] = $banner->banner_id;
		}else{
			$bannerSuccess = false;
		}

		if($pqPrizeSuccess && !empty($prize) && $bannerSuccess && !empty($banner))
		{
			$banner ='<div class="fill pq-carousel" style="background-image:url(img.php);">';
		}else{
			$banner ='<div class="fill pq-carousel" style="background-image:url(img/banner-default.png);">';
		}

		return $banner;
	}

	public function GetImage($bannerId){

		$pqDatabase = new pqDatabase();
		$pqConn = $pqDatabase->connectDb();

		$pqBanner = new banner();
		$selectParms = "image, type";
		$bannerSuccess = $pqBanner->readBanner($pqConn, $selectParms, $bannerId);
		$banner = $pqBanner->fetchBanner();

		return $banner;

	}

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
		$this->user = $username;
		$this->userType  = $userType;
		$this->categoryDropDown ='	<li><a href="category-1.php?categoryKey=">Games</a></li>
							    	<li><a href="category-1.php?categoryKey=">Music</a></li>
									<li><a href="category-1.php?categoryKey=">Gadgets</a></li>
									<li class="divider"></li>
									<li><a href="categories.php?">See All Subscription</a></li>';		

		if ($userType == 3 )
		{
			$this->menu = '<li> <a href="account-mgt.php"> Account Management </a> </li>';
			$this->userIndex = 'index.php';
			$this->userSidebar = '<a href="account-mgt.php" class="list-group-item"> Account Management </a>';
			$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="account-mgt.php">Upgrade Now!</a>';
			$this->indexCarousel = '					<div class="row">	
				<div class="col-md-12 col-sm-12 col-xs-12  pull-right ">
					<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
						
							Logged In as Regular User  
						
					</div>
					
					<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
						<a href="account-mgt.php"> Upgrade </a> now to premium user and get a chance to win the monthly prize! <a href="account-mgt.php"> Learn More Here</a> 
					</div>					
				</div>
			</div>';

		}
		else
			if ($userType == 2)
			{
				$this->menu = '<li> <a href="mod-dashboard.php">  Category Set-up </a> </li>
							   <li> <a href="account-mgt.php"> Account Management </a> </li>';		
				$this->userIndex = 'index.php';
				$this->userSidebar = '<a href="mod-dashboard.php" class="list-group-item '.$this->userSidebarActive.'"> Category Set-up </a>';
				$this->userSidebar2 = '<a href="account-mgt.php" class="list-group-item '.$this->userSidebar2Active.'"> Account Management </a>';
				$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="account-mgt.php">Upgrade Now!</a>';
				$this->indexCarousel = '					<div class="row">	
						<div class="col-md-12 col-sm-12 col-xs-12  pull-right ">
							<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
								
									Logged In as Moderator
								
							</div>
							
							<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
								You can set-up your categories<a href="mod-dashboard.php"> Here </a>
							</div>					
						</div>
					</div>';				

			}
			else
				if ($userType == 1)
				{
					$this->menu = '<li> <a href="admin-dashboard.php"> Site Set-up </a> </li>
								   <li> <a href="user-mgt.php"> User Management </a> </li>';			
					$this->userIndex = 'index.php';
					$this->userSidebar = '<a href="admin-dashboard.php" class="list-group-item '.$this->userSidebarActive.'"> Site-setup </a>';
					$this->userSidebar2 = '<a href="user-mgt.php" class="list-group-item '.$this->userSidebar2Active.'"> User Management </a>';
					$this->callToAction = '<a class="btn btn-lg btn-primary btn-block" href="account-mgt.php">Upgrade Now!</a>';
					$this->indexCarousel = '					<div class="row">	
						<div class="col-md-12 col-sm-12 col-xs-12  pull-right ">
							<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
								
									Logged In as Administrator
								
							</div>
							
							<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
								You can set-up the site<a href="admin-dashboard.php"> Here </a>
							</div>					
						</div>
					</div>';					
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
					$this->indexCarousel = '<div class="row">	
							<div class="col-md-12 col-sm-12 col-xs-12 pull-right ">
								<div class="pq-carousel-text pq-carousel-header pq-carousel-text-min">
									
									<a id="loginLink" href="#" class="" data-container="body" data-toggle="modal" data-target="#login">
									Login Here </a> or
									<a href="signup.php"> Sign up </a> now as a premium user and get a chance to win monthly prizes!						
									
								</div>
								
							</div>
						</div>';                        
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
			$this->log = '<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log Out</a></li>';
		}
		else
			{
				$this->log = '<li><a data-toggle="modal" href="#login" data-target=""><span class="glyphicon glyphicon-user"></span> Login</a></li>';
			}
		
	}
	public function GetNewPollAnnouncement($lastLog){
		$categoryControl = new categoryControl();

		return $categoryControl->SetNewPollAnnouncement($lastLog);
	}

	public function GetPollSidebar(){
		$categoryControl = new categoryControl();

		return $categoryControl->SetPollSidebar();
	}

	public function GetPollForm($pollFormError){
		$categoryControl = new categoryControl();

		return $categoryControl->SetPollForm($pollFormError);
	}	

	public function GetSidebar($list1,$list2,$list3,$list4,$list5,$list6)
	{
		$userSidebar='';
		if(isset($_SESSION['logged']) && $_SESSION['logged'])
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

	public function GetIndexCarousel(){
		return $this->indexCarousel;
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