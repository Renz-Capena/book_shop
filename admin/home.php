<h1>Welcome to <?php echo $_settings->info('name') ?></h1>
<hr>
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-book-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Products
                <span class="info-box-number">
                  <?php 
                    $inv = $conn->query("SELECT sum(quantity) as total FROM inventory ")->fetch_assoc()['total'];
                    $sales = $conn->query("SELECT sum(quantity) as total FROM order_list where order_id in (SELECT order_id FROM sales) ")->fetch_assoc()['total'];
                    echo number_format($inv - $sales);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-th-list"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Orders</span>
                <span class="info-box-number">
                  <?php 
                    $pending = $conn->query("SELECT sum(id) as total FROM `orders` where status = '0' ")->fetch_assoc()['total'];
                    echo number_format($pending);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Sales</span>
                <span class="info-box-number">
                <?php 
                    $sales = $conn->query("SELECT sum(amount) as total FROM `orders` where status = '0' ")->fetch_assoc()['total'];
                    echo number_format($sales);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>

      <canvas id="myChart"></canvas>

<div class="container">
  <?php 
    $files = array();
    $products = $conn->query("SELECT * FROM `products` order by rand() ");
    while($row = $products->fetch_assoc()){
      if(!is_dir(base_app.'uploads/product_'.$row['id']))
      continue;
      $fopen = scandir(base_app.'uploads/product_'.$row['id']);
      foreach($fopen as $fname){
        if(in_array($fname,array('.','..')))
          continue;
        $files[]= validate_image('uploads/product_'.$row['id'].'/'.$fname);
      }
    }
  ?>
  <!-- <div id="tourCarousel"  class="carousel slide" data-ride="carousel" data-interval="3000">
      <div class="carousel-inner h-100">
          <?php foreach($files as $k => $img): ?>
          <div class="carousel-item  h-100 <?php echo $k == 0? 'active': '' ?>">
              <img class="d-block w-100  h-100" style="object-fit:contain" src="<?php echo $img ?>" alt="">
          </div>
          <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div> -->

<!-- ============================================================================ -->


  <!-- New -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>



  <?php

      $sql = "SELECT c.category, SUM(ol.quantity) AS total_quantity
          FROM categories c
          INNER JOIN products p ON c.id = p.category_id
          LEFT JOIN (
              SELECT product_id, SUM(quantity) AS quantity
              FROM order_list
              GROUP BY product_id
          ) ol ON p.id = ol.product_id
          GROUP BY c.category";

      // Execute the query
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Output the results
        while ($row = $result->fetch_assoc()) {
            echo "<input type='hidden' id='category' value=".$row["category"].">";

            echo "<input type='hidden' id='quantity' value=".$row["total_quantity"]."><br><br>";
        }
      }

  ?>


  <script>

  const category = [];
  const categoryTemp = document.querySelectorAll("#category");
  categoryTemp.forEach(e => category.push(e.value))

  const quantity = [];
  const quantityTemp = document.querySelectorAll("#quantity");
  quantityTemp.forEach(e => quantity.push(e.value))

  const barColors = Array(category.length).fill("#34a2d1");


  new Chart("myChart", {
    type: "bar",
    data: {
      labels: category,
      datasets: [{
        backgroundColor: barColors,
        data: quantity,
      }]
    },
    options: {
      legend: {display: false},
      title: {
        display: true,
        text: "Sales report",
        fontColor: "white"
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }],
        xAxes: [{
          ticks: {
            fontColor: "white" // Set the font color of the labels to white
          }
        }]
      }

    }
  });


  </script>




</div>
