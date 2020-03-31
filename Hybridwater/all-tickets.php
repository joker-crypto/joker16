<?php
include 'includes/connect.php';
include 'includes/wallet.php';

if ($_SESSION['admin_sid'] == session_id()) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Comments</title>



    <!-- CORE CSS-->
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  </head>

  <body>


    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper"> Hybrid Waters<a href="admin.php" class="brand-logo darken-1"><img style="width: 40px; margin:0% " src="images/icon1.png" alt="logo"></a> <span class="logo-text">Logo</span><br></h1>
              </li>
            </ul>
            <ul class="right hide-on-med-and-down">
              <!-- <li><a href="#" class="waves-effect waves-block waves-light"><i class="mdi-editor-attach-money"><?php echo $balance; ?></i></a> -->
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
              <div class="row">
                <div class="col col s4 m4 l4">
                  <img style="width: 55px" src="images/admin.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                  <ul id="profile-dropdown" class="dropdown-content">
                    <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                    </li>
                  </ul>
                </div>
                <div class="col col s8 m8 l8">
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name; ?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal"><?php echo $role; ?></p>
                </div>
              </div>
            </li>
            <li class="bold"><a href="Unknown" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Products</a>
            </li>
            <li class="no-padding">
              <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-content-content-paste"></i> Orders</a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a href="all-orders.php">All Orders</a>
                      </li>
                      <?php
                      $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
                      while ($row = mysqli_fetch_array($sql)) {
                        echo '<li><a href="all-orders.php?status=' . $row['status'] . '">' . $row['status'] . '</a>
                                    </li>';
                      }
                      ?>
                    </ul>
                  </div>
                </li>
              </ul>
            </li>
            <li class="no-padding">
              <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan active"><i class="mdi-action-question-answer"></i> Feedback</a>
                  <div class="collapsible-body">
                    <ul>
                      <li class="<?php
                                  if (!isset($_GET['status'])) {
                                    echo 'active';
                                  } ?>
									"><a href="alt">All Feedback</a>
                      </li>
                      <?php
                      $sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
                      while ($row = mysqli_fetch_array($sql)) {
                        if (isset($_GET['status'])) {
                          $status = $row['status'];
                        }
                        echo '<li class=' . (isset($_GET['status']) ? ($status == $_GET['status'] ? 'active' : '') : '') . '><a href="alt?status=' . $row['status'] . '">' . $row['status'] . '</a>
                                    </li>';
                      }
                      ?>
                    </ul>
                  </div>
                </li>
              </ul>
            <li class="bold active"><a href="users.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Users</a>
            </li>
            <!--   <li class="bold"><a href="cw" class="waves-effect waves-cyan"><i class="mdi-action-account-balance"></i> Accounts</a> -->
            </li>
            <li class="bold"><a href="ss" class="waves-effect waves-cyan"><i class="mdi-action-trending-up "></i>Sales</a>
            </li>
            </li>
            <li class="bold"><a href="details.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Edit Product Details</a>
            </li>

          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->

        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- START CONTENT -->
        <section id="content">

          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <div class="container">
              <div class="row">
                <div class="col s12 m12 l12">
                  <h5 class="breadcrumbs-title">Comment</h5>
                </div>
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->

          <!--start container-->
          <div class="container">
            <p class="caption">List of Comments by all customers</p>
            <div class="divider"></div>
            <div id="work-collections">
              <ul id="projects-collection" class="collection">
                <?php
                if (isset($_GET['status'])) {
                  $status = $_GET['status'];
                } else {
                  $status = '%';
                }
                $sql = mysqli_query($con, "SELECT * FROM tickets WHERE status LIKE '$status';");
                while ($row = mysqli_fetch_array($sql)) {
                  echo '<a href="view-ticket-admin.php?id=' . $row['id'] . '"class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title">' . $row['subject'] . '</p>                                              
                                            </div>
                                            <div class="col s2">
                                            <span class="task-cat cyan">' . $row['status'] . '</span></div>											
                                            <div class="col s2">
                                            <span class="task-cat grey darken-3">' . $row['type'] . '</span></div>
                                            <div class="col s2">
                                            <span class="badge">' . $row['date'] . '</span></div>
                                        </div>
                                    </a>';
                }
                ?>
              </ul>
            </div>
            <div class="divider"></div>

          </div>
          <!--end container-->


          <!-- END CONTENT -->
      </div>
      <!-- END MAIN -->
      </section>


      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START FOOTER -->
      <footer class="page-footer" style="text-align: center">
        <div class="footer-copyright">
          <div class="container">
            <span>Joker. All rights reserved. 2020</span>
          </div>
        </div>
      </footer>
      <!-- END FOOTER -->



      <!-- ================================================
    Scripts
    ================================================ -->

      <!-- jQuery Library -->
      <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>

      <script type="text/javascript" src="js/materialize.min.js"></script>
      <!--scrollbar-->
      <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <!-- data-tables -->
      <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
      <script type="text/javascript" src="js/plugins.min.js"></script>
      <!--custom-script.js - Add your own theme custom JS-->
      <script type="text/javascript" src="js/custom-script.js"></script>
  </body>

  </html>
<?php
} else {
  if ($_SESSION['customer_sid'] == session_id()) {
    header("location:tickets.php");
  } else {
    header("location:login.php");
  }
}
?>