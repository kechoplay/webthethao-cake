<div class="span9">
    <h4>Sản phẩm mới nhất </h4>
    <ul class="thumbnails">
        <?php foreach ($newproduct as $value): ?>
            <li class="span3">
                <div class="thumbnail">
                    <div class="tag1"><img src="img/new2.png"/></div>
                    <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value->pro_id]) ?>">
                        <?= $this->Html->image($value->pro_image) ?>
                    </a>
                    <div class="caption">
                        <h5><?= $value->pro_name ?></h5>
                        <h4 style="text-align:center">
                            <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value->pro_id]) ?>"
                               class="btn">
                                <i class="icon-zoom-in"></i>
                            </a>
                            <a class="btn" href="javascript:void(0)" onclick="addcart(<?= $value->pro_id ?>)"
                               id="addcart">Add to
                                <i class="icon-shopping-cart"></i>
                            </a>
                            <?php if ($value['pro_discount'] == 0) : ?>
                                <a class="btn btn-primary"
                                   href="#"><?php echo number_format($value['pro_price']); ?></a>
                            <?php else: ?>
                                <a class="btn btn-primary"
                                   href="#"><?php echo number_format($value['pro_price'] - $value['pro_discount']); ?> </a>
                                <a class="btn btn-primary" style="text-decoration:line-through;"
                                   href="#"><?php echo number_format($value['pro_price']); ?> </a>
                            <?php endif; ?>
                        </h4>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <h4>Sản phẩm bán chạy nhất </h4>
    <ul class="thumbnails">
        <?php foreach ($bestbuyproduct as $value): ?>
            <li class="span3">
                <div class="thumbnail">
                    <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value->pro_id]) ?>">
                        <?= $this->Html->image($value->pro_image) ?>
                    </a>
                    <div class="caption">
                        <h5><?= $value->pro_name ?></h5>
                        <h4 style="text-align:center">
                            <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value->pro_id]) ?>"
                               class="btn">
                                <i class="icon-zoom-in"></i>
                            </a>
                            <a class="btn" href="addcart.php?proid=">Add to
                                <i class="icon-shopping-cart"></i>
                            </a>
                            <?php
                            if ($value['pro_discount'] == 0) {
                                ?>
                                <a class="btn btn-primary"
                                   href="#"><?php echo number_format($value['pro_price']); ?></a>
                                <?php
                            } else {
                                ?>
                                <a class="btn btn-primary"
                                   href="#"><?php echo number_format($value['pro_price'] - $value['pro_discount']); ?>
                                </a>
                                <a class="btn btn-primary" style="text-decoration:line-through;"
                                   href="#"><?php echo number_format($value['pro_price']); ?>
                                </a>
                            <?php } ?>
                        </h4>
                    </div>
                </div>
            </li>
            <?php
        endforeach;
        ?>
    </ul>
    <h4>Sản phẩm xem nhiều nhất </h4>
    <ul class="thumbnails">
        <?php foreach ($bestviewproduct as $value): ?>
            <li class="span3">
                <div class="thumbnail">
                    <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value->pro_id]) ?>">
                        <?= $this->Html->image($value->pro_image) ?>
                    </a>
                    <div class="caption">
                        <h5><?= $value->pro_name ?></h5>
                        <h4 style="text-align:center">
                            <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value->pro_id]) ?>"
                               class="btn">
                                <i class="icon-zoom-in"></i>
                            </a>
                            <a class="btn" href="addcart.php?proid=">Add to
                                <i class="icon-shopping-cart"></i>
                            </a>
                            <?php
                            if ($value['pro_discount'] == 0) {
                                ?>
                                <a class="btn btn-primary"
                                   href="#"><?php echo number_format($value['pro_price']); ?></a>
                                <?php
                            } else {
                                ?>
                                <a class="btn btn-primary"
                                   href="#"><?php echo number_format($value['pro_price'] - $value['pro_discount']); ?>
                                </a>
                                <a class="btn btn-primary" style="text-decoration:line-through;"
                                   href="#"><?php echo number_format($value['pro_price']); ?>
                                </a>
                            <?php } ?>
                        </h4>
                    </div>
                </div>
            </li>
            <?php
        endforeach;
        ?>
    </ul>
    <div id="cart"></div>
</div>
<script>
    //    $(document).ready(function () {
    function addcart(id) {
        $(document).ready(function () {
            alert(id);
            $.ajax({
                type: 'POST',
                url: 'hoadon/addcart',
                data: id,
                success: function (data) {
                    $('#cart').append(data);
                }
            });
        });
    }
    //    })
</script>