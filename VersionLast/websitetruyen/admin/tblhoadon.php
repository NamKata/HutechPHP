<?php include_once("header.php"); ?>
<?php
include("Controller/Order.class.php");
$danhsach = OrderMaster::Danhsach();
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
                <li class="active">Hóa Đơn</li>
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
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <?php
                      if (isset($_GET['success'])){
                    ?>
                    <div class="alert alert-success"> Xóa thành công</div>
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
                                Danh sách hóa đơn
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Hóa Đơn</th>
                                            <th>Phương Thức Thanh Toán</th>
                                            <th>Tình Trạng</th>
                                            <th>Số Tiền</th>
                                            <th>Người Mua</th>
                                            <th>Ngày Mua</th>
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
                                                        <?php echo "Hóa Đơn #00".$item["OrderId"] ?>
                                                    </td>
                                                     <td width="150px">
                                                        <?php if($item["Phuongthucthanhtoan"]=="1")
                                                        {
                                                            echo "No";
                                                        } else{
                                                             echo "Paypal";
                                                        } ?>
                                                    </td>
                                                      <td>  <?php if($item["Status"]=="1")
                                                        {
                                                            echo "Đã thanh toán";
                                                        } else{
                                                             echo "Chưa thanh toán";
                                                        } ?></td>
                                                     <td>
                                                        <?php  echo number_format($item["Sotien"]);?>
                                                    </td>
                                                  
                                                    <td> <?php
                                                    $nguoimua = UserMaster::ThongTin($item["UserId"]);
                                                    $nguoimua = reset($nguoimua);
                                                   
                                                     ?>
                                                     <?php  echo $nguoimua["HoTen"] ?>
                                                     </td>
                                                      <td>
                                                        <?php echo $item["Ngaytao"] ?>
                                                    </td>
                                                    <td width="150px">
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a class="green" href="tblchitiet.php?mahoadon=<?php echo $item["OrderId"] ?>">
                                                                <i class="ace-icon fa fa-eye bigger-130"></i>
                                                            </a>
                                                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                            <a class="red" href="delete.php?mahoadon=<?php echo $item["OrderId"] ?>">
                                                                <i class="ace-icon fa fa-trash bigger-130"></i>
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