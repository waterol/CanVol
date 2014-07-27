<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CanVol.org</title>
    <link href='http://fonts.googleapis.com/css?family=Metrophobic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link href="<?=base_url() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url() ?>css/passfield.min.css" rel="stylesheet">
    <link href="<?=base_url() ?>css/calendar.css" rel="stylesheet">
    <link href="<?=base_url() ?>css/style.css" rel="stylesheet">

    <script>
      var config = {
        base: "<?=base_url(); ?>"
      };

    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div>
      <div id="toprow">
        <div class="toprowleft">
          <span id="identity"> CanVol.org </span>
        </div>
        <div class="toprowright" id="logincolumn">
          <?=form_open("login/dologin", array("class" => "form-horizontal")) ?>
            <fieldset>
            <div id="usernameandpassword">
                  <input id="username" name="username" type="text" placeholder="Email" class="logintext" required="">
     
                  <input id="password" name="password" type="password" placeholder="Password" class="logintext" required="">

            </div>

            <!-- Button -->
            <div  id="loginbutton">
              <button id="Login" name="Login" class="btn btn-primary btn-xs" type="submit">Log In</button>
            </div>

            <div  id="signupbutton">
              <button id="signup" name="signup" class="btn btn-primary btn-xs" type="button">Sign Up!</button>
            </div>
           
           

            </fieldset>
            </form>

        </div>
    
      </div>
    </div>