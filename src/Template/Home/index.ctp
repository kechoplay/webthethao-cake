<div class="span9">
    <h4>Sản phẩm mới nhất </h4>
    <ul class="thumbnails">
        <?php
        foreach ($newproduct as $value):
            ?>
            <li class="span3">
                <div class="thumbnail">
                    <div class="tag1"><img src="img/new2.png"/></div>
                    <a href="product_details.php?proid=<?= $value->pro_id ?>&catid=<?= $value->cat_id ?>">
                        <img src="img/<?= $value->pro_image ?>" alt=""/>
                    </a>
                    <div class="caption">
                        <h5><?= $value->pro_name ?></h5>
                        <h4 style="text-align:center">
                            <a href="product_details.php?proid=<?= $value->pro_id ?>&catid=<?= $value->cat_id ?>">
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
        <?php endforeach; ?>
    </ul>
    <h4>Sản phẩm bán chạy nhất </h4>
    <ul class="thumbnails">
        <?php
        foreach ($bestbuyproduct as $value):
            ?>
            <li class="span3">
                <div class="thumbnail">
                    <a href="product_details.php?proid=<?= $value->pro_id ?>&catid=<?= $value->cat_id ?>">
                        <img src="img/<?= $value->pro_image ?>" alt=""/>
                    </a>
                    <div class="caption">
                        <h5><?= $value->pro_name ?></h5>
                        <h4 style="text-align:center">
                            <a href="product_details.php?proid=<?= $value->pro_id ?>&catid=<?= $value->cat_id ?>">
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

        <?php
        foreach ($bestviewproduct as $value):
            ?>
            <li class="span3">
                <div class="thumbnail">
                    <a href="product_details.php?proid=<?= $value->pro_id ?>&catid=<?= $value->cat_id ?>">
                        <img src="img/<?= $value->pro_image ?>" alt=""/>
                    </a>
                    <div class="caption">
                        <h5><?= $value->pro_name ?></h5>
                        <h4 style="text-align:center">
                            <a href="product_details.php?proid=<?= $value->pro_id ?>&catid=<?= $value->cat_id ?>">
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
</div>