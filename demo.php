<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<!-- <link rel="stylesheet" href="styles.css"> -->

<style>
    .container {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  text-align: center;
}

input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

</style>
</head>
<body>
  <div class="container">
    <h2>Forgot Password</h2>
    <p>Please enter your email address below to reset your password.</p>
    <input type="email" id="email" placeholder="Enter your email">
    <button onclick="sendResetLink()">Reset Password</button>
    <p id="message"></p>
  </div>
  <!-- <script src="script.js"></script> -->

  <script>
    function sendResetLink() {
  var email = document.getElementById('email').value;
  // You can add validation for the email address here
  
  // Here you would typically make an AJAX request to your server to send a password reset link
  // For demonstration purposes, let's just display a message
  
  document.getElementById('message').innerHTML = "Password reset link sent to " + email + ". Please check your email.";
}

  </script>
</body>
</html>
