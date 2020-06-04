<?php
require_once("Controller/Manga.class.php"); ?>
<?php
include_once("header.php");
$danhsachmanga = Manga::DanhsachManga();
?>
<?php
//     require_once("route.php");

//     route('/', function(){
//        return  require __DIR__ . '/websitetruyen/home.html';
//     });

//     $action = $_SERVER['REQUEST_URI'];
//     dispath($action)

?>
<section class="schedule">
    <div class="container">
        <div class="schedule-inner">
            <div class="time">
                Lịch Ra Truyện Ngày 12/04/2020
            </div>
            <!-- /.time -->
            <ul class="schedule-list">
                <li>
                    <a href="#"><strong class="hot">[12:00]</strong> Hệ Thống X Toàn Năng -
                        Chương 21</a>
                </li>
                <li>
                    <a href="#"><strong class="hot">[14:00]</strong> Em Gái Đừng Làm Phiền
                        Tôi - Chương 8</a>
                </li>
                <li>
                    <a href="#"><strong class="hot">[16:00]</strong> Trùng Sinh - Chương
                        127</a>
                </li>
                <li>
                    <a href="#"><strong class="">[18:00]</strong> Lang Hoàn Thư Viện - Chương
                        90</a>
                </li>
                <li>
                    <a href="#"><strong class="">[20:00]</strong> Xuyên Nhanh - Hướng Dẫn Tự
                        Cứu Của Nữ Phụ - Chương 14</a>
                </li>
                <li>
                    <a href="#"><strong class="">[22:00]</strong> The Girl I Like Is A Boy -
                        Chương 1</a>
                </li>
            </ul>
            <!-- /.schedule-list -->
        </div>
        <!-- /.schedule-inner -->
    </div>
</section>
<!-- /.schedule -->
<section class="main-content index">
    <div class="container">
        <div class="latest">
            <div class="caption" id="list-update">
                <a href="http://truyenqq.com/truyen-moi-cap-nhat.html"><span class="starts-icon"></span>Truyện mới cập nhật</a>
            </div>
            <ul class="list-stories grid-6">
                <?php
                foreach ($danhsachmanga as $item) {
                ?>
                    <li>
                        <div class="story-item">
                            <a href="#"><img class="story-cover" src="<?php echo "/websitetruyen/FileCSSJS/assets/images/" . $item["Anh"]; ?>" alt="<?php echo $item["TenManga"]; ?>" /></a>
                            <div class="top-notice">
                                <span class="time-ago">1 Phút Trước</span>
                                <span class="type-label hot">Hot</span>
                            </div>
                            <h3 class="title-book">
                                <a href="#"><?php echo $item["TenManga"]; ?></a>
                            </h3>
                            <div class="episode-book">
                                <a href="#">
                                    Chương 16</a>
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
                                    <a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/romance-36.html">Romance</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a>
                                </div>
                                <div class="excerpt">
                                    <?php echo $item["GioiThieu"]; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.story-item -->
                    </li>
                <?php
                }
                ?>
            </ul>
            <!-- /.list-stories -->
            <div class="has-text-centered">
                <a href="http://truyenqq.com/truyen-moi-cap-nhat/trang-2.html" class="view-more-btn">Xem thêm nhiều truyện</a>
            </div>
        </div>
        <!-- /.latest -->
        <div class="female">
            <div class="caption" id="list-female">
                <a href="http://truyenqq.com/truyen-con-gai.html"><span class="female-icon"></span>Truyện Tranh</a>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    <ul class="list-stories grid-6">
                        <?php
                        foreach ($danhsachmanga as $item) {
                            if ($item["KieuTruyen"] == "1") {
                        ?>
                                <li>
                                    <div class="story-item">
                                        <a href="#"><img class="story-cover" src="<?php echo "/websitetruyen/FileCSSJS/assets/images/" . $item["Anh"]; ?>" alt="<?php echo $item["TenManga"]; ?>" /></a>
                                        <div class="top-notice">
                                            <span class="time-ago">1 Phút Trước</span>
                                            <span class="type-label hot">Hot</span>
                                        </div>
                                        <h3 class="title-book">
                                            <a href="#"><?php echo $item["TenManga"]; ?></a>
                                        </h3>
                                        <div class="episode-book">
                                            <a href="#">
                                                Chương 16</a>
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
                                                <a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/romance-36.html">Romance</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a>
                                            </div>
                                            <div class="excerpt">
                                                <?php echo $item["GioiThieu"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.story-item -->
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                    <!-- /.list-stories -->
                    <div class="has-text-centered">
                        <a href="#" class="view-more-btn">Xem thêm nhiều truyện</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.female -->
        <div class="male">
            <div class="caption" id="list-male">
                <a href="http://truyenqq.com/truyen-con-trai.html"><span class="male-icon"></span>Truyện Chữ</a>
            </div>
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    <ul class="list-stories grid-6">
                        <?php
                        foreach ($danhsachmanga as $item) {
                            if ($item["KieuTruyen"] == "0") {
                        ?>
                                <li>
                                    <div class="story-item">
                                        <a href="#"><img class="story-cover" src="<?php echo "/websitetruyen/FileCSSJS/assets/images/" . $item["Anh"]; ?>" alt="<?php echo $item["TenManga"]; ?>" /></a>
                                        <div class="top-notice">
                                            <span class="time-ago">1 Phút Trước</span>
                                            <span class="type-label hot">Hot</span>
                                        </div>
                                        <h3 class="title-book">
                                            <a href="#"><?php echo $item["TenManga"]; ?></a>
                                        </h3>
                                        <div class="episode-book">
                                            <a href="#">
                                                Chương 16</a>
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
                                                <a class="blue" href="http://truyenqq.com/the-loai/comedy-28.html">Comedy</a><a class="blue" href="http://truyenqq.com/the-loai/romance-36.html">Romance</a><a class="blue" href="http://truyenqq.com/the-loai/slice-of-life-46.html">Slice Of Life</a>
                                            </div>
                                            <div class="excerpt">
                                                <?php echo $item["GioiThieu"]; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.story-item -->
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                    <!-- /.list-stories -->
                </div>
            </div>
        </div>
        <!-- /.male -->
    </div>
    <div id="Top" class="scrollTop none">
        <span><a href=""><img src="http://truyenqq.com/template/frontend/images/back-to-top-icon.png" /></a></span>
    </div>
</section>
<!-- /.main-content -->
<?php include_once("footer.php"); ?>