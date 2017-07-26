<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Khachhang'), ['action' => 'edit', $khachhang->cus_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Khachhang'), ['action' => 'delete', $khachhang->cus_id], ['confirm' => __('Are you sure you want to delete # {0}?', $khachhang->cus_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Khachhang'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Khachhang'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="khachhang view large-9 medium-8 columns content">
    <h3><?= h($khachhang->cus_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($khachhang->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($khachhang->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($khachhang->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($khachhang->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($khachhang->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($khachhang->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cus Id') ?></th>
            <td><?= $this->Number->format($khachhang->cus_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $khachhang->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
