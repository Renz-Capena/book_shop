<?php 
$title = "All flower Categories";
$sub_title = "";
if(isset($_GET['c']) && isset($_GET['s'])){
    $cat_qry = $conn->query("SELECT * FROM categories where md5(id) = '{$_GET['c']}'");
    if($cat_qry->num_rows > 0){
        $title = $cat_qry->fetch_assoc()['category'];
    }
 $sub_cat_qry = $conn->query("SELECT * FROM sub_categories where md5(id) = '{$_GET['s']}'");
    if($sub_cat_qry->num_rows > 0){
        $sub_title = $sub_cat_qry->fetch_assoc()['sub_category'];
    }
}
elseif(isset($_GET['c'])){
    $cat_qry = $conn->query("SELECT * FROM categories where md5(id) = '{$_GET['c']}'");
    if($cat_qry->num_rows > 0){
        $title = $cat_qry->fetch_assoc()['category'];
    }
}
elseif(isset($_GET['s'])){
    $sub_cat_qry = $conn->query("SELECT * FROM sub_categories where md5(id) = '{$_GET['s']}'");
    if($sub_cat_qry->num_rows > 0){
        $title = $sub_cat_qry->fetch_assoc()['sub_category'];
    }
}
?>
<style>
    .category-card-4 {
    max-width: 300px;
    background-color: #FFF;
    border-radius: 5px;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    margin: 10px auto;
    cursor: pointer;
}

.category-card-4 img {
    transition: all 0.25s linear;
    /* height: 100%; */
    width: 100%;
    object-fit: cover;
}

.category-card-4 .category-content {
    position: relative;
    padding: 15px;
    background-color: #FFF;
}

.category-card-4 .category-name {
    font-weight: bold;
    position: absolute;
    left: 0px;
    right: 0px;
    top: -70px;
    color: #FFF;
    font-size: 19px;
}

.category-card-4 .category-name p {
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 1.5px;
}

.category-card-4 .category-description {
    color: #777;
    font-size: 14px;
    padding: 10px;
}

.category-card-4 .category-overview {
    padding: 15px 0px;
}

.category-card-4 .category-overview p {
    font-size: 10px;
    font-weight: 600;
    color: #777;
}

.category-card-4 .category-overview h4 {
    color: #273751;
    font-weight: bold;
}

.category-card-4 .category-content::before {
    content: "";
    position: absolute;
    height: 20px;
    top: -10px;
    left: 0px;
    right: 0px;
    background-color: #FFF;
    z-index: 0;
    transform: skewY(3deg);
}

.category-card-4:hover img {
    transform: rotate(5deg) scale(1.1, 1.1);
    filter: brightness(110%);
}

</style>
<!-- Header-->
<header style="background: url(./assets/images/breadcrumb.webp); background-size: cover;" id="main-header">
    <div class="container px-4 px-lg-5 py-5">
        <div class="text-center" style="color: #FB607F">
            <h1 class="display-4 fw-bolder" style="font-size: 80px; letter-spacing: 3px; font-family: 'Great Vibes'"><?php echo $title ?></h1>
            <p class="lead fw-normal mb-0" style="color: #FB607F; font-size: 30px;"><?php echo $sub_title ?></p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5 d-lg-flex flex-direction-column justify-content-center gap-4">
    <div class="">
        <div class="">
            <?php 
                $whereData = "";
                $categories = $conn->query("SELECT * FROM `categories` where status = 1 order by category asc ");
                while($row = $categories->fetch_assoc()):
                    foreach($row as $k=> $v){
                        $row[$k] = trim(stripslashes($v));
                    }
                    $row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
            ?>
            <div class="">
                <a href="./?p=products&c=<?php echo md5($row['id']) ?>" class="">
                    <!-- <div class="card-body p-4">
                        <div class="">
                            Product name
                            <h5 class="fw-bolder border-bottom border-primary"><?php echo $row['category'] ?></h5>
                        </div>
                        <p class="m-0 truncate"><?php echo $row['description'] ?></p>
                    </div> -->
                    <div class="" >
                        <div class="category-card-4 text-center"><img src="https://cdn.pixabay.com/photo/2016/08/03/14/24/roses-1566792_1280.jpg" class="img img-responsive">
                            <div class="category-content card-body">
                                <div class="category-name"><?php echo $row['category'] ?></div>
                                <div class="category-description"><?php echo $row['description'] ?></div></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>