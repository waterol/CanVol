<div class="container">
	<div id="charityinfo">
		<div class="row">
			<div class="col-sm-3">
				<div id="charitylogo">
					<img id="charityimage" src="<?=base_url() ?><?=$profile['portraitpath'] ?>">

				</div>
				<div id="percentagecharity">

					<?=$profile['rating'] ?>%

				</div>
			</div>

			<div class="col-sm-4">

				<div id="nameofcharity">
					<?=$profile['name'] ?>
				</div>
				<div id="profilecontanctinfo">
	        		
	            	<div id="profile-datejoined" class="profileinfo">
	            	  Link to Website:
	            	</div>
	            	<div id="datejoinedonprofile" class="profileinfovalue">
	              		<a href="<?=$profile['website'] ?>">
	              			<?=$profile['website'] ?>
	              		</a>
	            	</div>
	        	</div>
	        	<div>
	            	<div id="currentlyliving" class="profileinfo">
	              		Location:
	            	</div>
	            	<div id="currentlylivingresponse" class="profileinfovalue">
	            	  <?=$profile['location'] ?>
	            	</div>
	        	</div>
	        	<div>
	            	<div id="favouritecharity" class="profileinfo">
	            	  Help Line:
	            	</div>
	            	<div id="amountofhourse" class="profileinfovalue">
	              		<?=$profile['helpline'] ?>
	            	</div>
	            </div>
	            <div>
	            	<div id="agerequirment" class="profileinfo">
	            	  Age
	            	</div>
	            	<div class="profileinfovalue">
	              		<?=$profile['agegroup_min'] ?> -
	              		<?=$profile['agegroup_max'] ?>
	            	</div>
	            </div><div>
	            	<div id="focusincharity" class="profileinfo">
	            	  Charity Focus
	            	</div>
	            	<div id="amountofhourse" class="profileinfovalue">
	              		<?=ucfirst($profile['focus']) ?>

	            	</div>
	            </div>
	        </div>
	    <div class="col-sm-5">
		    <div id="charitybiobackground">
				<div id="charityprofiletitle">
					Who Are We?
				</div>
				<div id="charityprofiletext">
					<?=$profile['description'] ?>
				</div>
				
			</div>
			<div id="charitybiowhyus">
				<div id="whyustitle">
					Why Volunteer for Us?
				</div>
				<div id="whyustext">
					<?=$profile['whyvolunteer'] ?>	
				</div>

			</div>
		</div>
	</div>

	<?=form_open("charity/doreview", array("class" => "form-horizontal", "role" => "form", "enctype"=>"multipart/form-data")) ?>

	<div id="writeareviewaboutcharity">
      Write a review about us!
    </div>

	<?php if(isset($message)): ?>
		<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert">×</a> <?=$message ?></div>
	<?php endif ?>
	<?php 
		$verrors = validation_errors();
		if($verrors != ""): 
	?>
		<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert">×</a> <?=$verrors ?></div>
	<?php endif ?>

	<?php if(array_key_Exists("volunteerid", $_SESSION)): ?>

    <div id="writingincharity">
   		<textarea id="writeareviewcharity" name="review" placeholder="Type here..."><?=set_value('review'); ?></textarea>
   	</div>
   	<div id="besidethereview">
	   	<div id="ratingincharity">
	   		Rate Your Experience 
	   		<select id="charitynumericrating" name="rating">
	   			<option value="4" <?=set_select('rating', '4', TRUE); ?>>Great!</option>
	   			<option value="3" <?=set_select('rating', '3'); ?>>Good</option>
	   			<option value="2" <?=set_select('rating', '2'); ?>>Fair</option>
	   			<option value="1" <?=set_select('rating', '1'); ?>>Poor</option>
	   			<option value="0" <?=set_select('rating', '0'); ?>>Avoid!</option>
	   		</select>
	   	</div>
	   	
	   	<div id="hoursvolunteered">
	   		How many hours did you volunteer? 
	   		<input type="text" id="hoursvolunteer" name="hours" value="<?=set_value('hours'); ?>"> 
	   	</div>
	 </div>

	 <div id="uploadimages">
	 	<p>You may upload three images you took of you volunteering for this event to share with others!</p>

	 	<input type="file" name="experienceimage[]">
		<input type="file" name="experienceimage[]">
		<input type="file" name="experienceimage[]">
	 </div>

	<button class="textpost btn btn-primary" type="submit" id="postincharity">
		Post
	</button>
	
	<?php else: ?>

	<div id="pleaselogin">Please login to write a review!</div>

	<?php endif ?>

	</form>

	<div id="charityphotosincharity">
		People Volunteering at our Charity!
	</div>

	<div id="collage">
		<?php if(!is_null($images)): ?>
		<?php @foreach($images as $image): ?>
		<div class="item">
          <img src="<?=base_url() ?>userimages/volunteerimages/<?=$image['imagepath'] ?>" width="200" height="200">
        </div>

		<?php endforeach ?>
	<?php endif ?>
        <!--<div class="item">
          <img src="<?=base_url() ?>img/land1.jpg" width="200" height="200">
        </div>
        
        <div class="item">
          <img src="<?=base_url() ?>img/land2.jpg" width="200" height="200">
        </div>
        <div class="item">
          <img src="<?=base_url() ?>img/land3.jpg" width="200" height="200">
        </div>           
        <div class="item">
          <img src="<?=base_url() ?>img/landvertical.jpg" width="200" height="200">
        </div>
        <div class="item">
          <img src="<?=base_url() ?>img/land1.jpg" width="200" height="200">
        </div>
         -->
      
    </div>

	<!--<div class="btn-group" id="calendarcontrol">
		<button class="btn btn-primary" data-calendar-nav="prev">&lt;&lt; Prev</button>
		<button class="btn" data-calendar-nav="today">Today</button>
		<button class="btn btn-primary" data-calendar-nav="next">Next &gt;&gt;</button>
	</div>
    <h2>Upcoming Opportunities for <span id="calendarmonth"></span></h2>


	<div id="calendar">
	</div>-->

	<?php if(!is_null($reviews)): ?>
		<?php foreach($reviews as $review): ?>
			<div id="reviewsupercontainer">
			    <div class="reviewcontainer">
			      <div class="reviewcontainerleft">
			        <div class="nameofcharityinreview">
			          <?=$profile['name'] ?>
			        </div>
			        <div class="byreview">
			          By:
			        </div>
			        <div class="nameofreviewer">
			          <?=$review['firstname'] ?> <?=$review['lastname'] ?>
			        </div>

			      </div>
			      
			      <div class="reviewcontainerright">
			        <div class="experienceinreview">
			          The Experience:

			        </div>

			        <div class="textinreview">
			          <?=$review['review'] ?>
			        </div>
			        <div class="ratingsinreview">
			          Rating: 

			        </div>
			        <div class="percentageinreview">
			          <?=$review['rating'] ?>
			        </div>
			        <div class ="nothelpfulinreview btn">
			          Not Helpful?

			        </div>
			        <div class="helpfulinreview btn btn-primary">
			          Helpful?

			        </div>

			    </div>

		  	</div>

		<?php endforeach ?>
	<?php else: ?>
	<p id="noreviewsincharity">No Reviews... Yet</p>

	<?php endif ?>
                  

    </div>

  </div>
</div>