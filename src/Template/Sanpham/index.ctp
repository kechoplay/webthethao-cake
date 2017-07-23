<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?= $this->Url->build('/')?>">Trang chủ</a> <span class="divider">/</span></li>
        <li><a href="<?= $this->Url->build('/sanpham')?>">Sản phẩm</a> <span class="divider">/</span></li>
        <li class="active">Tất cả sản phẩm</li>
    </ul>
    <h3>
        Tất cả sản phẩm
        <small class="pull-right"> <?= ($countsanpham); ?> sản phẩm có sẵn</small>
    </h3>
    <hr class="soft"/>
    <div id="myTab" class="pull-right" style="margin-bottom:20px;">
        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i
                        class="icon-th-large"></i></span></a>
    </div>
    <br class="clr"/>
    <div class="tab-content">
        <div class="tab-pane" id="listView">
            <?php
            foreach ($sanpham as $key => $value) {
                ?>
                <div class="row">
                    <div class="span2">
                        <div class="tag1"></div>
                        <?= $this->Html->image('../img/' . $value["pro_image"]) ?>
                    </div>
                    <div class="span4">
                        <h3>Có sẵn</h3>
                        <hr class="soft"/>
                        <h5><?= $value['pro_name']; ?> </h5>
                        <p>

                        </p>
                        <a class="btn btn-small pull-right"
                           href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                            View Details
                        </a>
                        <br class="clr"/>
                    </div>
                    <div class="span3 alignR">
                        <form class="form-horizontal qtyFrm">
                            <?php
                            if ($value['pro_discount'] == 0) {
                                ?>
                                <h3><?= number_format($value['pro_price']); ?> VNĐ </h3>
                                <?php
                            } else {
                                ?>
                                <h3><?= number_format($value['pro_price'] - $value['pro_discount']); ?> VNĐ </h3>
                                <h4 style="text-decoration:line-through;"><?= number_format($value['pro_price']); ?>
                                    VNĐ</h4>
                                <?php
                            }
                            ?>
                            <br/>
                            <?php
                            if ($value['pro_quantity'] > 0) {
                                ?>
                                <a href="javascript:void(0)" onclick="addcart(<?= $value->pro_id ?>)"
                                   class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                <?php
                            } else {
                                ?>
                                <a class="btn btn-large btn-primary"> Hết hàng</i></a>
                                <?php
                            }
                            ?>
                            <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>"
                               class="btn btn-large"><i class="icon-zoom-in"></i></a>

                        </form>
                    </div>
                </div>
                <hr class="soft"/>
                <?php
            }
            ?>

        </div>

        <div class="tab-pane active" id="blockView">
            <ul class="thumbnails">
                <?php
                foreach ($sanpham as $key => $value) {
                    ?>
                    <li class="span3">
                        <div class="thumbnail">
                            <div class="tag"></div>
                            <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                <?= $this->Html->image('../img/' . $value["pro_image"]) ?>
                            </a>
                            <div class="caption">
                                <h5><?php echo $value['pro_name']; ?></h5>
                                <p>

                                </p>
                                <h4 style="text-align:center">
                                    <a class="btn"
                                       href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>
                                    <?php
                                    if ($value['pro_quantity'] > 0) {
                                        ?>
                                        <a class="btn" href="javascript:void(0)" onclick="addcart(<?= $value->pro_id ?>)">Add to
                                            <i class="icon-shopping-cart"></i>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn"> Hết hàng</i></a>
                                        <?php
                                    }
                                    ?>
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
                                    <?php } ?>
                                </h4>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="pagination">
        <ul class="pagination">
            <li>
                <?= $this->Paginator->first('<< ' . __('first')) ?>
            </li>
            <li>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
            </li>
            <li class="active">
                <?= $this->Paginator->numbers() ?>
            </li>
            <li>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </li>
            <li>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </li>
        </ul>
    </div>
    <br class="clr"/>
</div>
<?php $url=Cake\Routing\Router::Url(['controller'=>'hoadon','action'=>'addcart']) ?>
<script>
    var url="<?=$url?>";
    console.log(url);
</script>
