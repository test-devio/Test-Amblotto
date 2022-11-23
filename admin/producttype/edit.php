<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_type_product WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $result = mysqli_fetch_assoc($query);
}
    // print_r($_POST);
    if(isset($_POST) && !empty($_POST)){
    // print_r($_POST);
    // echo '<pre>';
    // print_r($_FILES);
    //echo '</pre';
    //exit();
        $title = $_POST['title'];
        if(!empty($title)){
            $sql_check = "SELECT * FROM tb_type_product WHERE title = '$title' AND id != '$id'";
            $query_check = mysqli_query($connection,$sql_check);
            $row_check = mysqli_num_rows($query_check);
            if($row_check > 0){
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("ชื่อประเภทสินค้าซ้ำ กรุณากรอกใหม่อีกครั้ง");';
                $alert .= 'window.location.href = "?page='.$_GET['page'].'&function=update&id='.$id.'";';
                $alert .= '</script>';
                echo $alert;
                exit();
            }else{
        $sql = "UPDATE tb_type_product SET title = '$title' WHERE id = '$id'";   
        if(mysqli_query($connection, $sql)) {
            // echo "เพิ่มข้อมูลสำเร็จ";
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("แก้ไขข้อมูลประเภทสินค้าสำเร็จ");';
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
    <h1 class="app-page-title mb-0">แก้ไขประเภทสินค้า</h1>
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
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">ชื่อประเภทสินค้า</label>
                            <input type="text" class="form-control" name="title" placeholder="ชื่อประเภทสินค้า" 
                            value="<?=$result['title']?>" autocomplete="off" required>
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