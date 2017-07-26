<script type="text/javascript">
    function changequan(val) {
        var quan = $('#quan').val();
        if (Number(val) > Number(quan) || Number(val) <= 0) {
            alert("xin bạn chọn lại số lượng");
        }
    }
</script>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?= $this->Url->build('/') ?>">Trang chủ</a> <span class="divider">/</span></li>
        <li><a href="<?= $this->Url->build('/sanpham') ?>">Sản phẩm</a> <span class="divider">/</span></li>
        <li><a href="#">Chi tiết sản phẩm</a> <span class="divider">/</span></li>
        <li class="active"><?= $sanpham['pro_name'] ?></li>
    </ul>
    <div class="row">
        <div id="gallery" class="span3">
            <a href="../../img/<?= $sanpham['pro_image'] ?>" title="<?= $sanpham['pro_name'] ?>">
                <?= $this->Html->image('../img/' . $sanpham['pro_image'], ['alt' => $sanpham['pro_name'], 'style' => 'width:100%']) ?>
            </a>
            <!-- <div id="differentview" class="moreOptopm carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<a href="hinhanh/<?php ?>"> <img style="height:70px" src="hinhanh/<?php ?>" alt=""/></a>
						<a href="hinhanh/<?php ?>"> <img style="height:70px" src="hinhanh/<?php ?>" alt=""/></a>
					</div>
					<div class="item">
						<a href="hinhanh/<?php ?>" > <img style="height:65px" src="hinhanh/<?php ?>" alt=""/></a>
					</div>
				</div><!--

       <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
       <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>  -->

            <!-- </div> -->
        </div>
        <div class="span6">
            <h3><?= $sanpham['pro_name'] ?></h3>
            <small></small>
            <hr class="soft"/>
            <form class="form-horizontal qtyFrm" id="formcart">
                <div class="control-group">
                    <label class="control-label">
                        <?php
                        if ($sanpham['pro_discount'] == 0) {
                            ?>
                            <span><?= number_format($sanpham['pro_price']); ?> VNĐ</span>
                            <?php
                        } else {
                            ?>
                            <span><?= number_format($sanpham['pro_price'] - $sanpham['pro_discount']); ?> VNĐ</span><br>
                            <span style="text-decoration:line-through; font-size:15px;"><?= number_format($sanpham['pro_price']); ?>
                                VNĐ</span>
                            <?php
                        }
                        ?>
                    </label>
                    <div class="controls">
                        <input type="number" value="1" id="number" min="1" max="<?php echo $sanpham['pro_quantity'] ?>"
                               class="span1" <?= ($sanpham['pro_quantity']) != 0 ? "" : "disabled" ?> name="number"
                               onchange="changequan(this.value)" placeholder="Qty."/>
                        Sô lượng : <?= ($sanpham['pro_quantity']) != 0 ? $sanpham['pro_quantity'] : "Hết hàng" ?>
                        <input type="hidden" name="quan" id="quan" value="<?= $sanpham['pro_quantity'] ?>">
                        <input type="hidden" name="proid" id="proid" value="<?= $sanpham['pro_id'] ?>">
                        <button name="addcart" id="addcart" type="button" class="btn btn-large btn-primary pull-right">
                            Thêm giỏ hàng
                            <i class=" icon-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </form>
            <hr class="soft clr"/>
            <p>

            </p>
            <a class="btn btn-small pull-right" href="#detail">Xem chi tiết</a>
            <br class="clr"/>
            <a href="#" name="detail"></a>
            <hr class="soft"/>
        </div>

        <div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Chi tiết</a></li>
                <li><a href="#profile" data-toggle="tab">Sản phẩm liên quan</a></li>

            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <?php
                    echo html_entity_decode($sanpham['pro_description']);
                    ?>
                </div>

                <div class="tab-pane fade" id="profile">
                    <div id="myTab" class="pull-right">
                        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i
                                        class="icon-list"></i></span></a>
                        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i
                                        class="icon-th-large"></i></span></a>
                    </div>
                    <br class="clr"/>
                    <hr class="soft"/>
                    <div class="tab-content">
                        <div class="tab-pane" id="listView">
                            <?php
                            foreach ($sanphamlienquan as $key => $value) {
                                ?>
                                <div class="row">
                                    <div class="span2">
                                        <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                            <?= $this->Html->image('../img/' . $value["pro_image"]) ?>
                                        </a>
                                    </div>
                                    <div class="span4">
                                        <h3>Có sẵn</h3>
                                        <hr class="soft"/>
                                        <h5><?php echo $value[2] ?> </h5>
                                        <p>

                                        </p>
                                        <a class="btn btn-small pull-right"
                                           href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">Xem
                                            chi tiết</a>
                                        <br class="clr"/>
                                    </div>
                                    <div class="span3 alignR">
                                        <form class="form-horizontal qtyFrm">
                                            <?php
                                            if ($value['pro_discount'] == 0) {
                                                ?>
                                                <h3><?php echo number_format($value['pro_price']); ?> VNĐ </h3>
                                                <?php
                                            } else {
                                                ?>
                                                <h3><?php echo number_format($value['pro_price'] - $value['pro_discount']); ?>
                                                    VNĐ </h3>
                                                <h4 style="text-decoration:line-through;"><?php echo number_format($value['pro_price']); ?>
                                                    VNĐ</h4>
                                                <?php
                                            }
                                            ?>
                                            <br/>
                                            <div class="btn-group">
                                                <?php
                                                if ($value['pro_quantity'] > 0) {
                                                    ?>
                                                    <a href="javascript:void(0)"
                                                       onclick="addcart(<?= $value->pro_id ?>)"
                                                       class="btn btn-large btn-primary"> Add to <i
                                                                class=" icon-shopping-cart"></i></a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a class="btn btn-large btn-primary"> Hết hàng</i></a>
                                                    <?php
                                                }
                                                ?>
                                                <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>""
                                                class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                            </div>
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
                                foreach ($sanphamlienquan as $key => $value) {
                                    ?>
                                    <li class="span3">
                                        <div class="thumbnail">
                                            <a href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                                <?= $this->Html->image('../img/' . $value["pro_image"]) ?>
                                            </a>
                                            <div class="caption">
                                                <h5><?php echo $value[2] ?></h5>
                                                <p></p>
                                                <h4 style="text-align:center">
                                                    <a class="btn"
                                                       href="<?= $this->Url->build(['controller' => 'sanpham', 'action' => 'detail', $value['pro_id']]) ?>">
                                                        <i class="icon-zoom-in"></i>
                                                    </a>
                                                    <?php
                                                    if ($value['pro_quantity'] > 0) {
                                                        ?>
                                                        <a class="btn" href="javascript:void(0)"
                                                           onclick="addcart(<?= $value->pro_id ?>)">
                                                            Add to <i class="icon-shopping-cart"></i>
                                                        </a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a class="btn">da het hang</a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($value['pro_discount'] == 0) {
                                                        ?>
                                                        <a class="btn btn-primary"
                                                           href="#"><?php echo number_format($value['pro_price']); ?>
                                                            .VNĐ</a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a class="btn btn-primary"
                                                           href="#"><?php echo number_format($value['pro_price'] - $value['pro_discount']); ?>
                                                            .VNĐ</a>
                                                        <a class="btn btn-primary" style="text-decoration:line-through;"
                                                           href="#"><?php echo number_format($value['pro_price']); ?>
                                                            .VNĐ</a>
                                                    <?php } ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <hr class="soft"/>
                        </div>
                    </div>
                    <br class="clr">
                </div>
            </div>
        </div>

    </div>
</div>
<?php
$url = Cake\Routing\Router::Url(['controller' => 'cart', 'action' => 'addcart']);
$url2 = Cake\Routing\Router::Url(['controller' => 'cart', 'action' => 'addcartwithquan']);
$url3 = Cake\Routing\Router::Url(['controller' => 'cart', 'action' => 'index']);
?>
<script>
    var url = "<?=$url?>";
    var url2 = "<?=$url2?>";
    var url3 = "<?=$url3?>";
    $(document).ready(function () {
        $('#addcart').click(function () {
            $.ajax({
                type: 'post',
                url: url2,
                data: $('#formcart').serialize(),
                success: function (data) {
                    $('span#cart').html(data);
                    window.location=url3;
                },
                error: function (data) {
                    alert('fail');
                }
            });
        });
    });
</script>
