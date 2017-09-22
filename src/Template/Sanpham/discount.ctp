<div class="span9" style="position:relative">
    <ul class="breadcrumb">
        <li><a href="index.php">Trang chủ</a> <span class="divider">/</span></li>
        <li class="active">Sản phẩm giảm giá</li>
    </ul>
    <h4> Giảm giá
        <small class="pull-right"> <?= $countsanphamgiamgia ?> sản phẩm có sẵn</small>
    </h4>
    <hr class="soft"/>
    <span>Sắp xếp theo</span>
    <div style="position:absolute;width:50%!important; top:120px; left: 90px; float:right">
        <form id="form-sx" method="get" action="<?= $this->Url->build('/sanpham/discount/') ?>">
            <select class="dropdown" name="order" id="order" onchange="if (this.value != ''){this.form.submit();}">
                <option class="label">Sắp xếp theo</option>
                <option value="nameasc" <?= (isset($query) && $query == 'nameasc') ? 'selected' : '' ?>>Sắp xếp theo tên
                    từ A - Z
                </option>
                <option value="namedesc" <?= (isset($query) && $query == 'namedesc') ? 'selected' : '' ?>>Sắp xếp theo
                    tên từ Z - A
                </option>
                <option value="priceasc" <?= (isset($query) && $query == 'priceasc') ? 'selected' : '' ?>>Sắp xếp theo
                    giá tăng dần
                </option>
                <option value="pricedesc" <?= (isset($query) && $query == 'pricedesc') ? 'selected' : '' ?>>Sắp xếp theo
                    giá giảm dần
                </option>
            </select>
        </form>
    </div>
    <div id="myTab" class="pull-right" style="margin-bottom: 20px;">
        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i
                        class="icon-th-large"></i></span></a>
    </div>
    <br class="clr"/>
    <div class="tab-content">
        <div class="tab-pane" id="listView">
            <?php foreach ($sanpham as $key => $value) : ?>
                <div class="row">
                    <div class="span2" style="position:relative;">
                        <div class="tag2">
                            <?= $this->Html->image('sale.png', [
                                'alt' => 'sale',
                                'title' => 'sale'
                            ]) ?>
                        </div>
                        <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                            <?= $this->Html->image('../img/' . $value["pro_image"]) ?>
                        </a>
                    </div>
                    <div class="span4">
                        <h3>Có sẵn</h3>
                        <hr class="soft"/>
                        <h5><?php echo $value['pro_name']; ?> </h5>
                        <a class="btn btn-small pull-right"
                           href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">Xem
                            chi tiết</a>
                        <br class="clr"/>
                    </div>
                    <div class="span3 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3><?php echo number_format($value['pro_price'] - $value['pro_discount']); ?> VNĐ </h3>
                            <h4 style="text-decoration:line-through;"><?php echo number_format($value['pro_price']); ?>
                                VNĐ</h4>
                            <br/>
                            <a href="javascript:void(0)" onclick="addcart(<?= $value->pro_id ?>)"
                               class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                            <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>"
                               class="btn btn-large"><i class="icon-zoom-in"></i></a>
                        </form>
                    </div>
                </div>
                <hr class="soft"/>
            <?php endforeach; ?>
        </div>
        <div class="tab-pane active" id="blockView">
            <ul class="thumbnails">
                <?php foreach ($sanpham as $key => $value) : ?>
                    <li class="span3">
                        <div class="thumbnail">
                            <div class="tag2">
                                <?= $this->Html->image('sale.png', [
                                    'alt' => 'sale',
                                    'title' => 'sale'
                                ]) ?>
                            </div>
                            <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                <?= $this->Html->image('../img/' . $value["pro_image"]) ?>
                            </a>
                            <div class="caption">
                                <h5><?= $value['pro_name']; ?></h5>
                                <h4 style="text-align:center">
                                    <a class="btn"
                                       href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                        <i class="icon-zoom-in"></i>
                                    </a>
                                    <a class="btn" href="javascript:void(0)" onclick="addcart(<?= $value->pro_id ?>)">Add
                                        to <i class="icon-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-primary"
                                       href="#"><?= number_format($value['pro_price'] - $value['pro_discount']); ?>
                                    </a>
                                    <a class="btn btn-primary" style="text-decoration:line-through;"
                                       href="#"><?= number_format($value['pro_price']); ?>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <hr class="soft"/>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    <br class="clr"/>
</div>
<?php $url = Cake\Routing\Router::Url(['controller' => 'cart', 'action' => 'addcart']) ?>
<script>
    var url = "<?=$url?>";
    console.log(url);
    //    $(document).ready(function () {
    //        $('#order').submit();
    //    });
</script>
