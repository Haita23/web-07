<?php
$sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet";
$query_lietke_danhmucbv = mysqli_query($mysqli, $sql_lietke_danhmucbv);
?>
<p>Liệt kê danh mục bài viết</p>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucbv)) {
      $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
        <td>
          <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>">Xoá</a> | <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>