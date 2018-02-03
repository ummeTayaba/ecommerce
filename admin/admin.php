<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>

  <?php

    include('../php/my_pdo.php');

    if(isset($_POST['submit']))
    {
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $sql = "SELECT * FROM users WHERE email='$email' AND u_pass='$pass' AND is_admin=1";
      
      $result = getData($sql);
      $num = mysqli_num_rows($result);

      if($num >= 1)
      {
        session_start();
        $row = $result->fetch_assoc();

        $_SESSION["admin"] = $row['first'];
        $_SESSION["email"] = $row['email'];
        header("Location: http://localhost/admin/adhome.php");
        die();
      }
      else
      {
        include('../php/danger_input.php');
      }   
    }

  ?>

<div class="container">
  <h2>Welcome to Admin Panel</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name='email' class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name='password' class="form-control" id="pwd" placeholder="Enter password">
    </div>
    
    <button name='submit' type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
