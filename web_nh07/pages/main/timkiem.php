<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.tensanpham LIKE'%" . $tukhoa . "%'";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>
<div class="container" style="min-height: 100vh;">
    <p class="my-2">Từ khóa tìm kiếm: <?php echo $_POST['tukhoa'] ?></p>
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