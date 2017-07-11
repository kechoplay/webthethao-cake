<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Slide'), ['action' => 'edit', $slide->sli_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Slide'), ['action' => 'delete', $slide->sli_id], ['confirm' => __('Are you sure you want to delete # {0}?', $slide->sli_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Slide'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slide'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="slide view large-9 medium-8 columns content">
    <h3><?= h($slide->sli_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sli Name') ?></th>
            <td><?= h($slide->sli_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sli Image') ?></th>
            <td><?= h($slide->sli_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sli Link') ?></th>
            <td><?= h($slide->sli_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sli Id') ?></th>
            <td><?= $this->Number->format($slide->sli_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sli Status') ?></th>
            <td><?= $slide->sli_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
