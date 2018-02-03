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
          <li ><a href="#">Items Sold</a></li>
          <li class="active"><a href="#">Add Item</a></li>
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

  <?php

    include('../php/my_pdo.php');

    if(isset($_POST['submit']))
    {
      $name = $_POST['name'];
      $prev = $_POST['prev'];
      $price = $_POST['price'];
      $desc = $_POST['desc'];
      $cat = $_POST['cat'];
      $amount = $_POST['count'];


      $table = "men";

      if($cat == '2')
      {
        $table = 'women';
      }
      else if($cat == '3')
      {
        $table = 'child';
      }


      //for image uploading 
      $target_dir = "../images/" . $table . "/";
      $target_file = $target_dir . time() .  basename($_FILES["img"]["name"]);

      if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file))
      {

        $sql = "INSERT INTO " . $table . "(item_name, description, image_loc, price, available, prev_price) VALUES('$name', '$desc', '$target_file', '$price', '$amount', '$prev')";
        
        if(insertData($sql))
        {
          include('../php/success.php');
        }
        else
        {
          include('../php/danger_input.php');
        }
      }
      else
      {
       echo 'Problem with file Upload';
      }

    }



  ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST' enctype="multipart/form-data">
        
        <div class="row">

            <div class="form-group">
              <div class="col-sm-1 col-sm-offset-1">
                <label for="name">
                  Item Name:
                </label>

              </div>

              <div>
                <div class="col-sm-3">

                  <input type="text" name="name" required="true" class="form-control">
                  
                </div>
              </div>

              <div class="col-sm-1 col-sm-offset-1">
                <label for="count">
                  Amount:
                </label>

              </div>

              <div>
                <div class="col-sm-3">

                  <input type="number" name="count" required="true" class="form-control">
                  
                </div>
              </div>

            </div>
          
        </div>

        <div class="row">

            <div class="form-group">
              <div class="col-sm-1 col-sm-offset-1">
                <label for="prev">
                  Previous Price:
                </label>

              </div>

              <div>
                <div class="col-sm-3">

                  <input type="number" name="prev" required="true" class="form-control">
                  
                </div>
              </div>

              <div class="col-sm-1 col-sm-offset-1">
                <label for="price">
                  Selling Price:
                </label>

              </div>

              <div>
                <div class="col-sm-3">

                  <input type="number" name="price" required="true" class="form-control">
                  
                </div>
              </div>

            </div>
          
        </div>

        <div class="row">

            <div class="form-group">
              <div class="col-sm-1 col-sm-offset-1">
                <label for="cat">
                  Category:
                </label>

              </div>

              <div>
                <div class="col-sm-3">
                  <select name="cat" class="form-control">
                    <option value='1'>Male</option>
                    <option value='2'>Female</option>
                    <option value='3'>Child</option>
                    
                  </select>
                </div>
              </div>

              <div class="col-sm-1 col-sm-offset-1">
                <label for="img">
                  Add Image:
                </label>

              </div>

              <div>
                <div class="col-sm-3">

                  <input type="file" name="img" required="true" class="form-control">
                  
                </div>
              </div>

            </div>
          
        </div>


        <div class="row">

            <div class="form-group">
              <div class="col-sm-1 col-sm-offset-1">
                <label for="desc">
                  Description:
                </label>

              </div>

              <div>
                <div class="col-sm-8">

                  <textarea name="desc" rows="2" class="form-control">
                  </textarea>
                </div>
              </div>

            </div>
          
        </div>

        <div class="row">

            <div class="form-group">

              <div class="col-sm-6 col-sm-offset-3">
                  <button type="submit" name='submit' value='submit' class="btn btn-success btn-block">Add Item</button>
                    
                  </select>
              </div>
            </div>
          
        </div>
    </form>

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
