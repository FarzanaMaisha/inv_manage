<?php 
$code=$model=$brand=$costprice=$unit=$sellingprice=$purchasedate="";
?>

<html>
<head>
  <title>Add Product</title>

 <style type="text/css">
     
     table{
    margin: 50px auto 50px;
    padding: 25px 15px 10px 15px;
    border: 1px solid #80ced7;
    border-radius: 5px;
    font-family: 'Lora', serif;
    font-size: .9em;
    box-sizing: content-box;
    height: fit-content;


}

.btn-block{
    display: block;
    width: 100%;
}
.form-control{
    box-sizing: border-box;
    height: 30%;
}
.btn{

    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 90%;
    background: #5F9EA0;
    color: white;


}
 </style>
</head>
<body>

    

  <div class="col-md-4 offset-md-4 form-div">  
  <form method="post" action="#" id="AddProduct">
    <table style="margin-left: auto; margin-right: auto;">
		<br>
    <tr><th>Code: </th> <th><input type="text" name="code" required value="<?php echo $code; ?>"/></th></tr>
    <tr><th>Model:</th> <th> <input type="text" name="model" required value="<?php echo $model; ?>"  class="form-control form-control-lg" /></th></tr>
    <tr><th>Brand:</th> <th> <input type="text" name="brand"  required value="<?php echo $brand; ?>"/></th></tr>
    <tr><th>Cost Price:</th> <th><input type="text" name="costprice" required  value="<?php echo $costprice; ?>"/></th></tr>
    <tr><th>Unit:</th> <th><input type="text" name="unit" required value="<?php echo $unit; ?>" /></th></tr>
    <tr><th>Selling Price: </th> <th><input type="text" name="sellingprice" required value="<?php echo $sellingprice; ?>"/></th></tr>
    <tr><th>Purchase Date: </th> <th><input type="date" name="purchasedate" required value="<?php echo $purchasedate; ?>"/></th></tr>

   <tr >
                  <th colspan="2">
                      <button type="submit" name="Add"  class="btn btn-primary btn-block btn-lg"> Add </button> 
                  </th>  
                </tr>

</table>
</form>
</div>
</body>
</html>