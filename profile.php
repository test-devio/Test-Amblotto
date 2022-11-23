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

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = sprintf("UPDATE tb_user SET firstname = '%s', lastname = '%s', gender = '%s', birthday = '%s', age = '%s', address = '%s', email = '%s', phone = '%s' WHERE id = '$id'",$firstname, $lastname, $gender, $birthday, $age, $address, $email, $phone, $id);
    // echo $sql;
    // exit();
    $query = mysqli_query($connection,$sql);
    if($query){
        echo '<script>';
        echo 'alert("แก้ไขข้อมูลสำเร็จ");';
        echo 'window.location.href = "profile.php"';
        echo '</script>';
        exit();
    }else{
        echo '<script>';
        echo 'alert("แก้ไขข้อมูลไม่สำเร็จ");';
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
    <h1 class="mt-4 mb-5 pt-5 pb-4 text-center bg-secondary bg-gradient text-white">ข้อมูลส่วนตัว</h1>
    <div class="container mb-5">
        <div class="row">
        <div class="col-6 offset-3">

        <form action="" method="post">

            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="form-label">ชื่อ<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="firstname" autocomplete="off" value="<?=$result['firstname']?>" required>
                        <div class="form-text">กรุณากรอกชื่อ</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">นามสกุล<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lastname" autocomplete="off" value="<?=$result['lastname']?>" required>
                        <div class="form-text">กรุณากรอกนามสกุล</div>
                    </div>
                </div>   
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="form-label">เพศ<span class="text-danger">*</span></label>
                        <select class="form-control" name="gender" value="<?=$result['gender']?>" required>
                            <option value="" disabled>เลือกเพศ</option>
                            <option value="male" <?=$result['gender'] == 'male' ? 'selected' : ''?>>ชาย</option>
                            <option value="female" <?=$result['gender'] == 'female' ? 'selected' : ''?>>หญิง</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">เดือน/วัน/ปีเกิด<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="birthday" autocomplete="off" value="<?=$result['birthday']?>" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label">อายุ<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="age" autocomplete="off" maxlength="3" oninput="javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0,this.maxLength)" value="<?=$result['age']?>" required>
                    </div>
                </div>   
            </div>
            <div class="mb-3">
                <label class="form-label">ที่อยู่<span class="text-danger">*</span></label>
                <textarea class="form-control" rows="3" name="address" required><?=$result['address']?></textarea>
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="form-label">อีเมล์<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" autocomplete="off" value="<?=$result['email']?>" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">เบอร์ติดต่อ<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone" autocomplete="off" maxlength="10" oninput="javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0,this.maxLength)" value="<?=$result['phone']?>" required>
                    </div>
                </div>   
            </div>
            <div class="mb-3">
                <label class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" name="user" autocomplete="off" value="<?=$result['user']?>" disabled>
            </div>
            <!-- <div class="mb-3">
                <label class="form-label">รหัสผ่าน<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="pass" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ยืนยันรหัสผ่าน<span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="confirm_password" autocomplete="off" required>
            </div> -->
            <button type="submit" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button>

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