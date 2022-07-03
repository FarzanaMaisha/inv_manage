<!-----SIGN UP FILE------->
<?php 
  $db = mysqli_connect('localhost', 'root', '', 'inventory');
  $firstname =$lastname =$password =$username = $email =$address =$mobile=$dob="";
  $username_err=$email_err=$dob_err=$mobile_err="";

  if (isset($_POST['signup'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $dob = $_POST['date'];
    $mobile=$_POST['num'];
    $contact="+88".$mobile;
    $address= $_POST['address'];
    $gender= $_POST['gender'];

    $sql_u = "SELECT * FROM user WHERE username='$username'";
    $res_u = mysqli_query($db, $sql_u);

    //username no repeat check
    if (mysqli_num_rows($res_u) > 0) {
      $username_err = "Username already exists";  
    }
 
    //email format match
    $emailpattern = '/([\w\-]+\@[\w\-]+\.[\w\-]+)/';
    if(!preg_match($emailpattern, $email))
      $email_err="Follow patter abc@xyz.com ";

    $sql_e = "SELECT * FROM user WHERE email='$email'";
    $res_e = mysqli_query($db, $sql_e);

    //username no repeat check
    if (mysqli_num_rows($res_e) > 0) {
      $email_err = "Email already used";  
    }
 

    //Check if 18 or older
    $today = date('Y-m-d');
    $age = date_diff(date_create($dob),date_create($today));
    if(($age -> format('%y'))<18)
        $dob_err= "Must 18 or older";

    //Check valid mobile number
    if(strlen($mobile)!=11)
    $mobile_err =" Enter a valid mobile number";
   


    $sql_m = "SELECT * FROM user WHERE mobile='$mobile'";
    $res_m = mysqli_query($db, $sql_m);

    //username no repeat check
    if (mysqli_num_rows($res_m) > 0) {
      $mobile_err = "Number already used";  
    }
    

    //**********Insert into Users Table + Individual users table create***********//


    if($username_err=="" && $email_err=="" && $dob_err=="" && $mobile_err==""){
        
      include('connect.php');
      //**********insert into users table*******//
      $sql1="INSERT INTO user
         Values('$firstname', '$lastname', '$username',  '$password', '$email', '$address', '$contact',  '$dob',  '$gender')";

      if (mysqli_query($conn, $sql1)) {

          $msg_success = "Signup Successful";  
          $sql2="CREATE TABLE $username
              (
              customer_name varchar(20) NOT NULL,
              customer_contact varchar(20) NOT NULL,
              model varchar(20) NOT NULL,
              brand varchar(20) NOT NULL,
              unit varchar(8) NOT NULL,
              sellingprice int,
              profit int,
              sellingdate date
              )"; 
          if (mysqli_query($conn, $sql2)) {
              echo "Table created successfully";
              header('location: http://127.0.0.1/411project/login.php');
            } else {
              echo "Error creating table: " . $conn->error;
            }
          
           
      } else {
          $msg_success = "Error adding information: " . mysqli_error($conn);
          header('location: http://127.0.0.1/411project/register.php');
      }

      //**********create individual users table*******//
      


      mysqli_close($conn);
    }
  }
  
//----------Insertion Complete-------------//
?>

<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="formstyle.css">

  
</head>
<body>
  <div class="col-md-4 offset-md-4 form-div">  
  <form method="post" action="register.php" >
    <table>

                  <tr>
                    <th colspan="2">
                      <h2 class="text-center" > SignUp </h2>
                    </th>
                  </tr>
                  <tr>
                    <td>First name:</td>
                    <td><input type="text" name="fname" class="form-control form-control-lg" placeholder="Enter First Name" required value="<?php echo $firstname; ?>">
                        
                  </tr>
               
                  <tr>
                    <td>Last name:</td>
                    <td><input type="text" name="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required value="<?php echo $lastname; ?>">
                         
                  </tr>

                  <tr>
                    <td>User name:</td>
                    <td><div <?php if (isset($username_err)): ?> class="form_error" <?php endif ?> >
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter Username" value="<?php echo $username; ?>">
                  <?php if (isset($username_err)): ?>
                    <span><?php echo $username_err; ?></span>
                  <?php endif ?>
                  </div></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control form-control-lg">
                  </tr>

                  <tr>
                    <td>Email:</td>
                    <td><div <?php if (isset($email_err)): ?> class="form_error" <?php endif ?> >
                      <input type="text" name="email" class="form-control form-control-lg" placeholder="abc@xyz.com" value="<?php echo $email; ?>"></td></tr>
                      <tr class="form_error"><td></td><td>
                  <?php if (isset($email_err)): ?>
                    <span><?php echo $email_err; ?></span>
                  <?php endif ?></td></tr>
                </div>
                  
                  <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" class="form-control form-control-lg" value="<?php echo $address; ?>" required>
                   </td>
                  </tr>

                  <tr>
                    <td>Date of Birth:</td>
                    <td><div <?php if (isset($dob_err)): ?> class="form_error" <?php endif ?> >
                      <input type="date" name="date"  required class="form-control form-control-lg" value="<?php echo $dob; ?>"></td></tr>
                      <tr class="form_error"><td></td><td>
                  <?php if (isset($dob_err)): ?>
                    <span><?php echo $dob_err; ?></span>
                  <?php endif ?></td></tr>
                </div>
                  
                  <tr>
                    <td>Contact number: +88 </td>
                    <td> <div <?php if (isset($mobile_err)): ?> class="form_error" <?php endif ?> >
                    <input type="text" name="num" required  class="form-control form-control-lg" placeholder="01*********" value="<?php echo $mobile; ?>"></td></tr>
                      <tr class="form_error"><td></td><td>
                  <?php if (isset($mobile_err)): ?>
                    <span><?php echo $mobile_err; ?></span>
                  <?php endif ?></td></tr>
                </div>
           
                  <tr>
                    <td>Gender: </td>
                      <td>
                        <input type="radio" name="gender" value="Male" required value="<?php echo $gender; ?>"/>Male
                        <input type="radio" name="gender"value="Female" required value="<?php echo $gender; ?>"/>Female
                      </td>
                  </tr>
    
    
               <tr>
                  <th colspan="2">
                      <button type="submit" name="signup" class="btn btn-primary btn-block btn-lg"> Sign Up </button> 
                  </th>  
                </tr>
            </table>

              <p style="text-align:center;">Already a User? <a href="login.php">Sign In</a></p>
  </form>
</div>
  </body>
</html>
