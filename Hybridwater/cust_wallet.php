<?php
include 'includes/connect.php';


if ($_SESSION['admin_sid'] == session_id()) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accounts</title>
        <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- Custome CSS-->
        <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    </head>

    <body style="background-color: #5EC2C5">
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

                    </div>
                </nav>
            </div>

        </header>
        <!-- start -->
        <aside id=" left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation ">
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
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal"><?php echo $role; ?></p>
                        </div>
                    </div>
                </li>
                <li class="bold active"><a href="Unknown" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Products</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-content-content-paste"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
                                    <?php

                                    $hash = "alo";
                                    $hashed = password_hash($hash, PASSWORD_DEFAULT);
                                    $dehashed = password_verify($hash, $hashed);
                                    ?>
                                    <li><a href="alo">All Orders</a>


                                    </li>
                                    <?php


                                    $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo '<li><a href="alo?status=' . $row['status'] . '">' . $row['status'] . '</a>
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
                                    <li><a href="alt">All Feedback</a>
                                    </li>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
                                    while ($row = mysqli_fetch_array($sql)) {
                                        echo '<li><a href="all-tickets.php?status=' . $row['status'] . '">' . $row['status'] . '</a>
                                    </li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="us" class="waves-effect waves-blue"><i class="mdi-social-person"></i> Users</a>
                </li>
                <li class="bold"><a href="cw" class="waves-effect waves-blue"><i class="mdi-action-account-balance"></i> Accounts</a>
                </li>
                <li class="bold"><a href="ss" class="waves-effect waves-blue"><i class="mdi-action-trending-up"></i>Sales</a>
                </li>
            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>

        <h1 style="text-align: center; color:Yellow"> Users Account</h1>
        <?php


        $sql = mysqli_query($con, "SELECT * FROM wallet_details INNER JOIN users where users.id = wallet_details.id;");
        ?>

        <table class="table table-dark" id="datas" style="padding: 20px; margin-left: 350px; width:1300px;">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 15%">
                        Customers Name
                    </th>
                    <th style="width: 15%">
                        Customers ID
                    </th>
                    <th style="width: 5%">
                        Role
                    </th>

                    <th style="width: 10%">
                        Wallet Number
                    </th>
                    <th style="width: 5%">
                        Wallet ID
                    </th>
                    <th style="width: 5%">
                        Balance
                    </th>

                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <tbody>
                    <tr>
                        <td style="width: 20%"> <?php echo $row["name"]; ?></td>
                        <td style="width: 10%"> <?php echo $row["wallet_id"]; ?></td>
                        <td style="width: 20%"> <?php echo $row["role"]; ?></td>
                        <td style="width: 20%"> <?php echo $row["number"] ?></td>
                        <td style="width: 10%"> <?php echo $row["cvv"] ?></td>
                        <td style="width: 20%"> &#8369 <?php echo $row["balance"] ?></td>
                    </tr>
                </tbody>
            <?php } ?>
    </body>

    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <!--angularjs-->

    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
    <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>

    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>


    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    </html>
<?php
} else {
    if ($_SESSION['customer_sid'] == session_id()) {
        header("location:index.php");
    } else {
        header("location:login.php");
    }
}
?>