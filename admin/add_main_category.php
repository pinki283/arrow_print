<?php
session_start();
include("db_connect.php");
$user_profile=$_SESSION['user_name'];
if($user_profile==true){

}else{
    header('location:index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>add_main_category</title>
  </head>
  <body>
    <div class="container"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
            <form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputEmail1">Image1</label>
    <input type="file" class="form-control" name="img">
  </div>
 

  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" name="title"  placeholder="Enter Movie Name">
  </div>

 


  
  <input type="submit" value="submit" name="submit">
</form>
            </div>
            <div class="col-lg-2"></div>
        </div>

</div>
<div class="container"></div>

<?php
include("db_connect.php");

if (isset($_POST['submit'])) {
 
    $title = mysqli_real_escape_string($conn, $_POST['title']);
  
    // Handle image upload (save the file to a directory and store the path in the database)
    $image_dir = "upload/main_category_img/"; // Create a directory for product images
    $image_name = mysqli_real_escape_string($conn, $_FILES['img']['name']);
    $target_file = $image_dir . basename($image_name);
   // $image_name = mysqli_real_escape_string($conn, $_FILES['image']['name']);
   // $target_file = $image_dir . basename($image_name);

    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
        // Image uploaded successfully, now insert product data into the database
        $sql = "INSERT INTO main_category (image, title ) VALUES ('$image_name', '$title')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            //echo "<script>alert('Film added successfully');</script>"; 
            header('location:freeDesignMain.php');
        } else {
            echo "Error adding shop: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading image.";
    }
}

?>

  </body>
  </html> 
 