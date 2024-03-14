<?php
session_start();

$user_profile=$_SESSION['user_name'];
if($user_profile==true){

}else{
    header('location:index.php');
}
?>
<?php
include("db_connect.php");
 $id=$_GET['update_id'];
 
 $sql="select * from contact where id='$id'";

 $result=mysqli_query($conn,$sql);
 $total=mysqli_num_rows($result);

 $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $email=$row['email'];
    $message=$row['message'];
 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>update</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
            <form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" aria-describedby="emailHelp" placeholder="Enter Name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
   
    <textarea name="message" class="form-control" placeholder="Type your message" required>
      <?php echo $message; ?>
    </textarea>
             
  </div>
  
  <input type="submit" value="Update" name="update">
</form>
            </div>
            <div class="col-lg-2"></div>
        </div>

</div>
<?php
if ($_POST['update']) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "UPDATE contact SET name='$name', email='$email', message='$message' WHERE id='$id'";
  $result=mysqli_query($conn,$sql);
  if($result){
     
      header('location:contact_admin.php');
  }else{
    echo "not updated";
  }
}
?>
</body>
</html>