<!doctype html>
<html>
<body>
  <div id="collage">
    <div class="item">
      <img src="img/france1.jpg">
    </div>
    <div class="item">
      <img src="img/france2.jpg">
    </div>
    <div class="item">
      <img src="img/france3.jpg">
    </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/isotope.min.js"></script>


<script>
$(document).ready(function() {


  $('#collage').isotope({

    itemSelector: '.item',
    masonry: {
      
    }


  });

});
</script>
</body>
</html>