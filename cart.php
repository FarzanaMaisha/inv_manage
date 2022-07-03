<?php
$conn = mysqli_connect("localhost", "root", "", "inventory");

$code=$_SESSION['code'];
$units=$_SESSION['units'];
$total=$_SESSION['total'];
$sql = "SELECT * FROM bill where code='$code'";
$result = mysqli_query($conn, $sql);


$sql="UPDATE bill SET unit='$units',total='$total' WHERE code='$code'";
if (mysqli_query($conn, $sql)) {
        echo "Record update successfully";
    header('location: http://127.0.0.1/411project/sellproduct.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


?>