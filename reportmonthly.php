
<html>
<head></title></title></head>

<body style="margin-left: 500px; margin-top: 100px; font-size: 20px; font-family: Times; b width: 1000px; ">
<h3>Monthly report </h3 >
  <a class="nav-link" href="doc.php">Home <span class="sr-only"></span></a>
<?php
include('Style.php');
if(isset($_POST['save']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$totalprofit=0;
$date =  $_REQUEST['day'];
$month = date("m",strtotime($date));
$year = date("y",strtotime($date));
$sql = "SELECT * FROM productpurchase , productinformation
WHERE Month(sellingdate) = '$month' AND productpurchase.model=productinformation.model";
$result = mysqli_query($conn, $sql);

echo "<table border='1'>
    <tr><th>Selling date</th><th>Brand</th><th>Model</th><th>Unit</th><th>Cost Price</th><th>Selling Price</th><th>Profit</th></tr>";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $unit_price=$row["sellprice"];
        $costprice=$row["costprice"];
        $unit=$row["unit"];
        $sellingprice=$unit*$unit_price;
        $costprice=$unit*$costprice;
        $profit=$sellingprice-$costprice;
        $totalprofit=$totalprofit+$profit;
        echo"<tr>";
        echo"<td>".$row["sellingdate"]."</td>";
        echo"<td>".$row["brand"]."</td>";
        echo"<td>".$row["model"]."</td>";
        echo"<td>".$row["unit"]."</td>";
        echo"<td>".$costprice."</td>";
        echo"<td>".$sellingprice."</td>";
        echo"<td>".$profit."</td>";
        echo"</tr>";

    }

    echo "Profit of the month: ".$totalprofit ."</br>";

} else {
    echo "0 results";
}

mysqli_close($conn);
}
?>
<form action="reportmonthly.php" method="post">
Monthly report:<input type="month" name="day" /><br />
<input type="submit" name="save" />
</form>

</body>
</html>
