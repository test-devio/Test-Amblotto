<?php
if(isset($_POST) && !empty($_POST)){
    $id_product = $_POST['id_product'];
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
                    $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
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
                    $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                }
            }
        }else{
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
            $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=add";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    }else{
        $filename = '';
    }
    //echo $filename;
    //exit();
    
    $sql = "INSERT INTO tb_product_gallery
            (id_product, image)
    VALUES ('$id_product', '$filename')";
    if(mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มแกลลอรี่สำเร็จ");';
        $alert .= 'window.location.href = "?page='.$_GET['page'].'&function='.$_GET['function'].'&id='.$id_product.'";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
    
}
    $id = $_GET['id'];
    $sql = "SELECT *,p.id,p.title,tp.title AS title_type_product FROM tb_product p 
        LEFT JOIN tb_type_product tp ON p.type_product_id = tp.id WHERE p.id = '$id'";
    $query = mysqli_query($connection,$sql);
    $result = mysqli_fetch_assoc($query);

    $sql = "SELECT * FROM tb_product_gallery WHERE id_product = '$id'";
    $query = mysqli_query($connection,$sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
    <h1 class="app-page-title mb-0">จัดการข้อมูลแกลลอรี่ / สินค้า : <?=$result['title']?></h1>
    </div>
    <div class="col-auto">
    <a href="?page=<?=$_GET['page']?>" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
<div class="col-12 col-md-4">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body text-center">     
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                            <label class="form-label">รูปภาพ</label>
                            <div class="mb-3">
                            <img id="preview" class="rounded" width="250" height="250">
                            </div>
                            <button onclick="return triggerFile();" class="btn btn-success text-white">เลือกรูปภาพ</button>
                            <input type="file" name="image" id="image" style="display:none;">
                            </div>
                            <input type="hidden" name="id_product" value="<?=$id?>">
                        <button type="submit" class="btn app-btn-primary">บันทึก</button>
                    </form>
                </div><!--//app-card-body-->          
            </div><!--//app-card-->
        </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
            <table class="table table-hover" id="tableall">
                <thead class="text-center">
                    <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รูปภาพ</th>
                    <th scope="col">เมูน</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                        $i = 1;
                        foreach($query as $data):?>
                        <tr>
                        <td class="align-middle"><?=$i?></td>
                        <td class="align-middle"><img src="upload/product/<?=$data['image']?>" 
                        class="rounded" width="50" height="50"></td>
                        <td class="align-middle">
                            <a href="?page=<?=$_GET['page']?>&function=gallery_delete&id=<?=$data['id']?>&id_product=<?=$id?>"
                            onclick="return confirm('คุณต้องการลบ แกลลอรี่ลำดับที่ : <?=$i?> หรือไม่?')" 
                            class="btn btn-sm btn-danger">ลบ</a>
                        </td>
                        </tr>
                    <?php $i++;endforeach;?>                  
                </tbody>
            </table>
            </div><!--//app-card-body-->
            
        </div><!--//app-card-->
    </div>
</div><!--//row-->
<script type="text/javascript">
$(document).ready( function () {
$('#tableall').DataTable({
    language : {
        "decimal":        "",
        "emptyTable":     "ไม่มีข้อมูล",
        "info":           "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
        "infoEmpty":      "แสดง 0 - 0 จาก 0 รายการ",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "แสดง _MENU_ รายการ",
        "loadingRecords": "Loading...",
        "processing":     "",
        "search":         "ค้นหา:",
        "zeroRecords":    "No matching records found",
        "paginate": {
            "first":      "First",
            "last":       "Last",
            "next":       "หน้าถัดไป",
            "previous":   "ก่อนหน้า"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    }
    });
});
</script>
<?php
mysqli_close($connection);
?>