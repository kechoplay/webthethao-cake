<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
        <li class="active"> GIỎ HÀNG</li>
    </ul>
    <h3> GIỎ HÀNG [ <small><?= $countCart ?> Sản phẩm</small> ]
        <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'index']) ?>"
           class="btn btn-large pull-right">
            <i class="icon-arrow-left"></i> Tiếp tục mua hàng
        </a>
    </h3>
	<hr class="soft"/>
    <table class="table table-bordered">
        <tr>
            <th> TÔI SẴN SÀNG ĐĂNG NHẬP</th>
        </tr>
        <tr>
            <td>
                <!-- <form class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="inputUsername">Tên dăng nhập</label>
                        <div class="controls">
                            <input type="text" id="inputUsername" name="inputUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword">Mật khẩu</label>
                        <div class="controls">
                            <input type="password" id="inputPassword" name="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="login" class="btn">Đăng nhập</button>
                            HOẶC <a href="register.php" class="btn">Đăng ký ngay!</a>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <a href="forgetpass.php" style="text-decoration:underline">Quên mật khẩu ?</a>
                        </div>
                    </div>
                </form> -->
            </td>
        </tr>
    </table>
	<form id="form-cart">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Product</th>
					<th>Description</th>
					<th>Quantity/Delete</th>
					<th>Price</th>
					<th>Discount</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$total=0;
				$totaldiscount=0;
				$totalall=0;
				?>
				<?php if(isset($mycart)): ?>
					<?php foreach ($mycart as $key => $value) :?>
						<tr>
                            <input type="hidden" name="proid" value="<?= $value['id']; ?>">
                            <td><?= $this->Html->image('/img/' . $value['image'], ['width' => '60']) ?></td>
                            <td><?= $value['name']; ?><br/></td>
                            <td>
                                <div class="input-append">
                                    <input class="span1" style="max-width:34px" placeholder="1"
                                           id="appendedInputButtons"
                                           onkeypress="return numberOnly(this, event);" size="16"
                                           name="num[<?= $value['id']; ?>]" type="text" value="<?= $value['sl']; ?>">
                                    <a href="<?= $this->Url->build(['action' => 'delcart', $value['id']]) ?>">
                                        <button class="btn btn-danger" type="button" onclick="return xacnhanxoa();"
                                                name="del">
                                            <i class="icon-remove icon-white"></i>
                                        </button>
                                    </a>
                                    <input type="hidden" value="<?= $value['quantity']; ?>" name="quan"/>
                                </div>
                            </td>
                            <td><?= number_format($value['price']); ?></td>
                            <td><?= number_format($value['discount'] * $value['sl']); ?></td>
                            <td><?= number_format($value['price'] * $value['sl']); ?></td>
						</tr>

                        <?php
                        $total += $value['price'] * $value['sl'];
                        $totaldiscount += $value['discount'] * $value['sl'];
                        $totalall = $total - $totaldiscount;
                        ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Không có sản phẩm trong giỏ hàng</td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="6"><input type="button" name="capnhat" id="capnhat" value="Cập nhật giỏ hàng"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right">Total Price:</td>
                    <td> <?php echo number_format($total); ?></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right">Total Discount:</td>
                    <td> <?php echo number_format($totaldiscount); ?></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right"><strong>TOTAL
                            (<?= number_format($total) . " - " . number_format($totaldiscount); ?>) =</strong></td>
                    <td class="label label-important" style="display:block">
                        <strong> <?php echo number_format($totalall);
                            $_SESSION['total'] = $totalall; ?> </strong></td>
                </tr>
			</tbody>
		</table>
	</form>
    <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'index']) ?>" class="btn btn-large"><i
                class="icon-arrow-left"></i> Continue Shopping </a>
    <a href="payment.php" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
    <h4 class="pull-right">Bạn hãy đăng nhập để được thanh toán</h4>
</div>
<script type="text/javascript">
    function numberOnly(myfield, e) {
        var key, keychar;
        if (window.event) {
            key = window.event.keyCode
        } else if (e) {
            key = e.which
        } else {
            return true
        }
        keychar = String.fromCharCode(key);
        if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
            return true
        } else if (("0123456789").indexOf(keychar) > -1) {
            return true
        }
        return false;
    }
    function xacnhanxoa() {
        if (window.confirm("Bạn có muốn xóa k?")) {
            return true;
        }
        return false;
    }
    jQuery(document).ready(function () {
        $('#capnhat').click(function () {
            console.log($('#form-cart').serialize());
            $.ajax({
                type: 'post',
                url: 'cart/update',
                data: $('#form-cart').serialize(),
                success: function (data) {
                    var data = JSON.parse(data);
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                }
            });
        });
    })
</script>

