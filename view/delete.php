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

    if(isset($_POST['btn-del'])) {
        $db->delete($id, $table);
    header("Location: delete.php?deleted"); 
    }

?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">

    <?php
        if(isset($_GET['deleted'])) {
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> record was deleted... 
    </div>

    <?php } else {
    ?>
        <div class="alert alert-danger">
            <strong>Sure !</strong> to remove the following record ? 
        </div>

        <?php }
 ?> 
</div>

<div class="clearfix"></div>

<div class="container">
  
  <?php
  if(isset($_GET['delete_id']))
  {
   ?>
   
    <table class='table table-bordered'>
        <tr>
            <th>#</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Date of birth</th>
            <th>Email @</th>
            <th>Phone</th>
            <th>Password</th>
        </tr>
         <?php
         
         {
             ?>
            <tr>
                <td><?php print($get['id']); ?></td>
                <td><?php print($get['firstname']); ?></td>
                <td><?php print($get['lastname']); ?></td>
                <td><?php print($get['date_of_birth']); ?></td>
                <td><?php print($get['email']); ?></td>
                <td><?php print($get['phone']); ?></td>
                <td style="-webkit-text-security: disc;"><?php print($get['password']); ?></td>
            </tr>
             <?php
         }
         ?>
         </table>
         <?php
  }
  ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
 ?>
   <form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
 <?php
}
else
{
 ?>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div> 
<?php include_once 'footer.php'; ?>