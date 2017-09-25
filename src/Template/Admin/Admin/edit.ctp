<?php
/**
 * @var \App\View\AppView $this
 */
use App\Model\Entity\Admin;

$admins=new Admin();
$admin_level=$admins->level;
$admin_status=$admins->status;
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thành viên
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-xs-12">
                <?= $this->Form->create($admin, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="tabbable">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4>Nhập đầy đủ các thông tin</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-body-inner">
                                            <div class="widget-main">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"> Họ và
                                                        tên </label>
                                                    <div class="col-sm-9">
                                                        <?= $this->Form->input('fullname', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Họ và tên']) ?>
                                                    </div>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"> Địa chỉ
                                                        Email</label>
                                                    <div class="col-sm-9">
                                                        <?= $this->Form->input('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Địa chỉ email']) ?>
                                                    </div>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"> Tên đăng
                                                        nhập</label>
                                                    <div class="col-sm-9">
                                                        <?= $this->Form->input('user', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Tên đăng nhập']) ?>
                                                    </div>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"> Mật
                                                        khẩu</label>
                                                    <div class="col-sm-9">
                                                        <?= $this->Form->input('pass', ['class' => 'form-control', 'type' => 'password', 'label' => false, 'placeholder' => 'Mật khẩu']) ?>
                                                    </div>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"> Quyền truy
                                                        cập</label>
                                                    <div class="col-sm-9">
                                                        <?= $this->Form->input('level',['options'=>$admin_level,'class'=>'form-control','default'=>'0','label'=>false])?>
                                                    </div>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"> Trạng
                                                        thái</label>
                                                    <div class="col-sm-9">
                                                        <?= $this->Form->input('status',['options'=>$admin_status,'class'=>'form-control','default'=>'0','label'=>false])?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <?= $this->Form->button('Save') ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
