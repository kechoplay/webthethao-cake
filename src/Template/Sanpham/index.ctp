<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sanpham'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sanpham index large-9 medium-8 columns content">
    <h3><?= __('Sanpham') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('pro_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pro_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pro_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pro_discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pro_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pro_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pro_count_buy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pro_view') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pro_status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sanpham as $sanpham): ?>
            <tr>
                <td><?= $this->Number->format($sanpham->pro_id) ?></td>
                <td><?= $sanpham->has('danhmuc') ? $this->Html->link($sanpham->danhmuc->cat_id, ['controller' => 'Danhmuc', 'action' => 'view', $sanpham->danhmuc->cat_id]) : '' ?></td>
                <td><?= h($sanpham->pro_name) ?></td>
                <td><?= $this->Number->format($sanpham->pro_price) ?></td>
                <td><?= $this->Number->format($sanpham->pro_discount) ?></td>
                <td><?= h($sanpham->pro_image) ?></td>
                <td><?= $this->Number->format($sanpham->pro_quantity) ?></td>
                <td><?= $this->Number->format($sanpham->pro_count_buy) ?></td>
                <td><?= $this->Number->format($sanpham->pro_view) ?></td>
                <td><?= h($sanpham->pro_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sanpham->pro_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sanpham->pro_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sanpham->pro_id], ['confirm' => __('Are you sure you want to delete # {0}?', $sanpham->pro_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
