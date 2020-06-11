<?php
include_once("header.php");
// include("Controll/timesince.php");
?>
<?php
if (!empty($_REQUEST['Search'])) {
    $timkiem = $_REQUEST['Search'];
    $danhsach = Manga::DanhSachTimKiem($timkiem);
}
else{
    $danhsach= NULL;
    ?> <script>alert("Vùi long nhập từ khóa cần tìm"); $("#txtSearch").focus(); </script><?php
}
?>
<section class="main-content">
    <div class="container story-list">
        <div class="title-list">Danh sách tìm kiếm của bạn</div>
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">
            <?php 
                if($danhsach != NULL)
                {
            ?>
                <ul class="list-stories grid-6">
                    <?php
                    foreach ($danhsach as $item) {
                    ?>
                        <li>
                            <div class="story-item">
                                <a href="/websitetruyen/truyen.php?ma_truyen=<?php echo $item['IdManga'] ?>"><img class="story-cover" src="<?php echo "/websitetruyen/" . $item["Anh"]; ?>" alt="<?php echo $item["TenManga"]; ?>" /></a>
                                <div class="top-notice">
                                    <span class="time-ago">
                                    1 phut
                                    </span>
                                    <!-- <span class="type-label new">New</span> -->
                                </div>
                                <h3 class="title-book">
                                    <a href="/websitetruyen/truyen.php?ma_truyen=<?php echo $item['IdManga'] ?>"><?php echo $item["TenManga"]; ?></a>
                                </h3>
                                <div class="episode-book">
                                    <?php
                                    if ($item["KieuTruyen"] == "1") {
                                    ?>
                                        <a href="/websitetruyen/chaptranh.php?machap=<?php echo $item['ChuongCuoi'] ?>">
                                            <?php echo "Chương " . $item["ChuongCuoi"]; ?></a>
                                    <?php } else { ?>
                                        <a href="/websitetruyen/chaptranh.php?machap=<?php echo $item['ChuongCuoi'] ?>">
                                            <?php echo "Chương " . $item["ChuongCuoi"]; ?></a>
                                    <?php } ?>
                                </div>
                                <div class="more-info">
                                    <div class="title-more">
                                        <?php echo $item["TenManga"]; ?>
                                    </div>
                                    <div class="title-more-other">
                                        Tên khác: <?php echo $item["TenKhac"] ?>
                                    </div>
                                    <p class="info">Tình trạng: Đang Cập Nhật</p>
                                    <p class="info">Lượt xem: 55,789</p>
                                    <p class="info">Lượt theo dõi: 750</p>
                                    <div class="list-tags">
                                        <?php
                                        $danhsachtheloai = Theloai::Theloaicuatruyen($item["IdManga"]);
                                        foreach ($danhsachtheloai as $itemtl) {
                                        ?>
                                            <a class="blue" href="#"> <?php echo $itemtl["TenTheloai"]; ?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="excerpt">
                                        <?php
                                        echo substrwords($item["GioiThieu"], 200);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.story-item -->
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <?php } else {?>
                    <p>Không có tìm thấy kết quả đó</p>
                <?php }
                 ?>
            </div>
        </div>
        <!-- /.list-stories -->
    </div>
</section>
<?php include("footer.php") ?>