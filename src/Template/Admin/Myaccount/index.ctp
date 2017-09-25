<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin cá nhân
                </h1>
            </div>
            <div class="col-xs-12">
                <?=$this->Form->create($account,['class'=>'form-horizontal','role'=>'form'])?>
                    <div class="row">
                        <div class="tabbable">
                            <div class="col-xs-6">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4>Sửa thông tin cá nhân</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-body-inner">
                                            <div class="widget-main">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-fullname"> Họ và tên </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="admin_name" id="admin_name"
                                                               value="<?= $profile[3] ?>" placeholder="Họ và tên"
                                                               class="form-control">
                                                    </div>
                                                    <?= isset($error['name']) ? $error['name'] : '' ?>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-email"> Địa chỉ Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="admin_email" id="admin_email"
                                                               value="<?= $profile[4] ?>" class="form-control"
                                                               placeholder="Địa chỉ email">
                                                    </div>
                                                    <?= isset($error['email']) ? $error['email'] : '' ?>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-username"> Tên đăng nhập</label>
                                                    <div class="col-sm-9">
                                                        <?= $profile[1] ?>
                                                    </div>
                                                </div>

                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-username"> Quyền hạn</label>
                                                    <div class="col-sm-9">
                                                        <?= ($profile[5] == 1) ? "Administrator" : "Manager" ?>
                                                    </div>
                                                </div>

                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-username"> Ngày đăng ký</label>
                                                    <div class="col-sm-9">
                                                        <?= $profile[7] ?>
                                                    </div>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-username"> Lần truy cập cuối</label>
                                                    <div class="col-sm-9">
                                                        <?= $profile[8] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4>Thay đổi mật khẩu</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-body-inner" style="display: block;">
                                            <div class="widget-main">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-password"> Nhập mật khẩu cũ</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="admin_password_old"
                                                               id="admin_password_old" value="" class="form-control">
                                                    </div>
                                                    <?= isset($error['oldpass']) ? $error['oldpass'] : '' ?>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-password"> Nhập mật khẩu mới</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="admin_password_new"
                                                               id="admin_password_new" value="" class="form-control">
                                                    </div>
                                                    <?= isset($error['newpass']) ? $error['newpass'] : '' ?>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right"
                                                           for="form-field-password"> Nhập lại mật khẩu mới</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="admin_password_conf"
                                                               id="admin_password_conf" value="" class="form-control">
                                                    </div>
                                                    <?= isset($error['re-newpass']) ? $error['re-newpass'] : '' ?>
                                                </div>
                                                <div class="space-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <input type="submit" value="Cập nhật" name="save">
                    </div>
                <?=$this->Form->end()?>
            </div>
        </div>

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>