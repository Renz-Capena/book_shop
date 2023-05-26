<!-- Header-->
 <header id="main-header">
    <!-- <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Say It With Flowers</h1>
            <p class="lead fw-normal text-white-50 mb-0">Order Now!</p>
        </div>
    </div> -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item position-relative active">
      <img class="d-block w-100" src="./assets/images/slider1.jpg" alt="First slide">
      <div class="carousel-caption position-absolute d-md-block" style="top: 20%">
        <h1 style="color: #e72463; font-size: 5vw; font-family: 'Great Vibes'">Caption Title</h1>
        <p style="font-size: 2vw">Description</p>
      </div>
    </div>
    <div class="carousel-item position-relative">
      <img class="d-block w-100" src="./assets/images/slider2.jpg" alt="Second slide">
      <div class="position-absolute d-md-block" style="top: 20%; left: 12%">
        <h1 style="color: #e72463; font-size: 5vw; font-family: 'Great Vibes'">Caption Title</h1>
        <p style="font-size: 2vw">Description</p>
      </div>
    </div>
    <div class="carousel-item position-relative">
      <img class="d-block w-100" src="./assets/images/slider3.jpg" alt="Third slide">
      <div class="carousel-caption position-absolute d-md-block" style="top: 20%">
        <h1 style="color: #e72463; font-size: 5vw; font-family: 'Great Vibes'">Caption Title</h1>
        <p style="font-size: 2vw">Description</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</header>
<!-- Section-->
<style>
    .book-cover{
        object-fit:contain !important;
        height:auto !important;
    }
</style>
<section class="py-3">
    <div class="container px-4 px-lg-5 mt-5" >
      <h2 class="mb-4 fw-normal text-center py-lg-4 my-lg-5" style="letter-spacing: 2px; font-size: 3vw; color: red; border-bottom: 1px solid ; font-family: 'Great Vibes'">Featured Products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php 
                $products = $conn->query("SELECT * FROM `products` where status = 1 order by rand() limit 8 ");
                while($row = $products->fetch_assoc()):
                    $upload_path = base_app.'/uploads/product_'.$row['id'];
                    $img = "";
                    if(is_dir($upload_path)){
                        $fileO = scandir($upload_path);
                        if(isset($fileO[2]))
                            $img = "uploads/product_".$row['id']."/".$fileO[2];
                        // var_dump($fileO);
                    }
                    foreach($row as $k=> $v){
                        $row[$k] = trim(stripslashes($v));
                    }
                    $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$row['id']);
                    $inv = array();
                    while($ir = $inventory->fetch_assoc()){
                        $inv[] = number_format($ir['price']);
                    }
            ?>
            <div class="col mb-5">
                <div class="card product-item" style=" min-height: 434px; box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                    <!-- Product image-->
                    <img class="card-img-top w-100 book-cover" src="<?php echo validate_image($img) ?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $row['title'] ?></h5>
                            <!-- Product price-->
                            <?php foreach($inv as $k=> $v): ?>
                                <span><b>Price: </b><?php echo $v ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-flat px-5 btn-success "   href=".?p=view_product&id=<?php echo md5($row['id']) ?>">View</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>


<!-- <section class="features3 cid-r7uUPVvk6E" id="features3-7">
    
    <div class="container">
        <h2 class="mbr-section-title align-center mbr-fonts-style display-2">
            What We Can Offer
        </h2>
        
        <div class="row justify-content-center pt-3">
            <div class="card p-3 col-12 col-md-6 col-xl-4 col-lg-4">
                <div class="card-wrap">
                    <div class="card-img pb-4 align-center">
                        <span class="mbr-iconfont mbri-hearth"></span>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style align-center display-5">
                            Flowers</h4>
                        <p class="mbr-text mbr-fonts-style align-center display-7">
                            We will attach a card with the text that you specified when placing the order.</p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-xl-4 col-lg-4">
                <div class="card-wrap">
                    <div class="card-img pb-4 align-center">
                        <span class="mbr-iconfont mbri-photo"></span>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style align-center display-5">
                            Postcards</h4>
                        <p class="mbr-text mbr-fonts-style align-center display-7">
                           You can order flowers delivery all over the world from us.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-xl-4 col-lg-4">
                <div class="card-wrap">
                    <div class="card-img pb-4 align-center">
                        <span class="mbr-iconfont mbri-smile-face"></span>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style align-center display-5">
                            Balloons</h4>
                        <p class="mbr-text mbr-fonts-style align-center display-7">
                           Sweet additions. Here you can buy fresh and tasty gifts for loved ones.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-xl-4 col-lg-4">
                <div class="card-wrap">
                    <div class="card-img pb-4 align-center">
                        <span class="mbr-iconfont mbri-star"></span>
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style align-center display-5">
                            Wrapping</h4>
                        <p class="mbr-text mbr-fonts-style align-center display-7">
                            Huge selection of roses, chrysanthemums, lilies, and other fresh flowers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
