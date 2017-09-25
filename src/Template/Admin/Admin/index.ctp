<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhân viên
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
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Last_access</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($admin as $key => $value) : ?>
                    <tr class="odd gradeX" align="center">
                        <td><?= $value['id'] ?></td>
                        <td><?= $this->Html->link($value['user'],['action'=>'edit',$value['id']]) ?></td>
                        <td><?= $value['fullname'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= ($value['level'] == 1) ? "Administrator" : "Manager" ?></td>
                        <td><?= ($value['status'] == 1) ? "Hiện" : "Ẩn" ?></td>
                        <td><?= date_format(date_create($value['created_at']),'d/m/Y H:i:s') ?></td>
                        <td><?= date_format(date_create($value['last_access']),'d/m/y H:i:s') ?></td>
                        <td class="center"><i
                                    class="fa fa-pencil fa-fw"></i><?= $this->Html->link('Edit', ['action' => 'edit', $value->id]) ?>
                        </td>
                        <td class="center"><i
                                    class="fa fa-trash-o fa-fw"></i> <?= $this->Form->postLink('Delete', ['action' => 'delete', $value->id], ['confirm' => __('Are you sure want to delete {0}', $value->user)]) ?>
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