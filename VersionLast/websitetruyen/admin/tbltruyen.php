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
                <li class="active">Truyện</li>
            </ul>
            <!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header" style="font-family: Arial, Helvetica, sans-serif;">
                <h1>
                    Bảng
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Truyện
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <a href="addmanga.php" id="addchap" class="btn btn-primary">
                        Tạo mới 
                    </a>
                    <?php 
                    if (isset($_GET['success'])){
                    ?>
                    <div class="alert alert-success"> Tạo Mới Thành Công</div>
                    <?php }?>
                       <?php 
                    if (isset($_GET['404'])){
                    ?>
                    <div class="alert alert-success"> Lỗi</div>
                    <?php }?>
                      <?php 
                    if (isset($_GET['huy'])){
                    ?>
                    <div class="alert alert-success"> Hủy Kích Hoạt Truyện</div>
                    <?php }?>
                    <?php 
                    if (isset($_GET['update'])){
                    ?>
                    <div class="alert alert-success"> Cập Nhập Thành Công</div>
                    <?php }?>
                     <?php 
                    if (isset($_GET['notxoa'])){
                    ?>
                    <div class="alert alert-warning"> Không Được Phép Xóa </div>
                    <?php }?>
                      <?php 
                    if (isset($_GET['xoa'])){
                    ?>
                    <div class="alert alert-success"> Xóa Thành Công</div>
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
                                            <th>Giới thiệu</th>
                                            <th>Nhóm Truyện</th>
                                            <th>Thể loại</th>
                                            <th>Tác Giả</th>
                                            <th>Người dịch</th>
                                            <th>Ngày Tạo</th>
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
                                                     <td width="150px">
                                                        <?php echo htmlspecialchars_decode($item["GioiThieu"])  ?>
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
                                                    <td> <?php echo $item["Tacgia"] ?></td>
                                                    <td> <?php echo $item["NguoiDich"] ?></td>
                                                     <td> <?php echo $item["NgayTao"] ?></td>
                                                    <td width="150px">
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a class="blue" href="tblchuong.php?matruyen=<?php echo $item["IdManga"] ?>">
                                                                <i class="ace-icon fa fa-list-ol bigger-130"></i>
                                                            </a>
                                                            |
                                                            <a class="green js-update-group" href="addmanga.php?edit=<?php echo $item["IdManga"] ?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            |
                                                            <a class="red js-delete-group" href="addmanga.php?xoa=<?php echo $item["IdManga"] ?>">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        </div>
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