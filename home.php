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




.wrapper-home{ 
    background-color: #fadadd; 
    background-image: linear-gradient(315deg, #f7c4c8 0%, #fadadd 54%);
    color: darkgreen;
    margin-bottom: 5vw;
}
.about-us{
    display: flex;
    flex-direction: row-reverse;
    padding-block: 30px;
}
.about-us .pic{
    width: 22%;
    padding: 20px 0;
    margin: 0 6% 0 2%;
    position: relative;
    z-index: 1;
}
.about-us .pic:before,
.about-us .pic:after{
    content: "";
    width: 130px;
    height: 150px;
    background: #FF91A4;
    position: absolute;
    z-index: -1;
}
.about-us .pic:before{
    top: 7px;
    right: -12px;
}
.about-us .pic:after{
    bottom: 7px;
    left: -12px;
}
.about-us .pic img{
    width: 100%;
    height: auto;
    border: 3px solid #FB607F;
}
.about-us .about-us-content{
    width: 70%;
    
}
.about-us .title{
    display: block;
    font-size: 38px;
    font-weight: 600;
    margin: 0;
    /* text-transform: uppercase; */
    padding-top: 65px;
    padding-left: 15px;
    font-family: 'Great Vibes';
    letter-spacing: 2px;
    margin-bottom: -10px;
}
.about-us .post{
    display: block;
    font-size: 14px;
    font-weight: 400;
    line-height: 27px;
    text-transform: capitalize;
    margin-bottom: 25px;
    padding-left: 15px;
    opacity: 0.8;
}
.about-us .description{
    font-size: 16px;
    padding: 0 15px;
    margin: 0;
    position: relative;
}
.about-us .description:before,
.about-us .description:after{
    font-size: 17px;
    color: #e1c37d;
    position: relative;
}

@media only screen and (max-width: 990px){
    .about-us .pic{
        width: 200px;
        margin: 0 auto;
    }
    .about-us .pic:before,
    .about-us .pic:after{
        width: 80px;
        height: 100px;
    }
    .about-us .about-us-content{
        width: 100%;
    }
    .about-us .title{
        padding: 15px 0 0 0;
    }
    .about-us .post{
        padding: 0;
        margin-bottom: 10px;
    }
    .about-us .description{
    padding-left: unset;
}
}

@media only screen and (max-width: 990px){
    .about-us{
    flex-direction: column;
    text-align: center;
}
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


<div class="wrapper-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div id="about-us-slider" class="owl-carousel"> -->
                    <div class="about-us">
                        <div class="pic">
                            <img src="./assets/images/roses.jpg" alt="">
                        </div>
                        <div class="about-us-content">
                            <h3 class="title">About us</h3>
                            <span class="post">what we do</span>
                            <p class="description text-dark">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dolor nibh, semper at pretium vitae, tincidunt non risus. Aenean mattis sit amet ex nec venenatis. Pellentesque tempus pellentesque efficitur. Nulla commodo bibendum quam, at imperdiet orci congue non. Maecenas interdum.
                            </p>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>


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
