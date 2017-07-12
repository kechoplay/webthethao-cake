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
            </div>
            <h4 style="text-align:center"><strong><?php echo isset($error['error']) ? $error['error'] : "" ?></strong>
            </h4>
            <?= $this->Flash->render() ?>
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
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($admin as $key => $value) {

                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['user'] ?></td>
                        <td><?php echo $value['fullname'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo ($value['level'] == 1) ? "Administrator" : "Manager" ?></td>
                        <td><?php echo ($value['status'] == 1) ? "Hiện" : "Ẩn" ?></td>
                        <td><?php echo $this->Time->format($value['created_at']) ?></td>
                        <td><?php echo $this->Time->format($value['last_access']) ?></td>
                        <td class="center"><i
                                    class="fa fa-pencil fa-fw"></i><?= $this->Html->link('Edit', ['action' => 'edit', $value->id]) ?>
                        </td>
                        <td class="center"><i
                                    class="fa fa-trash-o fa-fw"></i> <?= $this->Form->postLink('Delete', ['action' => 'delete', $value->id], ['confirm' => __('Are you sure want to delete {0}', $value->user)]) ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>