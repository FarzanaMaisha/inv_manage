<?php
$db = mysqli_connect('localhost', 'root', '', 'inventory');

if(!empty($_SESSION['username'])){
  header("Location:/411project/index.php");
}
$password =$username ="";
$username_err=$password_err="";
if(isset($_POST['login']))
{ session_start();
     $username=$_POST['username'];
     $password = $_POST['password'];

        $sql_u = "SELECT * FROM user WHERE username='$username'";
        $res_u = mysqli_query($db, $sql_u);

        //username match
        if (mysqli_num_rows($res_u) > 0) {
        $row=mysqli_fetch_assoc($res_u);

            if($password==$row['password'])
            {
                $_SESSION['username'] = $username;
                $_SESSION['login'] = "Active";
                header("Location:/411project/index.php");
                mysqli_close($db);
            }
            else
                $password_err = "Incorrect password";
                mysqli_close($db);
        } 
        else 
        {
            $username_err="User does not exists";
            mysqli_close($db);
        }
     }



    
?>


<!DOCTYPE html>
<html>

<head>
      <link rel="stylesheet" href="formstyle.css">
     <link rel="stylesheet" href="style1.css">
    <title>Login</title>
    <!--Disable back button-->
    <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>

</head>


<body  >

    <div class="col-md-4 offset-md-4 form-div">
    <form id="login_form" method="post" action="login.php">
        <h2 style="text-align:center"> Login </h2>
           <table>

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

                    <td><div <?php if (isset($password_err)): ?> class="form_error" <?php endif ?> >
                        <input type="password" name="password" placeholder="Enter Password" required class="form-control form-control-lg" value="<?php echo $password; ?>">
                  <?php if (isset($password_err)): ?>
                    <span><?php echo $password_err; ?></span>
                  <?php endif ?>
                  </div></td>
                </tr>


                <tr>
                    <th colspan="2"><br/>
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-lg"> Login </button> 
                    </th>
                </tr>
                 </table>
                 <p style="text-align:center;">Not a User? <a href="register.php">Sign Up</a></p>
            </form>
       
    </div>
</body>
</html>