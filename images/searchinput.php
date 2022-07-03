<!-----Included in sellproduct file (SELL PRODUCT)------->

<?php
include ('connect_test_db.php');

$searchErr=$units =$unit_err= '';
$product_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from productinformation where brand like '%$search%' or model like '%$search%' or code like '%$search%'");
        $stmt->execute();
        $product_details= $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
<title>Search</title>
<link rel="stylesheet" href="formstyle.css">
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">

<style>
.container{
    width:70%;
    height:30%;
    padding:20px;
}
</style>
</head>
 
<body>
    
    <div class="col-md-4 offset-md-4 form-div">
       <p align="center">Search Result</p>

       <form method="post">
      <table border='1' cellspacing="7" align="center" style="margin-left: auto; margin-right: auto;">
    <tr>

    
    
    <th>Code</th>
    <th>Brand</th>
    <th>Model</th>
    <th>Unit Available</th>
    <th>Unit Price </th>
    
    <th colspan="2" align="center">Action</th>
    <th>Unit Add</th>
    </tr>

        </thead>
        <tbody>
                <?php
                 if(!$product_details)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($product_details as $key=>$value)
                    {
                        ?>
                        <tr>
                      
                        <td style="text-align: center; vertical-align: middle;"><?php echo $value['code'];?></td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $value['brand'];?></td>      
                        <td style="text-align: center; vertical-align: middle;"><?php echo $value['model'];?></td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $value['sellingprice'];?></td>
                        <td style="text-align: center; vertical-align: middle;"><?php echo $value['unit'];?></td>

                        
                        


                        
                            <td style="border: none;">
                             <div>
                            <form  method="get"><input type="num" name="units" class="form-control form-control-lg" placeholder="Enter Value" value="<?php echo $units; ?>" >
                         
                            </div>      
                            </td>     

                        


                        <td><button type="submit" name="cart" class="btn btn-success btn-sm"><i class="bi bi-cart"></i></button></td> </tr>    </form> </tbody>
                    </tr>
                    </tbody>
                </table>
                         
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "inventory");
                        $code=$value['code'];
                        $brand=$value['brand'];
                        $model=$value['model'];
                        $name=$brand." ".$model;
                        $unit=$value['unit'];
                        $price=$value['sellingprice'];
                        $units=$_GET['units'];
                        $total=$units*$price;
                       
                         
                        $sql_add="INSERT INTO bill
                        Values('$code','$name', '$units', '$price', '$total')";
                         $_SESSION['code']=$code;
                         if (mysqli_query($conn, $sql_add)) {
                    } 
}}
                        

               
                        
                    
                    
                          
             
         


             ?>
                
             
         
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>

</html>