<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_product WHERE id = '$id'";   
    if(mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบข้อมูลสินค้าสำเร็จ");';
        $alert .= 'window.location.href = "?page=product";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>