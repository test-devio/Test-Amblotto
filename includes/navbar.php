<?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('/',$url);
$url = explode('.',$url['2']);
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark bg-gradient">
        <div class="container-fluid">
            <!-- navbar logo -->
            <a class="navbar-brand me-4 ms-2 text-white" href="#">javis</a>

            <!-- navbar button mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar menu -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pt-2 pb-2">
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == '' || $url[0] == 'index' ? 'active-menu-custom' : '' ?>" aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= in_array($url[0],array('product','product-detail')) ? 'active-menu-custom' : '' ?>" href="product.php">สินค้า</a>
                    </li>
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'about' ? 'active-menu-custom' : '' ?>" href="about.php">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'contact' ? 'active-menu-custom' : '' ?>" href="contact.php">ติดต่อ</a>
                    </li>
                    <li class="nav-item menu-custom mx-2">
                        <div class="bg-white h-100" style="width:1px"></div>
                    </li>
                <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])):?>
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'profile' ? 'active-menu-custom' : '' ?>" href="profile.php">ข้อมูลส่วนตัว</a>
                    </li>
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'changepassword' ? 'active-menu-custom' : '' ?>" href="changepassword.php">เปลี่ยนแปลงรหัสผ่าน</a>
                    </li>
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'logout' ? 'active-menu-custom' : '' ?>" href="logout.php">ออกจากระบบ</a>
                    </li>
                <?php else:?>
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'register' ? 'active-menu-custom' : '' ?>" href="register.php">สมัครสมาชิก</a>
                    </li>
                    <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'login' ? 'active-menu-custom' : '' ?>" href="login.php">เข้าสู่ระบบ</a>
                    </li>
                <?php endif;?>
            </ul>
            </div>
        </div>
    </nav>