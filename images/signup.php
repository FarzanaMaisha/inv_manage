<!DOCTYPE HTML>
<head>
  
    <link rel="stylesheet" type="text/css" href="signupstyle.css"/>
    <title>SignUp</title>

</head>

<?php

$count=0;
$username_msg=$username=$password_msg=$email_msg =$address_msg =$firstname_msg =$lastname_msg =$date_of_birth_msg =$date_of_birth  = $gender_msg = $mobile_msg =$msg_success = "";

//***********Validate information from signup form*******// 

if (isset($_POST['signup'])) {  

//***First Name***//
$firstname = $_POST['fname'];
//------//

//***Last Name***//
$lastname = $_POST['lname'];
//------//


//***User Name***//
if(empty($_POST['uname']))
$username_msg = "Enter your user name";                      //UserName Load
$username = $_POST['uname'];
  include("connect.php");
    $sql_u = "SELECT * FROM user where username='$username'";
$result_u = mysqli_query($conn, $sql_u);
if (mysqli_num_rows($result_u) > 0)  {
    $username_msg="Username already taken";
    mysqli_close($conn);
   // header('location: http://127.0.0.1/project411/signup.php');  
  }
//------//


//***Password***//
if(empty($_POST['pwd']))
$password_msg = "Enter password";                            //Password Load
$pass= $_POST['pwd'];
//------//

//***Email***//
if(empty($_POST['email']))
$email_msg = "Enter your email address";                     //Email Load
$email = $_POST['email'];
$pattern2 = '/([\w\-]+\@[\w\-]+\.[\w\-]+)/';
if(!preg_match($pattern2, $email))
$email_msg = "Enter with '@' starting with characters and following with x.y";
//------//

//***Address***//
if(empty($_POST['address']))
$address_msg = "Enter your address";                        //Address Load
$address = $_POST['address'];
//------//


//***Date of Birth***//
if(empty($_POST['date']))
$date_of_birth_msg = "Select your date of birth";              //Date of Birt Load

$date_of_birth = $_POST['date'];
$today = date('Y-m-d');
$age = date_diff(date_create($date_of_birth),date_create($today));
if(($age -> format('%y'))<18)
    $date_of_birth_msg= "Must 18 or older";
//------//

//***Gender***//
$gender = $_REQUEST['gender'];
//------//

  
//***Mobile number***//
    if(!empty($_POST['num']))
  {
  $mobile="+88".$_POST['num'];
  if(strlen($mobile)!=14)
    $mobile_msg =" Enter a valid mobile number";
  if(strlen($mobile)==14)
    if($mobile[4]!=1 || $mobile[5]==1 || $mobile[5]==2 || $mobile[5]==0 )
      $mobile_msg =" Enter a valid mobile number";
  }
    if(empty($_POST['num']))
  $mobile_msg =  "Enter your mobile number";
//------//

//---------validation complete----------//



//**********Insert into Users Table + Individual users table create***********//
  if($firstname_msg=="" && $lastname_msg=="" && $username_msg=="" && $password_msg=="" && $email_msg==""  && $address_msg=="" && $firstname_msg=="" && $lastname_msg=="" && $date_of_birth_msg=="" && $gender_msg=="" && $mobile_msg==""){
      
      include('connect.php');
      //**********insert into users table*******//
      $sql1="INSERT INTO user
         Values('$firstname', '$lastname', '$username',  '$pass', '$email', '$address', '$mobile',  '$date_of_birth',  '$gender')";

      if (mysqli_query($conn, $sql1)) {

          $msg_success = "Signup Successful";
          header('location: http://127.0.0.1/project411/login.php');
           
      } else {
          $msg_success = "Error adding information: " . mysqli_error($conn);
          header('location: http://127.0.0.1/project411/signup.php');
      }

      //**********create individual users table*******//
        $sql2="CREATE TABLE $usersname
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
            } else {
              echo "Error creating table: " . $conn->error;
            }


      mysqli_close($conn);
    }
  }
//----------Insertion Complete-------------//

?>



<!--*********Signup Form************  -->
<?php echo "<h3 class='success_msg'>".$msg_success."</h3>"; ?>
<body>

        <div class="col-md-4 offset-md-4 form-div">  
          
         <form id="SignUp" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <table>

                  <tr>
                    <th colspan="2">
                      <h2 class="text-center" > SignUp </h2>
                    </th>
                  </tr>
                  <tr>
                    <td>First name:</td>
                    <td><input type="text" name="fname" class="form-control form-control-lg" required>
                        <?php echo "<p class='note'>".$firstname_msg."</p>";?></td>
                  </tr>
               
                  <tr>
                    <td>Last name:</td>
                    <td><input type="text" name="lname" class="form-control form-control-lg" required>
                         <?php echo "<p class='note'>".$lastname_msg."</p>";?></td>
                  </tr>

                  <tr>
                    <td>User name:</td>
                    <td><div <?php if (isset($username_msg)): ?> class="form_error" <?php endif ?> >
                  <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
                  <?php if (isset($username_msg)): ?>
                    <span><?php echo $username_msg; ?></span>
                  <?php endif ?>
                  </div></td>
                </tr>


                  <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control form-control-lg">
                     <?php echo "<p class='note'>".$password_msg."</p>";?></td>
                  </tr>

                  <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" class="form-control form-control-lg">
                    <?php echo "<p class='note'>".$email_msg."</p>";?></td>
                  </tr>

                  <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" class="form-control form-control-lg">
                   <?php echo "<p class='note'>".$address_msg."</p>";?></td>
                  </tr>

                  <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="date"  required class="form-control form-control-lg">
                    <?php echo "<p class='note'>".$date_of_birth_msg."</p>";?></td>
                  </tr>

                  <tr>
                    <td class="boxed">Contact number: +88 </td>
                    <td> 
                    <input type="text" name="num" required  class="form-control form-control-lg">
                   <?php echo "<p class='note'>".$mobile_msg."</p>";?></td>
                  </tr>
           
                  <tr>
                    <td>Gender: </td>
                      <td>
                        <input type="radio" name="gender" value="Male" required/>Male
                        <input type="radio" name="gender"value="Female" required/>Female
                        <?php echo "<p class='note'>".$gender_msg."</p>";?>
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
    </div>
</div>    

</body>
</html>