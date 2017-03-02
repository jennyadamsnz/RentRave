<div class="home_group row">
<?php $count = 0; ?>
<?php foreach ($featuredListing as $key => $listing): 
    $count++;
    
	$rating= isset($listing['rating']) ? $listing['rating'] : "0";
  	$ratingAlt= isset($listing['rating']) ? "Overall Star Rating" : "No rating to display";

  	if( $count < 5) : ?>		 
			<div class="featured_property">
				<a href=".\?page=listing&id=<?= $listing['id'];?>">
					<h2><?= $listing['address_suburb'];?></h2>
					<h3><?= $listing['address_street_number']?><span> </span><?= $listing['address_street_name'];?></h3>
					<img class="div_img_placeholder small_gap" src="./images/poster/<?= $listing['listing_image_upload_one'];?>" alt="property image">
						<img class="div_rating_placeholder small_gap" src="./images/ratebutton<?= $rating;?>.png" alt="<?= $rating.' ';?><?= $ratingAlt;?>">
					<p class="copyright small_gap">"<?= $listing['review_title']."...";?>"</p>		
				</a>
			</div>
	<?php endif; ?>
<?php endforeach;?>
</div>	
		