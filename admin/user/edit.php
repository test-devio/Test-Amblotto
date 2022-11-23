<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_user WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $result = mysqli_fetch_assoc($query);
}
    // print_r($_POST);
    if(isset($_POST) && !empty($_POST)){
    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // echo '</pre';
    // exit();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $oldimage = $_POST['oldimage'];
    // if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
    //     $extension = array("jpeg","jpg","png");
    //     $target = 'upload/admin/';
    //     $filename = $_FILES['image']['name'];
    //     $filetmp = $_FILES['image']['tmp_name'];
    //     $ext = pathinfo($filename,PATHINFO_EXTENSION);
    //     if(in_array($ext,$extension)){
    //         if(!file_exists($target.$filename)) {
    //             if(move_uploaded_file($filetmp,$target.$filename)){
    //                 $filename = $filename;
    //             }else{
    //                 $alert = '<script type="text/javascript">';
    //                 $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
    //                 $alert .= 'window.location.href = "?page=admin&function=update&id='.$id.'";';
    //                 $alert .= '</script>';
    //                 echo $alert;
    //                 exit();
    //             }
    //         }else{
    //             $newfilename = time().$filename;
    //             if(move_uploaded_file($filetmp,$target.$newfilename)){
    //                 $filename = $newfilename;
    //             }else{
    //                 $alert = '<script type="text/javascript">';
    //                 $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
    //                 $alert .= 'window.location.href = "?page=admin&function=update&id='.$id.'";';
    //                 $alert .= '</script>';
    //                 echo $alert;
    //                 exit();
    //             }
    //         }
    //     }else{
    //         $alert = '<script type="text/javascript">';
    //         $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
    //         $alert .= 'window.location.href = "?page=admin&function=update&id='.$id.'";';
    //         $alert .= '</script>';
    //         echo $alert;
    //         exit();
    //     }
    // }else{
    //     $filename = $oldimage;
    // }
    //echo $filename;
    //exit();
    $sql = "UPDATE tb_user SET firstname = '$firstname',lastname = '$lastname',gender = '$gender',birthday = '$birthday',age = '$age',address = '$address',email = 
    '$email',phone = '$phone' WHERE id = '$id'";
    // echo $sql;
    // exit();
    if(mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ");';
        $alert .= 'window.location.href = "?page=user";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);


}

?>

<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
    <h1 class="app-page-title mb-0">แก้ไขข้อมูลผู้ดูแลระบบ</h1>
    </div>
    <div class="col-auto">
        <a href="?page=<?=$_GET['page']?>" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>
</div>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
            
                    <form action="" method="post" enctype="multipart/form-data">
                    <!-- <div class="mb-3">
                            <label class="form-label">รูปภาพ</label>
                            <div class="mb-3">
                            <img id="preview" src="upload/admin/<?=$result['image']?>" class="rounded" width="100" height="100">
                            </div>
                            <button onclick="return triggerFile();" class="btn btn-success text-white">เลือกรูปภาพ</button>
                            <input type="file" name="image" id="image" style="display:none;">
                            <input type="hidden" name="oldimage" value="<?=$result['image']?>">
                            </div> -->
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" name="user" placeholder="ชื่อผู้ใช้ : admin" 
                            value="<?=$result['user']?>" autocomplete="off" required disabled>
                        </div>
                        <hr class="mb-3 mt-4">
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" name="firstname" placeholder="ชื่อ" 
                            value="<?=$result['firstname']?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="lastname" placeholder="นามสกุล" 
                            value="<?=$result['lastname']?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">เพศ</label>
                            <select name="gender" class="form-control" style="height: unset !important;">
                                <option value="" disabled>เลือกเพศ</option>
                                <option value="male" <?=$result['gender'] == 'male' ? 'selected' : '' ?>>ชาย</option>
                                <option value="female" <?=$result['gender'] == 'female' ? 'selected' : '' ?>>หญิง</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">วัน/เดือน/ปีเกิด</label>
                            <input type="date" class="form-control" name="birthday"
                            value="<?=$result['birthday']?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">อายุ</label>
                            <input type="number" class="form-control" name="age"
                            value="<?=$result['age']?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">ที่อยู่</label>
                            <textarea class="form-control" name="address" autocomplete="off" rows="3" required><?=$result['address']?></textarea>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="อีเมล์" 
                            value="<?=$result['email']?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">เบอร์ติดต่อ</label>
                            <input type="text" class="form-control" name="phone" placeholder="เบอร์ติดต่อ" 
                            value="<?=$result['phone']?>" autocomplete="off" required>
                        </div> 
                        <button type="submit" class="btn app-btn-primary">บันทึก</button>
                    </form>

                </div><!--//app-card-body-->
                
            </div><!--//app-card-->
        </div>
</div><!--//row-->
<script type="text/javascript">
        function triggerFile(){
            // console.log('test') 
            $("#image").trigger("click");
            return false;
        }
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
    });
    </script>