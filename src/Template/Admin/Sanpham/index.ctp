<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Danh sách</small>
                </h1>
            </div>
            <?= $this->Flash->render() ?>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Danh mục</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Ảnh</th>
                    <th>Miêu tả</th>
                    <th>Số lượng</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($sanpham as $key => $value) {

                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $value['pro_id'] ?></td>
                        <td><?php echo $value['cat_id'] ?></td>
                        <td><?php echo $value['pro_name'] ?></td>
                        <td><?php echo number_format($value['pro_price'], 0, '', ',') ?></td>
                        <td><?php echo number_format($value['pro_discount']) ?></td>
                        <td><?= $this->Html->image('/img/' . $value['pro_image'], ['style' => 'width:50px']) ?></td>
                        <td><?php echo html_entity_decode($value['pro_description']) ?></td>
                        <td><?php echo $value['pro_quantity'] ?></td>
                        <td><?php echo ($value['pro_status'] == 1) ? "Hiện" : "Ẩn" ?></td>
                        <td class="center"><i
                                    class="fa fa-pencil fa-fw"></i> <?= $this->Html->link('Edit', ['action' => 'edit', $value->pro_id]) ?>
                        </td>
                        <td class="center"><i
                                    class="fa fa-trash-o fa-fw"></i><?= $this->Form->postLink('Delete', ['action' => 'delete', $value->pro_id], ['confirm' => __('Are you sure you want to delete # {0}?', $value->pro_name)]) ?>
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