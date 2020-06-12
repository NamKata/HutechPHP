<?php
include_once("header.php");
if (!isset($_GET['IdTheloai'])) {
    header("Location: home.php");
} else {
    $IdTheloai = $_GET['IdTheloai'];
    // PHẦN XỬ LÝ PHP
    // BƯỚC 1: KẾT NỐI CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'db_truyen');

    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
    $result = mysqli_query($conn, "SELECT DISTINCT COUNT(manga.IdManga)as total, theloai.* FROM manga, theloaitruyen, theloai WHERE manga.IdManga=theloaitruyen.Manga and theloaitruyen.Theloai = theloai.IdTheloai and theloaitruyen.Theloai='$IdTheloai'");
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 6;

    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $total_page = ceil($total_records / $limit);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    // Tìm Start
    $start = ($current_page - 1) * $limit;
    // var_dump($start);

    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
    $result = mysqli_query($conn, "SELECT DISTINCT  manga.*, theloai.* FROM manga, theloaitruyen, theloai WHERE manga.IdManga=theloaitruyen.Manga and theloaitruyen.Theloai = theloai.IdTheloai and theloaitruyen.Theloai='$IdTheloai' LIMIT $start,$limit");
    $result1 = mysqli_query($conn, "SELECT DISTINCT  manga.*, theloai.* FROM manga, theloaitruyen, theloai WHERE manga.IdManga=theloaitruyen.Manga and theloaitruyen.Theloai = theloai.IdTheloai and theloaitruyen.Theloai='$IdTheloai'");
    
    $array =mysqli_fetch_assoc($result1);
    // $array1 =reset($array);
    // var_dump($array);
}

?>
<section class="main-content">
    <div class="container story-list">
        <?php 
        if(!empty($array))
        {
        ?>
        <div class="title-list">Thể loại truyện <?php echo $array['TenTheloai']; ?></div>
        <div class="box">
            <?php echo htmlspecialchars_decode($array["Content"]); ?>
        </div>
        <div class="story-list-bl01 box">
            <table>
                <tr>
                    <th>Thể loại truyện</th>
                    <td>
                        <div class="select is-warning">
                            <select id="category">
                                <?php
                                $danhsachtheloai = Theloai::Theloaitruyen();
                                foreach ($danhsachtheloai as $item) {
                                    if ($item["IdTheloai"] == $array["IdTheloai"]) {
                                ?>
                                        <option selected value="danhsachtheloai.php?IdTheloai=<?php echo $item["IdTheloai"] ?>"><?php echo $item['TenTheloai'] ?></option>
                                    <?php } else { ?>
                                        <option value="danhsachtheloai.php?IdTheloai=<?php echo $item["IdTheloai"] ?>"><?php echo $item['TenTheloai'] ?></option>
                                <?php }
                                } ?>

                            </select>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <?php } ?>
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">
                <?php if($result) {?>
                <ul class="list-stories grid-6">
                    <?php
                    foreach ($result as $item1) {
                        if($item1)
                        {
                    ?>
                        <li>
                            <div class="story-item">
                                <a href="/websitetruyen/truyen.php?ma_truyen=<?php echo $item1['IdManga'] ?>"><img class="story-cover" src="<?php echo "/websitetruyen/" . $item1["Anh"]; ?>" alt="<?php echo $item1["TenManga"]; ?>" /></a>
                                <div class="top-notice">
                                    <span class="time-ago"><?php
                                                            if ($item1["NgayDang"] == NULL) {
                                                                echo "1 phút";
                                                            } else {

                                                                // $date = date_create($item['NgayDang']);
                                                                // echo get_time_ago(strtotime(date_format($date,'Y-m-d')));
                                                                // echo humanTiming(strtotime($item['NgayDang']));
                                                                echo get_time_ago(strtotime($item1['NgayDang']));
                                                            }
                                                            ?></span>
                                    <!-- <span class="type-label new">New</span> -->
                                </div>
                                <h3 class="title-book">
                                    <a href="/websitetruyen/truyen.php?ma_truyen=<?php echo $item1['IdManga'] ?>"><?php echo $item1["TenManga"]; ?></a>
                                </h3>
                                <div class="episode-book">
                                    <?php
                                    if ($item1["KieuTruyen"] == "1") {
                                    ?>
                                        <a href="chaptranh.php?matruyen=<?php echo $item1["IdManga"] ?>&sttchap=<?php echo $item1['ChuongCuoi'] ?>">
                                            <?php echo "Chương " . $item1["ChuongCuoi"]; ?></a>
                                    <?php } else { ?>
                                        <a href="chapchu.php?matruyen=<?php echo $item1["IdManga"] ?>&sttchap=<?php echo $item1['ChuongCuoi'] ?>">
                                            <?php echo "Chương " . $item1["ChuongCuoi"]; ?></a>
                                    <?php } ?>
                                </div>
                                <div class="more-info">
                                    <div class="title-more">
                                        <?php echo $item1["TenManga"]; ?>
                                    </div>
                                    <div class="title-more-other">
                                        Tên khác: <?php echo $item1["TenKhac"] ?>
                                    </div>
                                    <p class="info">Tình trạng: Đang Cập Nhật</p>
                                    <p class="info">Lượt xem: 55,789</p>
                                    <p class="info">Lượt theo dõi: 750</p>
                                    <div class="list-tags">
                                        <?php
                                        $danhsachtheloai = Theloai::Theloaicuatruyen($item1["IdManga"]);
                                        foreach ($danhsachtheloai as $itemtl) {
                                        ?>
                                            <a class="blue" href="#"> <?php echo $itemtl["TenTheloai"]; ?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="excerpt">
                                        <?php
                                        echo htmlspecialchars_decode(substrwords($item1["GioiThieu"], 200));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.story-item -->
                        </li>
                    <?php
                    }else {
                    ?>
                    <li>
                    Không tìm thấy truyện thuộc thể loại này
                    </li>
                    <?php }}?>
                </ul>
                <?php } else {?>
                 <ul class="list-stories grid-6">Không tìm thấy truyện thuộc thể loại này</ul>
                <?php } ?>
            </div>
        </div>
        <!-- /.list-stories -->

        <!-- {% if manga.Manga.has_other_pages %} -->
        <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
            <ul class="pagination-list">
                <?php
                // PHẦN HIỂN THỊ PHÂN TRANG
                // BƯỚC 7: HIỂN THỊ PHÂN TRANG

                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) { ?>
                    <li>
                        <a class="pagination-previous" href="danhsachtheloai.php?IdTheloai=<?php echo $_GET["IdTheloai"] ?>&page=<?php echo ($current_page - 1) ?>"><span aria-hidden="true">&laquo;</span></a>
                    </li>
                    <?php }
                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                    ?>
                        <a class="pagination-link is-current" href="danhsachtheloai.php?IdTheloai=<?php echo $_GET["IdTheloai"] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                    <?php } else { ?>
                        <a class="pagination-link" href="danhsachtheloai.php?IdTheloai=<?php echo $_GET['IdTheloai'] ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                <?php }
                }
                ?>
                <?php
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                ?>
                    <a class="pagination-next" href="danhsachtheloai.php?IdTheloai=<?php echo $_GET['IdTheloai'] ?>&page=<?php echo ($current_page + 1) ?>"><span aria-hidden="true">&raquo;</span></a>
                <?php } ?>
            </ul>
        </nav>
        <!-- {% endif %} -->
    </div>
</section>
<?php
include_once("footer.php");
?>