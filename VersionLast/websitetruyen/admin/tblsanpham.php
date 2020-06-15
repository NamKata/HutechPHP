<?php include_once("header.php"); ?>
<?php
include("Controller/Sanpham.class.php");
$danhsach = SanphamMaster::Danhsachsanpham();
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
                <li class="active">Sản phẩm</li>
            </ul>
            <!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header" style="font-family: Arial, Helvetica, sans-serif;">
                <h1>
                    Bảng
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Sản phẩm
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <a href="addsanpham.php" id="addchap" class="btn btn-primary">
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
                                Danh sách sản phẩm
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên Sản phẩm</th>
                                            <th>Nội dung</th>
                                            <th>Giá</th>
                                            <th>Ngày Tạo</th>
                                            <th>Lượt Tạo</th>
                                            <th>Ảnh</th>
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
                                                        <?php echo $item["TenSanpham"] ?>
                                                    </td>
                                                     <td width="150px">
                                                        <?php echo htmlspecialchars_decode($item["Noidung"])  ?>
                                                    </td>
                                                     <td>
                                                        <?php  echo number_format($item["Gia"]);?>
                                                    </td>
                                                    <td> <?php echo $item["NgayTao"] ?></td>
                                                    <td> <?php echo $item["LuotDang"] ?></td>
                                                      <td>
                                                        <img src="<?php echo "../". $item["Anh"]?>" width="75px" height="75px">
                                                    </td>
                                                    <td width="150px">
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a class="green js-update-group" href="addsanpham.php?edit=<?php echo $item["ProductId"] ?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            |
                                                            <a class="red js-delete-group" href="addsanpham.php?xoa=<?php echo $item["ProductId"] ?>">
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