<?php

    include '../layout/header.php';
    include "../classes/database.class.php";

    $db = new Database;

    $table = "Users";

    if (isset($_POST['btn-create'])) {
        
        $postFName = $_POST['firstname'];
        $postLName = $_POST['lastname'];
        $postDOB = $_POST['date_of_birth'];
        $postEmail = $_POST['email'];
        $postPhone = $_POST['phone'];
        $postPassword = $_POST['password'];


        $params = [
            'firstname' => $postFName,
            'lastname' => $postLName,
            'date_of_birth' => $postDOB,
            'email' => $postEmail ,
            'phone' => $postPhone,
            'password' => $postPassword,
            
        ];
        $post = $db->create($params, $table);

        if($db->create($params, $table)) {
            header("Location: insert.php?inserted");
        } else {
            header("Location: insert.php?failure");
        }
    }

    if(isset($_GET['inserted'])) { ?>
        <div class="container">
            <div class="alert alert-info">
                <strong>WOW!</strong> Record was inserted successfully <a href="../index.php">HOME</a>!
            </div>
        </div>
    <?php } else if(isset($_GET['failure'])) { ?>
        <div class="container">
            <div class="alert alert-warning">
                <strong>SORRY!</strong> ERROR while inserting record !
            </div>
        </div>
        <?php } ?>

<div class="clearfix"></div>

<div class="clearfix"></div><br/>

<div class="container">
  
     <form method='post'>
 
    <table class='table table-bordered'>
        <tr>
            <td>FirstName</td>
            <td><input type='text' name='firstname' class='form-control' required></td>
        </tr>
        <tr>
            <td>LastName</td>
            <td><input type='text' name='lastname' class='form-control' required></td>
        </tr>
        <tr>
            <td>Date of birth</td>
            <td><input type='text' name='date_of_birth' class='form-control'  required></td>
        </tr>
        <tr>
            <td>Email @</td>
            <td><input type='text' name='email' class='form-control' required></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type='text' name='phone' class='form-control'></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-create">
                    <span class="glyphicon glyphicon-edit"></span>  Create new <?php echo $table ?>
                </button>
                <a href="../index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
    </table>
</form>
     
     
</div>