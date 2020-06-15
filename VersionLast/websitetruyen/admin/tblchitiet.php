<?php include_once("header.php"); ?>
<?php
  include("Controller/Sanpham.class.php");
include("Controller/OrderDetail.class.php");
if (isset($_GET["mahoadon"])) {
    $danhsach = OrderDetail::XemChiTiet($_GET["mahoadon"]);
}

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
                <li>Hóa Đơn</li>
                <li>Chi tiết</li>
            </ul>
            <!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header" style="font-family: Arial, Helvetica, sans-serif;">
                <h1>
                    Bảng
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Hóa Đơn
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Chi tiết
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <a href="tblhoadon.php" class="btn btn-pink">Trở Lại</a>
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header" style="font-family: Arial, Helvetica, sans-serif;">
                                Danh sách chi tiết hóa đơn
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if ($danhsach) {
                                            foreach ($danhsach as $item) {
                                        ?>
                                                <tr>

                                                    <td>
                                                        <?php
                                                        $sanpham = SanphamMaster::ThongTin($item["ProductId"]);
                                                        $sanpham = reset($sanpham);
                                                        ?>
                                                        <img src="<?php echo "../".$sanpham["Anh"] ?>" alt="Image" width="75px" height="75px">
                                                    </td>
                                                    <td>
                                                        <?php echo $sanpham["TenSanpham"]; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $item["Quantity"]; ?>
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