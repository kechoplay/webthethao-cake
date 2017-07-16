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
                    <small>Danh sách</small>
                </h1>
                <?= $this->Flash->render() ?>
                <p><a href="<?= $this->Url->build(['action' => 'add']) ?>">Thêm tài khoản</a></p>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Tên đầy đủ</th>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($khachhang as $key => $value): ?>
                    <tr class="odd gradeX" align="center">
                        <td><?= $this->Number->format($value['cus_id']) ?></td>
                        <td><?= $value['username'] ?></td>
                        <td><?= $value['fullname'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['mobile'] ?></td>
                        <td><?= $value['address'] ?></td>
                        <td><?= ($value['status'] == 1) ? "Hiện" : "Ẩn" ?></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="<?= $this->Url->build(['action' => 'edit', $value['cus_id']]) ?>">Edit</a>
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