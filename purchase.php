<?php
include('design.php');
//************Search products and Dispay result******//
?>





<div class="row">
    <div class="headermenu eight columns noleftmarg">
        <nav id="nav-wrap">
        <ul id="main-menu" class="nav-bar sf-menu">
            <table style="border: none; ">
        <form   class="form-horizontal" action="purchase.php" method="post" id="form">
          
                <div class="form-group">
                    <label class="control-label col-sm-4" for="name"><b>Search Product (model/brand/code):</b>:</label>
                    <tr><th>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="search" placeholder="search here">
                    </div></th>
                    <th>
                    <div class="col-sm-2">
                      <button type="submit" name="save" class="btn btn-success btn-sm"><i class="bi bi-search"></i></button>
                    </div>
                </th></tr>
                </div>

                </table>
            </form>
           </div>
</div>


<div class="row">
    <div class="headermenu eight columns noleftmarg">
        <nav id="nav-wrap">
        <ul id="main-menu" class="nav-bar sf-menu">
            <table style="border: none; ">
        <form   class="form-horizontal" action="purchase.php" method="post" id="form">
          
                <div class="form-group">
                    <label class="control-label col-sm-4" for="name"><b>Add product to cart:</b>:</label>
                    <tr><th>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="product" placeholder="Enter model or code">
                    </div></th></tr>
                    <tr>
                    <th>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="unit" placeholder="Enter Amount">
                    </div></th>
                    <th>
                    <div class="col-sm-2">
                      <button type="submit" name="cart" class="btn btn-success btn-sm"><i class="bi bi-cart"></i></button>
                    </div>
                </th></tr> </form>
                                    	

				<tr><th><form method="post" action="purchase.php" id="form">
					<div class="col-sm-2">
				<button type="submit" name="bill" class="btn btn-success btn-sm">Display Bill</button>
				</form></p>
                </th></tr></div></table>
           
           </div>
</div>
<br>
<br>
<br>
<br>
<p style="position: right;">

<?php

$conn = mysqli_connect("localhost", "root", "", "inventory");
//search and add//
 if(isset($_POST['save']))
{
require'searchinput.php';
}

if(isset($_POST['cart']))
{
$product=$_POST['product'];
$unit=$_POST['unit'];

$sql_code = "SELECT * FROM productinformation Where code='$product'";
$result_code = mysqli_query($conn, $sql_code);
if (mysqli_num_rows($result_code) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result_code)) {
    	$code=$row['code'];
    	$name=$row['brand']." ".$row['model'];
    	$price=$row['sellingprice'];
    	$total=$unit*$price;
    	$

$sql_code_in = "INSERT INTO bill
                        Values('$code','$name', '$unit', '$price', '$total')";
                     if (mysqli_query($conn, $sql_code_in)) {
                    } 
}
}

$sql_model = "SELECT * FROM productinformation Where model='$product'";
$result_model = mysqli_query($conn, $sql_model);
if (mysqli_num_rows($result_model) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result_model)) {
    	$code=$row['code'];
    	$name=$row['brand']." ".$row['model'];
    	$price=$row['sellingprice'];
    	$total=$unit*$price;

$sql_code_in = "INSERT INTO bill
                        Values('$code','$name', '$unit', '$price', '$total')";
                     if (mysqli_query($conn, $sql_code_in)) {
                    } 
}
}
}
if(isset($_POST['bill']))
{?>

       <form method="post" action="invoice">
      <table border='1' cellspacing="7" align="center" style="margin-left: auto; margin-right: auto;">
    <tr>

    
    
    <th>Code</th>
    <th>name</th>
    <th>price</th>
    <th>Unit</th>
    <th>total</th></tr>
<?php $sql_cart = "SELECT * FROM bill";
$result_cart = mysqli_query($conn, $sql_cart);
if (mysqli_num_rows($result_cart) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result_cart)) {
    	echo "</tr><td>".$row["code"]. "</td>
            <td>".$row["name"]. "</td>
            <td>".$row["price"]. "</td>
            <td>". $row["unit"] . "</td>
            <td>" . $row["total"] .  "</td>
            </tr> ";
}
}?>
<!--<tr style="colspan:"><th>
                    <div class="col-sm-2">
                      <button type="submit" name="invoice" class="btn btn-success btn-sm">BILL</i></button>
                    </div>
                </th></tr>-->
<?php } ?>
