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
</script>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?= $this->Url->build('/') ?>">Trang chủ</a> <span class="divider">/</span></li>
        <li class="active">Tìm kiếm</li>
    </ul>
    <div>
        <form method="get" action="<?= $this->Url->build('/search/') ?>">
            <table class="">
                <tr>
                    <td>Tìm theo danh mục :</td>
                    <td style="padding-left:52px">
                        <select class="srchTxt" name="category">
                            <option value="0">All</option>
                            <?php foreach ($danhmuc as $key => $value) : ?>
                                <?php if ($key == $categoory) : ?>
                                    <option value="<?= $key ?>" selected><?= $value ?></option>
                                <?php else : ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tìm kiếm theo tên :</td>
                    <td style="padding-left:52px;"><input type="text" name="name" value="<?= (isset($name) ? $name : '') ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tìm kiếm theo giá :</td>
                    <td style="padding-left:52px;">
                        <input id="ex2" type="text" class="span2" name="price"
                               data-slider-min="<?= $minprice['pro_price'] ?>"
                               data-slider-max="<?= $maxprice['pro_price'] ?>" data-slider-step="10000"
                               data-slider-value="[<?=(isset($price) ? implode(',',$price) : $minprice['pro_price'] . ',' . $maxprice['pro_price']) ?>]"/>
                        <!--                        <input type="number" id="number"/>-->
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left:52px;">
                        <input type="number" style="width: 80px" id="min" readonly
                               value="<?= (isset($price) ? $price[0] : $minprice['pro_price']) ?>"/>
                        <!--                        <span id="min">--><? //= $minprice['pro_price'] ?><!--</span>-->
                        <input type="number" style="width: 80px;float: right;" readonly id="max"
                               value="<?= (isset($price) ? $price[1] : $maxprice['pro_price']) ?>"/>
                        <!--                        <span id="max" style="float: right;">-->
                        <? //= $maxprice['pro_price'] ?><!--</span>-->
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="search" value="Search"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php ?>
    <?php if (isset($sanpham)) : ?>
        <h3>
            <small class="pull-right"> <?= ($sanphamwithcount); ?> sản phẩm có sẵn</small>
        </h3>
        <hr class="soft"/>
        <div style="position: relative; width: 50%">
            <span>Sắp xếp theo</span>
            <div style="position:absolute;width:40%!important; top: 0; left: 80px; float:right">
                <form id="form-sx" method="get" action="<?= $this->request->here() ?>">
                    <select class="dropdown" name="order" id="order"
                            onchange="submitForm()">
                        <option class="label">Sắp xếp theo</option>
                        <option value="nameasc" <?= (isset($query) && $query == 'nameasc') ? 'selected' : '' ?>>Sắp xếp
                            theo tên từ A - Z
                        </option>
                        <option value="namedesc" <?= (isset($query) && $query == 'namedesc') ? 'selected' : '' ?>>Sắp
                            xếp theo tên từ Z - A
                        </option>
                        <option value="priceasc" <?= (isset($query) && $query == 'priceasc') ? 'selected' : '' ?>>Sắp
                            xếp theo giá tăng dần
                        </option>
                        <option value="pricedesc" <?= (isset($query) && $query == 'pricedesc') ? 'selected' : '' ?>>Sắp
                            xếp theo giá giảm dần
                        </option>
                    </select>
                    <input type="hidden" name="category" value="<?= $this->request->getQuery('category') ?>">
                    <input type="hidden" name="name" value="<?= $this->request->getQuery('name') ?>">
                    <input type="hidden" name="price" value="<?= $this->request->getQuery('price') ?>">
                    <input type="hidden" name="search" value="<?= $this->request->getQuery('search') ?>">
                </form>
            </div>
        </div>
        <div id="myTab" class="pull-right" style="margin-bottom:20px;">
            <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
            <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i
                            class="icon-th-large"></i></span></a>
        </div>
        <br class="clr"/>
        <div class="tab-content">
            <div class="tab-pane" id="listView">
                <?php foreach ($sanpham as $key => $value) : ?>
                    <div class="row">
                        <div class="span2">
                            <div class="tag1"></div>
                            <?= $this->Html->image('../img/' . $value["pro_image"]) ?>
                        </div>
                        <div class="span4">
                            <h3>Có sẵn</h3>
                            <hr class="soft"/>
                            <h5><?= $value['pro_name']; ?> </h5>
                            <a class="btn btn-small pull-right"
                               href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                View Details
                            </a>
                            <br class="clr"/>
                        </div>
                        <div class="span3 alignR">
                            <form class="form-horizontal qtyFrm">
                                <?php if ($value['pro_discount'] == 0) : ?>
                                    <h3><?= number_format($value['pro_price']); ?> VNĐ </h3>
                                <?php else : ?>
                                    <h3><?= number_format($value['pro_price'] - $value['pro_discount']); ?> VNĐ </h3>
                                    <h4 style="text-decoration:line-through;"><?= number_format($value['pro_price']); ?>
                                        VNĐ</h4>
                                <?php endif; ?>
                                <br/>
                                <?php if ($value['pro_quantity'] > 0) : ?>
                                    <a href="javascript:void(0)" onclick="addcart(<?= $value->pro_id ?>)"
                                       class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                <?php else : ?>
                                    <a class="btn btn-large btn-primary"> Hết hàng</i></a>
                                <?php endif; ?>
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
                                <div class="tag"></div>
                                <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                    <?= $this->Html->image('../img/' . $value["pro_image"]) ?>
                                </a>
                                <div class="caption">
                                    <h5><?php echo $value['pro_name']; ?></h5>
                                    <h4 style="text-align:center">
                                        <a class="btn"
                                           href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                            <i class="icon-zoom-in"></i>
                                        </a>
                                        <?php if ($value['pro_quantity'] > 0) : ?>
                                            <a class="btn" href="javascript:void(0)"
                                               onclick="addcart(<?= $value->pro_id ?>)">Add to
                                                <i class="icon-shopping-cart"></i>
                                            </a>
                                        <?php else : ?>
                                            <a class="btn"> Hết hàng</i></a>
                                        <?php endif; ?>
                                        <?php if ($value['pro_discount'] == 0) : ?>
                                            <a class="btn btn-primary"
                                               href="#"><?= number_format($value['pro_price']); ?></a>
                                        <?php else : ?>
                                            <a class="btn btn-primary"
                                               href="#"><?= number_format($value['pro_price'] - $value['pro_discount']); ?>
                                            </a>
                                            <a class="btn btn-primary" style="text-decoration:line-through;"
                                               href="#"><?= number_format($value['pro_price']); ?>
                                            </a>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php if (($sanphamwithcount) > ITEMS_BLOCKS_PER_PAGE): ?>
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
        <?php endif; ?>
        <br class="clr"/>
    <?php endif; ?>
