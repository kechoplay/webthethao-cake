<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sanpham'), ['action' => 'edit', $sanpham->pro_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sanpham'), ['action' => 'delete', $sanpham->pro_id], ['confirm' => __('Are you sure you want to delete # {0}?', $sanpham->pro_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sanpham'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sanpham'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sanpham view large-9 medium-8 columns content">
    <h3><?= h($sanpham->pro_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Danhmuc') ?></th>
            <td><?= $sanpham->has('danhmuc') ? $this->Html->link($sanpham->danhmuc->cat_id, ['controller' => 'Danhmuc', 'action' => 'view', $sanpham->danhmuc->cat_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro Name') ?></th>
            <td><?= h($sanpham->pro_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro Image') ?></th>
            <td><?= h($sanpham->pro_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro Id') ?></th>
            <td><?= $this->Number->format($sanpham->pro_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro Price') ?></th>
            <td><?= $this->Number->format($sanpham->pro_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro Discount') ?></th>
            <td><?= $this->Number->format($sanpham->pro_discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro Quantity') ?></th>
            <td><?= $this->Number->format($sanpham->pro_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro Count Buy') ?></th>
            <td><?= $this->Number->format($sanpham->pro_count_buy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro View') ?></th>
            <td><?= $this->Number->format($sanpham->pro_view) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pro Status') ?></th>
            <td><?= $sanpham->pro_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Pro Description') ?></h4>
        <?= $this->Text->autoParagraph(h($sanpham->pro_description)); ?>
    </div>
</div>
