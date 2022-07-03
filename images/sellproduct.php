<?php 
session_start();
require'design.php';
$customername =$mobile =$vat="";
$discount =0;
$mobile_err="";
?>
<html>
<head>
<link rel="stylesheet" href="formstyle.css">
</title></title></head>

<div id="subheader">
    <div class="row">
        <div class="twelve columns">
            <p class="text-center" style="font-size: x-large;">
                 Add Product To Cart
            </p>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<?php

//************Search products and Dispay result******//
if(!isset($_POST['continue']))
{?>
<div class="row">
    <div class="headermenu eight columns noleftmarg">
        <nav id="nav-wrap">
        <ul id="main-menu" class="nav-bar sf-menu">
            <table style="border: none; ">
        <form   class="form-horizontal" action="sellproduct.php" method="post" id="form">
          
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
<?php
}


//search and add//
 if(isset($_POST['save']))
{
require'searchinput.php';
}

                

              
//----------------------End of search--------------------------//

if(isset($_POST['forward'])){
	require'selectproduct.php';

}
if(isset($_POST['cart'])){
	require'cart.php';

}

	if(isset($_POST['bill'])){ ?>
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
}

?>