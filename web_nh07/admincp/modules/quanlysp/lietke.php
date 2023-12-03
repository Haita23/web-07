<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sản phảm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Giá sp</th>
            <th scope="col">Giá gốc</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Mã sp</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thời gian ra mắt</th>
            <th scope="col">Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_sp)) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['tensanpham'] ?></td>
                <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="200px"></td>
                <td><?php echo $row['giasp'] ?></td>
                <td><?php echo $row['giagoc'] ?></td>
                <td><?php echo $row['soluong'] ?></td>
                <td><?php echo $row['tendanhmuc'] ?></td>
                <td><?php echo $row['masp'] ?></td>
                <td><?php if ($row['tinhtrang'] == 1) {
                        echo 'Kích hoạt';
                    } else {
                        echo 'Ẩn';
                    }
                    ?>

                </td>
                <td><?php echo $row['thoigian'] ?></td>
                <td>
                    <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> |
                    <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>