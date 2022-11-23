<?php
    // print_r($_POST);
    if(isset($_POST) && !empty($_POST)){
    // print_r($_POST);
    //echo '<pre>';
    //print_r($_FILES);
    //echo '</pre';
    //exit();
    $title = $_POST['title'];
    if(!empty($title)){
        $sql_check = "SELECT * FROM tb_type_product WHERE title = '$title'";
        $query_check = mysqli_query($connection,$sql_check);
        $row_check = mysqli_num_rows($query_check);
        if($row_check > 0){
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ชื่อประเภทสินค้าซ้ำ กรุณากรอกใหม่อีกครั้ง");';
            $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }else{
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
                //                 $alert .= 'window.location.href = "?page=admin&function=add";';
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
                //                 $alert .= 'window.location.href = "?page=admin&function=add";';
                //                 $alert .= '</script>';
                //                 echo $alert;
                //                 exit();
                //             }
                //         }
                //     }else{
                //         $alert = '<script type="text/javascript">';
                //         $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
                //         $alert .= 'window.location.href = "?page=admin&function=add";';
                //         $alert .= '</script>';
                //         echo $alert;
                //         exit();
                //     }
                // }else{
                //     $filename = '';
                // }
                // echo $filename;
                // exit();
                
                $sql = "INSERT INTO tb_type_product 
                        (title)
                VALUES ('$title')";
                if(mysqli_query($connection, $sql)) {
                    // echo "เพิ่มข้อมูลสำเร็จ";
                    $alert = '<script type="text/javascript">';
                    $alert .= 'alert("เพิ่มข้อมูลประเภทสินค้าสำเร็จ");';
                    $alert .= 'window.location.href = "?page='.$_GET['page'].'";';
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
    <h1 class="app-page-title mb-0">เพิ่มประเภทสินค้า</h1>
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
                            <label class="form-label">ชื่อประเภทสินค้า</label>
                            <input type="text" class="form-control" name="title" placeholder="ชื่อประเภทสินค้า"
                            autocomplete="off" required>
                        </div>
                        <button type="submit" class="btn app-btn-primary">บันทึก</button>
                    </form>

                </div><!--//app-card-body-->
                
            </div><!--//app-card-->
        </div>
</div><!--//row-->