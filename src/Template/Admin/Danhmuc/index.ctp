<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <?php
//            echo "<pre>";
//            print_r($danhmuc);
//            die();
            ?>
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small>Danh sách</small>
                </h1>
            </div>
            <?= $this->Flash->render()?>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Vị trí hiển thị</th>
                    <th>Danh mục cha</th>
                    <th>Trạng thái</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($danhmuc as $key => $value) {

                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?= $value['cat_id'] ?></td>
                        <td><?= $value['cat_name'] ?></td>
                        <td><?= $value['sort_order'] ?></td>
                        <td><?= ($value['parent_id'] == 0) ? 'None' : $value['parent_id'] ?></td>
                        <td><?= ($value['cat_status'] == 1) ? "Hiện" : "Ẩn" ?></td>
                        <td class="center"><i
                                    class="fa fa-pencil fa-fw"></i><?= $this->Html->link('Edit', ['action' => 'edit', $value->cat_id]) ?>
                        <td class="center"><i
                                    class="fa fa-trash-o fa-fw"></i> <?= $this->Form->postLink('Delete', ['action' => 'delete', $value->cat_id], ['confirm' => __('Are you sure want to delete {0}', $value->cat_name)]) ?>
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
