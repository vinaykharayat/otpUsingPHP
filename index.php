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
        <form action="./register.php" method="post">
            UserName:<input type="text" name="name"><br>
            Email:<input type="email" name="email"><br>
            Phone Number: <input type="number" name="phone"><br>
            <!--Subject:<input type="text" name="subject"><br>-->
            <!--Message:<textarea name="message"></textarea><br>-->
            <input type="submit" value="Register" name="submitButton" />
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
