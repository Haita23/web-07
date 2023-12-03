<div style="min-height:100vh;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('https://cdn.honda.com.vn/home-banner/December2021/qE97uq0sZA5LKNKiu6q5.jpg')">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Test Slide</h2>
                    <p class="lead">This is a description for the first slide.</p>
                </div> -->
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://cdn.honda.com.vn/home-banner/July2022/nWs1NGj7yAV0AC4N7hi2.png')">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Test Slide</h2>
                    <p class="lead">This is a description for the second slide.</p>
                </div> -->
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="newArtical">
        <?php
        $sql = "SELECT * FROM tbl_baiviet ORDER BY id DESC LIMIT 4";
        $query_bv = mysqli_query($mysqli, $sql);
        ?>

        <div class="container">
            <div style="background-color:#FAF0E6;" class="p-2 rounded d-flex justify-content-between my-4">
                <span>Bài viết mới nhất</span>
                <a href="">Tất cả bài viết >>></a>
            </div>
            <div class="row">
                <?php
                while ($row_bv = mysqli_fetch_array($query_bv)) {
                ?>
                    <div class="col-md-3">
                        <img style="object-fit: cover; width:100%; height:200px;" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
                        <a class="my-2 text-overfl-2line" href=" index.php?page=baiviet&id=<?php echo $row_bv['id'] ?>">
                            <?php echo $row_bv['tenbaiviet'] ?>
                        </a>
                        <span class="m-0 text-overfl-3line"><?php echo $row_bv['tomtat'] ?></span>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div id="newProduct">
        <?php
        $sql_pro = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT 4";
        $query_pro = mysqli_query($mysqli, $sql_pro);

        ?>

        <div class="container">
            <div style="background-color:#FAF0E6;" class="p-2 rounded d-flex justify-content-between my-4">
                <span>Sản phẩm mới nhất</span>
                <a href="">Tất cả sản phẩm >>></a>
            </div>
            <div class="row">
                <?php
                while ($row_pro = mysqli_fetch_array($query_pro)) {
                ?>
                    <div class='col-sm-6 col-md-4 col-lg-3  p-0 m-0' style="width:100%;">
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
    </div>
</div>