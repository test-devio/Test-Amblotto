<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    // echo '<pre>';
    // print_r($_GET);
    // echo '</pre>';
    // exit();
    $id = $_GET['id'];
    $id_product = $_GET['id_product'];
    $sql = "DELETE FROM tb_product_gallery WHERE id = '$id'";   
    if(mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบแกลลอรี่สำเร็จ");';
        $alert .= 'window.location.href = "?page=product&function=gallery&id='.$id_product.'";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>