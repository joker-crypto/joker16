<?php
session_start();
if (isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid'])) {
  header("location:index.php");
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Login</title>



    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

  </head>

  <body class="cyan">
    <div class="logos"> <img src="images/img4.jpeg" alt="logo" style="width: 100px; height: 100px; margin: 50px 0px 20px 100px ; border-radius:5px">
    </div>
    <div id=" login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">

        <form method="post" action="routers/router.php" class="login-form" id="form">
          <div class="row">
            <div class="input-field col s12 center">
              <p class="center login-form-text">Login: Hybrid Waters</p>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input name="username" id="username" type="text">
              <label for="username" class="center-align">Username</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input name="password" id="password" type="password" ;>
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <a href="javascript:void(0);" onclick="document.getElementById('form').submit();" class="btn waves-effect waves-light col s12">Login</a>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
              <!-- <p class="margin medium-small"><a href="register.php">Register Now!</a></p>-->
            </div>
          </div>
      </div>


      </form>
    </div>
    </div>




    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

  </body>

  </html>
<?php
}
?>