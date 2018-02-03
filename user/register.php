<!DOCTYPE html>
<html>
<head>
	<title></title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="../js/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="../js/bootstrap.min.js"></script>

  <link href="../css/lobster.css" rel="stylesheet">

  <link rel="stylesheet" href="../css/icon.css">
  <link rel="stylesheet" href="../css/material.pink-red.min.css" />
  <script defer src="../js/material.min.js"></script>
  <link rel="stylesheet" href="../css/right_drawer.css" />
  <!--Re using style from login -->
  <link rel="stylesheet" href="../css/login.css" />

</head>
<body>

	<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Register</span>

      <!--spacer to bring the rest elements after it to the right -->
      <div class="mdl-layout-spacer"></div>

      <div class="material-icons" id="notif">&#xE853;</div>
      <!--TODO: Sign up and sign in -->
     <!--  <nav class="mdl-navigation">
         <a class="mdl-navigation__link" href="" style="color:gray">Home</a>
         <a class="mdl-navigation__link" href="" style="color:gray">About</a>      
      </nav> -->
    </div>
    
  </header>



  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Menu</span>

	 <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="cart.php"><i class="material-icons">&#xE854;</i><span class='spaces'>My Cart</span></a>
      <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE916;</i><span class='spaces'>Delivery Report</span></a>
      
    </nav>

  </div>

  <div class="mdl-layout__drawer-right">
        <span class="mdl-layout-title"><i id='right_drawer_close' class="material-icons">close</i></span>
        
        <nav>
          <a class='mdl-nav_right_link' href="../index.php" >Home</a>
          <a class='mdl-nav_right_link' href="login.php" >Login</a>
          <a class='mdl-nav_right_link'  href="#" >Register</a>
          <a class='mdl-nav_right_link' href="" >Contact Us</a>
          <a class='mdl-nav_right_link' href="" >Developer Info</a>
        </nav>

  </div>


  <main class="mdl-layout__content">

  <div class="page-content">

  <?php
    include('../php/my_pdo.php');

    if(isset($_POST['submit']))
    {
      $first = $_POST['first'];
      $last = $_POST['last'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $password =$_POST['password'];
      $sql = "INSERT INTO users(first, last, email, u_pass, u_phone,u_addr) VALUES ('$first', '$last', '$email', '$password',
        '$phone', '$address')";


      if(insertData($sql))
      {

        session_start();

        $_SESSION["u_name"] = $first;
        $_SESSION["u_email"] = $email;
        
        header("Location: http://localhost/index.php");
        die();
      }
      else
      {
        include('../php/danger_input.php');
      }
    }
  ?>


    <div class="container-fluid">
    
    <div class="row">
      
      <div class="col-sm-12">
        <p class="text-center title-header">Registration</p>
        
      </div>

    </div>

    <div class="row">
      
      <div class="col-sm-4 col-sm-offset-4">
        <p class="text-center title-content">This is where you join the greatest phenomena in online shopping! Simply give us your basic info and we will do the rest in providing you the best online shopping experience.</p>
        
      </div>

    </div>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="row">
        <div class="form-group">
        

          <div class="col-sm-3 col-sm-offset-2">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name='first' required type="text" id="first">
            <label class="mdl-textfield__label" for="first">First Name</label>
            </div>
            <span class="mdl-textfield__error">Required!</span>        
          </div>

          <div class="col-sm-3 col-sm-offset-2">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name='last' required="true" id="last">
            <label class="mdl-textfield__label" for="last">Last Name</label>
            </div>
            <span class="mdl-textfield__error">Required!</span>        
          </div>

        </div>
        
        
      </div>


      <div class="row">
        <div class="form-group">
        

          <div class="col-sm-3 col-sm-offset-2">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name='email' required class="mdl-textfield__input" type="email" id="email">
            <label class="mdl-textfield__label" for="email">Email</label>
            </div>
            <span class="mdl-textfield__error">Required and must be valid!</span>        
          </div>

          <div class="col-sm-3 col-sm-offset-2">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name='password' required class="mdl-textfield__input" type="password" id="password">
            <label class="mdl-textfield__label" for="last">Password</label>
            </div>
            <span class="mdl-textfield__error">Required!</span>        
          </div>

        </div>
        
        
      </div>




      <div class="row">
        <div class="form-group">
        

          <div class="col-sm-8 col-sm-offset-2">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name='address' required class="mdl-textfield__input" type="text" id="address">
            <label class="mdl-textfield__label" for="address">Address</label>
            </div>
            <span class="mdl-textfield__error">Required!</span>        
          </div>
        </div>
        
        
      </div>

      <div class="row">
        <div class="form-group">
        

          <div class="col-sm-3 col-sm-offset-2">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name='phone' required class="mdl-textfield__input" type="number" id="number">
            <label class="mdl-textfield__label" for="number">Phone</label>
            </div>
            <span class="mdl-textfield__error">Required and must be valid!</span>        
          </div>

          <div class="col-sm-3 col-sm-offset-2">
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
              <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="1" checked>
              <span class="mdl-radio__label">Female</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
              <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="2">
              <span class="mdl-radio__label">Male</span>
            </label>       
          </div>

        </div>
        
        
      </div>


      <div class="row">
        <div class="form-group">
        

          

          <div class="col-sm-4 col-sm-offset-2">
            
            <button type='submit' name='submit' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              Register as User
            </button>

          </div>




        </div>
        
        
      </div>

    </form>
    <!-- Numeric Textfield with Floating Label -->
    <form action="#">
      
    </form>
    
    </div>

  </div>

  </main>
    
  <div class="mdl-layout__obfuscator-right"></div>
</div>

<script type="text/javascript" src="../js/right_drawer.js"></script>

</body>
</html>