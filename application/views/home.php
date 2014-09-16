
    <div id="slides">
      <ul class="rslides">
        <li><img src="<?=base_url() ?>img/ridecalgary.png" alt=""></li>
        <li><img src="<?=base_url() ?>img/humanesocietybest.png" alt=""></li>
      </ul>
      <?php if(!array_key_exists('userid', $_SESSION)): ?>
      <div id="slidetext" >
        <p id="st-leader">CanVol</p>
        <p id="st-follower">A Local Charity Network for Youth</p>
        <a href="<?=base_url() ?>gettingstartedindividual" id="getstartedbutton" class="btn btn-large btn-primary">Get Started</a>
      </div>
    <?php endif ?>
    </div>

    <div class="container">
      <div id="search">
        <input id="searchwide" name="search" type="text" placeholder="Search for Charities, People etc." class="input-sm search" required="">
      </div>
      <div id="browsebutton">
        <button onclick="location.href='<?=base_url() ?>browsecharities'" id="browsecharities" name="signup"> Browse Charities!</button>
      </div>

      <div id="topexplain">How it works...</div>

      <div class="row" id="calltoaction">
        <div class="col-sm-4">
          <div class="cta-inner">
            <span class="glyphicon glyphicon-search hugeicon"></span>
            <p class="ctatext">Find a local charity to volunteer for and read reviews</p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="cta-inner">
            <span class="glyphicon glyphicon-heart hugeicon"></span>
            <p class="ctatext">Volunteer! Make a difference in your community</p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="cta-inner">
            <span class="glyphicon glyphicon-pencil hugeicon"></span>
            <p class="ctatext">Write a review for the charity and tell others of your experiences</p>
          </div>
        </div>

      </div>

      <div id="blog">
        <div id="blogimage">
          Liam's Blog
        </div>
        <div id="myblog">
          <?php $posts = query_posts('numberposts=1&order=DESC&orderby=post_date');
          setup_postdata( $posts[0] ); ?>
          <p><strong><?php the_title(); ?></strong></p>
          <p><em><?php the_date(); ?></em></p>
          <div>
            <?php the_content(); ?> 
          </div>

        </div>

      </div>




    </div>

