<html>
<head></title></title></head>
<body>

<table border='1' cellspacing="7" align="center" style="margin-left: auto; margin-right: auto;">
    <tr>
    <th>Code</th>
    <th>Model</th>
    <th>Brand</th>
    <th>Cost Price</th>
    <th>Unit</th>
    <th>Selling Price </th>
    <th>Purchase Date </th>
    </tr>
</body>
</html><?php



$sql = "SELECT * FROM productinformation";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["code"]."</td><td>".$row["model"]."</td><td>".$row["brand"]."</td><td>".$row["costprice"]."</td><td>".$row["unit"]."</td><td>".$row["sellingprice"] ."</td><td>".$row["purchasedate"]."</td></tr> ";
    }
    echo "</table>";
} else {
    echo "0 results";
}


?>