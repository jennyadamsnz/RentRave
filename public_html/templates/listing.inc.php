<?php

  $agency= isset($featuredlisting['listing_agency_name']) ? " - ".$featuredlisting['listing_agency_name'] : " ";
  $rating= isset($featuredlisting['rating']) ? $featuredlisting['rating'] : "0";
  $ratingAlt= isset($featuredlisting['rating']) ? "Overall Star Rating" : "No rating to display"; 

  $sqlStartDate= $featuredlisting['listing_rental_period_start']; 
  $startDate=date('d M Y',strtotime($sqlStartDate));  

  $sqlEndDate= $featuredlisting['listing_rental_period_end']; 
  $endDate=date('d M Y',strtotime($sqlEndDate));  

  $sqlReviewDate= $featuredlisting['review_date_time']; 
  $reviewDate=date('d M Y',strtotime($sqlReviewDate));  

?>    

<div class="listing_group listing_small_container">

  <div class="listing_container listing_small_container gap"> 
        <h2><?= $featuredlisting['address_street_number'].' '.$featuredlisting['address_street_name']; ?></h2>
        <div class="lrg_rating" alt="Rating">
          <img class="div_rating_placeholder" src="./images/ratebutton<?= $rating;?>.png" alt="<?= $rating.' ';?><?= $ratingAlt;?>">      
        </div>
  </div><!--
  --><div class="listing_container listing_small_container large_gap"> 
    <img class="icon" src="./images/bedroomicon<?= $featuredlisting['listing_bedrooms'];?>.png" alt="<?= $featuredlisting['listing_bedrooms'].' ';?> bedrooms icon">
    <img class="icon" src="./images/bathroomicon<?= $featuredlisting['listing_bathrooms'];?>.png" alt="<?= $featuredlisting['listing_bathrooms'].' ';?> bathroom icon">
    <img class="icon" src="./images/garageicon<?= $featuredlisting['listing_garage_carport'];?>.png" alt="<?= $featuredlisting['listing_garage_carport'].' ';?> garage/carport icon">
    <h3 class="last_recorded_rate col-xs-7 large_gap ">Last recorded rate:</h3>
    <h3 class="rate_amount col-xs-3 large_gap text-right">$<?= $featuredlisting['listing_last_recorded_rate'].' ';?>p/w</h3>
  </div>
