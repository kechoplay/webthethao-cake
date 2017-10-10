<?php
/**
 * @var \App\View\AppView $this
 */
$total = 0;
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết hóa đơn
                    <small>Danh sách</small>
                </h1>
            </div>
            <div class="alert alert-block alert-error fade in"
                 style="display:<?php echo isset($error['xoa']) ? "block" : "none" ?>;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo isset($error['xoa']) ? $error['xoa'] : "" ?>
            </div>
            <!-- /.col-lg-12 -->
            <p>
            <h2 style="text-align:center;">Chi tiết hóa đơn</h2></p>
            Tên khách hàng : <span><strong><?= $hoadonchitiet[0]['hoadon']['name']; ?></strong></span><br>
            Địa chỉ : <span><strong><?= $hoadonchitiet[0]['hoadon']['address']; ?></strong></span><br>
            Điện thoại : <span><strong><?= $hoadonchitiet[0]['hoadon']['mobile']; ?></strong></span><br>
            <style type="text/css">
                th, td {
                    border: 1px thin #000000;
                    padding: 5px;
                }
            </style>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Tên mặt hàng</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Giảm giá</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($hoadonchitiet as $key => $value) : ?>
                    <tr>
                        <td><?= $value['sanpham']['pro_name']; ?></td>
                        <td><?= $value['number']; ?></td>
                        <td><?= number_format($value['price']); ?></td>
                        <td><?= number_format($value['pro_discount']); ?></td>
                        <td><?= number_format($value['number'] * $value['price']); ?></td>
                    </tr>
                    <?php $total += $value['number'] * $value['price']; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4">Tổng tiền</td>
                    <td><?php echo number_format($total); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>