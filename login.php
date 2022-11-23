<?php
session_start();
include('connection/connection.php');
if(isset($_POST) && !empty($_POST)){
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit();
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $sql = sprintf("SELECT * FROM tb_user WHERE user = '%s' AND pass = '%s' AND status = 0",$user,$pass);
    // echo $sql;
    // exit();
    $query = mysqli_query($connection,$sql);
    $row = mysqli_num_rows($query);
    // echo $row;
    // exit();
    if($row > 0){
        $result = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $result['id'];
        $message = 'เข้าสู่ระบบสำเร็จ';
        echo '<script>';
        echo 'alert("'.$message.'");';
        echo 'window.location.href = "index.php"';
        echo '</script>';
    }else{
        $message = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
        echo '<script>';
        echo 'alert("'.$message.'");';
        echo 'window.location.href = "login.php"';
        echo '</script>';
    }
}
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
    <h1 class="mt-4 mb-5 pt-5 pb-4 text-center bg-secondary bg-gradient text-white">เข้าสู่ระบบ</h1>
    <div class="container mb-5">
        <div class="row">
        <div class="col-6 offset-3">

        <form action="" method="post">

            <div class="form-group mb-3">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" name="user">
                <div class="form-text">กรุณากรอกชื่อผู้ใช้</div>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" name="pass">
                <div class="form-text">กรุณากรอกรหัวผ่าน</div>
            </div>
            <!-- <p><?php //(isset($message) && !empty($message) ? $message : '' )?></p> -->
            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>

        </form>
        <!-- <p><iframe src="https://xobot.ibetauto.com/xobot/slotxo/register" width="100%" height="940"></iframe></p> -->
        </div>
        </div>
    </div>
    <!-- <div class="container mb-4">
        <div class="row">
        <div class="col-12">
            <p><iframe src="https://xobot.ibetauto.com/xobot/slotxo/register" width="100%" height="940"></iframe></p>
        </div>
        </div>
    </div> -->

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