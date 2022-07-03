<?php
session_start();
$username=$_SESSION['username'];
include('design.php');
//************Search products and Dispay result******//

if(isset($_POST['invoice'])){ ?>
           <div class="row">
    <div class="headermenu eight columns noleftmarg">
        <nav id="nav-wrap">
        <ul id="main-menu" class="nav-bar sf-menu">
            <table style="border: none; ">
      <form style="margin-left:auto;" method="post" action="sellproduct.php">
        <table class="table">
            <br>
        <tr><th>Customer name:</th>
                    <th><input type="text" name="customername"  placeholder="Enter Customer Name" required value="<?php echo $customername; ?>"></tr>

        <tr><th>Customer Mobile: +88 </th>
                    <th> <div <?php if (isset($mobile_err)): ?> class="form_error" <?php endif ?> >
                    <input type="text" name="mobile" required  class="form-control form-control-lg" placeholder="01*********" value="<?php echo $mobile; ?>"></th></tr>
        <tr><th>Discount:</th>
            <th><input type="text" name="discount" class="form-control form-control-lg" placeholder="Discount Percentage (if any)" value="<?php echo $discount; ?>"></tr>

        <tr><th>VAT:</th> 
            <th><input type="text" name="vat" class="form-control form-control-lg" required placeholder="Enter VAT Percentage" value="<?php echo $vat; ?>"></tr>

       <tr >
                      <th colspan="2">
                          <button type="submit" name="continue"  class="btn btn-primary btn-block btn-lg"> Continue </button> 
                      </th>  
                    </tr>

    </table>
    </form>

<?php } 

if(isset($_POST['continue']))
{
    $customername =$_POST['customername'];
    $mobile ="+88".$_POST['mobile'];
    $discount =$_POST['discount'];
    $vat=$_POST['vat'];;
    echo "Customer Name:".$customername."<br>";
    echo "Customer Mobile:".$mobile."<br>";
    echo "Discount:".$discount."<br>";
    echo "VAT: ".$vat."%<br>";

    if(strlen($mobile)!=11)
    $mobile_err =" Enter a valid mobile number";
    $sql_code = "SELECT * FROM bill ";
    $result_code = mysqli_query($conn, $sql_code);
    if (mysqli_num_rows($result_code) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result_code)) {
            $brand=$row['brand'];
            $model=$row['model'];
            $price=$row['sellingprice'];
            $total=$unit*$price;
            $

    $sql_code_in = "INSERT INTO $usersname
                            Values('$customername','$mobile', '$model','$brand', '$unit', '$sellingprice', '$profit','$sellingdate' )";
                         if (mysqli_query($conn, $sql_code_in)) {
                        } 
}
}
}

?>


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

$sql_model = "SELECT * FROM bill Where model='$product'";
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
<tr style="colspan:"><th>
                    <div class="col-sm-2">
                      <button type="submit" name="invoice" class="btn btn-success btn-sm">BILL</i></button>
                    </div>
                </th></tr>
<?php } ?>
