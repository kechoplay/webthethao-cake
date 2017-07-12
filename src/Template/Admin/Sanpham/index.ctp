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
            <?=$this->Flash->render()?>
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
                    <th>Delete</th>
                    <th>Edit</th>
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
                        <td><?php echo number_format($value['pro_price'],0,'',',') ?></td>
                        <td><?php echo number_format($value['pro_discount']) ?></td>
                        <td><?=$this->Html->image('/img/'.$value['pro_image'],['style'=>'width:50px'])?></td>
                        <td><?php echo html_entity_decode($value['pro_description']) ?></td>
                        <td><?php echo $value['pro_quantity'] ?></td>
                        <td><?php echo ($value['pro_status']==1) ? "Hiện" : "Ẩn" ?></td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin_product.php?proid=<?php echo $value['pro_id'] ?>" onclick="return xacnhanxoa();"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin_add_product.php?proid=<?php echo $value['pro_id'] ?>">Edit</a></td>
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