<?php
include('connection/connection.php');
session_start();
// Query Product
$id = 1;
$sql = "SELECT * FROM tb_about WHERE id = '$id'";
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
    <h1 class="mt-4 mb-5 pt-5 pb-4 text-center bg-secondary bg-gradient text-white">ติดต่อ</h1>
    <div class="container mb-4">
        <div class="row">
        <div class="col-12">
            <h2 class="text-decoration-underline"><p>ข้อมูลติดต่อ</p></h2>
            <p class="fs-6">ชื่อ : <?=$result['name']?></p>
            <p class="fs-6">ที่อยู่ : <?=$result['address']?></p>
            <p class="fs-6">Email : <?=$result['email']?></p>
            <p class="fs-6">เบอร์ติดต่อ : <?=$result['phone']?></p>
            <p><iframe src="https://line.me/R/ti/p/%40535mdzwl" width="100%" height="940"></iframe></p>
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