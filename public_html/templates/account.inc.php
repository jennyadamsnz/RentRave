    <div class="profile_group small_container">  
      <div class="row">

          <h2>Welcome <?= $user->first_name;?></h2>
          <h4 class="gap">Your Details:</h4>
          <div class="gap row">
            <div class="col-lg-8">
              <p>Name: <?= $user->first_name.' '. $user->last_name;?></p>
              <p>Username: <?= $user->username;?></p>
              <p>Email: <?= $user->email;?></p>
            </div>
            <div class="edit_details_group col-lg-4 gap">
              <a href="./?page=account.edit&amp;id=<?= $user->id;?>" class="orange_button standard_button">
                <i class="fa fa-pencil" aria-hidden="true"></i> EDIT
              </a>
            </div>
          </div>           
      </div>
    </div>  
    <div class="profile_group small_container">  
      <div class="gap row">
        <h4>Your Reviews:</h4>
            
        <?php if(count($allDetails) > 0 ):?>
          <?php $count=0 ;?>
          <?php foreach ($allDetails as $listing):?>
          <?php $count++ ;

          $img= isset($listing['listing_image_upload_one']) ? $listing['listing_image_upload_one'] : "house_outline.png";
        ?>    

            <div class="listing_summary gap row">            

              <div class="gap col-lg-4">
                
                <img src="./images/poster/thumbnails/<?= $img;?>">
              </div>
              <div class="col-lg-8 review_box">
                <h2><?= $listing['address_street_number'] .' '. $listing['address_street_name'];?></h2>
                <h3>"<?= $listing['review_title'];?>"</h3>
                <p><b>Rental Period: </b><?= $listing['listing_rental_period_start'] .' to '. $listing['listing_rental_period_end'];?></p>
                <p><b>Property Manager/Landlord: </b><?= $listing['listing_agent_or_landlord_name'];?></p>
                <div class="gap">            
                    <a href="./?page=review.edit&amp;id=<?= $listing['id'];?>" class="side_gap orange_button standard_button">
                      <i class="fa fa-pencil" aria-hidden="true"></i> EDIT
                    </a>
                    <a href="./?page=review.delete&amp;id=<?= $listing['id'];?>" class="orange_button standard_button">
                      <i class="fa fa-times" aria-hidden="true"></i> DELETE
                    </a>
                </div>
              </div>  
            </div>   

          <?php endforeach;?>
        <?php endif; ?>          
          
      </div>
    </div>  
