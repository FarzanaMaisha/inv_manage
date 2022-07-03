<?php require'design.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style type="text/css">
     
    .table{
        margin: 50px auto 50px;
        padding: 25px 15px 10px 15px;
        border: 1px solid #80ced7;
        border-radius: 5px;
        font-family: 'Lora', serif;
        font-size: .9em;
        box-sizing: content-box;
        height: fit-content;
        margin-left: auto; margin-right: auto;
    }

    .btn-block{
        display: block;
        width: 100%;
    }
    .form-control{
        box-sizing: border-box;
        height: 30%;
    }
    .btn{

        padding: 10px;
        border: none;
        border-radius: 5px;
        font-size: 90%;
        background: #5F9EA0;
        color: white;
    }
    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #c9c9c9;
    }

</style>
    <title ></title>
</head>
<body >
<!-- *****Heading Line****************-->
<div id="subheader"> 
    <div class="row">
        <div class="twelve columns">
            <p class="text-center" style="font-size: x-large;">
                 Add Product To Inventory
            </p>
        </div>
    </div>
</div>
<!------------------------------------>

</body>
</html>

<?php 

include('productform.php'); //insert product information


?>
