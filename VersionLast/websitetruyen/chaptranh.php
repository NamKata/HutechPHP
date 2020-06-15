<?php 
    require_once("Controller/Chapter.class.php");
?>
<?php
include_once("header.php");
if(!isset($_GET["sttchap"]) && !isset($_GET["matruyen"]))
{
    header("Location: home.php");
}else{
    $sttchap = $_GET["sttchap"];
    $matruyen = $_GET["matruyen"];
    // var_dump(array(Manga::ChitietMangaa($ma_truyen)));
    $chitietchap =Chapter::ThongtinChap($sttchap,$matruyen);
    $chitietchap =reset($chitietchap);
}
?>

<section class="main-content on">

    <div class="story-see container">
        <div class="story-see-main">
            <div class="block">
                <div class="box">
                    <div id="path" class="path-top">
                        <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="home.php">
                                    <span itemprop="name">Trang Chủ</span>
                                </a>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="truyen.php?ma_truyen=<?php echo $chitietchap["IdManga"] ?>">
                                    <span itemprop="name"><?php echo $chitietchap["TenManga"] ?></span>
                                </a>
                                <meta itemprop="position" content="2" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="chaptranh.php?machap=<?php echo $chitietchap["IdChapter"]?>">
                                    <span itemprop="name">Chương <?php echo $chitietchap["SttChap"] ?></span>
                                </a>
                                <meta itemprop="position" content="3" />
                            </li>
                        </ol>
                    </div>
                    <h1 class="detail-title"><a href="truyen.php?ma_truyen=<?php echo $chitietchap["IdManga"] ?>"><?php echo $chitietchap["TenManga"]  ?></a> Chap <?php echo $chitietchap["SttChap"].":".$chitietchap["TenChap"]; ?></h1>
                </div>
                <div class="story-see-content">
                    <!-- <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/0.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/0.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br />
                    <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/1.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/1.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br />
                    <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/2.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/2.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br />
                    <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/3.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/3.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br />
                    <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/4.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/4.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br />
                    <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/5.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/5.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br />
                    <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/6.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/6.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br />
                    <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/7.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/7.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br />
                    <img class="lazy" src="/websitetruyen/FileCSSJS/assets/images/8.jpg" data-original="/websitetruyen/FileCSSJS/assets/images/8.jpg" alt="Vương Tước Tư Hữu Bảo Bối Chap 188 - Next Chap 189" /><br /> -->
                    <?php echo $chitietchap["Noidung"]; ?>
                    <br /> 
                </div>

                <div class="story-detail has-background-white on">
                    <div id="path">
                        <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="home.php">
                                    <span itemprop="name">Trang Chủ</span>
                                </a>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="truyen.php?ma_truyen=<?php echo $chitietchap["IdManga"] ?>">
                                    <span itemprop="name"><?php echo $chitietchap["TenManga"]  ?></span>
                                </a>
                                <meta itemprop="position" content="2" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="chaptranh.php?machap=<?php echo $chitietchap["IdChapter"]; ?>">
                                    <span itemprop="name">Chương <?php echo $chitietchap["SttChap"]; ?></span>
                                </a>
                                <meta itemprop="position" content="3" />
                            </li>
                        </ol>
                    </div>
                    <div class="comment-container">
                        <span class="story-detail-title"><i class="fas fa-comments"></i>Bình Luận (<span class="comment-count">124</span>)</span>
                        <div class="group01 comments-container">
                            <div class="notify" style="padding: 10px; margin-bottom: 10px; background-color: #FFF;">
                                Like <a rel="nofollow" href="https://www.facebook.com/fantruyenqq" target="_blank">Fanpage</a> để ủng hộ TruyenQQ và cập nhật các thông tin mới nhất về các bộ truyện nhé. <div class="fb-like" data-href="https://www.facebook.com/fantruyenqq" data-send="false" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                            </div>
                            <div class="form-comment main_comment">
                                <div class="message-content">
                                    <div class="input-comment">
                                        <span class="col-md-6 col-sm-6 col-xs-12 text-center"><input value="" class="input" id="name_comment" type="text" placeholder="Họ tên"></span>
                                        <span class="col-md-6 col-sm-6 col-xs-12 text-center"><input value="" class="input" id="email_comment" type="email" placeholder="Email"></span>
                                    </div>
                                    <div class="mess-input">
                                        <textarea class="textarea" placeholder="Nội dung bình luận" id="content_comment"></textarea>
                                        <button type="submit" class="click_emoji"></button>
                                        <button type="submit" class="submit_comment"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="list-comment">
                                <article class="info-comment child_728007 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="L">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>L</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                                    <span class="time">2 Giờ Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> Yêu cầu tác giả vẽ đẹp mộ t chút đc ko<img src="http://mangaqq.com/icon/bee/qiubilong_50.gif?r=r8645456" class="emoji_comment" /> </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="728007"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="728007" data-user="0" data-replyname="L"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_663202 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="Đuỹ Mều Mập">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>Đuỹ Mều Mập</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                                    <span class="time">14 Ngày Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> truyện đang dần bị lan man so vs cốt truyện lúc đầu, chap 187 lun r mà vẫn chưa đâu vào đâu, nét vẽ thì xấu khỏi nói... mình theo dõi từ những chap đầu tiên, riết r thấy truyện xa vời vs định nghĩ hay của lúc đầu lắm r </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="663202"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">1</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="663202" data-user="0" data-replyname="Đuỹ Mều Mập"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_609500 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://avatar.mangaqq.com/160x160/avatar_1582986077.jpg?r=r8645456" alt="Quang Quang">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>Quang Quang</strong><span class="title-user-comment title-member">Thành Viên</span>
                                                    <span class="time">28 Ngày Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> truyện quá hay. nhưng vẽ kém wa :( </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="609500"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="609500" data-user="163019" data-replyname="Quang Quang"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_586760 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://avatar.mangaqq.com/160x160/avatar_1580976265.jpg?r=r8645456" alt="Đỗ Thiên Nhi">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>Đỗ Thiên Nhi</strong><span class="title-user-comment title-member">Thành Viên</span>
                                                    <span class="time">1 Tháng Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> truyện hay lắm ạ mong sớm ra chap mới chỉ cần vẽ nam 9 và nữ 9 đẹp 1 chút là được r <img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/bee/qiubilong_9.gif?r=r8645456" class="emoji_comment" /> </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="586760"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="586760" data-user="151350" data-replyname="Đỗ Thiên Nhi"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_559855 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="t">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>t</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                                    <span class="time">1 Tháng Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> cũng hay </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="559855"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="559855" data-user="0" data-replyname="t"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_526724 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="Yang Yang">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>Yang Yang</strong><span class="title-user-comment title-member">Thành Viên</span>
                                                    <span class="time">1 Tháng Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> cốt truyện hay thật...nếu vẽ đẹp chút nữa là đc rồi...đằng này, cả nam9 nữ9 đều ko đẹp, đọc mà ko cs cảm xúc j cả:(((( </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="526724"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">3</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="526724" data-user="157905" data-replyname="Yang Yang"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_514816 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://avatar.mangaqq.com/160x160/avatar_1581091133.jpg?r=r8645456" alt="koro sushine">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>koro sushine</strong><span class="title-user-comment title-member">Thành Viên</span>
                                                    <span class="time">2 Tháng Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> hmm </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="514816"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="514816" data-user="76245" data-replyname="koro sushine"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_514815 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://avatar.mangaqq.com/160x160/avatar_1581091133.jpg?r=r8645456" alt="koro sushine">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>koro sushine</strong><span class="title-user-comment title-member">Thành Viên</span>
                                                    <span class="time">2 Tháng Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> hmm </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="514815"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="514815" data-user="76245" data-replyname="koro sushine"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_493701 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://truyenqq.com/template/frontend/images/noavatar.png" alt="Truck-kun">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>Truck-kun</strong><span class="title-user-comment title-member">Thành Viên</span>
                                                    <span class="time">2 Tháng Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> Máy tuổi L ma dung chuy<br><img src="http://mangaqq.com/icon/onion/10.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/onion/10.gif?r=r8645456" class="emoji_comment" /><img src="http://mangaqq.com/icon/onion/10.gif?r=r8645456" class="emoji_comment" /> </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="493701"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="493701" data-user="118828" data-replyname="Truck-kun"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="info-comment child_479477 parent_0 comment-main-level">
                                    <div class="outsite-comment comment-main-level">
                                        <figure class="avartar-comment">
                                            <img src="http://avatar.mangaqq.com/160x160/avatar_1582609592.jpg?r=r8645456" alt="sakura x  li">
                                        </figure>
                                        <div class="item-comment">
                                            <div class="outline-content-comment">
                                                <div>
                                                    <strong>sakura x li</strong><span class="title-user-comment title-member">Thành Viên</span>
                                                    <span class="time">3 Tháng Trước</span>
                                                </div>
                                                <div class="content-comment">
                                                    <strong></strong> Có liêm sỉ ko vậy anh </div>
                                            </div>
                                            <div class="action-comment">
                                                <span class="like-comment" data-id="479477"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                                <span class="reply-comment" data-parent="0" data-id="479477" data-user="51606" data-replyname="sakura x  li"><i class="far fa-comment"></i> Trả lời</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="load-more load_more_comment"><a class="button is-info">Xem thêm nhiều bình luận</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="stop" class="scrollTop">
            <span><a href=""><img src="http://truyenqq.com/template/frontend/images/back-to-top-icon.png" /></a></span>
        </div>
</section>
<!-- /.main-content -->
<section class="story-see-footer has-background-white on">
  <div class="container">
    <div class="level">
      <div class="level-left">
        <ul class="list-01">
          <li>
            <a class="" href="home.php"
              ><i class="fas fa-home"></i>
              <span class="control-see">Trang chủ</span></a
            >
          </li>
          <li>
            <a class="" href="javascript:void(0);" id="faul"
              ><i class="fas fa-exclamation-circle"></i>
              <span class="control-see">Báo lỗi</span></a
            >
          </li>
        </ul>
      </div>
      <div class="center level">
        <div class="prev level-left">
          <a
            class="link-prev-chap"
            href="#"
            title="next chap ago"
            ><i class="fas fa-arrow-circle-left"></i
          ></a>
        </div>
        <select class="selectEpisode">
          <option value="chapchu.php?matruyen=<?php echo 1 ?>" selected
            >Chương 1</option
          >
          <option value="chapchu.php?matruyen=<?php echo 1 ?>"
            >Chương 2</option
          >
          <option value="chapchu.php?matruyen=<?php echo 1 ?>"
            >Chương 3</option
          >
          <option value="chapchu.php?matruyen=<?php echo 1 ?>"
            >Chương 4</option
          >
        </select>
        <div class="next level-right">
          <a class="link-next-chap" href="#"
            ><i class="fas fa-arrow-circle-right"></i
          ></a>
        </div>
      </div>
      <div class="level-right">
         <ul class="list-01">
          <li>
            <a class="" href="home.php"
              ><i class="fas fa-home"></i>
              <span class="control-see">Trang chủ</span></a
            >
          </li>
          <li>
            <a class="" href="javascript:void(0);" id="faul"
              ><i class="fas fa-exclamation-circle"></i>
              <span class="control-see">Báo lỗi</span></a
            >
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php include_once("footer.php"); ?>