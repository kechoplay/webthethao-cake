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
        <form method="get" action="<?= $this->Url->build(['controller' => 'search', 'action' => 'index']) ?>">
            <table class="">
                <tr>
                    <td>Tìm theo danh mục :</td>
                    <td style="padding-left:52px">
                        <select class="srchTxt" name="category">
                            <option value="0">All</option>
                            <?php
                            foreach ($danhmuc as $key => $value) {
                                ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tìm kiếm theo tên :</td>
                    <td style="padding-left:52px;"><input type="text" name="name">

                    </td>
                </tr>
                <tr>
                    <td>Tìm kiếm theo giá :</td>
                    <td style="padding-left:52px;">
                        <input id="ex2" type="text" class="span2" name="price"
                               data-slider-min="<?= $minprice['pro_price'] ?>"
                               data-slider-max="<?= $maxprice['pro_price'] ?>" data-slider-step="10000"
                               data-slider-value="[<?= $minprice['pro_price'] ?>,<?= $maxprice['pro_price'] ?>]"/>
                        <input type="number" id="number"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left:52px;">
                        <span id="min"><?= $minprice['pro_price'] ?></span>
                        <span id="max" style="float: right;"><?= $maxprice['pro_price'] ?></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="search" value="Search"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php if (isset($sanpham)) : ?>
        <h3><small class="pull-right"> <?= count($sanpham); ?> sản phẩm có sẵn</small></h3>
        <hr class="soft"/>
        <span>Sắp xếp theo</span>
        <div style="position:absolute;width:50%!important; top:300px; left: 500px; float:right">
            <form id="form-sx" method="get" action="<?=$this->Url->build('/sanpham') ?>">
                <select class="dropdown" name="order" id="order" onchange="if (this.value != ''){this.form.submit();}">
                    <option class="label">Sắp xếp theo</option>
                    <option value="nameasc" <?= (isset($query) && $query=='nameasc') ? 'selected' : '' ?>>Sắp xếp theo tên từ A - Z</option>
                    <option value="namedesc" <?= (isset($query) && $query=='namedesc') ? 'selected' : '' ?>>Sắp xếp theo tên từ Z - A</option>
                    <option value="priceasc" <?= (isset($query) && $query=='priceasc') ? 'selected' : '' ?>>Sắp xếp theo giá tăng dần</option>
                    <option value="pricedesc" <?= (isset($query) && $query=='pricedesc') ? 'selected' : '' ?>>Sắp xếp theo giá giảm dần</option>
                </select>
            </form>
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
                                    <h4 style="text-decoration:line-through;"><?= number_format($value['pro_price']); ?>VNĐ</h4>
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
                                            <a class="btn" href="javascript:void(0)" onclick="addcart(<?= $value->pro_id ?>)">Add to
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
    <?php endif; ?>
</div>
<script>
    $(document).ready(function () {
        $("#ex2").slider({
            tooltip: 'show',
        });
//        $("#ex2").on('slide',function(slideEvt) {
//                $('#max').text(slideEvt.value[1]);
//                $('#min').text(slideEvt.value[0]);
//            }
//        );
        $("#ex2").on('change', function (slideEvt) {
                $('#max').text(slideEvt.value['newValue'][1]);
                $('#min').text(slideEvt.value['newValue'][0]);
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