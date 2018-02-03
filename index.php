<!DOCTYPE html>
<html>
<head>
	<title></title>

  <?php

    session_start();
  ?>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="js/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="js/bootstrap.min.js"></script>

  <link href="css/lobster.css" rel="stylesheet">

	<link rel="stylesheet" href="css/icon.css">
	<link rel="stylesheet" href="css/material.pink-red.min.css" />
	<script defer src="js/material.min.js"></script>
  <link rel="stylesheet" href="css/right_drawer.css" />
  <link rel="stylesheet" href="css/boot_card.css" />
	<style>

	.spaces
	{
		margin-left: 10%;
	}

  
	</style>

  <style>


</style>

</head>
<body>

	<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">
      
    <?php
      if(isset($_SESSION['u_name']))
      {
        echo $_SESSION['u_name']; 
      }
      else
      {
        echo "Welcome";
      }
    ?>
      </span>

      <!--spacer to bring the rest elements after it to the right -->
      <div class="mdl-layout-spacer"></div>
      <div id="tt4" class="icon material-icons">search</div>
      <div class="mdl-tooltip" for="tt4">
      Search<br> in current tab
      </div>
      <div class="material-icons" id="notif" >&#xE853;</div>
      
    </div>

    
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#fixed-tab-1" id='men' class="mdl-layout__tab is-active">Men's Accessories</a>
      <a href="#fixed-tab-2" id='women' class="mdl-layout__tab">Women's Accessories</a>
      <a href="#fixed-tab-3" id='child' class="mdl-layout__tab">Children's Accessories</a>
    </div>
  </header>


  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Menu</span>

	 <nav class="mdl-navigation">
      <a class="mdl-navigation__link" disabled='true' href="user/cart.php"><i class="material-icons">&#xE854;</i><span class='spaces'>My Cart</span></a>
      <a class="mdl-navigation__link" href=""><i class="material-icons">&#xE87D;</i><span class='spaces'>Archives</span></a>
      <a class="mdl-navigation__link" href="user/delivery.php"><i class="material-icons">&#xE916;</i><span class='spaces'>Delivery Report</span></a>
      
    </nav>

  </div>

  <div class="mdl-layout__drawer-right">
        <span class="mdl-layout-title"><i id='right_drawer_close' class="material-icons">close</i></span>
        
        <nav>
          <a class='mdl-nav_right_link' href="#" >Home</a>
          <a class='mdl-nav_right_link' href="user/login.php" >Login</a>
          <a class='mdl-nav_right_link'  href="user/register.php" >Register</a>
          <a class='mdl-nav_right_link' href="user/dev.php" >Developer Info</a>
        </nav>

  </div>




  <main class="mdl-layout__content">

   <div class="container-fluid pop_up_container">

      <form>

      <div class="row">
        <div class="form-group">
          <div class="col-sm-2">
            <label>
                Max Price:<span id='max_val'>2500</span>
            </label>
            
          </div>
          <div class="col-sm-10">  
            <input onchange='showMax(this.value)' class="mdl-slider mdl-js-slider" type="range"
  min="0" max="10000" value="2500" tabindex="0">
          </div>


        </div>


      </div>

      <div class="row">
        <div class="form-group">
          
          <div class="col-sm-2">
            <label>
                Min Price:<span id='min_val'>0</span>
            </label>
            
          </div>
          <div class="col-sm-10">  
            <input class="mdl-slider mdl-js-slider" type="range"
  min="0" max="10000" onchange="showMin(this.value)" value="25" tabindex="0">
          </div>

        </div>


      </div>

      <div class="row">
        <div class="form-group">
        

          

          <div class="col-sm-10 col-sm-offset-1">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="keyword">
              <label class="mdl-textfield__label" for="keyword"><i class="material-icons">search</i></label>
              
            </div>        
          </div>




        </div>
        
        
      </div>

      


      </form>
      
      <div class="row">
        <div class="col-sm-offset-1">

          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick='initFind()' id='query'>
            Find Result
          </button>
          
        </div>
        
        
      </div>


      <div class="row" id='cancel_butt' style='margin-top: 15px'>
        <div class="col-sm-offset-1">

          <button id="cancel" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Cancel
          </button>
          
        </div>
        
        
      </div>


    </div>
    <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
      <div class="page-content">
      <!-- Your content goes here -->
      
      <div class="container"  id='men_acc'>
          
      </div>

      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content">
      <!-- Your content goes here -->
      <div class="container"  id='women_acc'>
          
      </div>  

      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-3">
      <div class="page-content">
      <!-- Your content goes here -->
      <div class="container"  id='children_acc'>
          
      </div>
      </div>
    </section>
  </main>

  <div class="mdl-layout__obfuscator-right"></div>
</div>

<script type="text/javascript" src="js/right_drawer.js"></script>
<script type="text/javascript" src="js/adder.js"></script>
</body>
</html>