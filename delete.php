<?php  
 include('connect.php');

  //include('Style.php');
	// Taking values from the form data(input)
   $model = $_GET['model'];
   $brand = $_GET['brand'];

   

$sql = "DELETE FROM ProductInformation WHERE model='$model' AND brand='$brand'";

if (mysqli_query($conn, $sql)) {
    echo "<font color ='red'>Record deleted successfully";
    header('location: http://127.0.0.1/project411/producttable.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

if(isset($_POST['checkbox'][0] as $list)){
    foreach ($_POST['checkbox'] as $list)) {
        $id=mysqli_real_escape_string($conn, $list);
        mysqli_query($conn, $sql);
    }
}
mysqli_close($conn);


?>
