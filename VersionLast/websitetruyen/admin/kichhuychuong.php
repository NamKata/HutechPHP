<?php include_once("header.php"); ?>
<?php
include("Controller/Chap.class.php");
if(isset($_GET["matruyen"]))
{
    $matruyen = $_GET["matruyen"];
    $danhsach = ChapMaster::Chapcuatruyen($matruyen);
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
                <li>Kích/Hủy Truyện</li>
                <li class="active">Kích/Hủy Chương </li>
            </ul>
            <!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <div class="page-header" style="font-family: Arial, Helvetica, sans-serif;">
                <h1>
                    Bảng
                    <small>Kích/Hủy Truyện</small>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Kích/Hủy Chương
                    </small>
                </h1>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <?php 
                    if (isset($_GET['success'])){
                    ?>
                    <div class="alert alert-success"> Cập nhập thành công</div>
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
                                Danh sách Kích/Hủy Chương
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Stt</th>
                                            <th>Tên Chương</th>
                                            <th>Tình Trạng</th>
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
                                                        <?php echo $item["SttChap"] ?>
                                                    </td>
                                                     <td width="150px">
                                                        <?php echo $item["TenChap"]  ?>
                                                    </td>
                                                     <td>
                                                        <?php if($item["TinhTrang"] == "1")
                                                        {
                                                            echo "Kích Hoạt";
                                                        }else{
                                                            echo "Chưa";
                                                        } ?>
                                                    </td>
                                                     <td> <?php echo $item["NgayTao"] ?></td>
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                                 <?php if($item["TinhTrang"] == "1")
                                                        {
                                                          ?>
                                                            <a class="blue" href="status1.php?machap=<?php echo $item["IdChapter"] ?>">
                                                                <i class="ace-icon fa fa-thumbs-down bigger-130"></i>
                                                            </a>
                                                          <?php  } else {?>
                                                           <a class="green" href="status1.php?machap=<?php echo $item["IdChapter"] ?>">
                                                                <i class="ace-icon fa fa-thumbs-up bigger-130"></i>
                                                            </a>
                                                          <?php } ?>
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