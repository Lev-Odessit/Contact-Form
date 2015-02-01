<!DOCTYPE html>
<html lang="en">
<head>

    <title>Contact List</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/style.css"/>

    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.css"/>

    <script src="script/main.js" type="text/javascript"></script>

    <script src="bower_components/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>
    <script src="bower_components/bootstrap/js/tooltip.js" type="text/javascript"></script>

</head>
    <body>
        <?php

            $connect = mysqli_connect('localhost','root') or die(mysqli_error($connect));
            mysqli_select_db($connect,'mytest');
            $per_page=20;

            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            }
            else {
                $page=1;
            }

            // Page will start from 0 and Multiple by Per Page
            $start_from = ($page-1) * $per_page;

            //Selecting the data from table but with limit
            $query = "SELECT * FROM students LIMIT $start_from,$per_page";
            $result = mysqli_query($connect, $query);

            if(isset($_GET['del'])) {
                $del = intval($_GET['del']);
                $query = "DELETE FROM students WHERE id = $del";
                /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
                mysqli_query($connect,$query) or die(mysqli_error($connect));
            }

            $result = mysqli_query($connect, "SELECT * FROM students ORDER BY id DESC");

            // Count the total records
            $total_records = mysqli_num_rows($result);

            //Using ceil function to divide the total records on per page
            $total_pages = ceil($total_records / $per_page);


        ?>
        <div class="container">
            <div class="row">
                <div class="contact-table col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left">

                    <?php
                        echo "<h1 align='center'>"."Contact List:"."</h1>";
                    ?>

                    <table class="table table-hover" align="center" border="2" cellpadding="4">
                        <tr><th>Name:</th><th>Mail:</th><th>Country:</th><th style="text-align: center"><a href="newContactListForm.php">Add new+</a></th></tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr align="center">
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['mail']; ?></td>
                                <td><?= $row['country']; ?></td>
                                <td><?= "<a name=\"del\" href=\"ContactsList.php?del=".$row['id']."\">Удалить</a>" ?></td>
                            </tr>
                        <?php
                        };
                        ?>
                    </table>

                    <div class="pagination_block">

                        <?=  "<nav><ul class=\"pagination\"> <li><a href='ContactsList.php?page=1' aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a></li>"; ?>

                        <?php
                            for ($i=1; $i<=$total_pages; $i++) {
                                echo "<li><a  href='ContactsList.php?page=".$i."'>$i</a></li>";
                            };
                        ?>

                        <?= "<li><a href='ContactsList.php?page=$total_pages' aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li></ul></nav>"; ?>


                    </div> <!-- pagination div -->
                </div> <!--  table&pagination div -->
            </div> <!-- row div -->
        </div> <!-- container div -->
    </body>
</html>