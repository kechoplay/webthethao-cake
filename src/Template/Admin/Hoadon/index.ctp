<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Hoadon'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Khachhang'), ['controller' => 'Khachhang', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Khachhang'), ['controller' => 'Khachhang', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hoadon index large-9 medium-8 columns content">
    <h3><?= __('Hoadon') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ord_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ord_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ord_payment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ord_status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hoadon as $hoadon): ?>
            <tr>
                <td><?= $this->Number->format($hoadon->ord_id) ?></td>
                <td><?= $hoadon->has('khachhang') ? $this->Html->link($hoadon->khachhang->cus_id, ['controller' => 'Khachhang', 'action' => 'view', $hoadon->khachhang->cus_id]) : '' ?></td>
                <td><?= h($hoadon->name) ?></td>
                <td><?= h($hoadon->mobile) ?></td>
                <td><?= h($hoadon->address) ?></td>
                <td><?= $this->Number->format($hoadon->total) ?></td>
                <td><?= h($hoadon->ord_date) ?></td>
                <td><?= h($hoadon->ord_payment) ?></td>
                <td><?= $this->Number->format($hoadon->ord_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $hoadon->ord_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hoadon->ord_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hoadon->ord_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hoadon->ord_id)]) ?>
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
