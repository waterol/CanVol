<div class="container">
  <div id="profiletop">
    <div class="row">
      <div class="col-sm-2">
        <div id="profilelogo">
          <img id="profileimage" src="<?=base_url() ?><?=$profile['portraitpath'] ?>">
        </div>
        <div id="profilereputation">
          <?=$profile['stars'] ?> Stars

        </div>
      </div>




      <div class="col-sm-4">
        <div id="nameofprofile">
          <?=$profile['firstname'] ?> <?=$profile['lastname'] ?>
        </div>
        <div id="profilecontanctinfo">
          <div>
            <div id="profile-datejoined" class="profileinfo">
              Date Joined:
            </div>
            <div id="datejoinedonprofile" class="profileinfovalue">
              <?=Date('F j, Y', $profile['datejoined']) ?> 
            </div>
          </div>
          <div>
            <div id="currentlyliving" class="profileinfo">
              Currently Living in:
            </div>
            <div id="currentlylivingresponse" class="profileinfovalue">
              <?=$profile['location'] ?>
            </div>
          </div>
          <div>
            <div id="favouritecharity" class="profileinfo">
              Favourite Charity:
            </div>
            <div id="amountofhourse" class="profileinfovalue">
              <a href="<?=base_url() ?>charity/<?=$profile['charityid'] ?>"><?=$profile['charityname'] ?></a>
            </div>
          </div>
          <div>
            <div id="amountofhoursvolunteering" class="profileinfo">
              Amount of Hours Volunteering:
            </div>
            <div id="profiledatejoinedvalue" class="profileinfovalue">
              <?=$profile['hours'] ?>
            </div>


          </div>
        </div>
      </div>



      <div class="col-sm-6">
        <div id="charitybio">
          <p id="whoisblank">
            Who is <?=$profile['firstname'] ?> <?=$profile['lastname'] ?>?
          </p>
          <br>
          <p>
           <?=$profile['description'] ?>
         </p>
        </div>

        <div id="editbutton" class="margin-top-20">
          <?php if(@$_SESSION['volunteerid'] == $profile['id']): ?>

            <button class="btn btn-primary" onclick="location.href='<?=base_url() ?>profileedit/<?=$_SESSION['volunteerid'] ?>'">Edit Profile</button>

          <?php endif ?>

        </div>
      </div>
    </div>


    <div id="picturesofsomeonevolunteering">
     Picture of <?=$profile['firstname'] ?> Volunteering!<br><br>
    </div>
  </div>  

  <div id="collage">
    <?php if(!is_null($profile['images'])): ?>
    <?php foreach($profile['images'] as $image): ?>
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
  <div id="reviewtitleinprofile">
    <?=$profile['firstname'] ?>'s Reviews:
  </div>

    <?php if(!is_null($profile['reviews'])): ?>
    <?php foreach($profile['reviews'] as $review): ?>
      <div id="reviewsupercontainer">
          <div class="reviewcontainer">
            <div class="reviewcontainerleft">
              <div class="nameofcharityinreview">
                <?=$review['name'] ?>
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

<!--
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

        
      <div>

    </div>

  </div>-->

</div>
    

