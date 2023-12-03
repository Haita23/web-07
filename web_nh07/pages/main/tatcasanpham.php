<?php

if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = '1';
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 16) - 16;
}

$current_category = 'all';
$current_branch = 'all';

if (isset($_GET['danhmuc'])) {
    $current_category = $_GET['danhmuc'];
}

if (isset($_GET['thuonghieu'])) {
    $current_branch = $_GET['thuonghieu'];
}

if ($current_category == 'all' && $current_branch == 'all') {
    $sql_pro = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT $begin,16";
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
}


if ($current_category != 'all' || $current_branch != 'all') {
    if ($current_branch != 'all') {
        $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_thuonghieu='$current_branch' ORDER BY id_sanpham DESC LIMIT $begin,16";
        $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_thuonghieu='$current_branch'");
    }
    if ($current_category != 'all') {
        $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$current_category' ORDER BY id_sanpham DESC LIMIT $begin,16";
        $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE  tbl_sanpham.id_danhmuc='$current_category' ");
    }
}

if ($current_category != 'all' && $current_branch != 'all') {
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_thuonghieu='$current_branch' AND tbl_sanpham.id_danhmuc='$current_category' ORDER BY id_sanpham DESC LIMIT $begin,16";
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_thuonghieu='$current_branch' AND tbl_sanpham.id_danhmuc='$current_category' ");
}

$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 16);

$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<div class="container my-3">
    <div class="row">
        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item disabled text-center text-white mb-1" style="background-color: black;">Danh mục sản phẩm</li>
                <li <?php echo ($current_category == 'all') ?  "style='background:#f0f0f0;'" : ""; ?> class="list-group-item p-0">
                    <a class="text-dark d-block py-2 px-3" href="index.php?page=tatcasanpham&danhmuc=all<?php echo ($current_branch != 'all') ? "&thuonghieu=" . $current_branch : ''; ?>">Tất cả sản phẩm</a>
                </li>
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                while ($row = mysqli_fetch_array($query_danhmuc)) {
                ?>
                    <li <?php echo ($current_category == $row['id_danhmuc']) ?  "style='background:#f0f0f0;'" : ""; ?> class="list-group-item p-0">
                        <a class="text-dark d-block py-2 px-3" href="index.php?page=tatcasanpham&danhmuc=<?php echo $row['id_danhmuc'] ?><?php echo ($current_branch != 'all') ? "&thuonghieu=" . $current_branch : ''; ?>">
                            <?php echo $row['tendanhmuc'] ?>
                        </a>
                    </li>
                <?php
                }
                ?>

                <ul class="list-group mt-4">
                    <li class="list-group-item disabled text-center text-white mb-1" style="background-color: black;">Thương hiệu</li>
                    <li <?php echo ($current_branch == 'all') ?  "style='background:#f0f0f0;'" : ""; ?> class="list-group-item p-0">
                        <a class="text-dark d-block py-2 px-3" href="index.php?page=tatcasanpham<?php echo ($current_category != 'all') ? "&danhmuc=" . $current_category : ''; ?>&thuonghieu=all">Tất cả thương hiệu</a>
                    </li>
                    <?php
                    $sql_thuonghieu = "SELECT * FROM tbl_thuonghieu ORDER BY id_thuonghieu DESC";
                    $query_thuonghieu = mysqli_query($mysqli, $sql_thuonghieu);
                    while ($row = mysqli_fetch_array($query_thuonghieu)) {
                    ?>
                        <li <?php echo ($current_branch == $row['id_thuonghieu']) ?  "style='background:#f0f0f0;'" : ""; ?> class="list-group-item p-0">
                            <a class="text-dark d-block py-2 px-3" href="index.php?page=tatcasanpham<?php echo ($current_category != 'all') ? "&danhmuc=" . $current_category : ''; ?>&thuonghieu=<?php echo $row['id_thuonghieu'] ?>"><?php echo $row['tenthuonghieu'] ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
        </div>
        <div class="col-9">
            <div style="min-height: 50vh;">
                <div class="row">
                    <?php
                    while ($row_pro = mysqli_fetch_array($query_pro)) {
                    ?>
                        <div class='col-sm-6 col-md-4 col-lg-3 border p-0 m-0' style="width:100%;">
                            <div>
                                <a href="index.php?page=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="text-center">
                                    <img style="object-fit:cover; height:150px; width:100%; margin:0;" src=" admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                                </a>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex flex-column align-items-center " style="min-height:130px;">
                                    <div class="px-2 text-center">
                                        <a class="text-overfl-2line" href="index.php?page=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="m-0"><?php echo $row_pro['tensanpham'] ?></a>
                                    </div>
                                    <div class="text-center d-flex flex-column justify-content-end" style="flex-grow: 1;">
                                        <?php
                                        if (!empty($row_pro['giasp'])) {
                                        ?>
                                            <p class="m-0" style="text-decoration: line-through; font-size:15px; color:gray;"><?php echo number_format($row_pro['giagoc'], 0, ',', '.') . ".000" . '₫' ?> </p>
                                            <p class="m-0" style="font-size:18px;color:red;font-weight:600;"><?php echo $row_pro['giasp'] . '₫' ?></p>
                                        <?php
                                        } else {
                                        ?>
                                            <p class="m-0" style="font-size:18px;color:red;font-weight:600;"><?php echo number_format($row_pro['giagoc'], 0, ',', '.') . ".000" . '₫' ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary my-2">
                                            <a href="index.php?page=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>" class="text-white">Xem chi tiết</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="my-5 ">
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php
                        for ($i = 1; $i <= $trang; $i++) {
                        ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : "" ?>">
                                <a class="page-link" href="index.php?page=tatcasanpham<?php echo ($current_category != 'all') ? "&danhmuc=" . $current_category : ''; ?><?php echo ($current_branch != 'all') ? '&thuonghieu=' . $current_branch : ''; ?>&trang=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>