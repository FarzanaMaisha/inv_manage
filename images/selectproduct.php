<?php
$conn = mysqli_connect("localhost", "root", "", "inventory");

$code=$_SESSION['code'];
$sql = "SELECT * FROM bill where code='$code'";
$result = mysqli_query($conn, $sql);?>


<br>
<br>

<br>
<br>

<form>
      <table border='1' cellspacing="7" align="center" style="margin-left: auto; margin-right: auto;">
    <tr>

    
  
    <th>Code</th>
    <th>Name</th>
    <th>Unit Price </th>
    <th>Unit Add</th>

    <th colspan="2" align="center">Action</th>
    </tr>

        </thead>
        <tbody>

        	<?php while($row = mysqli_fetch_assoc($result)) { 
             echo "<tr><td>".$row["code"]. "</td>
            <td>".$row["name"]. "</td>
            <td>".$row["price"]. "</td>";
            $price=$row['price'];}
?>

                       		 <td style="border: none;">
                             <div <?php if (isset($unit_err)): ?> class="form_error" <?php endif ?> >
                            <form  method="get"><input type="num" name="units" class="form-control form-control-lg" placeholder="Enter Value" >
                           </form>
                            </div>		
                        	</td>     

                        


                        <td><button type="submit" name="cart" class="btn btn-success btn-sm"><i class="bi bi-cart"></i></button></td> </tr>   </tbody>
 </thead>
<?php 

	$units=$_GET['units'];
	$total=$units*$price;



?>