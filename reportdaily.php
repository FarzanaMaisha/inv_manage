
<?php require'design.php'; ?>
<html>
<head></title></title></head>
<body>
    <div id="subheader">
    <div class="row">
        <div class="twelve columns">
            <p class="text-center" style="font-size: x-large;">
                 Daily Report
            </p>
        </div>
    </div>
</div>
</body>
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

echo "Transaction Report";

$date =  $_REQUEST['daily'];

$sql = "SELECT * FROM productpurchase , productinformation
WHERE sellingdate = '$date' AND productpurchase.model=productinformation.model AND productpurchase.brand=productinformation.brand";
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

} else {
    echo " </br>0 results";
}

mysqli_close($conn);
}
?>
<div class="col-md-4 offset-md-4 form-div">
<form id="login_form" action="reportdaily.php" method="post"><br />
<input type="date" name="daily" /><br />
<button type="submit" name="save" class="btn btn-primary btn-block btn-lg">Process </button>
</form>
</div>
</body>
</html>
