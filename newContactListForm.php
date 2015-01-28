<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Contact List</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="css/style.css"/>

        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.css"/>

        <script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>
        <script src="bower_components/bootstrap/js/tooltip.js" type="text/javascript"></script>

        <script src="script/main.js" type="text/javascript"></script>

    </head>
    <body>

        <?php

            $connect = mysqli_connect('localhost','root') or die(mysqli_error($connect));
            mysqli_select_db($connect, 'mytest');

            if (isset($_POST['submit'])) {

                $name = addslashes($_POST['name']);
                $mail = $_POST['mail'];
                $country = $_POST['country'];

                $query = mysqli_query($connect,"INSERT INTO students VALUES('','$name','$mail','$country')") or die(mysqli_error($connect));
            }

        ?>


        <div class="container">
            <div class="row">
                <div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <a href="simplePagination.php" class="pull-left">
                        <img src="image/arrow_right_2.png" alt=""/>
                    </a>
                    <h1 class="pull-left">Create new contact:</h1>
                </div>
            </div>
            <div class="row">
                <div class="register_inputs col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">

                    <form class="form-horizontal" role="form" >

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="|Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="mail" class="form-control" id="email" placeholder="|Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Country" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-10">
                                <input type="text" name="country" class="form-control" id="Country" placeholder="|Country">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">
                                <button type="submit" name="submit" class="btn btn-default">Create</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </body>
</html>


