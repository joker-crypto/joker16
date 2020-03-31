<?php
include '../includes/connect.php';
$status = $_POST['status'];
$id = $_POST['id'];






$sql3 = mysqli_query($con, "SELECT * FROM orders where id=$id;");
while ($row = mysqli_fetch_array($sql3)) {
    $tot = $row['total'];
    $date = $row['date'];
    $orderID = $row['id'];
}


$sql = "UPDATE orders SET status='$status' WHERE id=$id;";
$con->query($sql);


if ($status == 'Cancelled by Admin') {

    $sql2 = "DELETE FROM sales WHERE OrderID=$id;";
    $con->query($sql2);
} else if ($status == 'Delivered') {

    $sql1 = "INSERT INTO sales (OrderID,date,total) VALUES ( '$orderID' ,'$date','$tot' )";
    $con->query($sql1);
} else {

    $sql = "UPDATE orders SET status='$status' WHERE id=$id;";
    $con->query($sql);
}


header("location: ../all-orders.php");
