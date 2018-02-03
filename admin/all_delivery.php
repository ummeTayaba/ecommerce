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
          <li><a href="all_user.php">Users</a></li>
          <li class="active"><a href="all_delivery.php">Delivery Report</a></li>

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

    <div class='container-fluid'>


    </div>
  <?php

      include('../php/my_pdo.php');

      if(isset($_POST['submit']))
      {
         if(isset($_POST['pay']) && isset($_POST['d_id']))
         {
            $id = $_POST['d_id'];
            $status = $_POST['pay'];

            $sql = "UPDATE delivery SET is_paid='$status' WHERE id='$id'";
            getData($sql);
         }
         else
         {
          echo 'nai kisu';
         }
      }
      

  ?>
    
  <div class="container-fluid">
    <table class="table table-hover table-striped table-bordered">
    <thead>
      <tr>
        <th>User Email</th>
        <th>Item Name</th>
        <th>Order Date</th>
        <th>Delivery</th>
        <th>Price</th>
        <th>Payment Status</th>
        <th>Function</th>
        
        
      </tr>
    </thead>
    <tbody>
      <?php


      $sql = "SELECT * FROM delivery";

    

      $result = getData($sql);
      while($row = $result -> fetch_assoc())
      {
    ?>
      <form method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    
      <tr>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['item']; ?></td>
        <td><?php echo $row['order_date']; ?></td>
        <td><?php echo $row['del_date']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td>
          <select name='pay'>
            <option value='1' <?php if($row['is_paid'] == '1')echo 'selected'; ?>>Paid</option>
            <option value='0' <?php if($row['is_paid'] == '0')echo 'selected'; ?>> Unpaid </option>
          </select>
        </td>

        <td>
          <input type='hidden' value='<?php echo $row['id']?>' name='d_id' />
          <input type='submit' name='submit' class='btn btn-info' value='Change Status'/>
        </td>
      </tr>
    </form>

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
