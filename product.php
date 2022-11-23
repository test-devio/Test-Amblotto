<?php
include('connection/connection.php');
session_start();
// Query Type Product
$sql = "SELECT * FROM tb_type_product";
$query_type_product = mysqli_query($connection,$sql);


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1; // เลขหน้าที่จะแสดง
}

$record_show = 1; // จำนวนข้อมูลที่จะแสดง
$offset = ($page - 1) * $record_show; // เลขเริ่มต้น

// Query Total Product
$sql_total = "SELECT * FROM tb_product";
$query_total = mysqli_query($connection,$sql_total);
$row_total = mysqli_num_rows($query_total);

$page_total = ceil($row_total/$record_show); // จำนวนหน้าทั้งหมด

// Query Product // เรียกค้นหาแบบตัวอักษร
$sql = "SELECT *,tb_product.id,tb_product.title,tb_type_product.title AS type_title FROM tb_product LEFT JOIN tb_type_product ON tb_product.type_product_id = tb_type_product.id";
if(isset($_GET['type_product_id']) && !empty($_GET['type_product_id'])){
    $sql .= " WHERE tb_product.type_product_id ='".$_GET['type_product_id']."'";
}
if(isset($_GET['search']) && !empty($_GET['search'])){
    $sql .= " WHERE tb_product.title LIKE '%".$_GET['search']."%'";
}
$sql .= " LIMIT $offset,$record_show";

// echo $sql;
// exit('')
$query_product = mysqli_query($connection,$sql);
?>
<!doctype html>
<html lang="en">
    <?php include('includes/head.php')?>
  <body>
    <!-- navbar -->
    <?php include('includes/navbar.php')?>

    <!-- slide banner -->
    <!-- <?php include('includes/slide-banner.php')?> -->

    <!-- content -->
    <h1 class="mt-4 mb-5 pt-5 pb-4 text-center bg-secondary bg-gradient text-white">รายการสินค้า</h1>
    <div class="container">
    <!-- Search  -->
    <div class="d-flex">
        <div class="mx-auto"></div>
        <div class="col-md-3 justify-content-end px-3">
            <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="ค้นหาสินค้า" value="<?=(isset($_GET['search']) ? $_GET['search'] : '')?>">
            <button class="btn btn-outline-secondary" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
            </div>  
            </form>
        </div>
    </div>

    <!-- Product -->
        <div class="row">
            <div class="col-3">
                <ul class="list-group mt-4 mb-4">
                    <li class="list-group-item bg-dark text-white p-3">ประเภทสินค้า</li>
                    <a href="product.php" class="list-group-item text-dark list-menu-custom <?= !isset($_GET['type_product_id']) ? 'active-list-menu-custom' : '' ?> ">ทั้งหมด</a>
                    <?php foreach($query_type_product as $data):?>
                    <a href="?type_product_id=<?=$data['id']?>" class="list-group-item text-dark list-menu-custom 
                    <?=isset($_GET['type_product_id']) && $_GET['type_product_id'] == $data['id'] ? 'active-list-menu-custom' : '' ?>"><?=$data['title']?></a>
                    <?php endforeach;?>
                </ul>
            </div>
    <div class="col-9">
        <div class="row">
            <?php if(mysqli_num_rows($query_product)):?>
                <?php foreach($query_product as $data):?>
                    <div class="col-12 col-lg-4 p-4 text-center">
                            <div class="card p-5">
                                <img src="imgs/Progress_Dark.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="crad-title"><?=$data['title']?></h5>
                                    <p class="card-text mb-1">ประเภท : <?=$data['type_title']?></p>
                                    <p class="card-text">ราคา : <?=number_format($data['price'])?> บาท</p>
                                    <a href="product-detail.php?id=<?=$data['id']?>" class="btn btn-danger">ดูรายละเอียดสินค้า</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                <a class="page-link" href="?page=1" tabindex="-1" aria-disabled="true">First</a>
                                </li>
                                <li class="page-item <?=$page > 1 ? '' : 'disabled' ?>">
                                    <a class="page-link" href="?page=<?=$page-1?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for($i=1; $i <= $page_total; $i++):?>
                                    <?php if($page <= 2):?>
                                        <?php if($i <= 5):?>
                                            <li class="page-item <?=$page == $i ? 'active' : '' ?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                                        <?php endif;?>
                                        <?php elseif($page > 2):?>
                                            <?php if($i <= $page+2 && $i >= $page-2):?>
                                                <li class="page-item <?=$page == $i ? 'active' : '' ?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                                                <?php endif;?>
                                    <?php endif;?>

                                <?php endfor;?>
                                <li class="page-item <?=$page < $page_total ? '' : 'disabled'?>">
                                    <a class="page-link" href="?page=<?=$page+1?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="?page=<?=$page_total?>">Last</a>
                                </li>
                            </ul>
                            </nav>
                        <?php else:?>
                             <div class="col-12 p-4 text-center">
                            <div class="card p-5">
                                <h3>ไม่พบสินค้า</h3>
                        </div>
                        </div>
                    <?php endif;?>
                </div>
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