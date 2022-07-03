<?php require'design.php'; ?>


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

   
    <form id="login_form" method="post" action="reportdaily.php">
        <h2 style="text-align:center"> View Report </h2>
           <table style="text-align:center">

                <tr>
                    <th colspan="2"><br/>
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-lg"> Daily report </button> 
                    </th>
                    
                </tr></table>
                  </form>

  </div>

    <form id="login_form" method="post" action="reportmonthly.php">
    	 <table style="text-align:center">
                <tr>
                    <th colspan="2"><br/>
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-lg"> Monthly report </button> 
                    </th>
                </tr>
                 </table>
             </form>
            
       
  
</body>
</html>