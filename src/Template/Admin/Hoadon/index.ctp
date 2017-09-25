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
                    <small>Danh sách</small>
                </h1>
                <h4 style="text-align:center"><strong><?= $this->Flash->render() ?></strong></h4>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ngày mua</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                    <th>Sửa</th>
                    <th>Hủy</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($hoadon as $key => $value) : ?>
                    <tr class="odd gradeX" align="center">
                        <td><?= $value['ord_id'] ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['mobile'] ?></td>
                        <td><?= $value['address'] ?></td>
                        <td><?= date_format(date_create($value['ord_date']), 'd/m/Y H:i:s') ?></td>
                        <td><?= $value['ord_payment'] ?></td>
                        <td><?= $status[$value['ord_status']] ?></td>
                        <td class="center"><i class="fa fa-info fa-fw"></i><a
                                    href="<?= $this->Url->build(['action' => 'detail', $value['ord_id']]) ?>"> Chi
                                tiết</a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                    href="<?= $this->Url->build(['action' => 'edit', $value['ord_id']]) ?>">Sửa</a></td>
                        <td class="center"><i class="fa fa-trash fa-fw"></i>
                            <?= $this->Form->postLink('Hủy', ['action' => 'delete', $value['ord_id']], ['confirm' => 'Are you sure want to delete {0}', $value['ord_id']]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
