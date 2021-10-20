<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tutorial-06</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Optional: Include the jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Optional: Incorporate the Bootstrap JavaScript plugins -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
        include_once 'Config.php';
        include_once 'Data.php';

        $database = new Config();

        $db = $database->getConnection();

        $users = new Data($db);

        $stmt = $users->readAll();
        ?>
        <p><br/></p>
        <div class="container">
            <p>
                <a class="btn btn-primary" href="Add.php" role="button">Add Data</a>
            </p>

            <table class="table table-bordered table-hover table-striped">
                <caption>Personal Data Table</caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    ?>
                        <tr>
                        <?php echo "<td>$id</td>" ?>
                        <?php echo "<td>$first_name</td>" ?>
                        <?php echo "<td>$last_name</td>" ?>
                            <?php echo "<td>$email_id</td>" ?>
                            <?php echo "<td>$contact_no</td>" ?>
                            <?php echo "<td width='100px'>
            
<a class='btn btn-warning btn-sm' href='update.php?id=$id' role='button' >
                <span class='glyphicon glyphicon-pencil'></span>
                
                </a>                
<a class='btn btn-danger btn-sm' href='delete.php?id=$id' role='button' >
                <span class='glyphicon glyphicon-trash'></span>
                </a>
</td>" ?>

                        </tr>
                            <?php
                        }
                        ?>
                </tbody>
            </table>

        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
