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
	            	<div id="amountofhoursvolunteering" class="profileinfo">
	              		CEO:
	            	</div>
	            	<div id="profiledatejoinedvalue" class="profileinfovalue">
	              		<?=$profile['ceo'] ?>
	            	</div>
	        	</div>
	        	<div>
	        		<div id="insideoroutsidequestion" class="profileinfovalue">
	        			Inside or Outside?
	        		</div>
	        		<div id="insideoroutsideanswer" class="profileinfovalue">
	        			<?=$profile['insideoroutside'] ?>
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

	<?=form_open("charity/doreview", array("class" => "form-horizontal", "role" => "form")) ?>

	<div id="writeareviewaboutcharity">
      Write a review about us!
    </div>
    <div id="writingincharity">
   		<textarea id="writeareviewcharity" name="review" placeholder="Type here..."></textarea>
   	</div>
   	
   	<div id="ratingincharity">
   		Rate Your Experience 
   		<select id="charitynumericrating" name="rating">
   			<option value="4">Great!</option>
   			<option value="3">Good</option>
   			<option value="2">Fair</option>
   			<option value="1">Poor</option>
   			<option value="0">Avoid!</option>
   		</select>
   	</div>
   	
   	<div id="hoursvolunteered">
   		How many hours did you volunteer? 
   		<input type="text" id="hoursvolunteer" name="hours"> hours
   	</div>

	<button class="textpost btn btn-primary" type="submit">
		Post
	</button>

	</form>


	<div id="collage">
        <div class="item">
          <img src="img/land1.jpg" width="200" height="200">
        </div>
        
        <div class="item">
          <img src="img/land2.jpg" width="200" height="200">
        </div>
        <div class="item">
          <img src="img/land3.jpg" width="200" height="200">
        </div>           
        <div class="item">
          <img src="img/landvertical.jpg" width="200" height="200">
        </div>
        <div class="item">
          <img src="img/land1.jpg" width="200" height="200">
        </div>
            
      
    </div>

	<div class="btn-group" id="calendarcontrol">
		<button class="btn btn-primary" data-calendar-nav="prev">&lt;&lt; Prev</button>
		<button class="btn" data-calendar-nav="today">Today</button>
		<button class="btn btn-primary" data-calendar-nav="next">Next &gt;&gt;</button>
	</div>
    <h2>Upcoming Opportunities for <span id="calendarmonth"></span></h2>


	<div id="calendar">

	</div>
                    

	<div id="reviewsupercontainer">
	    <div class="reviewcontainer">
	      <div class="reviewcontainerleft">
	        <div class="nameofcharityinreview">
	          Calgary Reads
	        </div>
	        <div class="byreview">
	          By:
	        </div>
	        <div class="nameofreviewer">
	          Liam Waterous
	        </div>

	      </div>
	      
	      <div class="reviewcontainerright">
	        <div class="experienceinreview">
	          The Experience:

	        </div>

	        <div class="textinreview">
	          Echo Park synth hashtag, bitters twee fanny pack Thundercats direct trade. Echo Park scenester meggings, photo booth salvia umami gentrify. Asymmetrical twee mlkshk, 3 wolf moon organic mustache hashtag DIY VHS wayfarers jean shorts freegan before they sold out. Freegan cardigan wayfarers banjo sustainable, meggings trust fund yr kitsch. Butcher wayfarers swag 

	        </div>
	        <div class="ratingsinreview">
	          Rating: 

	        </div>
	        <div class="percentageinreview">
	          93%
	        </div>
	        <div class ="nothelpfulinreview btn">
	          Not Helpful?

	        </div>
	        <div class="helpfulinreview btn btn-primary">
	          Helpful?

	        </div>

	    </div>

  	</div>

    <div class="reviewcontainer">
      <div class="reviewcontainerleft">
        <div class="nameofcharityinreview">
          Calgary Reads
        </div>
        <div class="byreview">
          By:
        </div>
        <div class="nameofreviewer">
          Liam Waterous
        </div>

      </div>
      
      <div class="reviewcontainerright">
        <div class="experienceinreview">
          The Experience:

        </div>

        <div class="textinreview">
          Echo Park synth hashtag, bitters twee fanny pack Thundercats direct trade. Echo Park scenester meggings, photo booth salvia umami gentrify. Asymmetrical twee mlkshk, 3 wolf moon organic mustache hashtag DIY VHS wayfarers jean shorts freegan before they sold out. Freegan cardigan wayfarers banjo sustainable, meggings trust fund yr kitsch. Butcher wayfarers swag 

        </div>
        <div class="ratingsinreview">
          Rating: 

        </div>
        <div class="percentageinreview">
          93%
        </div>
        <div class ="nothelpfulinreview btn">
          Not Helpful?

        </div>
        <div class="helpfulinreview btn btn-primary">
          Helpful?

        </div>

        
      <div>

    </div>

  </div>
</div>