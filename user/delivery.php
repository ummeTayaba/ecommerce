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
      
      <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE916;</i><span class='spaces'>Delivery Report</span></a>
      
    </nav>

  </div>

  <div class="mdl-layout__drawer-right">
        <span class="mdl-layout-title"><i id='right_drawer_close' class="material-icons">close</i></span>
        
        <nav>
          <a class='mdl-nav_right_link' href="../index.php" >Home</a>
          
          <a class='mdl-nav_right_link' href="#" >Login</a>
          <a class='mdl-nav_right_link'  href="register.php" >Register</a>
          <a class='mdl-nav_right_link' href="dev.php" >Developer Info</a>
        </nav>

  </div>


  <main class="mdl-layout__content">

  <div class="page-content">


  
    <div class="container-fluid">
    
    <div class="row">
      
      <div class="col-sm-12">
        <p class="text-center title-header">Delivery Report</p>
        <p class="text-center title-header">If faced any problem then call 12345678910</p>
        
      </div>

    </div>


    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead>
        <tr>
          <th class="mdl-data-table__cell--non-numeric">Name</th>
          <th>Price</th>
          <th>Delivery Status</th>
          
          
        </tr>
      </thead>
      <tbody>
      <?php
        include('../php/my_pdo.php');

        $email = $_SESSION['u_email'];
        $sql = "SELECT * FROM delivery WHERE email='$email'";
        $result = getData($sql);

        while($row = $result -> fetch_assoc())
        {
      ?>
        <tr>
          <td class="mdl-data-table__cell--non-numeric"><?php echo $row['item']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td>
          
          <?php 
            $today = new DateTime();
            $del = new DateTime($row['del_date']);

            if($today < $del)
            {
              $interval = $today->diff($del);

              echo $interval->format('%a days');
            }
            else
            {
          ?>
              <i class="material-icons">done</i>
          <?php
            }

          ?>
            
          </td>
        </tr>
      
      <?php
        }
      ?>
              
      </tbody>
    </table>

    </div>


  </div>

  </main>
    
  <div class="mdl-layout__obfuscator-right"></div>
</div>


<script type="text/javascript" src="../js/right_drawer.js"></script>

</body>
</html>