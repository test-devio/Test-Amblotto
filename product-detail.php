<?php
include('connection/connection.php');
session_start();
// Query Product
$sql = "SELECT *,tb_product.id,tb_product.title,tb_type_product.title AS type_title FROM tb_product 
        LEFT JOIN tb_type_product ON tb_product.type_product_id = tb_type_product.id";

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    
    // เก็บจำนวนการเข้าชม
    $sql_view = "UPDATE tb_product SET view = view+1 WHERE id = '$id'";
    $query_view = mysqli_query($connection,$sql_view);

    // เรียกข้อมูลสินค้าจาก id ที่ส่งมา ที่ไม่ใช่ id ที่ส่งมา
    $sql_product = $sql. " WHERE tb_product.id != '$id' ORDER BY tb_product.id DESC LIMIT 3";
    $query_product = mysqli_query($connection,$sql_product);

    // เรียกข้อมูลสินค้าจาก id ที่ส่งมา
    $sql .= " WHERE tb_product.id = '$id'"; 
}
$query = mysqli_query($connection,$sql);
$result = mysqli_fetch_assoc($query);
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
    <h1 class="mt-4 mb-5 pt-5 pb-4 text-center bg-secondary bg-gradient text-white">รายละเอียดสินค้า</h1>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 px-5 pb-5 mt-4 text-center">
                <img src="admin/upload/product/<?=$result['image']?>" id="preview" class="border img-fluid" width="100%">


                <?php
                $sql = "SELECT * FROM tb_product_gallery WHERE id_product = '$id'";
                $query = mysqli_query($connection,$sql);
                ?>
                <div class="d-flex overflow-auto mt-2">
                    <div class="col-3 me-2">
                        <img src="admin/upload/product/<?=$result['image']?>" class="border img-fluid" width="100%" onclick="preview(this.src)" style="cursor: all-scroll;">
                    </div>
                <?php foreach($query as $key => $value):?>
                    <div class="col-3 me-2">
                        <img src="admin/upload/product/<?=$value['image']?>" class="border img-fluid" width="100%" onclick="preview(this.src)" style="cursor: all-scroll;">
                    </div>
                <?php endforeach;?>
                </div>


            </div>
            
    <div class="col-12 col-lg-6 mt-4 ">
        <h3><p><?=$result['title']?> (<?=$result['type_title']?>)</p></h3>
        <p>ราคา <?=number_format($result['price'])?> บาท</p>
        <p class="text-break">รายละเอียด<br><?=$result['detail']?></p>
        </div>
        </div>
        <div class="row">
        <h2 class="mb-4 mt-5 text-center">รายสินค้าอื่นๆ</h2>
        <?php foreach($query_product as $data):?>
        <div class="col-12 col-md-6 col-lg-4 p-4 text-center">
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

    <script type="text/javascript">
        function preview(src){
            // console.log(src);
        document.getElementById('preview').src = src;
        }
    </script>
  </body>
</html>