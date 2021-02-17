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
        <h1>User registration with OTP verification</h1>
        <form action="./register.php" method="post">
            <fieldset>
                <legend>Register</legend>
                UserName:<br>
                <input type="text" name="name" required="required"><br>
                Email:<br>
                <input type="email" name="email" required="required"><br>
                Phone Number: <br>
                <input type="tel" name="phone" required="required"><br>
                <input type="submit" value="Register" name="submitButton" />
            </fieldset
        </form>
    </body>
</html>
