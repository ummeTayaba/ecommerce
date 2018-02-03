<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <?php 

    session_start();

  ?>
	<!-- jQuery library -->
	<script src="../js/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

  <link href="../css/lobster.css" rel="stylesheet">

	<link rel="stylesheet" href="../css/icon.css">
	<link rel="stylesheet" href="../css/material.pink-red.min.css" />
	<script defer src="../js/material.min.js"></script>
  <link rel="stylesheet" href="../css/right_drawer.css" />
  <link rel="stylesheet" href="../css/login.css" />
  <link rel="stylesheet" href="../css/cart.css" />

  </head>
<body>

	<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Cart</span>

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
      <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE854;</i><span class='spaces'>My Cart</span></a>
      
      <a class="mdl-navigation__link" href="delivery.php"><i class="material-icons">&#xE916;</i><span class='spaces'>Delivery Report</span></a>
      
    </nav>

  </div>

  <div class="mdl-layout__drawer-right">
        <span class="mdl-layout-title"><i id='right_drawer_close' class="material-icons">close</i></span>
        
        <nav>
          <a class='mdl-nav_right_link' href="../index.php" >Home</a>
          
          <a class='mdl-nav_right_link' href="#" >Login</a>
          <a class='mdl-nav_right_link'  href="register.php" >Register</a>
          <a class='mdl-nav_right_link' href="" >Contact Us</a>
          <a class='mdl-nav_right_link' href="" >Developer Info</a>
        </nav>

  </div>


  <main class="mdl-layout__content">

  <div class="page-content">


  
    <div class="container-fluid">
    
    <div class="row">
      
      <div class="col-sm-12">
        <p class="text-center title-header">Cart</p>
        
      </div>

    </div>


    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead>
        <tr>
          <th class="mdl-data-table__cell--non-numeric">Name</th>
          <th>Price</th>
          
        </tr>
      </thead>
      <tbody id='data'>
        
      </tbody>
    </table>

    <form action="#">

      <input type="hidden" value="<?php echo $_SESSION['u_email'] ?>" id="value">
      

    </form>
    
    </div>

    <div class="row">
    <div class="col-sm-offset-5">
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="goBuy();">
        Buy Items
    </button>
    </div>      
    </div>

  </div>

  </main>
    
  <div class="mdl-layout__obfuscator-right"></div>
</div>

<script type="text/javascript" src="../js/table.js"></script>


<script type="text/javascript" src="../js/right_drawer.js"></script>

</body>
</html>