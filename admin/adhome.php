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
          <li class="active"><a href="#">Items Sold</a></li>
          <li><a href="item_add.php">Add Item</a></li>
          <li><a href="process.php">Processing Order</a></li>
          <li><a href="all_user.php">Users</a></li>
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
                  Get The Data Related To Transaction By:
                </label>

              </div>

              <div class="col-sm-3 ">
                  <select class="form-control" name='cat' id="sel1">
                    <option value='1'>Date</option>
                    <option value='2'>Month</option>
                    <option value='3'>Year</option>
                    
                  </select>
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
        <th>Items Sold</th>
        <th>Total Cost Sold</th>
        <th>Profit Made</th>
        <th>Duration</th>
        
      </tr>
    </thead>
    <tbody>
      <?php

      include('../php/my_pdo.php');

      $sql = "SELECT COUNT(*) AS total, SUM(price - prev_price) AS profit, SUM(price) AS t_price, DATE(del_date) AS d_time FROM delivery WHERE is_paid = 1 GROUP BY DATE(del_date)";

      if(isset($_GET['cat']) && $_GET['cat'] == 2)
      {
        $sql = "SELECT COUNT(*) AS total, SUM(price - prev_price) AS profit, SUM(price) AS t_price, DATE_FORMAT(del_date, '%m-%Y') AS d_time FROM delivery WHERE is_paid = 1 GROUP BY YEAR(del_date), MONTH(del_date)";
      }
      else if(isset($_GET['cat']) && $_GET['cat'] == 3)
      {
        $sql = "SELECT COUNT(*) AS total, SUM(price - prev_price) AS profit, SUM(price) AS t_price, DATE_FORMAT(del_date, '%Y') AS d_time FROM delivery WHERE is_paid = 1 GROUP BY YEAR(del_date)";
      }


      $result = getData($sql);
      while($row = $result -> fetch_assoc())
      {
    ?>
      <tr>
        <td><?php echo $row['total']; ?></td>
        <td><?php echo $row['t_price']; ?></td>
        <td><?php echo $row['profit']; ?></td>
        <td><?php echo $row['d_time']; ?></td>
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
