<?php
/**
 * @var \App\View\AppView $this
 */
?>

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
                    <?= $this->Form->input('cat_id', ['options' => $danhmuc, 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_name', ['class' => 'form-control', 'placeholder' => 'Nhập tên sản phẩm']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_price', ['class' => 'form-control', 'placeholder' => 'Nhập giá gốc', 'onkeypress' => 'return numberOnly(this, event);']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_discount', ['class' => 'form-control', 'placeholder' => 'Nhập giảm giá', 'onkeypress' => 'return numberOnly(this, event);', 'required' => false]) ?>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-lg-6">
                        <label>Hình ảnh</label><br>
                        <?= $this->Html->image('../img/' . (isset($sanpham->pro_image) ? $sanpham->pro_image : 'avatar_2x.png'), ['style' => 'width:150px', 'id' => 'image']) ?>
                    </div>
                    <div class="col-lg-6">
                        <label>Ảnh thay thế</label><br>
                        <img id="image_thaythe" style="width: 150px;"/>
                    </div>
                    <div class="col-lg-12">
                        <?= $this->Form->input('pro_image', ['class' => 'form-control', 'type' => 'file', 'id' => 'fileimage', 'accept' => 'image/*']) ?>
                    </div>
                    <input type="hidden" name="image" value="<?= isset($_GET['proid']) ? $pro[5] : '' ?>">
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_description', ['type' => 'textarea', 'class' => ['ckeditor', 'form-control']]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_quantity', ['class' => 'form-control', 'type' => 'number', 'max' => '9999', 'min' => '1']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_status', ['options' => [0, 1], 'class' => 'form-control']) ?>
                </div>
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-default']) ?>
                <button type="reset" class="btn btn-default">Reset</button>
                <?= $this->Form->end() ?>
            </div>
            <!--            <div class="col-lg-4">-->
            <!--                <button type="button" class="btn btn-primary" id="addImage">Add Image</button>-->
            <!--                <div id="insert" style="margin:20px;"></div>-->
            <!--            </div>-->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#addImage').click(function () {
            $('#insert').append('<div class="form-group"><input type="file" name="fileDetail[]"></div>');
        });
    });
    document.getElementById('fileimage').onchange = function (event) {
        // alert("xx");
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var dataUrl = reader.result;
            var img = document.getElementById('image_thaythe');
            img.src = dataUrl;
        };
        reader.readAsDataURL(input.files[0]);
    };
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