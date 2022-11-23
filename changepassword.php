<?php
include('connection/connection.php');
session_start();

$id = $_SESSION['user_id'];
if(isset($_POST) && !empty($_POST)){
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit();
// if(isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
//         $pass = $_POST['pass'];
//         $confirm_pass = $_POST['confirm_password'];
//         if($pass != $confirm_pass){
//             echo '<script>';
//             echo 'alert("รหัสไม่ตรงกับยืนยันรหัสผ่าน");';
//             echo 'window.location.href = "register.php"';
//             echo '</script>';
//         exit();
//         }
//         $pass = md5($pass);
//     }else{
//         echo '<script>';
//             echo 'alert("กรุณากรอกรหัสผ่าน");';
//             echo 'window.location.href = "register.php"';
//             echo '</script>';
//         exit();
//     }

    $old_pass = md5($_POST['old_pass']);

    $sql = sprintf("SELECT * FROM tb_user WHERE pass = '%s' AND id = '%s'",$old_pass,$id);
    $query = mysqli_query($connection,$sql);
    $row = mysqli_num_rows($query);
    if($row == 0){
        echo '<script>';
        echo 'alert("รหัสผ่านเก่าไม่ถูกต้อง กรุณากรอกอีกครั้ง!!");';
        echo 'window.location.href = "changepassword.php"';
        echo '</script>';
        exit();
    }

    if(isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
        $pass = $_POST['pass'];
        $confirm_pass = $_POST['confirm_password'];
        if($pass != $confirm_pass){
            echo '<script>';
            echo 'alert("รหัสผ่านไม่ตรงกับยืนยันรหัสผ่าน");';
            echo 'window.location.href = "changepassword.php"';
            echo '</script>';
        exit();
        }
        $pass = md5($pass);
    }

    $sql = sprintf("UPDATE tb_user SET pass = '%s' WHERE id = '$id'",$pass,$id);
    // echo $sql;
    // exit();
    $query = mysqli_query($connection,$sql);
    if($query){
        echo '<script>';
        echo 'alert("เปลี่ยนแปลงรหัสผ่านสำเร็จ");';
        echo 'window.location.href = "profile.php"';
        echo '</script>';
        exit();
    }else{
        echo '<script>';
        echo 'alert("เปลี่ยนแปลงรหัสผ่านไม่สำเร็จ");';
        echo 'window.location.href = "profile.php"';
        echo '</script>';
        exit();
    }
    // echo $sql;
    // exit();
}
// print_r($_SESSION);
// exit();

$sql = sprintf("SELECT * FROM tb_user WHERE id = '%s'",$id);
// echo $sql;
// exit();
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
    <h1 class="mt-4 mb-5 pt-5 pb-4 text-center bg-secondary bg-gradient text-white">เปลี่ยนแปลงรหัสผ่าน</h1>
    <div class="container mb-5">
        <div class="row">
        <div class="col-6 offset-3">

        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">รหัสผ่านเก่า<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="old_pass" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label class="form-label">รหัสผ่านใหม่<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="pass" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ยืนยันรหัสผ่านใหม่<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="confirm_password" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary">ยืนยัน</button>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>