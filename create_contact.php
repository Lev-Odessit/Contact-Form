<?php

    $connect = mysqli_connect('localhost','root') or die(mysqli_error($connect));
    mysqli_select_db($connect, 'mytest');

    $post = (!empty($_POST)) ? true : false;

    if ($post) {

        $name = addslashes($_POST['name']);
        $mail = addslashes($_POST['mail']);
        $country = addslashes($_POST['country']);

        $query = mysqli_query($connect,"INSERT INTO students VALUES('','$name','$mail','$country')") or die(mysqli_error($connect));
    }

?>