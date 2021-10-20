<?php
include_once 'Config.php';
include_once 'Data.php';

//get database connection
$database = new Config();

$db = $database->getConnection();

$user = new Data($db);
?>
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

        <div class="container" >
            <p>
            <a class="btn btn-primary" href="index.php" role="button">Back</a>
            </p><br/>
 <?php 
           if ($_POST) {
               
            $user->first_name=$_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->email_id = $_POST['email_id'];
            $user->contact_no = $_POST['contact_no'];
            
            $user->create();
               
           } 
           else {
 ?>
            
            <form method="post">
                <div class="form-group">
                    <label for="fn">First Name</label>
                    <input type="text" class="form-control" id="fn" name="first_name">
                </div>
                <div class="form-group">
                    <label for="ln">Last Name</label>
                    <input type="text" class="form-control" id="ln" name="last_name">
                </div>
                <div class="form-group">
                    <label for="em">Email</label>
                    <input type="text" class="form-control" id="em" name="email_id">
                </div>
                <div class="form-group">
                    <label for="ct">Contact</label>
                    <input type="text" class="form-control" id="ct" name="contact_no">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        
        <?php } ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
