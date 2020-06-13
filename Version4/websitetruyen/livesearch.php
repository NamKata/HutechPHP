<?php
   include("Controller/Manga.class.php");
   if(!empty($_POST["keyword"])) {
    $timkiem = $_POST['keyword'];
    $danhsach = Manga::DanhSachTimKiem($timkiem);
    if(!empty($danhsach))
    { ?>
        <div class="title-search">Danh sách truyện gợi ý</div>
        <div class="list-container">
        <?php foreach($danhsach as $item){ ?>
                  <div class="result-item">
                    <a href="truyen.php?ma_truyen=<?php echo $item['IdManga'] ?>">
                      <div class="media">
                        <figure class="media-left">
                          <p class="image">
                          <img src="<?php echo $item["Anh"]; ?>" alt="<?php echo $item['TenManga'] ?>">
                          </p>
                        </figure>
                        <div class="media-content">
                          <h4><?php echo $item['TenManga'] ?></h4>
                            <?php 
                            if($item['ChuongCuoi']=='0')
                            {
                                ?>
                                <h6>Chưa cập nhập</h6>
                           <?php } else {
                            ?>
                            <h6>Chương <?php echo $item["ChuongCuoi"]; ?></h6>
                            <?php } ?>
                        </div>
                      </div>  
                    </a>
                  </div>
                  <?php }?>
                </div>
   <?php } else { ?>
   <div class="title-search">Danh sách truyện gợi ý</div>
   <div class="list-container">  <div class="result-item">Không tìm thấy</div></div>
   <?php }
   }

?>