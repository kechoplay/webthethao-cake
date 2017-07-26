<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small>Sửa </small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <?=$this->Form->create($danhmuc)?>
                <fieldset>
                    <div class="form-group">
                        <?= $this->Form->input('parent_id',['options'=>$parentDanhmuc,'empty'=>true,'class'=>'form-control'])?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('cat_name',['class'=>'form-control','placeholder'=>'Please Enter Category Name']) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('sort_order',['class'=>'form-control']) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('cat_status',[]) ?>
                    </div>
                    <?=$this->Form->button('Submit',['class'=>'btn btn-default'])?>
                    <button type="reset" class="btn btn-default">Làm lại</button>
                </fieldset>
                <?=$this->Form->end()?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>