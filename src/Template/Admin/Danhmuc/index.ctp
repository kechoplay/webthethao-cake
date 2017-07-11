<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Danhmuc'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="danhmuc index large-9 medium-8 columns content">
    <h3><?= __('Danhmuc') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cat_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sort_order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($danhmuc as $danhmuc): ?>
            <tr>
                <td><?= $this->Number->format($danhmuc->cat_id) ?></td>
                <td><?= h($danhmuc->cat_name) ?></td>
                <td><?= $danhmuc->has('parent_danhmuc') ? $this->Html->link($danhmuc->parent_danhmuc->cat_id, ['controller' => 'Danhmuc', 'action' => 'view', $danhmuc->parent_danhmuc->cat_id]) : '' ?></td>
                <td><?= $this->Number->format($danhmuc->sort_order) ?></td>
                <td><?= h($danhmuc->cat_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $danhmuc->cat_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $danhmuc->cat_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $danhmuc->cat_id], ['confirm' => __('Are you sure you want to delete # {0}?', $danhmuc->cat_id)]) ?>
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
