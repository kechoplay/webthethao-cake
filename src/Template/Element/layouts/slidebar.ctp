<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                <div class="well well-small">
                    <a id="myCart" href="cart.php">
                        <?= $this->Html->image('ico-cart.png', ["alt" => "cart"]) ?> <span id="cart"><?= $countCart ?></span> sản phẩm trong giỏ hàng
                    </a>
                </div>
                <ul id="sideManu" class="nav nav-tabs nav-stacked">
                    <?php foreach ($collection->nest('cat_id', 'parent_id')->toArray() as $categories): ?>
                        <?php if ($categories->children): ?>
                            <li class="subMenu open"><a><?= $categories->cat_name ?> </a>
                                <ul>
                                    <?php foreach ($categories->children as $key => $category): ?>
                                        <li>
                                            <a class="active"
                                               href="<?= $this->Url->build(['controller' => 'danhmuc', 'action' => 'view', $category->cat_id]) ?>">
                                                <i class="icon-chevron-right"></i><?= $category->cat_name ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li><a><?= $categories->cat_name ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <br/>
                <?php
                foreach ($randomproduct as $value):
                    ?>
                    <div class="thumbnail">
                        <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                            <?= $this->Html->image($value['pro_image'], [
                                "alt" => "tungshop.esy.es"
                            ])
                            ?>
                        </a>
                        <div class="caption">
                            <h5><?= $value['pro_name'] ?></h5>
                            <h4 style="text-align:center">
                                <a class="btn"
                                   href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                    <i class="icon-zoom-in"></i>
                                </a>
                                <a class="btn" href="javascript:void(0)" onclick="addcart(<?= $value->pro_id ?>)">Add to
                                    <i class="icon-shopping-cart"></i>
                                </a>
                                <?php
                                if ($value['pro_discount'] == 0) {
                                    ?>
                                    <a class="btn btn-primary"
                                       href="#"><?= number_format($value['pro_price']); ?></a>
                                    <?php
                                } else {
                                    ?>
                                    <a class="btn btn-primary"
                                       href="#"><?= number_format($value['pro_price'] - $value['pro_discount']); ?>
                                    </a>
                                    <a class="btn btn-primary" style="text-decoration:line-through;"
                                       href="#"><?= number_format($value['pro_price']); ?>
                                    </a>
                                    <?php
                                }
                                ?>
                            </h4>
                        </div>
                    </div>
                    <br/>
                    <?php
                endforeach;
                ?>
            </div>