<!DOCTYPE html>
<html lang="en">
<head>
  <title>Accounting</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <style type="text/css">
    
    div.row, table
    {
      margin-top: 20px;
    }
  </style>
</head>
<body>
<!-- query:SELECT COUNT(*) AS total, SUM(price - prev_price) AS profit, SUM(price) AS t_price, DATE(del_date) AS d_time FROM delivery WHERE is_paid = 1 GROUP BY DATE(del_date)
 -->    
  <?php
    session_start();

    if($_SESSION['admin'])
    {


      if(isset($_POST['logout']))
      {
        session_destroy();
        header('Location: http://localhost/admin/admin.php');
        die();
      }

  ?>
  <!-- html code here -->
  <header>
      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Hello Admin</a>
        </div>
        <ul class="nav navbar-nav">
          <li ><a href="adhome.php">Items Sold</a></li>
          <li><a href="item_add.php">Add Item</a></li>
          <li><a href="process.php">Processing Order</a></li>
          <li class="active"><a href="#">Users</a></li>
          <li><a href="all_delivery.php">Delivery Report</a></li>

        </ul>
        <div class="pull-right">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
          <button type='submit' name='logout' class="btn btn-success navbar-btn">Logout</button>
        </form>
        </div>
      </div>
    </nav>

  </header>


  <main>
    
  <div class="container-fluid">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='GET'>
        
        <div class="row">

            <div class="form-group">
              <div class="col-sm-3 col-sm-offset-3">
                <label for="sel1">
                  Search By Mail:
                </label>

              </div>

              <div class="col-sm-3 ">
                  <input type="email" name="email" required="true">
              </div>
            </div>
          
        </div>


        <div class="row">

            <div class="form-group">

              <div class="col-sm-6 col-sm-offset-3">
                  <button type="submit" name='submit' class="btn btn-success btn-block">Search</button>
                    
                  </select>
              </div>
            </div>
          
        </div>
    </form>

    <table class="table table-hover table-striped table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Items Bought</th>
        
      </tr>
    </thead>
    <tbody>
      <?php

      include('../php/my_pdo.php');

      $sql = "SELECT *,(SELECT COUNT(*) FROM delivery WHERE delivery.email = users.email) AS total FROM users WHERE is_admin != 1";

      if(isset($_GET['email']))
      {
        $email = $_GET['email'];

        $sql = "SELECT *,(SELECT COUNT(*) FROM delivery WHERE delivery.email = users.email) AS total FROM users WHERE is_admin != 1 AND email = '$email'";
      }

      $result = getData($sql);
      while($row = $result -> fetch_assoc())
      {
    ?>
      <tr>
        <td><?php echo $row['first'] . " " . $row['last'];  ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['u_phone']; ?></td>
        <td><?php echo $row['u_addr']; ?></td>
        <td><?php echo $row['total']; ?></td>
      </tr>

    <?php
      }
    ?>
    </tbody>
  </table>
    
  </div>
  </main>
  <?php

    }
    else
    {
      echo 'Only admin allowed';
    }
  ?>


</body>
</html>
