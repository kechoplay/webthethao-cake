<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Khachhang'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="khachhang index large-9 medium-8 columns content">
    <h3><?= __('Khachhang') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fullname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($khachhang as $khachhang): ?>
            <tr>
                <td><?= $this->Number->format($khachhang->cus_id) ?></td>
                <td><?= h($khachhang->username) ?></td>
                <td><?= h($khachhang->password) ?></td>
                <td><?= h($khachhang->fullname) ?></td>
                <td><?= h($khachhang->email) ?></td>
                <td><?= h($khachhang->mobile) ?></td>
                <td><?= h($khachhang->address) ?></td>
                <td><?= h($khachhang->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $khachhang->cus_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $khachhang->cus_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $khachhang->cus_id], ['confirm' => __('Are you sure you want to delete # {0}?', $khachhang->cus_id)]) ?>
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
