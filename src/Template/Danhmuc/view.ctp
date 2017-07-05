<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Danhmuc'), ['action' => 'edit', $danhmuc->cat_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Danhmuc'), ['action' => 'delete', $danhmuc->cat_id], ['confirm' => __('Are you sure you want to delete # {0}?', $danhmuc->cat_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Danhmuc'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Danhmuc'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="danhmuc view large-9 medium-8 columns content">
    <h3><?= h($danhmuc->cat_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cat Name') ?></th>
            <td><?= h($danhmuc->cat_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Danhmuc') ?></th>
            <td><?= $danhmuc->has('parent_danhmuc') ? $this->Html->link($danhmuc->parent_danhmuc->cat_id, ['controller' => 'Danhmuc', 'action' => 'view', $danhmuc->parent_danhmuc->cat_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cat Id') ?></th>
            <td><?= $this->Number->format($danhmuc->cat_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sort Order') ?></th>
            <td><?= $this->Number->format($danhmuc->sort_order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cat Status') ?></th>
            <td><?= $danhmuc->cat_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Danhmuc') ?></h4>
        <?php if (!empty($danhmuc->child_danhmuc)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Cat Id') ?></th>
                <th scope="col"><?= __('Cat Name') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Sort Order') ?></th>
                <th scope="col"><?= __('Cat Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($danhmuc->child_danhmuc as $childDanhmuc): ?>
            <tr>
                <td><?= h($childDanhmuc->cat_id) ?></td>
                <td><?= h($childDanhmuc->cat_name) ?></td>
                <td><?= h($childDanhmuc->parent_id) ?></td>
                <td><?= h($childDanhmuc->sort_order) ?></td>
                <td><?= h($childDanhmuc->cat_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Danhmuc', 'action' => 'view', $childDanhmuc->cat_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Danhmuc', 'action' => 'edit', $childDanhmuc->cat_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Danhmuc', 'action' => 'delete', $childDanhmuc->cat_id], ['confirm' => __('Are you sure you want to delete # {0}?', $childDanhmuc->cat_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
