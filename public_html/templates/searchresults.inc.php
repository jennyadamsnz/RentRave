
    <div class="small_container gap">  
      <div class="row">

          <h2 class="inline side_gap">Search Results for </h2>
          <h4 class="inline">"<?= $searchTerm ?>"</h4>    
      </div>
    </div>  



    <div class="small_container">  
      <div class="row">



          <?php foreach ($results as $key => $featuredResult):  

          $sqlStartDate= $featuredResult['listing_rental_period_start']; 
          $startDate=date('d M Y',strtotime($sqlStartDate));  

          $sqlEndDate= $featuredResult['listing_rental_period_end']; 
          $endDate=date('d M Y',strtotime($sqlEndDate));?>

          <div class="row large_gap search_results_box">
            <div class="gap col-xs-4">
              <img src="https://placehold.it/180x150">
            </div>
            <div class="col-xs-8 review_box">
              <h2><?= $featuredResult['address_street_number']?><span> </span><?= $featuredResult['address_street_name'];?></h2>
              <h3>"<?= $featuredResult['review_title']?>"</h3>
              <p><b>Rental Period: </b><?= $startDate." - ".$endDate?></p>
              <p><b>Property Manager/Landlord: </b><?= $featuredResult['listing_agent_or_landlord_name']?></p>
              <div class="gap">
                <a href=".\?page=listing&id=<?= $featuredResult['listing_id'];?>">  
                  <div class="side_gap orange_button standard_button"><i class="fa fa-binoculars" aria-hidden="true"></i> VIEW</div>
                </a>
                <a href=".\?page=review"> 
                <div class="orange_button standard_button"><i class="fa fa-pencil" aria-hidden="true"></i> REVIEW</div>
                </a>
              </div>
            </div>
          </div>  
          <?php endforeach;?>          
      </div>
    </div>  
