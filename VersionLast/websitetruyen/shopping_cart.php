<?php
include("Controller/Product.class.php");
include("Controller/Order.class.php");
include("Controller/Order_detail.class.php");
?>
<?php
include_once("header.php");

error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_GET["id"])) {
    $pro_id = $_GET["id"];
    $was_found = false;
    $i = 0;
    if (!isset($_SESSION["cart_items"]) || count($_SESSION["cart_items"]) < 1) {
        $_SESSION["cart_items"] = array(0 => array("pro_id" => $pro_id, "quantity" => 1));
    } else {
        foreach ($_SESSION["cart_items"] as $item) {
            $i++;
            while (list($key, $value) = each($item)) {
                if ($key == "pro_id" && $value == $pro_id) {
                    array_splice($_SESSION["cart_items"], $i - 1, 1, array(array("pro_id" => $pro_id, "quantity" => $item["quantity"] + 1)));
                    $was_found = true;
                }
            }
        }
        if ($was_found == false) {
            array_push($_SESSION["cart_items"], array("pro_id" => $pro_id, "quantity" => 1));
        }
    }
    header("location: shopping_cart.php");
}
?>
<style>
</style>
<section class="main-content">
    <div class="container story-list">
        <div class="title-list">Thông tin giỏ hàng</div>

        <?php
        if (isset($_GET["error"])) {
            echo '  <div class="alert alert-danger">Thất bại</div>';
        }
          if (isset($_GET["error1"])) {
            echo '  <div class="alert alert-danger">Tạo hóa đơn thất bại/div>';
        }
        if (isset($_GET["success"])) {
            echo ' <div class="alert alert-success">Thành công</div>';
        }
        ?>
        <form action="" method="post">
            <table class="table table-container">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <!-- <th></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_money = 0;
                    $soluot =0;
                    if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0) {
                        foreach ($_SESSION["cart_items"] as $item) {
                            $id = $item["pro_id"];
                            $product = Product::ThongtinProduct($id);
                            $prod = reset($product);
                            $soluong = $item["quantity"];
                            $soluot += $item["quantity"] * $prod["LuotDang"];
                            $total_money += $item["quantity"] * $prod["Gia"];
                    ?>
                            <tr>
                                <td><?php echo $prod["TenSanpham"] ?></td>
                                <td><img src="<?php echo $prod["Anh"] ?>" alt="Image" width="150" height="150"></td>
                                <td> <input id="Soluong" name="quantity" type="number" value="<?php echo $soluong ?>" min="1" max="100"/>
                                </td>
                                <td><?php echo number_format($prod["Gia"]) ?> đ</td>
                                <td><?php echo number_format($item["quantity"] * $prod["Gia"]) ?>đ</td>
                                <!-- <td><button type="button" name="Xoa" id="XoaSanpham"><i class="fas fa-trash"></i></button></td> -->
                            </tr>

                        <?php } ?>
                        <tr>
                            <td colspan="5">
                                <p class="text-right">Tổng Tiền: <?php echo number_format($total_money) ?>đ</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="text-right"><button type="button" class="btn btn-danger" onclick="location.href='mualuotdang.php'">Tiếp tục mua</button></p>
                            </td>
                            <td colspan="2">
                                <p class="text-right"><button type="submit" name="Thanhtoan" class="btn btn-danger">Thanh toán</button></p>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>

    </div>
</section>
<script>
$("#Soluong").change(function(){
    if($(this).val() <= 0)
    {
        $(this).val("1");
    }
})
</script>
<?php

if (isset($_POST['Thanhtoan'])) {
    $IdUser = $_SESSION['user'];
    $PhuongThucThanhToan = "1";
    $Status = "0";
    $OrderId = Order::TaoMoiHoaDon($IdUser, $PhuongThucThanhToan, $Status, $total_money);
   
    foreach($_SESSION["cart_items"] as $item)
    {
        $id = $item["pro_id"];
        $soluong = $item["quantity"];
        $chitiet = OrderDetail::TaoMoiChiTietHoaDon($OrderId, $id, $soluong);
    }
    if (!$chitiet) {
        header("Location: shopping_cart.php?error1");
    } else {
        $updatesoluot = User::CapnhapSoluotTao($IdUser,$soluot);
        if(!$updatesoluot)
        {
            header("Location: shopping_cart.php?error");
        }
        else
        {
            unset($_SESSION['cart_items']);
            header("Location: shopping_cart.php?success");
        }
    }
}
?>

<?php
include_once("footer.php");
?>