</div><!--
--><div class="listing_group"><!--
    --><div class="listing_container"><!--
    --><img class="lrg_img" src="./images/poster/<?= $featuredlisting['listing_image_upload_one'];?>" alt=""></img>
    <!-- <div class="gallery_thumbnail"></div> --><!--
    --><!-- <div class="gallery_thumbnail"></div> --><!--
    --><!-- <div class="gallery_thumbnail"></div> --><!--
    --><!-- <div class="gallery_thumbnail"></div> --><!--
    --><!-- <div class="gallery_thumbnail"></div> -->

    <h2 class="boxed_text text_centered gap">Rent Raver Reviews</h2>

    <div class="listing_review_box">
      <h3 class="gap">1. "<?= $featuredlisting['review_title'];?>"</h3>
      <p class="listing_detail"><b>Reviewer: </b><i><?= $featuredlisting['username'];?></i></p>
      <p class="listing_detail"><b>Review Date: </b><i><?= $reviewDate;?></i></p>
      <p class="listing_detail"><b>Rental Period: </b><i><?= $startDate.' to '.$endDate;?></i></p>
      <p class="listing_detail"><b>Property Manager/Landlord: </b><i><?= $featuredlisting['listing_agent_or_landlord_name'].$agency;?></i></p>
      <div class="listing_review_text gap">
        <p><?= $featuredlisting['review_text'];?></p>
      </div>  
    </div>    

  </div><!--
  --><div class="listing_container">
    <div class="gap">
      <table class="ratings_table">
        <tbody>
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_value_for_money']) ? ($featuredlisting['rating_value_for_money']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Value for Money">
            </td><!--
            --><td class="individual_rating"><p>Value for money</p></td>
          </tr>
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_insulation']) ? ($featuredlisting['rating_insulation']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Insulation">
            </td><!--
            --><td class="individual_rating"><p>Insulation</p></td>
          </tr>            
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_noise_proofing']) ? ($featuredlisting['rating_noise_proofing']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Noise proofing">
            </td><!--
            --><td class="individual_rating"><p>Noise proofing</p></td>
          </tr> 
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_sunlight']) ? ($featuredlisting['rating_sunlight']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Sunlight">
            </td><!--
            --><td class="individual_rating"><p>Sunlight</p></td>
          </tr> 
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_damp_or_dry']) ? ($featuredlisting['rating_damp_or_dry']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Damp or Dry">
            </td><!--
            --><td class="individual_rating"><p>Damp or Dry</p></td>
          </tr> 
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_landlord_property_manager']) ? ($featuredlisting['rating_landlord_property_manager']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Landlord/Agent">
            </td><!--
            --><td class="individual_rating"><p>Landlord/Agent</p></td>
          </tr> 
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_heating']) ? ($featuredlisting['rating_heating']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Heating">
            </td><!--
            --><td class="individual_rating"><p>Heating</p></td>
          </tr>                 
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_public_transportation']) ? ($featuredlisting['rating_public_transportation']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Public Transportation">
            </td><!--
            --><td class="individual_rating"><p>Public Transportation</p></td>
          </tr> 
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_security']) ? ($featuredlisting['rating_security']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Security">
            </td><!--
            --><td class="individual_rating"><p>Security</p></td>
          </tr> 
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_ease_of_maintenance']) ? ($featuredlisting['rating_ease_of_maintenance']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Easy of maintenance">
            </td><!--
            --><td class="individual_rating"><p>Easy of maintenance</p></td>
          </tr> 
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_nearby_services']) ? ($featuredlisting['rating_nearby_services']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Nearby services e.g. shops, parks">
            </td><!--
            --><td class="individual_rating"><p>Nearby services <i>e.g. shops, parks</i></p></td>
          </tr>         
          <tr class="small_gap">
            <td class="rating_icons">
              <img class="sml_img" src="./images/ratebutton<?= isset($featuredlisting['rating_neighbors_neighborhood']) ? ($featuredlisting['rating_neighbors_neighborhood']) : "0";?>.png" alt="<?= $featuredlisting['rating_value_for_money'].' ';?>Star Rating for Neighbors/neighborhood">
            </td><!--
            --><td class="individual_rating"><p>Neighbors/neighborhood</p></td>
          </tr> 
        </tbody>
      </table>
      <iframe class="gap map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11981.491680891831!2d174.7771118!3d-41.3442474!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38a535d0337915%3A0x76734de117c04584!2s174+The+Esplanade%2C+Island+Bay%2C+Wellington+6023!5e0!3m2!1sen!2snz!4v1464756492076" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      <h3 class="gap">Other recently rated rentals:</h3>
      <table class="other_listings_table gap">
        <tbody>
              <?php $count = 1; ?>
              <?php foreach ($featuredOtherListing as $key => $listing): 
                  $count++;                  
                  if( $count < 5) :
              ?> 
              <a href="#">
                <tr>
                  <td>
                    <img src="https://placehold.it/110x85" alt="Picture of a property">
                  </td>
                  <td>
                    <h3><?= $listing['address_suburb'];?></h3>
                    <p>Last recorded rate: $<?= $listing['listing_last_recorded_rate'].' ';?></p>
                    <p><?= $listing['listing_bedrooms'].' ';?>bedrooms</p>
                    <p><?= $listing['listing_bathrooms'].' ';?>bathrooms</p>
                  </td>
                </tr>
              </a>
            <?php endif; ?>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>  
  </div>
</div>
  