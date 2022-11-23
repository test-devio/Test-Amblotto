<?php
include('connection/connection.php');
session_start();
// Query Type Product
$sql = "SELECT * FROM tb_type_product";
$query_type_product = mysqli_query($connection,$sql);

// Query Product
$sql = "SELECT *,tb_product.id,tb_product.title,tb_type_product.title AS type_title FROM tb_product LEFT JOIN tb_type_product ON tb_product.type_product_id = tb_type_product.id";
$query_product = mysqli_query($connection,$sql);

// สินค้าแนะนำ
$sql .= " ORDER BY view DESC LIMIT 3";
$query_recommend = mysqli_query($connection,$sql);
?>
<!doctype html>
<html lang="en">
    <?php include('includes/head.php')?>
  <body>
    <!-- navbar -->
    <?php include('includes/navbar.php')?>

    <!-- slide banner -->
    <?php include('includes/slide-banner.php')?>

    <!-- content -->
    <div class="bg-secondary bg-gradient">
    <div class="container text-center">
        <h1 class="py-5 text-white">สินค้าแนะนำ</h1>
        <div class="row">
        <?php foreach($query_recommend as $data):?>
            <div class="col-12 col-lg-4 px-5 pb-4">
                    <div class="card p-5">
                        <img src="imgs/Progress_Dark.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="crad-title"><?=$data['title']?></h5>
                            <p class="card-text">ราคา : <?=number_format($data['price'])?></p>
                            <a href="product-detail.php?id=<?=$data['id']?>" class="btn btn-danger">ดูรายละเอียดสินค้า</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
    </div>
    </div>
    <div class="container my-5 mt-5 pt-5 text-center">
        <h1>รายการสินค้า</h1>
        <ul class="nav mx-auto justify-content-center my-3">
            <?php foreach($query_type_product as $data):?>
            <li class="nav-item mx-1">
                <a class="text-muted" href="product.php?type_product_id=<?=$data['id']?>"><h5><?=$data['title']?></h5></a>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="row">
        <?php foreach($query_product as $data):?>
            <div class="col-12 col-lg-4 p-5">
                    <div class="card p-5">
                        <img src="imgs/Progress_Dark.png" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="crad-title"><?=$data['title']?></h5>
                            <p class="card-text mb-1">ประเภท : <?=$data['type_title']?></p>
                            <p class="card-text">ราคา : <?=number_format($data['price'])?></p>
                            <a href="product-detail.php?id=<?=$data['id']?>" class="btn btn-danger">ดูรายละเอียดสินค้า</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <div class="col-12 text-center">
                    <a href="product.php" class="text-muted"><h6>ดูสินค้าเพิ่มเติม</h6></a>
                </div>
            </div>
        </div>

    <!-- footer -->
    <?php include('includes/footer.php')?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>