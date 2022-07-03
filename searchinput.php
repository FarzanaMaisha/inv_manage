<!-----Included in producttable file (Product Details)------->

<?php
include ('connect_test_db.php');

$searchErr = '';
$product_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from productinformation where brand like '%$search%' or model like '%$search%'");
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

       <form>
      <table border='1' cellspacing="7" align="center" style="margin-left: auto; margin-right: auto;">
    <tr>
    <th>ID</th>
    <th>Code</th>
    <th>Model</th>
    <th>Brand</th>
    <th>Cost Price</th>
    <th>Unit</th>
    <th> Selling Price </th>
    <th> Purchase Date </th>
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
                        <tr ></td>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['code'];?></td>
                        <td><?php echo $value['model'];?></td>
                        <td><?php echo $value['brand'];?></td>
                        <td><?php echo $value['costprice'];?></td>
                        <td><?php echo $value['unit'];?></td>
                        <td><?php echo $value['sellingprice'];?></td>
                        <td><?php echo $value['purchasedate'];?></td>
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    //SELECT AND UNSELECT ALL INFO
        function select_all(){
            if(jQuery('#delete').prop('checked'))
            {
                jQuery('input[type=checkbox]').each(function(){
                jQuery('#'+this.id).prop('checked',true)
            });
            }else{
            jQuery('input[type=checkbox]').each(function(){
                jQuery('#'+this.id).prop('checked',false)
            });
        }
    }
    //DELETE SELECTED INFO
    function delete_all(){
        jQuery.ajax({
            url:'delete.php',
            type: 'post',
            data:jQuery('#form').serialize(),
            success:function(result)
            {
                jQuery('input[type=checkbox]').each(function(){
                    if(jQuery('#'+this.id).prop("checked")){
                        jQuery('#box'+this.id).remove();
                    }

                    });
            }
        });

            
    }
    </script>
    
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>

</html>