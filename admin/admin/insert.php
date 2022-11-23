<?php
    // print_r($_POST);
    if(isset($_POST) && !empty($_POST)){
    // print_r($_POST);
    //echo '<pre>';
    //print_r($_FILES);
    //echo '</pre';
    //exit();
    $user = $_POST['user'];
    $pass = sha1(md5($_POST['pass']));
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if(!empty($user)){
        $sql_check = "SELECT * FROM tb_admin WHERE user = '$user'";
        $query_check = mysqli_query($connection,$sql_check);
        $row_check = mysqli_num_rows($query_check);
        if($row_check > 0){
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ชื่อผู้ใช้ซ้ำ กรุณากรอกใหม่อีกครั้ง");';
            $alert .= 'window.location.href = "?page=admin&function=add";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }else{
                if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
                    $extension = array("jpeg","jpg","png");
                    $target = 'upload/admin/';
                    $filename = $_FILES['image']['name'];
                    $filetmp = $_FILES['image']['tmp_name'];
                    $ext = pathinfo($filename,PATHINFO_EXTENSION);
                    if(in_array($ext,$extension)){
                        if(!file_exists($target.$filename)) {
                            if(move_uploaded_file($filetmp,$target.$filename)){
                                $filename = $filename;
                            }else{
                                $alert = '<script type="text/javascript">';
                                $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
                                $alert .= 'window.location.href = "?page=admin&function=add";';
                                $alert .= '</script>';
                                echo $alert;
                                exit();
                            }
                        }else{
                            $newfilename = time().$filename;
                            if(move_uploaded_file($filetmp,$target.$newfilename)){
                                $filename = $newfilename;
                            }else{
                                $alert = '<script type="text/javascript">';
                                $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
                                $alert .= 'window.location.href = "?page=admin&function=add";';
                                $alert .= '</script>';
                                echo $alert;
                                exit();
                            }
                        }
                    }else{
                        $alert = '<script type="text/javascript">';
                        $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
                        $alert .= 'window.location.href = "?page=admin&function=add";';
                        $alert .= '</script>';
                        echo $alert;
                        exit();
                    }
                }else{
                    $filename = '';
                }
                //echo $filename;
                //exit();
                
                $sql = "INSERT INTO tb_admin 
                        (firstname, lastname, email, phone, user, pass, image)
                VALUES ('$firstname', '$lastname', '$email', '$phone', '$user', '$pass', '$filename')";
                if(mysqli_query($connection, $sql)) {
                    // echo "เพิ่มข้อมูลสำเร็จ";
                    $alert = '<script type="text/javascript">';
                    $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
                    $alert .= 'window.location.href = "?page=admin";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                }
        
                mysqli_close($connection);
            }
        }        
        
    }
?>

<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
    <h1 class="app-page-title mb-0">เพิ่มข้อมูลผู้ดูแลระบบ</h1>
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
                    <div class="mb-3">
                            <label class="form-label">รูปภาพ</label>
                            <div class="mb-3">
                            <img id="preview" class="rounded" width="100" height="100">
                            </div>
                            <button onclick="return triggerFile();" class="btn btn-success text-white">เลือกรูปภาพ</button>
                            <input type="file" name="image" id="image" style="display:none;">
                            </div>
                        <div class="mb-3">
                            <label class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" name="user" placeholder="ชื่อผู้ใช้ : admin" autocomplete="off" 
                            required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">รหัสผ่าน</label>
                            <input type="text" class="form-control" name="pass" placeholder="รหัสผ่าน : 123456" autocomplete="off" 
                            required>
                        </div>
                        <hr class="mb-3 mt-4">
                        <div class="mb-3">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" name="firstname" placeholder="ชื่อ" value="<?=(isset(
                                $_POST['firstname']) && !empty($_POST['firstname']) ? $_POST['firstname'] : '' )?>" autocomplete="off" 
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="lastname" placeholder="นามสกุล" value="<?=(isset(
                                $_POST['lastname']) && !empty($_POST['lastname']) ? $_POST['lastname'] : '' )?>" autocomplete="off" 
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="อีเมล์" value="<?=(isset(
                                $_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : '' )?>" autocomplete="off" 
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">เบอร์ติดต่อ</label>
                            <input type="text" class="form-control" name="phone" placeholder="เบอร์ติดต่อ" value="<?=(isset(
                                $_POST['phone']) && !empty($_POST['phone']) ? $_POST['phone'] : '' )?>" autocomplete="off" 
                                required>
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