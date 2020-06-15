<?php include_once("header.php"); ?>
<?php
// include("Controller/User.class.php");
$danhsach = UserMaster::DanhsachNguoidung();
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
                <li class="active">Người Dùng</li>
            </ul>
            <!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header" style="font-family: Arial, Helvetica, sans-serif;">
                <h1>
                    Bảng
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Người Dùng
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <a href="addnguoidung.php" id="addchap" class="btn btn-primary">
                        Tạo mới 
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
                                Danh sách người dùng
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tài Khoản</th>
                                            <th>Email</th>
                                            <th>Họ và Tên</th>
                                            <th>Ngày Sinh</th>
                                            <th>Sđt</th>
                                            <th>Địa chỉ</th>
                                            <th>Giới Tính</th>
                                            <th>Số lượt tạo</th>
                                            <th>Ảnh</th>
                                            <th>
                                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                Ngày Tạo
                                            </th>
                                            <th>
                                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                Đăng nhập lần cuối
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
                                                        <?php echo $item["Username"] ?>
                                                    </td>
                                                     <td>
                                                        <?php echo $item["Email"] ?>
                                                    </td>
                                                     <td>
                                                        <?php echo $item["HoTen"] ?>
                                                    </td>
                                                    <td> <?php echo $item["NgaySinh"] ?></td>
                                                    <td> <?php echo $item["Sdt"] ?></td>
                                                    <td> <?php echo $item["DiaChi"] ?></td>
                                                    <td> <?php if($item["GioiTinh"]=="0")
                                                    {
                                                        echo "Nam";
                                                    }else{
                                                        echo "Nữ";
                                                    } ?>
                                                    </td>
                                                     <td> <?php echo $item["SoluotTao"] ?></td>
                                                     <td> <img src="<?php echo  "../".$item["Anh"] ?>" width="75px" height="75px"> </td>
                                                     <td> <?php echo $item["NgayDangKy"] ?></td>
                                                     <td> <?php echo $item["DangNhapLanCuoi"] ?></td>
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <!-- <a class="blue" href="#">
                                                                <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                            </a>
                                                            | -->
                                                            <a class="green js-update-group" href="addnguoidung.php?edit=<?php echo $item["IdUser"] ?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            |
                                                            <a class="red js-delete-group" href="addnguoidung.php?xoa=<?php echo $item["IdUser"] ?>">
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