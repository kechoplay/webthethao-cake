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
                    <?= $this->?>
                    <input type="file" name="sua_image">
                    <input type="hidden" name="image" value="<?= isset($_GET['proid']) ? $pro[5] : '' ?>">
                    <?= isset($error['proimage']) ? $error['proimage'] : ""; ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_description',['type'=>'textarea','class'=>['ckeditor','form-control']])?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('pro_quantity',['class'=>'form-control','type'=>'number','max'=>'9999','min'=>'1'])?>
                </div>
                <div class="form-group">
                    <?=$this->Form->input('pro_status',['options'=>[0,1],'class'=>'form-control'])?>
                </div>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-default'])?>
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