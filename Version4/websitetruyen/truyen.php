<?php
// require_once("Controller/Manga.class.php"); 
// include ("Controller/Manga.class.php");
include("Controller/Chapter.class.php");
// include ("Controller/Theloai.class.php");
?>
<?php
include_once("header.php");
if (!isset($_GET["ma_truyen"])) {
    header("Location: home.php");
} else {
    $ma_truyen = $_GET["ma_truyen"];
    // var_dump(array(Manga::ChitietMangaa($ma_truyen)));
    $chitiettruyen = Manga::ChitietMangaa($ma_truyen);
    $chitiettruyen = reset($chitiettruyen);
    $danhsachchap = Chapter::Chapcuatruyen($ma_truyen);
    $cungtheloai = Manga::TruyenCungTheloai($ma_truyen);
    $chapfirst = Chapter::SttChapFirst($ma_truyen);
    $chapfirst = reset($chapfirst);
    // $sttchap = Chapter::SttChapNextCreate($ma_truyen);
    // $sttchap = reset($sttchap);
    // echo $sttchap["SttChap"]+1;
}
?>
<section class="main-content">
    <div class="container has-background-white story-detail">
        <div id="path">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="/websitetruyen/home.php">
                        <span itemprop="name">Trang Chủ</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="/websitetruyen/truyen.php?ma_truyen=<?php echo $chitiettruyen["IdManga"]; ?>">
                        <span itemprop="name"><?php echo $chitiettruyen["TenManga"]; ?></span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>
            </ol>
        </div>
        <div class="block01">
            <div class="left"><img src="<?php echo "/websitetruyen/" . $chitiettruyen["Anh"]; ?>" alt="<?php echo $chitiettruyen["TenManga"]; ?>" /></div>
            <div class="center">
                <h1><?php echo $chitiettruyen["TenManga"]; ?></h1>
                <div class="txt">
                    <p class="info-item"><?php echo "Tên khác:" . $chitiettruyen["TenKhac"]; ?></p>
                    <p class="info-item">Tác giả: <a class="org" href="#">Đang Cập Nhật</a></p>
                    <p class="info-item">Tình trạng: Đang Cập Nhật</p>
                    <div>
                        <span>Thống kê:</span>
                        <span class="sp01"><i class="fas fa-camera"></i> <span class="sp02 number-like">526</span></span>
                        <span class="sp01"><i class="fas fa-heart"></i> <span class="sp02">2,657</span></span>
                        <span class="sp01"><i class="fas fa-eye"></i> <span class="sp02">1,037,569</span></span>
                    </div>
                </div>
                <ul class="list01">
                    <?php
                    $danhsachtheloai = Theloai::Theloaicuatruyen($chitiettruyen["IdManga"]);
                    foreach ($danhsachtheloai as $itemtl) {
                    ?>
                        <li class="li03"><a href="#"><?php echo $itemtl["TenTheloai"]; ?></a></li>
                    <?php } ?>
                </ul>

                <ul class="story-detail-menu">
                    <li class="li01">
                        <?php
                        if (!empty($chapfirst)) {
                        ?>
                            <?php if ($chitiettruyen["KieuTruyen"] == "1") { ?>
                                <a href="chaptranh.php?matruyen=<?php echo $chitiettruyen["IdManga"] ?>&sttchap=<?php echo $chapfirst['SttChap'] ?>" class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a>
                            <?php } else { ?>
                                <a href="chapchu.php?matruyen=<?php echo $chitiettruyen["IdManga"] ?>&sttchap=<?php echo $chapfirst['SttChap'] ?>" class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a>
                            <?php } ?>
                        <?php } else { ?>
                            <a href="#" class="button is-danger is-rounded"><span class="btn-read"></span>Chưa Cập Nhập</a>
                        <?php } ?>
                    </li>
                    <li class="li02"><a href="#" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index" data-id="3572"><span class="fas fa-heart"></span>Theo dõi</a></a></li>
                    <li class="li03"><a href="#" class="button is-danger is-rounded btn-like" data-id="3572"><span class="fas fa-thumbs-up"></span>Thích</a></li>
                </ul>
                <div class="txt txt01 story-detail-info">
                    <p><?php echo htmlspecialchars_decode($chitiettruyen['GioiThieu']); ?></p>
                </div>
            </div>
        </div>
        <ul class="story-detail-menu">
            <li class="li01"><a href="http://truyenqq.com/truyen-tranh/vuong-tuoc-tu-huu-bao-boi-3572-chap-1.html" class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a></li>
            <li class="li02"><a href="javascript:void(0);" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index" data-id="3572"><span class="fas fa-heart"></span>Theo dõi</a></a></li>
            <li class="li03"><a href="javascript:void(0);" class="button is-danger is-rounded btn-like" data-id="3572"><span class="fas fa-thumbs-up"></span>Thích</a></li>
        </ul>
        <div class="block02">
            <div class="title">
                <h2 class="story-detail-title">Danh sách chương</h2>
            </div>
            <div class="box">
                <div class="works-chapter-list">
                    <?php
                    if ($danhsachchap) {
                        foreach ($danhsachchap as $item) { ?>
                            <div class="works-chapter-item row">
                                <div class="col-md-10 col-sm-10 col-xs-8 ">
                                    <?php if ($chitiettruyen["KieuTruyen"] == 1) { ?>
                                        <a target="_blank" href="chaptranh.php?matruyen=<?php echo $chitiettruyen["IdManga"] ?>&sttchap=<?php echo $item['SttChap'] ?>"><?php echo "Chương " . $item["SttChap"] . ":" . $item["TenChap"]; ?></a>
                                    <?php } else { ?>
                                        <a target="_blank" href="chapchu.php?matruyen=<?php echo $chitiettruyen["IdManga"] ?>&sttchap=<?php echo $item['SttChap'] ?>"><?php echo "Chương " . $item["SttChap"] . ":" . $item["TenChap"]; ?></a>
                                    <?php } ?>

                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-4 text-right">
                                    <?php echo $item["NgayTao"] ?></div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="works-chapter-item row">
                            Chưa cập nhập
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="block03">
            <h2 class="story-detail-title">Cùng thể loại</h2>
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-parent">
                    <?php
                    if ($cungtheloai) {
                    ?>
                        <ul class="list-stories grid-6">
                            <?php
                            foreach ($cungtheloai as $cungloai) {
                            ?>
                                <li>
                                    <div class="story-item">
                                        <a href="truyen.php?ma_truyen=<?php echo $cungloai["IdManga"] ?>"><img class="story-cover" src="<?php echo "/websitetruyen/" . $cungloai["Anh"]; ?>" alt="<?php echo $cungloai["TenManga"]; ?>"></a>
                                        <div class="top-notice">
                                            <span class="time-ago"><?php if ($cungloai["NgayDang"] == NULL) {
                                                                        echo "1 phút";
                                                                    } else {
                                                                        echo get_time_ago(strtotime($cungloai['NgayDang']));
                                                                    } ?></span> <span class="type-label hot">Hot</span> </div>
                                        <h3 class="title-book"><a href="truyen.php?ma_truyen=<?php echo $cungloai["IdManga"] ?>"><?php echo $cungloai["TenManga"]  ?></a></h3>
                                        <div class="episode-book"> <?php
                                                                    if ($cungloai["KieuTruyen"] == "1") {
                                                                    ?>
                                                <a href="chaptranh.php?matruyen=<?php echo $cungloai["IdManga"] ?>&sttchap=<?php echo $cungloai['ChuongCuoi'] ?>">
                                                    <?php echo "Chương " . $cungloai["ChuongCuoi"]; ?></a>
                                            <?php } else { ?>
                                                <a href="chapchu.php?matruyen=<?php echo $cungloai["IdManga"] ?>&sttchap=<?php echo $cungloai['ChuongCuoi'] ?>">
                                                    <?php echo "Chương " . $cungloai["ChuongCuoi"]; ?></a>
                                            <?php } ?></div>
                                        <div class="more-info">
                                            <div class="title-more"><?php echo $cungloai["TenManga"]  ?></div>
                                            <div class="title-more-other">Tên khác: <?php echo $cungloai["TenKhac"]  ?></div>
                                            <p class="info">Tình trạng: Đang Cập Nhật</p>
                                            <p class="info">Lượt xem: 129,375</p>
                                            <p class="info">Lượt theo dõi: 1,436</p>
                                            <div class="list-tags">
                                                <?php
                                                $danhsachtheloai = Theloai::Theloaicuatruyen($cungloai["IdManga"]);
                                                foreach ($danhsachtheloai as $itemtl) {
                                                ?>
                                                    <a class="blue" href="#"> <?php echo $itemtl["TenTheloai"]; ?></a>
                                                <?php } ?> </div>
                                            <div class="excerpt">
                                                <?php
                                                echo htmlspecialchars_decode(substrwords($cungloai["GioiThieu"], 200));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.story-item -->
                                </li>
                            <?php  } ?>
                        </ul>
                    <?php } else { ?>
                        <ul class="list-stories grid-6">
                            Không có truyện cùng loại
                        </ul>

                    <?php } ?>
                </div>
            </div>
            <!-- /.list-stories -->
        </div>
</section>
<?php include_once("footer.php"); ?>