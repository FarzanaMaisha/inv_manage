 <?php require'design.php';?>
   <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <!-- <link rel="stylesheet" type="text/css" href="">-->
    <title ></title>
     <link rel="stylesheet" href="formstyle.css">
</head> 
<body>
<div id="subheader">
    <div class="row">
        <div class="twelve columns">
            <p class="text-center" style="font-size: x-large;">
                 Update Product Details
            </p>
        </div>
    </div>
</div>
<?php  
    // Taking all 6 values from the form productform(input)
    $code = $_REQUEST['code'];
    $model =  $_REQUEST['model'];
    $brand =  $_REQUEST['brand'];
    $costprice = $_REQUEST['costprice'];
    $unit =  $_REQUEST['unit'];
    $sellingprice = $_REQUEST['sellingprice'];
    $purchasedate=$_REQUEST['purchasedate'];  


?>
 
<div class="col-md-4 offset-md-4 form-div">  
<form  action="" method="post">
    <table style="margin-left: auto; margin-right: auto;">
        <br>
    <tr><th>Code: </th> <th><input type="text" name="code" required value="<?php echo $code; ?>"/></th></tr>
    <tr><th>Model:</th> <th> <input type="text" name="model" required value="<?php echo $model; ?>"  class="form-control form-control-lg" /></th></tr>
    <tr><th>Brand:</th> <th> <input type="text" name="brand"  required value="<?php echo $brand; ?>"/></th></tr>
    <tr><th>Cost Price:</th> <th><input type="text" name="costprice" required  value="<?php echo $costprice; ?>"/></th></tr>
    <tr><th>Unit:</th> <th><input type="text" name="unit" required value="<?php echo $unit; ?>" /></th></tr>
    <tr><th>Selling Price: </th> <th><input type="text" name="sellingprice" required value="<?php echo $sellingprice; ?>"/></th></tr>
    <tr><th>Purchase Date: </th> <th><input type="date" name="purchasedate" required value="<?php echo $purchasedate; ?>"/></th></tr>

    <tr><th colspan="2">
                      <button type="submit" name="Update"  class="btn btn-primary btn-block btn-lg"> Update </button> 
                  </th>  </tr>


</form>
</table>
</body>
</html>

<?php
if(isset($_POST['Update']))
{
    include('connect.php');
    $model=$_POST['model'];
    $brand=$_POST['brand'];
    $costprice=$_POST['costprice'];
    $unit=$_POST['unit'];
    $sellingprice=$_POST['sellingprice'];
    $purchasedate=$_POST['purchasedate'];

$sql="UPDATE productinformation SET model='$model',brand='$brand', costprice='$costprice', unit='$unit', sellingprice='$sellingprice',purchasedate='$purchasedate' WHERE model='$model'";

if (mysqli_query($conn, $sql)) {
        echo "Record update successfully";
    header('location: http://127.0.0.1/411project/producttable.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);

}

?>

