<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa đơn
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <?= $this->Form->create($hoadon) ?>
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <?=$this->Form->input('name',['class'=>'form-control','readonly','label'=>false])?>
                </div>
                <div class="form-group">
                    <label>Điện thoại</label>
                    <?=$this->Form->input('mobile',['class'=>'form-control','readonly','label'=>false])?>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <?=$this->Form->input('address',['class'=>'form-control','readonly','label'=>false])?>
                </div>
                <div class="form-group">
                    <label>Ngày mua</label>
                    <?=$this->Form->input('ord_date',['class'=>'form-control','readonly','label'=>false])?>
                </div>
                <div class="form-group">
                    <label>Phương thức thanh toán</label>
                    <?=$this->Form->input('ord_payment',['class'=>'form-control','readonly','label'=>false])?>
                </div>
                <div class="form-group">
                    <label>Trạng thái </label>
                    <?=$this->Form->radio('ord_status',App\Model\Entity\Hoadon::$STATUS)?>
                </div>
                <button type="submit" name="save" class="btn btn-default">Lưu</button>
                <button type="reset" class="btn btn-default">Làm lại</button>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        if ($("#ord-status-2").is(":checked")) {
            $("#ord-status-0").click(function () {
                alert('Bạn không thể thay đổi');
                return false;
            });
            $("#ord-status-1").click(function () {
                alert('Bạn không thể thay đổi');
                return false;
            });
        }
    });
</script>
