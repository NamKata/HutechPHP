<?php include_once("header.php"); ?>
<?php
include("Controller/Manga.class.php");
$danhsach = MangaMaster::DanhsachManga();
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb" style="font-family: Arial, Helvetica, sans-serif;">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="index.php">Trang Chủ</a>
                </li>
                <li>
                    Bảng
                </li>
                <li class="active">Kích/ Hủy Truyện</li>
            </ul>
            <!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header" style="font-family: Arial, Helvetica, sans-serif;">
                <h1>
                    Bảng
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                       Kích/ Hủy Truyện
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <?php 
                    if (isset($_GET['success'])){
                    ?>
                    <div class="alert alert-success"> Cập nhập truyện thành công</div>
                    <?php }?>
                       <?php 
                    if (isset($_GET['404'])){
                    ?>
                    <div class="alert alert-success"> Lỗi</div>
                    <?php }?>
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header" style="font-family: Arial, Helvetica, sans-serif;">
                                Danh sách truyện
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Truyện</th>
                                            <th>Nhóm Truyện</th>
                                            <th>Thể loại</th>
                                            <th>Tình Trạng</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if ($danhsach) {
                                            foreach ($danhsach as $item) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo "../". $item["Anh"]?>" width="75px" height="75px">
                                                    </td>
                                                    <td>
                                                        <?php echo $item["TenManga"] ?>
                                                    </td>
                                                     <td>
                                                        <?php if($item["KieuTruyen"] == "1")
                                                        {
                                                            echo "Truyện Tranh";
                                                        }else{
                                                            echo "Truyện Chữ";
                                                        } ?>
                                                    </td>
                                                    <td> <?php 
                                                    $theloai = MangaMaster::Theloaicuatruyen($item["IdManga"]);
                                                    foreach($theloai as $theloai)
                                                    {
                                                    ?>
                                                    <span class="label label-sm label-info arrowed arrowed-righ">
                                                        <?php echo $theloai["TenTheloai"] ?>
                                                    </span>
                                                    <?php } ?> </td>
                                                    <td>   <?php if($item["TinhTrang"] == "1")
                                                        {
                                                            echo "Kích hoạt";
                                                        }else{
                                                            echo "Chưa";
                                                        } ?></td>
                                                    <td width="150px">
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                             <?php if($item["TinhTrang"] == "1")
                                                        {
                                                          ?>
                                                            <a class="blue" href="status.php?matruyen=<?php echo $item["IdManga"] ?>">
                                                                <i class="ace-icon fa fa-thumbs-down bigger-130"></i>
                                                            </a>
                                                          <?php  } else {?>
                                                           <a class="green" href="status.php?matruyen=<?php echo $item["IdManga"] ?>">
                                                                <i class="ace-icon fa fa-thumbs-up bigger-130"></i>
                                                            </a>
                                                          <?php } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <a class="blue" href="kichhuychuong.php?matruyen=<?php echo $item["IdManga"] ?>">
                                                                <i class="ace-icon fa fa-list-ol bigger-130"></i>
                                                            </a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>

                                            <tr>
                                                <td colspan="7" class="text-center bg-warning">Không có dữ liệu</td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.page-content -->
        <!-- /.page-content -->
    </div>
</div>
<!-- /.main-content -->
<?php
include_once("footer.php");
?>