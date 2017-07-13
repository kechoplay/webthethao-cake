<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="sanpham form large-9 medium-8 columns content">
    <?= $this->Form->create($sanpham) ?>
    <fieldset>
        <legend><?= __('Edit Sanpham') ?></legend>
        <?php
        echo $this->Form->input('cat_id', ['options' => $danhmuc]);
        echo $this->Form->input('pro_name');
        echo $this->Form->input('pro_price');
        echo $this->Form->input('pro_discount');
        echo $this->Form->input('pro_image');
        echo $this->Form->input('pro_description');
        echo $this->Form->input('pro_quantity');
        echo $this->Form->input('pro_count_buy');
        echo $this->Form->input('pro_view');
        echo $this->Form->input('pro_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <?= $this->Form->create($sanpham, ['type' => 'file']) ?>
                <div class="form-group">
                    <?= $this->Form->input('cat_id',['options'=>$danhmuc,'class'=>'form-control'])?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_name',['class'=>'form-control','placeholder'=>'Nhập tên sản phẩm']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_price',['class'=>'form-control','placeholder'=>'Nhập giá gốc','onkeypress'=>'return numberOnly(this, event);']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_discount',['class'=>'form-control','placeholder'=>'Nhập giá gốc','onkeypress'=>'return numberOnly(this, event);','required'=>false]) ?>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label><br>
                    <img src="../hinhanh/<?= isset($_GET['proid']) ? $pro[5] : 'avatar_2x.png' ?>" style="width:150px">
                    <input type="file" name="sua_image">
                    <input type="hidden" name="image" value="<?= isset($_GET['proid']) ? $pro[5] : '' ?>">
                    <?= isset($error['proimage']) ? $error['proimage'] : ""; ?>
                </div>
                <div class="form-group">
                    <label>Miêu tả</label>
                    <textarea class="ckeditor" id="" rows="3"
                              name="prodes"><?= isset($_GET['proid']) ? $pro[6] : '' ?></textarea>

                    <?= isset($error['prodes']) ? $error['prodes'] : "" ?>
                </div>
                <div class="form-group">
                    <label>Số lượng nhập</label>
                    <input class="form-control" name="proquan" max="9999" min="0" type="number"
                           value="<?= isset($_GET['proid']) ? $pro[7] : 0 ?>"/>
                    <?= isset($error['proquan']) ? $error['proquan'] : "" ?>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <?php
                    if (isset($pro[10])) {
                        if ($pro[10] == 1) {
                            ?>
                            <label class="radio-inline">
                                <input name="status" value="1" checked="" type="radio">Hiện
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="2" type="radio">Ẩn
                            </label>
                            <?php
                        } elseif ($pro[10] == 2) {
                            ?>
                            <label class="radio-inline">
                                <input name="status" value="1" type="radio">Hiện
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="2" checked="" type="radio">Ẩn
                            </label>
                            <?php
                        }
                    } else {
                        ?>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio">Hiện
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="2" type="radio">Ẩn
                        </label>
                        <?php
                    }
                    ?>
                </div>
                <button type="submit" name="save" class="btn btn-default">Lưu</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <?= $this->Form->end() ?>
            </div>
            <!-- <div class="col-lg-4">
                <button type="button" class="btn btn-primary" id="addImage">Add Image</button>
                <div id="insert" style="margin:20px;"></div>
            </div> -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#addImage').click(function(){
            $('#insert').append('<div class="form-group"><input type="file" name="fileDetail[]"></div>');
        });
    });
    function numberOnly(myfield, e){
        var key,keychar;
        if (window.event){
            key = window.event.keyCode
        }else if (e){
            key = e.which
        }else{
            return true
        }
        keychar = String.fromCharCode(key);
        if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27)){
            return true
        }else if (("0123456789").indexOf(keychar) > -1){
            return true
        }
        return false;
    }
</script>