<?php
//error_reporting(0);\
session_start();
require('config.php');
if (isset($_POST['signup'])) {
  $fname = $_POST['fullname'];
  $email = $_POST['emailid'];
  $mobile = $_POST['mobileno'];
  $password = md5($_POST['password']);
  $sql = "INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fname', $fname, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Registration successfull. Now you can login');</script>";
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
}
?>
<script>
  function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data: 'emailid=' + $("#emailid").val(),
      type: "POST",
      success: function(data) {
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error: function() {}
    });
  }
</script>
<script type="text/javascript">
  function valid() {
    if (document.signup.password.value != document.signup.confirmpassword.value) {
      alert("Password and Confirm Password Field do not match  !!");
      document.signup.confirmpassword.focus();
      return false;
    }
    return true;
  }
</script>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title Page-->
  <title>Car2Go | Register</title>
  <!-- CSS-->
  <link href="../assets/css/reg.css" rel="stylesheet" media="all">
  <!-- <link rel="stylesheet" href="../assets/css/style.css" type="text/css"> -->
</head>

<body>
  <div class="page-wrapper p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
      <div class="card card-4">
        <div class="card-body">
          <h2 class="title">Register</h2>
          <form method="POST" name="signup" onSubmit="return valid();">

            <!-- <div class="row row-space"> -->
            <div class="col-2">
              <div class="input-group">
                <label class="label">Full name</label>
                <input class="input--style-4" type="text" name="fullname">
              </div>
            </div>
            <!-- </div>
                        <div class="row row-space"> -->
            <div class="col-2">
              <div class="input-group">
                <label class="label">Mobile Number</label>
                <div class="input-group-icon">
                  <input class="input--style-4 js-datepicker" type="text" name="mobileno" maxlength="10" required="required">
                  <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                </div>
              </div>
            </div>
            <!-- </div>
                        <div class="row row-space"> -->
            <div class="col-2">
              <div class="input-group">
                <label class="label">Email</label>
                <input class="input--style-4" type="email" name="emailid" onBlur="checkAvailability()" required="required">
              </div>
            </div>
            <div class="col-2">
            </div>
            <div class="col-2">
              <div class="input-group">
                <label class="label">Password</label>
                <input class="input--style-4" type="password" name="password">
              </div>
            </div>
            <div class="col-2">
              <div class="input-group">
                <label class="label">Confirm Password</label>
                <input class="input--style-4" type="password" name="confirmpassword">
              </div>
            </div>
        </div>
        <div class="form-group checkbox">
          <input type="checkbox" id="terms_agree" required="required" checked="">
          <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
        </div>
        <div class="p-t-15">
          <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
        </div><br>
        </form>
        <div class="modal-footer text-center">
          <p>Already got an account? <a href="login.php" data-toggle="modal" data-dismiss="modal">Login Here</a></p><br>
        </div>
      </div>

    </div>
  </div>
  </div>

</body>

</html>
<!-- end document-->