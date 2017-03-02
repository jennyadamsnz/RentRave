<?php

  $action= isset($_GET['id']) ? "./?page=review.update" : "./?page=create.listing";
  $title= isset($_GET['id']) ? " Edit your review" : " Write a review";
  $value= isset($_GET['id']) ? " UPDATE" : " SUBMIT";
  $updatevisibility= isset($_GET['id']) ? " hide" : " ";
  $newvisibility= isset($_GET['id']) ? " " : " hide";
  $field= isset($_GET['id']) ? " " : "auto_field field";
  var_dump($featuredlisting);
  die();

?>    

    <form id="review_form" action=<?= $action; ?> method="post" enctype="multipart/form-data"> 
      <input type="hidden" name="address_id" value=""> 
      <input type="hidden" name="listing_id" value=""> 
      <input type="hidden" name="review_id" value=""> 

      <div class="small_container gap">  
        <div class="row">        
          <h2><?= $title; ?></h2>
          <p class="gap"><b>Property Details:</b></p>
          <div id="locationField">
              <input id="autocomplete" class="review_field gap<?= $updatevisibility; ?>" name="address_search" placeholder="Enter address here..." onFocus="geolocate()" type="text"></input>
              <span class="text-danger"><?= $addresses->errors['address_suburb'];?></span>
          </div>
          <table id="address">
            <tr><!--
              --><td class="slimField gap_right">
                <p class="<?= $newvisibility; ?>">Street Number:</p>
                <?php $stNumber = isset ($featuredlisting['address_street_number']) ? $featuredlisting['address_street_number'] : '';?>
                <input class="<?= $field; ?> review_field" id="street_number" name="address_street_number" placeholder="Street Number" value="<?= $stNumber;?>"></input>
              </td><!--
              --><td class="wideField" colspan="2">
                <p class="<?= $newvisibility; ?>">Street Name:</p>
                <?php $stName = isset ($featuredlisting['address_street_name']) ? $featuredlisting['address_street_name'] : '';?>
                <input class="<?= $field; ?> review_field" id="route" name="address_street_name" placeholder="Street Name" value="<?= $stName;?>"></input>
              </td>
            </tr>
            <tr><!--
              --><td class="slimField gap_right" colspan="3">
                <p class="<?= $newvisibility; ?>">Suburb:</p>
                <?php $suburb = isset ($featuredlisting['address_suburb']) ? $featuredlisting['address_suburb'] : '';?>
                <input class="<?= $field; ?> review_field" id="sublocality_level_1" name="address_suburb" placeholder="Suburb" value="<?= $suburb;?>"></input>
              </td><!--
              --><td class="wideField" colspan="3">
                <p class="<?= $newvisibility; ?>">City:</p>
                <?php $city = isset ($featuredlisting['address_city']) ? $featuredlisting['address_city'] : '';?>
                <input class="<?= $field; ?> review_field" id="locality" name="address_city" placeholder="City" value="<?= $city;?>"></input>
              </td>
            </tr>           
          </table>           
            <div class="property_feature_group property_feature_icon_one gap">
              <p>Bedrooms:</p>
              <div class="dropdown">
                <select class="review_dropdown_features selectpicker bedrooms_dropdown" name="listing_bedrooms" title=" ">
                  <option value="1" <?php if(!isset ($featuredlisting['listing_bedrooms'])){ echo '';} elseif($featuredlisting['listing_bedrooms'] == 1){echo "selected";} ?>>1</option>
                  <option value="2" <?php if(!isset ($featuredlisting['listing_bedrooms'])){ echo '';} elseif($featuredlisting['listing_bedrooms'] == 2){echo "selected";} ?>>2</option>
                  <option value="3" <?php if(!isset ($featuredlisting['listing_bedrooms'])){ echo '';} elseif($featuredlisting['listing_bedrooms'] == 3){echo "selected";} ?>>3</option>
                  <option value="4" <?php if(!isset ($featuredlisting['listing_bedrooms'])){ echo '';} elseif($featuredlisting['listing_bedrooms'] == 4){echo "selected";} ?>>4</option>
                  <option value="5" <?php if(!isset ($featuredlisting['listing_bedrooms'])){ echo '';} elseif($featuredlisting['listing_bedrooms'] == 5){echo "selected";} ?>>5</option>
                  <option value="6" <?php if(!isset ($featuredlisting['listing_bedrooms'])){ echo '';} elseif($featuredlisting['listing_bedrooms'] == 6){echo "selected";} ?>>6</option>
                  <option value="7" <?php if(!isset ($featuredlisting['listing_bedrooms'])){ echo '';} elseif($featuredlisting['listing_bedrooms'] == 7){echo "selected";} ?>>7</option>
                  <option value="8" <?php if(!isset ($featuredlisting['listing_bedrooms'])){ echo '';} elseif($featuredlisting['listing_bedrooms'] == 8){echo "selected";} ?>>8</option>
                </select>            
                <img class="property_feature_icon" src="./images/bedrooms_icon.png" alt="bedroom icon">
              </div>   
            </div><!--
            --><div class="property_feature_group property_feature_icon_two gap">   
              <p>Bathrooms:</p>       
              <div class="dropdown">
                <select class="review_dropdown_features selectpicker bathrooms_dropdown" name="listing_bathrooms" title=" ">
                  <option value="1" <?php if(!isset ($featuredlisting['listing_bathrooms'])){ echo '';} elseif($featuredlisting['listing_bathrooms'] == 1){echo "selected";} ?>>1</option>
                  <option value="2" <?php if(!isset ($featuredlisting['listing_bathrooms'])){ echo '';} elseif($featuredlisting['listing_bathrooms'] == 2){echo "selected";} ?>>2</option>
                  <option value="3" <?php if(!isset ($featuredlisting['listing_bathrooms'])){ echo '';} elseif($featuredlisting['listing_bathrooms'] == 3){echo "selected";} ?>>3</option>
                  <option value="4" <?php if(!isset ($featuredlisting['listing_bathrooms'])){ echo '';} elseif($featuredlisting['listing_bathrooms'] == 4){echo "selected";} ?>>4</option>
                  <option value="5" <?php if(!isset ($featuredlisting['listing_bathrooms'])){ echo '';} elseif($featuredlisting['listing_bathrooms'] == 5){echo "selected";} ?>>5</option>
                  <option value="6" <?php if(!isset ($featuredlisting['listing_bathrooms'])){ echo '';} elseif($featuredlisting['listing_bathrooms'] == 6){echo "selected";} ?>>6</option>
                  <option value="7" <?php if(!isset ($featuredlisting['listing_bathrooms'])){ echo '';} elseif($featuredlisting['listing_bathrooms'] == 7){echo "selected";} ?>>7</option>
                  <option value="8" <?php if(!isset ($featuredlisting['listing_bathrooms'])){ echo '';} elseif($featuredlisting['listing_bathrooms'] == 8){echo "selected";} ?>>8</option>
                </select>            
                <img class="property_feature_icon" src="./images/bathrooms_icon.png" alt="bathroom icon">
              </div>    
            </div><!--
            --><div class="property_feature_group property_feature_icon_three gap">
              <p>Garage/Carport:</p>
              <div class="dropdown">
                <select class="review_dropdown_features selectpicker garage_carport_dropdown" name="listing_garage_carport" title=" ">
                  <option value="0" <?php if(!isset ($featuredlisting['listing_garage_carport'])){ echo '';} elseif($featuredlisting['listing_garage_carport'] == 0){echo "selected";} ?>>0</option>
                  <option value="1" <?php if(!isset ($featuredlisting['listing_garage_carport'])){ echo '';} elseif($featuredlisting['listing_garage_carport'] == 1){echo "selected";} ?>>1</option>
                  <option value="2" <?php if(!isset ($featuredlisting['listing_garage_carport'])){ echo '';} elseif($featuredlisting['listing_garage_carport'] == 2){echo "selected";} ?>>2</option>
                  <option value="3" <?php if(!isset ($featuredlisting['listing_garage_carport'])){ echo '';} elseif($featuredlisting['listing_garage_carport'] == 3){echo "selected";} ?>>3</option>
                  <option value="4" <?php if(!isset ($featuredlisting['listing_garage_carport'])){ echo '';} elseif($featuredlisting['listing_garage_carport'] == 4){echo "selected";} ?>>4</option>
                </select>            
                <img class="property_feature_icon" src="./images/garage_icon.png" alt="garage/carport icon">
              </div>    
            </div><!--
            --><div class="managed_by_group managed_by_icon_one gap">
              <div class="dropdown">
                <select class="review_dropdown_managed_by selectpicker managed_by_dropdown" name="landlord_or_agency" title="Managed by:">
                  <option value="landlord" <?php if(!isset ($featuredlisting['listing_agency_name'])) { echo '';} elseif($featuredlisting['listing_agency_name'] == ''){echo "selected";} ?>>Landlord</option>
                  <option class="agency_selector" value="agency" <?php if(!isset ($featuredlisting['listing_agency_name'])) { echo '';} elseif($featuredlisting['listing_agency_name'] !== ''){echo "selected";} ?>>Agency</option>
                </select> 
              </div>   
            </div><!--
            --><div class="managed_by_group managed_by_icon_two gap">
              <?php $agencyName = isset ($featuredlisting['listing_agency_name']) ? $featuredlisting['listing_agency_name'] : '';?>
              <input id="here-disabled" class="review_field review_dropdown" type="text" name="listing_agency_name" placeholder="Agency's Name" value="<?= $agencyName;?>"> 
              <span class="text-danger"><?= $listings->errors['listing_agency_name'];?></span>
            </div><!--
            --><div class="managed_by_group managed_by_icon_three gap">
              <?php $agentOrLandlordName = isset ($featuredlisting['listing_agent_or_landlord_name']) ? $featuredlisting['listing_agent_or_landlord_name'] : '';?>
              <input class="review_field review_dropdown" type="text" name="listing_agent_or_landlord_name" placeholder="Landlord/Agent's Name" value="<?= $agentOrLandlordName;?>"> 
              <span class="text-danger"><?= $listings->errors['listing_agent_or_landlord_name'];?></span>
            </div>        
          </div><!--
          --><div class="gap row"><!--
            --><p class="gap"><b>Your Review:</b></p>
            <div class="rental_period_start dates_and_price_group">
              <p class="gap">Start Date:</p>
              <?php $startDate = isset ($featuredlisting['listing_rental_period_start']) ? $featuredlisting['listing_rental_period_start'] : '';?>
              <input class="field review_field" name="listing_rental_period_start" type="date" placeholder="" value=<?= $startDate;?>></input>
            </div><!--
            --><div class="rental_period_end dates_and_price_group gap_right">
              <p class="gap">End Date:</p>
              <?php $endDate = isset ($featuredlisting['listing_rental_period_end']) ? $featuredlisting['listing_rental_period_end'] : '';?>
              <input class="field review_field" name="listing_rental_period_end" type="date" placeholder="" value=<?= $endDate;?>></input>
              </div><!--
            --><div class="last_recorded_rate dates_and_price_group">
            <p class="gap">Weekly Rate:</p>
            <span class="field review_field">
              <span>$</span>
              <?php $weeklyRate = isset ($featuredlisting['listing_last_recorded_rate']) ? $featuredlisting['listing_last_recorded_rate'] : '';?>
              <input class="weekly_rate" name="listing_last_recorded_rate" type="number" min="0.01" step="0.01" value="$<?= $weeklyRate;?>"></input>
            </span>
            </div>          
          </div>      
      </div>  
      <div class="special_container"> 
        <div class="row gap">
          <div class="table_container gap special_container">
            <table class="review_table">
              <tbody>
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Value for Money:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">Overpriced</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_value_for_money" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_value_for_money']) && $featuredlisting['rating_value_for_money'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_value_for_money" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_value_for_money']) && $featuredlisting['rating_value_for_money'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_value_for_money" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_value_for_money']) && $featuredlisting['rating_value_for_money'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_value_for_money" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_value_for_money']) && $featuredlisting['rating_value_for_money'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_value_for_money" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_value_for_money']) && $featuredlisting['rating_value_for_money'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Good Value</p>
                  </td>  
                </tr>  
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Insulation:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">None/little</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_insulation" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_insulation']) && $featuredlisting['rating_insulation'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_insulation" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_insulation']) && $featuredlisting['rating_insulation'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_insulation" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_insulation']) && $featuredlisting['rating_insulation'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_insulation" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_insulation']) && $featuredlisting['rating_insulation'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_insulation" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_insulation']) && $featuredlisting['rating_insulation'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Fully Insulated</p>
                  </td>  
                </tr>      
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Noise Proofing:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">None/little</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_noise_proofing" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_noise_proofing']) && $featuredlisting['rating_noise_proofing'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_noise_proofing" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_noise_proofing']) && $featuredlisting['rating_noise_proofing'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_noise_proofing" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_noise_proofing']) && $featuredlisting['rating_noise_proofing'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_noise_proofing" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_noise_proofing']) && $featuredlisting['rating_noise_proofing'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_noise_proofing" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_noise_proofing']) && $featuredlisting['rating_noise_proofing'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Nearly Soundproof</p>
                  </td>  
                </tr>   
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Sunlight:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">None/little</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_sunlight" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_sunlight']) && $featuredlisting['rating_sunlight'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_sunlight" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_sunlight']) && $featuredlisting['rating_sunlight'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_sunlight" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_sunlight']) && $featuredlisting['rating_sunlight'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_sunlight" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_sunlight']) && $featuredlisting['rating_sunlight'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_sunlight" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_sunlight']) && $featuredlisting['rating_sunlight'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Lots of light</p>
                  </td>  
                </tr>   
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Damp or Dry:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">Damp & Mouldy</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_damp_or_dry" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_damp_or_dry']) && $featuredlisting['rating_damp_or_dry'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_damp_or_dry" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_damp_or_dry']) && $featuredlisting['rating_damp_or_dry'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_damp_or_dry" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_damp_or_dry']) && $featuredlisting['rating_damp_or_dry'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_damp_or_dry" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_damp_or_dry']) && $featuredlisting['rating_damp_or_dry'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_damp_or_dry" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_damp_or_dry']) && $featuredlisting['rating_damp_or_dry'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">No moisture issues</p>
                  </td>  
                </tr>   
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Landlord/Property Manager:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">Unreliable</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_landlord_property_manager" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_landlord_property_manager']) && $featuredlisting['rating_landlord_property_manager'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_landlord_property_manager" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_landlord_property_manager']) && $featuredlisting['rating_landlord_property_manager'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_landlord_property_manager" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_landlord_property_manager']) && $featuredlisting['rating_landlord_property_manager'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_landlord_property_manager" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_landlord_property_manager']) && $featuredlisting['rating_landlord_property_manager'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_landlord_property_manager" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_landlord_property_manager']) && $featuredlisting['rating_landlord_property_manager'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Fantastic</p>
                  </td>  
                </tr>   
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Heating:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">No Heating</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_heating" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_heating']) && $featuredlisting['rating_heating'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_heating" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_heating']) && $featuredlisting['rating_heating'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_heating" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_heating']) && $featuredlisting['rating_heating'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_heating" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_heating']) && $featuredlisting['rating_heating'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_heating" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_heating']) && $featuredlisting['rating_heating'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Great e.g. Heatpump</p>
                  </td>  
                </tr>   
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Public Transportation:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">None/little</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_public_transportation" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_public_transportation']) && $featuredlisting['rating_public_transportation'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_public_transportation" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_public_transportation']) && $featuredlisting['rating_public_transportation'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_public_transportation" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_public_transportation']) && $featuredlisting['rating_public_transportation'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_public_transportation" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_public_transportation']) && $featuredlisting['rating_public_transportation'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_public_transportation" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_public_transportation']) && $featuredlisting['rating_public_transportation'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Well connected</p>
                  </td>  
                </tr>  
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Security:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">Not secure</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_security" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_security']) && $featuredlisting['rating_security'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_security" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_security']) && $featuredlisting['rating_security'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_security" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_security']) && $featuredlisting['rating_security'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_security" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_security']) && $featuredlisting['rating_security'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_security" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_security']) && $featuredlisting['rating_security'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Very secure</p>
                  </td>  
                </tr>   
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Ease of maintenance:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">Hard Work</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_ease_of_maintenance" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_ease_of_maintenance']) && $featuredlisting['rating_ease_of_maintenance'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_ease_of_maintenance" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_ease_of_maintenance']) && $featuredlisting['rating_ease_of_maintenance'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_ease_of_maintenance" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_ease_of_maintenance']) && $featuredlisting['rating_ease_of_maintenance'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_ease_of_maintenance" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_ease_of_maintenance']) && $featuredlisting['rating_ease_of_maintenance'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_ease_of_maintenance" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_ease_of_maintenance']) && $featuredlisting['rating_ease_of_maintenance'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Simple</p>
                  </td>  
                </tr>   
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Nearby Services: <i>e.g. shops, parks</i></h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">None/little</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_nearby_services" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_nearby_services']) && $featuredlisting['rating_nearby_services'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_nearby_services" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_nearby_services']) && $featuredlisting['rating_nearby_services'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_nearby_services" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_nearby_services']) && $featuredlisting['rating_nearby_services'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_nearby_services" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_nearby_services']) && $featuredlisting['rating_nearby_services'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_nearby_services" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_nearby_services']) && $featuredlisting['rating_nearby_services'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Lots nearby</p>
                  </td>  
                </tr>   
                <tr>
                  <td class="td_title">
                    <h5 class="large_gap">Neighbors/neighborhood:</h5>
                  </td><!--
                  --><td class="td_subtitle text_centered">
                    <p class="left_side">Noisy/ unfriendly</p>
                  </td><!--
                  --><td class="td_radios">
                    <span>1 2 3 4 5</span>  
                    <div class="radio_buttons_group">
                      <input class="rating_radio_button" type="radio" name="rating_neighbors_neighborhood" id="optionsRadio1" value="1" <?php if(isset($featuredlisting['rating_neighbors_neighborhood']) && $featuredlisting['rating_neighbors_neighborhood'] == 1){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_neighbors_neighborhood" id="optionsRadio2" value="2" <?php if(isset($featuredlisting['rating_neighbors_neighborhood']) && $featuredlisting['rating_neighbors_neighborhood'] == 2){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_neighbors_neighborhood" id="optionsRadio3" value="3" <?php if(isset($featuredlisting['rating_neighbors_neighborhood']) && $featuredlisting['rating_neighbors_neighborhood'] == 3){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_neighbors_neighborhood" id="optionsRadio4" value="4" <?php if(isset($featuredlisting['rating_neighbors_neighborhood']) && $featuredlisting['rating_neighbors_neighborhood'] == 4){echo "checked";} ?>>
                      <input class="rating_radio_button" type="radio" name="rating_neighbors_neighborhood" id="optionsRadio5" value="5" <?php if(isset($featuredlisting['rating_neighbors_neighborhood']) && $featuredlisting['rating_neighbors_neighborhood'] == 5){echo "checked";} ?>>
                    </div> 
                  </td><!--   
                  --><td class="td_subtitle">
                    <p class="right_side">Great</p>
                  </td>  
                </tr>   
              </tbody>
            </table>
          </div>   
        </div>  
      </div>
      <div class="small_container">  
        <div class="row">
      
          <?php $reviewTitle = isset ($featuredlisting['review_title']) ? $featuredlisting['review_title'] : '';?>
          <input class="review_field gap" type="text" name="review_title" placeholder="Your review title" value="<?= $reviewTitle;?>">
          <p class="error_field"><?= isset($this->data['review_title']) ? $this->data['review_title'] : '' ?></p>
           <span class="text-danger"><?= $reviews->errors['review_title'];?></span>
          <?php $reviewText = isset ($featuredlisting['review_text']) ? $featuredlisting['review_text'] : '';?>
          <textarea type="text" name="review_text" placeholder="Your review..."><?= $reviewText;?></textarea>
          <p class="error_field"><?= isset($this->data['review_text']) ? $this->data['review_text'] : '' ?></p>
           <span class="text-danger"><?= $reviews->errors['review_text'];?></span>
        </div>
      </div>        
      <div class="small_container">  
        <div class="camera_container row gap">
          <p>Add photos (optional) 6 max</p>
          <div class="camera_icon_box camera_one">   
            <input type="file" id="image_upload_one" class="uploaded_image" name="listing_image_upload_one" type="file" data-multiple-caption="{count} files selected" multiple/>         
            <label class="camera_icon" for="image_upload_one"><span></span></label>
          </div><!--
          --><div class="camera_icon_box camera_two">
            <input type="file" id="image_upload_two" class="uploaded_image" name="listing_image_upload_two" type="file" data-multiple-caption="{count} files selected" multiple/>         
            <label class="camera_icon" for="image_upload_two"><span></span></label>
          </div><!--
          --><div class="camera_icon_box camera_three">
            <input type="file" id="image_upload_three" class="uploaded_image" name="listing_image_upload_three" type="file" data-multiple-caption="{count} files selected" multiple/>         
            <label class="camera_icon" for="image_upload_three"><span></span></label>
          </div><!--
          --><div class="camera_icon_box camera_four">
            <input type="file" id="image_upload_four" class="uploaded_image" name="listing_image_upload_four" type="file" data-multiple-caption="{count} files selected" multiple/>         
            <label class="camera_icon" for="image_upload_four"><span></span></label>
          </div><!--
          --><div class="camera_icon_box camera_five">
            <input type="file" id="image_upload_five" class="uploaded_image" name="listing_image_upload_five" type="file" data-multiple-caption="{count} files selected" multiple/>         
            <label class="camera_icon" for="image_upload_five"><span></span></label>
          </div><!--
          --><div class="camera_icon_box camera_six">
            <input type="file" id="image_upload_six" class="uploaded_image" name="listing_image_upload_six" type="file" data-multiple-caption="{count} files selected" multiple/>         
            <label class="camera_icon" for="image_upload_six"><span></span></label>
          </div>
        </div>
      </div>       
      <div class="small_container">  
        <div class="row">
          <div class="center_button gap">
            <div class="standard_button">
              <input type="submit" name="" value=<?= $value; ?>>
            </div>
          </div>  
        </div>
      </div>  
    </form>
        <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        sublocality_level_1: 'short_name'
      };


      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.

          var options = {
            types: ['address'],
            componentRestrictions: {country: "nz"}
          };

          var input = document.getElementById('autocomplete');


        autocomplete = new google.maps.places.Autocomplete(input, options);

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        console.log(place);
        var input = document.getElementById('searchTextField');

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          
        }
        
       // console.log(componentForm);
       // Inject the suburb into the data

        
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqIS3gXe-mwWNm2LuWZShwZnbx4nmbsiU&libraries=places&callback=initAutocomplete"
        async defer>
    </script>
    <script>
      
      var inputs = document.querySelectorAll( '.uploaded_image' );

      Array.prototype.forEach.call( inputs, function( input )
      {
        var label  = input.nextElementSibling,
          labelVal = label.innerHTML;

        input.addEventListener('change', function( e )
        {
          var confirmation = '<i class="fa fa-picture-o" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i>';

          if( confirmation )
            label.querySelector( 'span' ).innerHTML = confirmation;
          else
            label.innerHTML = labelVal;
        });
      });
    </script>