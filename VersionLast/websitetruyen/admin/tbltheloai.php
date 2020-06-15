<?php include_once("header.php"); ?>
<?php
include("Controller/Theloai.class.php");
$danhsach = TheloaiMaster::DanhsachTheloai();
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
                <li class="active">Thể loại Truyện</li>
            </ul>
            <!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header" style="font-family: Arial, Helvetica, sans-serif;">
                <h1>
                    Bảng
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Thể loại Truyện
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <a href="addtheloai.php" id="addchap" class="btn btn-primary">
                        Tạo Mới Nhóm
                    </a>
                    <?php 
                    if (isset($_GET['success'])){
                    ?>
                    <div class="alert alert-success"> Tạo Mới Thành Công</div>
                    <?php }?>
                    <?php 
                    if (isset($_GET['update'])){
                    ?>
                    <div class="alert alert-success"> Cập Nhập Thành Công</div>
                    <?php }?>
                     <?php 
                    if (isset($_GET['notxoa'])){
                    ?>
                    <div class="alert alert-warning"> Không Được Phép Xóa , Nhóm người dùng có sở hữu tài khoản người dùng</div>
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
                                Danh sách thể loại truyện
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên Thể loại</th>
                                            <th>Đường dẫn</th>
                                            <th>Nội dung</th>
                                            <th>
                                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                Ngày Tạo
                                            </th>
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
                                                        <?php echo $item["TenTheloai"] ?>
                                                    </td>
                                                     <td>
                                                        <?php echo $item["Slug"] ?>
                                                    </td>
                                                     <td>
                                                        <?php echo $item["Content"] ?>
                                                    </td>
                                                    <td> <?php echo $item["NgayTao"] ?></td>
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <!-- <a class="blue" href="#">
                                                                <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                            </a>
                                                            | -->
                                                            <a class="green js-update-group" href="addtheloai.php?edit=<?php echo $item["IdTheloai"] ?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            |
                                                            <a class="red js-delete-group" href="addtheloai.php?xoa=<?php echo $item["IdTheloai"] ?>">
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