<?php
    $connect = mysqli_connect('localhost','root') or die(mysqli_error($connect));
    mysqli_select_db($connect, 'register');

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $r_password = $_POST['r_password'];

        if ( $password == $r_password ) {
            $password = md5($password);
            $query = mysqli_query($connect,"INSERT INTO users VALUES('','$username','$login','$password')") or die(mysqli_error($connect));
        } else {
            die('Password must match!');
        }
    }

    if ( isset($_POST['enter']) ) {

        $e_login = $_POST['e_login'];
        $e_password = md5($_POST['e_password']);
        $query = "SELECT * FROM users WHERE login = '$e_login'";
        $result = mysqli_query($connect,$query);
        $user_data = mysqli_fetch_array($result,MYSQL_BOTH);

        if ( $user_data['password'] == $e_password ) {
            echo "Ok";
        } else {
            echo "Wrong password or login!";
        }
    }

?>

<style>
    input {
        margin: 5px;
    }
</style>

<form action="register.php" method="post">
    <input type="text" name="username" title="Username" placeholder=" | Username" required/> <br/>
    <input type="text" name="login" title="Login" placeholder=" | Login" required/> <br/>
    <input type="password" name="password" title="Password" placeholder=" | Password" required/> <br/>
    <input type="password" name="r_password" title="r_Password" placeholder=" | Repeat Password" required/> <br/>
    <input type="submit" name="submit" value="Register"/>
</form>


<form action="register.php" method="post">
    <input type="text" name="e_login" title="Login" placeholder=" | Login" required/> <br/>
    <input type="password" name="e_password" title="Password" placeholder=" | Password" required/> <br/>
    <input type="submit" name="enter" value="Enter"/>
</form>

