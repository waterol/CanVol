<div class="container">
  <div id="profiletop">
    <div class="row">
      <div class="col-sm-2">
        <div id="profilelogo">
          <img id="profileimage" src="<?=base_url() ?>img/portrait.png">
        </div>
        <div id="profilereputation">
          6,093 pts.

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
              June 1, 2014
            </div>
          </div>
          <div>
            <div id="currentlyliving" class="profileinfo">
              Currently Living in:
            </div>
            <div id="currentlylivingresponse" class="profileinfovalue">
              Calgary
            </div>
          </div>
          <div>
            <div id="favouritecharity" class="profileinfo">
              Favourite Charity:
            </div>
            <div id="amountofhourse" class="profileinfovalue">
              <?=$profile['charityname'] ?>
            </div>
          </div>
          <div>
            <div id="amountofhoursvolunteering" class="profileinfo">
              Amount of Hours Volunteering:
            </div>
            <div id="profiledatejoinedvalue" class="profileinfovalue">
              38
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
      </div>
    </div>

    








    <div id="picturesofsomeonevolunteering">
     Picture of <?=$profile['firstname'] ?> Volunteering!
    </div>
  </div>  
  <div id="collage">
      <div class="item">
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
  </div>
       
  <div class="btn-group" id="calendarcontrol">
    <button class="btn btn-primary" data-calendar-nav="prev">&lt;&lt; Prev</button>
    <button class="btn" data-calendar-nav="today">Today</button>
    <button class="btn btn-primary" data-calendar-nav="next">Next &gt;&gt;</button>
  </div>
    <h2>Upcoming Opportunities for <span id="calendarmonth"></span></h2>
  <div id="calendar">

  </div>
  <div id="reviewtitleinprofile">
    Larry's Reviews:
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

  </div>

</div>
    

