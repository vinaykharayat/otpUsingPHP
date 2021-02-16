<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        include_once './bean/register.php';
        if($_POST['otp']==$_POST['conOtp'] && $_POST['username'] == $_POST["mailUser"]){
            print_r("<h1>Success! Welcome ". $_POST['username']."</h1>");
        }else{
                        print_r("<h1>Failed! Invalid otp for ".$_POST['username']."</h1> ");

        }
        ?>
    </body>
</html>
