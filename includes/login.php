<?php
session_start();
require('config.php'); ?>
<?php


if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $_SESSION['login'] = $_POST['email'];
    $_SESSION['fname'] = "dfdsfsdf";
    // $currentpage = $_SERVER['REQUEST_URI'];
    $currentpage = '../index.php';

    echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
  } else {
    echo "<script>alert('Invalid Details');</script>";
  }
}

?>







<!doctype html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Car2Go | Login</title>
  <style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  font-family: Arial, sans-serif;
  background-image: url(../assets/images/blog_img2.jpg);
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}

.container {
  width: 400px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #ffffff
}

.input-group {
  margin-bottom: 15px;
}

.label {
  font-weight: bold;
}

input[type="text"],
input[type="password"]{
  width: calc(100% - 22px);
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"]{
    background-color: #f79131;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-left: 10px;
    margin-right:10px;
    font-size: 16px; 
}

button {
    background-color: #f79131;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    margin-left: 10px;
    margin-right:10px;
    font-size: 16px; 
}
button:hover{
    background-color: #ed8421;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}
a.signup-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
  }

  a.signup-button:hover {
    background-color: #45a049;
    text-decoration: none;
  }

a {
  text-decoration: none;
  color: #007bff;
}

a:hover {
  text-decoration: underline;
}

.error {
  color: red;
  margin-bottom: 10px;
}

.success {
  color: green;
  margin-bottom: 10px;
}
.previous{
    text-decoration: none; 
    display: inline-block; 
    padding: 8px 16px; 
    background-color: #f1f1f1; 
    color: black; 
}

.previous:hover{
    text-decoration: none; 
    display: inline-block; 
    padding: 8px 16px; 
    background-color: #e3e3e3; 
    color: black;
}
</style>
</head>

<body>


<div class="container">
  <h2>Login</h2>
  <form method="post">
      <div class="input-group">
      <label for="email">Email</label><br>
      <input type="text" id="email" name="email" required>
    </div>
    <div class="input-group">
      <label for="password">Password</label><br>
      <input type="password" id="password" name="password" required><br>
    </div>
    <div class="input-group">
      <input type="submit" name="login" value="Login">
      <a href="forgot_password.php">Forgot Password?</a>
    </div><br>
    <center><div class="input-group">
        <p>Don't have an account?</p>
      <a href="registration.php" class="signup-button">Sign Up</a><br><br>
      <a href="../index.php" class="previous">&laquo; Back to Homepage</a>
    </div></center>
  </form>
</div>

  <!-- Loading Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/fileinput.js"></script>
  <script src="js/chartData.js"></script>
  <script src="js/main.js"></script>

</body>

</html>