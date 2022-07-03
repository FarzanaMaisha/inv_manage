<!--Included in Add file only-->
<html>
<head>
  <title>Register</title>

  
</head>
<body>
    <div class="col-md-4 offset-md-4 form-div"> 
      <form method="post" action="addfile.php">
        <table class="table">
            <br>
        <tr><th>Code: </th><th><input type="text" name="code" placeholder="Enter Product Code (1283)" required/></th></tr>
        <tr><th>Model:</th><th> <input type="text" name="model" placeholder="Product Model (abc123)" required/></th></tr>
        <tr><th>Brand:</th> <th> <input type="text" name="brand" placeholder="Product Brand name" required/></th></tr>
        <tr><th>Cost Price:</th> <th><input type="text" name="costprice" placeholder="Product Buying Price (100**)" required/></th></tr>
        <tr><th>Unit:</th> <th><input type="text" name="unit" placeholder="Number of Products (1+)" required/></th></tr>
        <tr><th>Selling Price: </th> <th><input type="text" name="sellingprice" placeholder="Product Selling Price (101**)" required/></th></tr>
        <tr><th>Purchase Date: </th> <th><input type="date" name="purchasedate" required/></th></tr>

       <tr >
                      <th colspan="2">
                          <button type="submit" name="Add"  class="btn btn-primary btn-block btn-lg"> Add </button> 
                      </th>  
                    </tr>

    </table>
    </form>
</div>
</html><?php
$conn = mysqli_connect("localhost", "root", "", "inventory");
include('viewtable.php');//display table of existing product 
if(isset($_POST['Add']))
{
   

    // Taking all 7 values from the form productform(input)
    $code = $_REQUEST['code'];
    $model =  $_REQUEST['model'];
    $brand =  $_REQUEST['brand'];
    $costprice = $_REQUEST['costprice'];
    $unit =  $_REQUEST['unit'];
    $sellingprice = $_REQUEST['sellingprice'];
    $purchasedate=$_REQUEST['purchasedate'];   





        ///--------Update existing product (If purchase date matches)-----///
 

    $sql_check_date="SELECT * FROM productinformation Where purchasedate='$purchasedate'";
    $result_date = mysqli_query($conn, $sql_check_date);

    if (mysqli_num_rows($result_date) > 0) {

    $sql_update="UPDATE productinformation SET code='$code', model='$model',brand='$brand', costprice='$costprice', unit='$unit', sellingprice='$sellingprice',purchasedate='$purchasedate' WHERE purchasedate='$purchasedate'";

    if (mysqli_query($conn, $sql_update)) {
            echo "Record update successfully";

        echo "<script>window.location.href='http://127.0.0.1/411project/producttable.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    }

        //--------------------------------------------------------//

        //Add new product
        $sql_add="INSERT INTO productinformation
            Values('$code','$model', '$brand', '$costprice', '$unit', '$sellingprice', '$purchasedate')";

        if (mysqli_query($conn, $sql_add)) {
            echo "Record added successfully";
            echo "<script>window.location.href='http://127.0.0.1/411project/producttable.php';</script>";
            
        } else {
            echo "Error adding information: " . mysqli_error($conn);
        }
    
        
        
    }
    
  ?>
