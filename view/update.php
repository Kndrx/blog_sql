<?php

    include '../layout/header.php';
    include "../classes/database.class.php";

    $table = "Users";

    $db = new Database;
    
    $id = $_GET['id'];

    $get = $db->findById($id,$table);

    $firstname = $get['firstname'];
    $lastname = $get['lastname'];
    $dob = $get['date_of_birth'];
    $email = $get['email'];
    $phone = $get['phone'];
    $password = $get['password'];



    if (isset($_POST['btn-update'])) {

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

        // var_dump($params);
        $post = $db->update($params, $id, $table);

}

?>

<div class="clearfix"></div>

<div class="clearfix"></div><br/>

<div class="container">
  
     <form method='post'>
 
    <table class='table table-bordered'>
        <tr>
            <td>FirstName</td>
            <td><input type='text' name='firstname' class='form-control' value="<?php echo $firstname; ?>" required></td>
        </tr>
        <tr>
            <td>LastName</td>
            <td><input type='text' name='lastname' class='form-control' value="<?php echo $lastname; ?>" required></td>
        </tr>
        <tr>
            <td>Date of birth</td>
            <td><input type='text' name='date_of_birth' class='form-control' value="<?php echo $dob; ?>" required></td>
        </tr>
        <tr>
            <td>Email @</td>
            <td><input type='text' name='email' class='form-control' value="<?php echo $email; ?>" required></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type='text' name='phone' class='form-control' value="<?php echo $phone; ?>" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' value="<?php echo $password; ?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
                    <span class="glyphicon glyphicon-edit"></span>  Update this Record
                </button>
                <a href="../index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
    </table>
</form>
     
     
</div>