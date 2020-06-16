<?php
include("Controller/Chapter.class.php");
?>
<?php
include_once("header.php");
if (!isset($_GET["ma_truyen"])) {
  header("Location: home.php");
} else {
  $ma_truyen = $_GET["ma_truyen"];
  $chitiettruyen = Manga::ChitietMangaa($ma_truyen);
  $chitiettruyen = reset($chitiettruyen);
  $danhsachchap = Chapter::Chapcuatruyen($ma_truyen);
}
?>
<section class="main-content">
  <div class="container has-background-white story-detail">
    <div id="path">
      <ol class="breadcrumb" itemscope itemtype="#">
        <li itemprop="itemListElement" itemscope itemtype="#">
          <a itemprop="item" href="home.php">
            <span itemprop="name">Trang Chủ</span>
          </a>
          <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="#">
          <a itemprop="item" href="tutruyen.php?matk=<?php echo $_SESSION["user"] ?>">
            <span itemprop="name">Tủ Truyện</span>
          </a>
          <meta itemprop="position" content="2" />
        </li>
        <li itemprop="itemListElement" itemscope itemtype="#">
          <a itemprop="item" href="#">
            <span itemprop="name">Truyện</span>
          </a>
          <meta itemprop="position" content="2" />
        </li>
      </ol>
    </div>
    <div class="block01">
      <div class="left">
        <img src="<?php echo $chitiettruyen["Anh"] ?>" alt="<?php echo $chitiettruyen["TenManga"] ?>" />
      </div>
      <div class="center">
        <h1><?php echo $chitiettruyen["TenManga"] ?></h1>
        <div class="txt">
          <p class="info-item">
            Tên Khác :
            <a href="edittruyen.php?ma_truyen=<?php echo $chitiettruyen["IdManga"] ?>"><?php echo $chitiettruyen["TenKhac"] ?></a>
          </p>
          <!-- <p class="info-item">
            <a class="org" href="edittruyen.php?ma_truyen=<?php echo $chitiettruyen["IdManga"] ?>"><?php echo $chitiettruyen["TenManga"] ?></a>
          </p> -->
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
          <li class="li02">
            <a href="edittruyen.php?ma_truyen=<?php echo $chitiettruyen["IdManga"] ?>" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index"><span class="far fa-eye"></span>Thay đổi thông tin truyện</a>
          </li>
          <li class="li03">
            <a href="dangchuong.php?ma_truyen=<?php echo $chitiettruyen['IdManga'] ?>" class="button is-danger is-rounded btn-like"><span class="fas fa-plus"></span>Thêm chương</a>
          </li>
        </ul>
        <div class="txt txt01 story-detail-info">
          <p><?php echo htmlspecialchars_decode($chitiettruyen['GioiThieu']); ?></p>
        </div>
      </div>
    </div>
    <div class="block02">
      <div class="title">
        <h2 class="story-detail-title">Danh sách chương</h2>
        <a href="#"></a>
      </div>
      <div class="box">
        <div class="works-chapter-list">
          <?php
          if ($danhsachchap) {
            foreach ($danhsachchap as $item) { ?>
              <div class="works-chapter-item row">
                <div class="col-md-10 col-sm-10 col-xs-8" id="Quanlychuong">
                  <a target="_blank" href="#"><?php echo "Chương " . $item["SttChap"] . ":" . $item["TenChap"]; ?>
                  </a>
                  <a href="editchuong.php?machuong=<?php echo $item["IdChapter"] ?>" style="margin-left: 20px;"><i class="fas fa-edit"></i></a>
                  <a href="" onclick="XoaChuong(<?php echo $item['IdChapter'] ?>)"  data-id=<?php echo $item["IdChapter"] ?> style="margin-left: 10px;"><i class="fas fa-trash-alt"></i></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-4 text-right">
                  <?php echo $item["NgayTao"] ?>
                </div>
              </div>
            <?php }
          } else { ?>
            <div class="works-chapter-item row">
              Tạo Chương Đầu Tiên
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
</section>
<script type="text/javascript">
function XoaChuong(id){
  var IdChapter =id;
  if(confirm("Bạn có muốn hủy kích hoạt chương này của truyện?"))
  {
    $.ajax({
      url:"deletechuong.php",
      dataType:'json',
      data:{
        IdChapter:IdChapter,
      }
      ,success:function(data)
      {
        if(data.Success)
        {
          alert("Bạn đã hủy kích hoạt thành công");
          window.location.reload();
        }
        if(data.Error)
        {
            alert("Bạn đã hủy kích hoạt thất bại");
            window.location.reload();
        }
      }
    })
  }
  else
  {
    return;
  }
};
</script>


<?php
include_once("footer.php")

?>
