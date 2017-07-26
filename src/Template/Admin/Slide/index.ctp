<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Slide'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="slide index large-9 medium-8 columns content">
    <h3><?= __('Slide') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('sli_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sli_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sli_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sli_link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sli_status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($slide as $slide): ?>
            <tr>
                <td><?= $this->Number->format($slide->sli_id) ?></td>
                <td><?= h($slide->sli_name) ?></td>
                <td><?= h($slide->sli_image) ?></td>
                <td><?= h($slide->sli_link) ?></td>
                <td><?= h($slide->sli_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $slide->sli_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $slide->sli_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $slide->sli_id], ['confirm' => __('Are you sure you want to delete # {0}?', $slide->sli_id)]) ?>
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
