<?php require'design.php';?>
<html>
<head>

</title></title></head>

<body style="align:center"> 

<div id="subheader">
    <div class="row">
        <div class="twelve columns">
            <p class="text-center" style="font-size: x-large;">
                 Product Information
            </p>
        </div>
    </div>
</div>

<br>
<br>
<br>
<div class="row">
    <div class="headermenu eight columns noleftmarg">
        <nav id="nav-wrap">
        <ul id="main-menu" class="nav-bar sf-menu">
            <table style="border: none; ">
        <form  class="form-horizontal" action="producttable.php" method="post" id="form">
          
                <div class="form-group">
                    <label class="control-label col-sm-4" for="name"><b>Search Product Information (model/brand):</b>:</label>
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
session_start();
 $username=$_SESSION['username'];
 $_SESSION['username']=$username;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";


//
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include('Style.php');

//************Search products and Dispay result******//
if(isset($_POST['save']))
{
require'search.php';
}

//----------------------End of search--------------------------//


//*********** Dispay all products******//
if(!isset($_POST['save'])){
$sql = "SELECT * FROM productinformation";
$result = mysqli_query($conn, $sql);

echo "";?>
<br>
<br>
<br>


<form method="post" id="form">
<table border='1' cellspacing="7" align="center" style="margin-left: auto; margin-right: auto;">
    <tr>
    <th><input type="checkbox" onclick="select_all()" id="delete"/></th>
    <th>Code</th>
    <th>Model</th>
    <th>Brand</th>
    <th>Cost Price</th>
    <th>Unit</th>
    <th> Selling Price </th>
    <th> Purchase Date </th>
    <th colspan="2" align="center">Action</th>
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>
       <tr id="box<?php echo $row['code'];?>"><td><input type="checkbox" id="<?php echo $row['code'];?>" name="checkbox[]" value="<?php echo $row['code'];?>" /></td>
        <?php
             echo "<td>".$row["code"]. "</td>
            <td>".$row["model"]. "</td>
            <td>".$row["brand"]. "</td>
            <td>". $row["costprice"] . "</td>
            <td>" . $row["unit"] .  "</td>
            <td> " . $row["sellingprice"] . "</td>
            <td> " . $row["purchasedate"] . "</td>
            <td>
            <a href='update.php?
            code=$row[code]&model=$row[model]&brand=$row[brand]&costprice=$row[costprice]&unit=$row[unit]&sellingprice=$row[sellingprice]&purchasedate=$row[purchasedate]'>
            Edit/Update
        </td>
        <td><a href='delete.php?model=$row[model]&brand=$row[brand] '>Delete</td> 
        </tr>
        ";
    }?>
     <!--ADD FIlE option at the bottom of table-->
<tr align="center"><th colspan="10" align="center"><a href='addfile.php'>Add File</th></tr></a>
 <!--ADD FIlE option at the bottom of table-->
<tr align="center"><th colspan="10" align="center"><a href ="javascript:void(0)" onclick="delete_all()" >Delete Selected</a></th></tr></table></form><?php
} else {
    echo "0 results";
}
}
//----------------------End of display--------------------------//
mysqli_close($conn);
?>





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
    
</body>
</html>


