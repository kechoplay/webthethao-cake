<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                    <small>Sửa</small>
                </h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                <?= $this->Form->create($khachhang) ?>
                <div class="form-group">
                    <?= $this->Form->input('username', ['class' => 'form-control', 'disabled' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('fullname', ['class' => 'form-control', 'disabled' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('email', ['class' => 'form-control', 'disabled' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('mobile', ['class' => 'form-control', 'disabled' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('address', ['class' => 'form-control', 'disabled' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('status', ['class' => 'form-control', 'options' => ['0', '1']]) ?>
                </div>
                <?= $this->Form->button('Save', ['class' => 'btn btn-default']) ?>
                <button type="reset" class="btn btn-default">Làm lại</button>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
