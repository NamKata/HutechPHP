  <?php 
  include("Controller/Product.class.php");
  ?>
  <?php
    include_once("header.php");
    $danhsachsanpham = Product::DanhsachProduct();
    ?>
  <section class="main-content">
      <div class="container story-list">
          <div class="title-list">Mua lượt đăng</div>
          <div class="tile is-ancestor">
              <div class="tile is-vertical is-parent">
                  <ul class="list-stories grid-6">
                    <?php 
                        foreach($danhsachsanpham as $item)
                        {
                    ?>
                      <li>
                          <div class="story-item">
                              <a href="#"><img class="story-cover" src="<?php echo $item["Anh"] ?>" alt="Image" /></a>
                              <h3 class="title-book">
                                  <?php echo $item["TenSanpham"] ?>
                              </h3>
                              <h3 class="title-book">
                                 Giá <?php echo number_format($item["Gia"])  ?> đ
                              </h3>
                              <div class="episode-book">
                                <?php
                                    if (isset($_SESSION["user"]) && $_SESSION["user"]) {
                                        $thongtin = User::ThongTinNguoiDung($_SESSION["user"]);
                                        $thongtin = reset($thongtin);
                                        if($thongtin["SoluotTao"] >= "30")
                                        {
                                    ?>
                                    Bạn đã MAX 50 lần
                                    <?php } else {?>

                                  <button type="button" onclick="location.href='shopping_cart.php?id=<?php echo $item['ProductId'];?>'" class="btn btn-primary">
                                      Mua</button>
                                      <?php } }else {}?>
                              </div>
                              <div class="more-info">
                                  <div class="title-more">
                                      <?php echo $item["TenSanpham"] ?>
                                  </div>
                                  <p class="info">Số lượt: <?php echo $item["LuotDang"] ?></p>
                                  <p class="info">Giá :<?php echo number_format($item["Gia"])  ?> </p>
                                  <div class="excerpt">
                                      <?php echo $item["Noidung"] ?>
                                  </div>
                              </div>
                          </div>
                          <!-- /.story-item -->
                      </li>
                    <?php } ?>  
                  </ul>
              </div>
          </div>
          <!-- /.list-stories -->
      </div>
  </section>
  <!-- /.main-content -->
  <?php include_once("footer.php"); ?>