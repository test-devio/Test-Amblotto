<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_product WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $result = mysqli_fetch_assoc($query);
}
    // print_r($_POST);
    if(isset($_POST) && !empty($_POST)){
    // print_r($_POST);
    //echo '<pre>';
    //print_r($_FILES);
    //echo '</pre';
    //exit();
    $type_product_id = $_POST['type_product_id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $oldimage = $_POST['oldimage'];
    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
        $extension = array("jpeg","jpg","png");
        $target = 'upload/product/';
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
                    $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=update&id='.$id.'";';
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
                    $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=update&id='.$id.'";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                }
            }
        }else{
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
            $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=update&id='.$id.'";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    }else{
        $filename = $oldimage;
    }
    //echo $filename;
    //exit();
    $sql = "UPDATE tb_product SET type_product_id = '$type_product_id',title = '$title',detail = 
    '$detail',price = '$price' , image = '$filename' WHERE id = '$id'";   
    if(mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสินค้าสำเร็จ");';
        $alert .= 'window.location.href = "?page='.$_GET['page'].'";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);


}
$sql1 = "SELECT * FROM tb_type_product ";
$query1 = mysqli_query($connection,$sql1);
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
                    <div class="mb-3">
                            <label class="form-label">รูปภาพ</label>
                            <div class="mb-3">
                            <img id="preview" src="upload/product/<?=$result['image']?>" class="rounded" width="100" height="100">
                            </div>
                            <button onclick="return triggerFile();" class="btn btn-success text-white">เลือกรูปภาพ</button>
                            <input type="file" name="image" id="image" style="display:none;">
                            <input type="hidden" name="oldimage" value="<?=$result['image']?>">
                            </div>
                            <div class="mb-3 col-lg-6">
                            <label class="form-label">ประเภทสินค้า</label>
                            <select name="type_product_id" class="form-control" style="height: unset !important;">
                                <option value="" disabled>ประเภทสินค้า</option>
                                <?php foreach($query1 as $data):?>
                                    <option value="<?=$data['id']?>" <?=$result['type_product_id'] == $data['id'] ? 'selected' : '' ?>><?=$data['title']?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">ชื่อสินค้า</label>
                            <input type="text" class="form-control" name="title" placeholder="ชื่อสินค้า : สินค้า ก" value="<?=$result['title']?>" autocomplete="off" 
                            required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">รายละเอียดสินค้า</label>
                            <textarea name="detail" class="form-control" style="height:100px"><?=$result['detail']?></textarea>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">ราคา</label>
                            <input type="text" class="form-control" name="price" placeholder="ราคา" value="<?=$result['price']?>" autocomplete="off" 
                            required>
                        </div>
                        <button type="submit" class="btn app-btn-primary">บันทึก</button>
                    </form>

                </div><!--//app-card-body-->
                
            </div><!--//app-card-->
        </div>
</div><!--//row-->