</div>
<?php $sendUrl = $this->request->here(); ?>
<script>
    function submitForm() {
        var value = document.getElementById('order').value;
        var form = document.getElementById('form-sx');
        console.log(value);
        if (value != '') {
            form.submit();
            var sendUrl = '<?=$sendUrl?>&order=' + value;
//            window.location.assign(sendUrl);
//            console.log(window.location.hash=(sendUrl));
        }
    }

    $(document).ready(function () {
//        console.log($("#order"));
        $("#ex2").slider({
            tooltip: 'show',
        });
//        $("#ex2").on('slide',function(slideEvt) {
//                $('#max').text(slideEvt.value[1]);
//                $('#min').text(slideEvt.value[0]);
//            }
//        );
        $("#ex2").on('change', function (slideEvt) {
//                $('#max').text(slideEvt.value['newValue'][1]);
//                $('#min').text(slideEvt.value['newValue'][0]);
                $('#max').val(slideEvt.value['newValue'][1]);
                $('#min').val(slideEvt.value['newValue'][0]);
                $('#number').val(slideEvt.value['newValue'][1]);
//                console.log(slideEvt.value);
            }
        );
        $("#number").keydown(function (slideEvt) {
            $("#ex2").slider('setAttribute', 'data-value', [$("#number").val(), $("#max").val()]);
            $("#ex2").slider('refresh');
            console.log($("#ex2").slider('getAttribute', 'data-value'));
            console.log($("#max").val());
//            console.log($("#ex2").slider('getValue'));
        })
//        console.log($("#ex2").slider('getValue'));
    });
</script>