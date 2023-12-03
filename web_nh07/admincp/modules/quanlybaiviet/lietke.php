<?php
$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC";
$query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);
?>
<p>Liệt kê danh mục bài viết</p>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên bài viết</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Tóm tắt</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_bv)) {
      $i++;
    ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tenbaiviet'] ?></td>
        <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>

        <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php if ($row['tinhtrang'] == 1) {
              echo 'Kích hoạt';
            } else {
              echo 'Ẩn';
            }
            ?>

        </td>
        <td>
          <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>">Xoá</a> | <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>">Sửa</a>
        </td>

      </tr>
    <?php
    }
    ?>
  </tbody>
</table>