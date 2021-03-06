<?php
include 'includes/connect.php';
include 'includes/wallet.php';

if ($_SESSION['customer_sid'] == session_id()) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-tap-highlight" content="no">
        <title>Wecome to Hybrid Waters </title>


        <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- Custome CSS-->
        <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

        <style type="text/css">
            .input-field div.error {
                position: relative;
                top: -1rem;
                left: 0rem;
                font-size: 0.8rem;
                color: #FF4081;
                -webkit-transform: translateY(0%);
                -ms-transform: translateY(0%);
                -o-transform: translateY(0%);
                transform: translateY(0%);
            }

            .input-field label.active {
                width: 100%;
            }

            .left-alert input[type=text]+label:after,
            .left-alert input[type=password]+label:after,
            .left-alert input[type=email]+label:after,
            .left-alert input[type=url]+label:after,
            .left-alert input[type=time]+label:after,
            .left-alert input[type=date]+label:after,
            .left-alert input[type=datetime-local]+label:after,
            .left-alert input[type=tel]+label:after,
            .left-alert input[type=number]+label:after,
            .left-alert input[type=search]+label:after,
            .left-alert textarea.materialize-textarea+label:after {
                left: 0px;
            }

            .right-alert input[type=text]+label:after,
            .right-alert input[type=password]+label:after,
            .right-alert input[type=email]+label:after,
            .right-alert input[type=url]+label:after,
            .right-alert input[type=time]+label:after,
            .right-alert input[type=date]+label:after,
            .right-alert input[type=datetime-local]+label:after,
            .right-alert input[type=tel]+label:after,
            .right-alert input[type=number]+label:after,
            .right-alert input[type=search]+label:after,
            .right-alert textarea.materialize-textarea+label:after {
                right: 70px;
            }

            .visitUs {
                text-align: center;
                width: -10px;
            }

            .visitUs label {
                font-size: 50px;
                color: yellow;
            }
        </style>
    </head>

    <body>

        <header id="header" class="page-topbar">
            <!-- start header nav-->
            <div class="navbar-fixed">
                <nav class="navbar-color">
                    <div class="nav-wrapper">
                        <ul class="left">
                            <li>
                                <h1 class="logo-wrapper"> Hybrid Waters<a href="customer.php" class="brand-logo darken-1"><img style="width: 40px; margin:0% " src="images/icon1.png" alt="logo"></a> <span class="logo-text">Logo</span><br></h1>
                            </li>
                        </ul>
                        <ul class="right hide-on-med-and-down">
                            <!--        <li><a href="#" class="waves-effect waves-block waves-light"><i class="money"> Balance: &#8369 <?php // echo $balance; 
                                                                                                                                        ?></i></a> -->
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

        </header>

        <div id="main">

            <div class="wrapper">


                <aside id="left-sidebar-nav">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details cyan darken-2">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img style="width: 55px" src="images/customer.png" alt="" class="circle responsive-img valign profile-image">
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
                        <li class="bold active"><a href="hello" class="waves-effect waves-cyan"><i class="mdi-action-shopping-cart"></i> Order Products</a>
                        </li>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-content-content-paste"></i> Orders</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="orders.php">All Orders</a>
                                            </li>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                echo '<li><a href="orders.php?status=' . $row['status'] . '">' . $row['status'] . '</a>
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
                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Feedback</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="Feedback">All Feedback</a>
                                            </li>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets WHERE poster_id = $user_id AND not deleted;");
                                            while ($row = mysqli_fetch_array($sql)) {
                                                echo '<li><a href="Feedback?status=' . $row['status'] . '">' . $row['status'] . '</a>
                                    </li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="bold"><a href="details.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Edit Details</a>
                        </li>
                    </ul>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
                </aside>


                <div class="d-block w-100 container1">
                    <div class="d-block w-100 mains">
                        <div class="d-block w-100 hybrid" style="text-align: center; color: yellow; font-size: 30px; margin-right:-10px">
                            <H1> HYBRID PURIFIED WATERS</H1>
                        </div>
                        <div class="d-block w-100 imahe"> <img src="images/pic1.jpg" style="width: 100%; margin-right:10px"></div>
                        <ul>
                            <p> Address: Proper Bansud, Oriental Mindoro </p>
                            <p> Contact Number: 09497287752</p>
                            <p> Email: <i> <a href="hybriwaters@gmail.com" style="color: yellow"> hybriwaters@gmail.com</a> </i></p>
                            <br>
                            <div class="visitUs">
                                <label> VISIT US ON</label>
                                <ul>
                                    <a href="https://free.facebook.com"><img src="images/face.png" alt=""></a>
                                    <a href="https://gmail.com"><img src="images/gmail.png" alt=""></a>
                                    <a href="https://messenger.com"> <img src="images/messenger.png" alt=""></a>
                                </ul>
                        </ul>
                    </div>

                </div>

            </div>
            <footer class="page-footers" style="text-align: center; ">
                <div class=" footer-copyright">
                    <div class="container">
                        <span>Joker. All rights reserved. 2020</span>
                    </div>
                </div>
            </footer>


            <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>

            <script type="text/javascript" src="js/materialize.min.js"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <!-- data-tables -->
            <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>

            <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
            <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>

            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="js/plugins.min.js"></script>
            <!--custom-script.js - Add your own theme custom JS-->
            <script type="text/javascript" src="js/custom-script.js"></script>

    </body>

    </html>
<?php
} else {
    if ($_SESSION['admin_sid'] == session_id()) {
        header("location:admin-page.php");
    } else {
        header("location:login.php");
    }
}
?>