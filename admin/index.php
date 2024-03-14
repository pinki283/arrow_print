<?php
session_start();
include("db_connect.php");
 

  $sql = "select * from admin ";
  $result = mysqli_query($conn, $sql);
  
  if ($row = $result->fetch_assoc()) {
      $admin_username  = $row['username'];
      $admin_password = $row['password'];

     
      // Check if the form was submitted
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = $_POST['username'];
          $password = $_POST['password'];
      
      
      
          // Check if the entered credentials match the admin credentials
          if ($username === $admin_username && $password === $admin_password) {
              // Redirect to the admin dashboard or the desired page on successful login
			  $_SESSION['user_name']=$username;
              header("location: dashboard.php");
              exit();
          } else {
              // Display an error message if credentials are incorrect
              echo "<script>alert ('Invalid credentials. Please try again.')</script>";
          }
      }
     
      
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Log In</title>

<link rel="stylesheet" href="css/style.css" />

</head>

<body>
<!-- <nav><a href="#" class="focus">Log In</a></nav> -->

<form action="index.php" method="POST" enctype="multipart/form-data">

	<h2>Admin Login</h2>

	<input type="text" name="username" class="text-field" placeholder="Username" />
    <input type="password" name="password" class="text-field" placeholder="Password" />
    
  <input type="submit" name="submit" class="button" value="Login" />

</form>

</body>
</html>