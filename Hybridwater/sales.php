<?php
include 'includes/connect.php';


if ($_SESSION['admin_sid'] == session_id()) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sales</title>
        <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <!-- Custome CSS-->
        <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
        <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    </head>

    <body style="background-color: #5EC2C5">
        <header <div class="navbar-fixed">

            <nav class="navbar-color">
                <div class="nav-wrapper">

                    <ul class="left">
                        <li style="text-align: center">

                            <h1 class="logo-wrapper"> Hybrid Waters<a href="admin.php" class="brand-logo darken-1"><img style="width: 40px; margin:0% " src="images/icon1.png" alt="logo"></a> <span class="logo-text">Logo</span><br></h1>
                        </li>
                    </ul>
                </div>
            </nav>
            </div>
            <!-- end header nav-->
        </header>
        <!-- here -->

        <!-- here -->
        <h1 style=" margin:10px 0px 0px 300px;text-align: center; color:yellow"> Sales Report</h1>
        <!-- start -->

        <div id="main">
            <div class="wrapper">
                <aside id="left-sidebar-nav">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details cyan darken-2">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img style="width: 75px" src="images/admin.png" alt="" class="circle responsive-img valign profile-image">
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
                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
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
                        <!--   <li class="bold"><a href="cw" class="waves-effect waves-cyan"><i class="mdi-action-account-balance"></i> Accounts</a> -->
                        </li>
                        <li class="bold"><a href="ss" class="waves-effect waves-blue"><i class="mdi-action-trending-up"></i>Sales</a>
                        </li>
                    </ul>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
                </aside>

            </div>
        </div>
        <!--end -->

        <?php


        $sql5 = "SELECT sum(quantity) AS totquan FROM order_details inner join sales where sales.OrderID = order_details.order_id";
        $stmt2 = $con->query($sql5);
        $row5 = $stmt2->fetch_assoc();

        $sql2 = "SELECT sum(total) AS tot FROM sales";
        $stmt2 = $con->query($sql2);
        $row1 = $stmt2->fetch_assoc();

        $sql = mysqli_query($con, "SELECT * FROM sales");



        ?>


        <!-- here -->


        <div class="panel panel-default" style="padding: 20px; margin:50px 0px 20px 350px; background-color:#454D66; width:1300px; color: yellow">
            <div class="d-block w-100">
                <table class="display nowrap" id="datas" style="width:100%; color: black; background-color: #454D66">
                    <thead class="thead" style="color:yellow;">
                        <tr>
                            <th style=" width: 20%">
                                <h3>Order Number </h3>
                            </th>
                            <th style="width: 20%">
                                <h3>Date </h3>
                            </th>
                            <th style="width: 20%">
                                <h3>Total Amount</h3>
                            </th>

                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tbody>
                            <tr>
                                <td style="width: 20%"> Order No.<?php echo $row["OrderID"]; ?></td>
                                <td style="width: 20%"> <?php echo $row["date"]; ?></td>
                                <td style="width: 20%"> <?php echo $row["total"]; ?></td>
                            </tr>
                        </tbody>
                    <?php      } ?>


                </table>

            </div>


            <h2 style="width: 300px;">Total Sales: &#8369 <?php echo $row1["tot"] ?></h2>

            <h2 style="width: 400px">Total Item Sold: <?php echo  $row5["totquan"]; ?> pcs.</h2>


        </div>

        <!--graph -->
        <br>
        <br>
        <br>
        <div class="d-block w-90" style="background-color: #454D66; padding: 10px; margin:20px 20px 20px 350px; width:1300px">
            <div class="card">
                <div class="body" style="text-align: center; color:darkblue;">
                    <h1>Graphical Representation of Sales</h1>
                </div>
            </div>
            <div style="max-height: 700px; max-width: 1300px; overflow: scroll;">
                <canvas id="myChart" width="800" height="400" style="background-color: darkgray ; font-size:20px;"></canvas>


            </div>
        </div>
        <!-- jQuery Library -->
        <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
        
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script type="text/javascript">
            <?php

            $sql3 = mysqli_query($con, "SELECT * FROM sales");
            $data1 = '';
            $data2 = '';

            while ($row3 = mysqli_fetch_array($sql3)) {

                $data1 = $data1 . '"' . $row3['date'] . '", ';
                $data2 = $data2 . '"' . $row3['total'] . '", ';
            }

            $data1 = trim($data1, ",");
            $data2 = trim($data2, ",");


            ?>

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php echo $data1; ?>],
                    datasets: [{
                        label: 'Sales',
                        data: [<?php echo $data2; ?>],
                        backgroundColor: 'yellow',
                        borderColor: 'darkblue',

                        borderWidth: 3,
                        hoverBackgroundColor: [
                            '#0000FF',

                        ],
                    }]

                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            $(document).ready(function() {

                $('#datas').DataTable({
                    "scrollY": 200,
                    "scrollX": true

                });
            });
        </script>
        <!--graph -->

        <footer class="page-footer" style="text-align: center">
            <div class="footer-copyright">
                <div class="container">
                    <span>Joker. All rights reserved. 2020</span>
                </div>
            </div>
        </footer>

    </body>

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