<?php
$sql_lietke_thuonghieu = "SELECT * FROM tbl_thuonghieu ";
$query_lietke_thuonghieu = mysqli_query($mysqli, $sql_lietke_thuonghieu);
?>
<p>Liệt kê thương hiệu</p>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên thương hiệu</th>
            <th scope="col">Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_lietke_thuonghieu)) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['tenthuonghieu'] ?></td>
                <td>
                    <a href="modules/quanlythuonghieu/xuly.php?idthuonghieu=<?php echo $row['id_thuonghieu'] ?>">Xóa</a> |
                    <a href="?action=quanlythuonghieu&query=sua&idthuonghieu=<?php echo $row['id_thuonghieu'] ?>">Sửa </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>