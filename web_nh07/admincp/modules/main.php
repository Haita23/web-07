<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $page = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $page = '';
        $query = '';
    }
    if ($page == 'quanlydanhmucsanpham' && $query == 'them') {
        include("modules/quanlydanhmucsp/them.php");
        include("modules/quanlydanhmucsp/lietke.php");
    } elseif ($page == 'quanlydanhmucsanpham' && $query == 'sua') {
        include("modules/quanlydanhmucsp/sua.php");
    } elseif ($page == 'quanlythuonghieu' && $query == 'them') {
        include("modules/quanlythuonghieu/them.php");
        include("modules/quanlythuonghieu/lietke.php");
    } elseif ($page == 'quanlythuonghieu' && $query == 'sua') {
        include("modules/quanlythuonghieu/sua.php");
    } elseif ($page == 'quanlysp' && $query == 'them') {
        include("modules/quanlysp/them.php");
        include("modules/quanlysp/lietke.php");
    } elseif ($page == 'quanlysp' && $query == 'sua') {
        include("modules/quanlysp/sua.php");
    } elseif ($page == 'quanlydonhang' && $query == 'lietke') {
        include("modules/quanlydonhang/lietke.php");
    } elseif ($page == 'donhang' && $query == 'xemdonhang') {
        include("modules/quanlydonhang/xemdonhang.php");
    } elseif ($page == 'quanlydanhmucbaiviet' && $query == 'them') {
        include("modules/quanlydanhmucbaiviet/them.php");
        include("modules/quanlydanhmucbaiviet/lietke.php");
    } elseif ($page == 'quanlydanhmucbaiviet' && $query == 'sua') {
        include("modules/quanlydanhmucbaiviet/sua.php");
    } elseif ($page == 'quanlybaiviet' && $query == 'them') {
        include("modules/quanlybaiviet/them.php");
        include("modules/quanlybaiviet/lietke.php");
    } elseif ($page == 'quanlybaiviet' && $query == 'sua') {
        include("modules/quanlybaiviet/sua.php");
    } elseif ($page == 'quanlyweb' && $query == 'capnhat') {
        include("modules/thongtinweb/quanly.php");
    }

    // else{
    //     include("modules/dashboard.php");
    // }

    ?>
</div>