<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hoadon'), ['action' => 'edit', $hoadon->ord_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hoadon'), ['action' => 'delete', $hoadon->ord_id], ['confirm' => __('Are you sure you want to delete # {0}?', $hoadon->ord_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hoadon'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hoadon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Khachhang'), ['controller' => 'Khachhang', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Khachhang'), ['controller' => 'Khachhang', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hoadon view large-9 medium-8 columns content">
    <h3><?= h($hoadon->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Khachhang') ?></th>
            <td><?= $hoadon->has('khachhang') ? $this->Html->link($hoadon->khachhang->cus_id, ['controller' => 'Khachhang', 'action' => 'view', $hoadon->khachhang->cus_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($hoadon->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($hoadon->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($hoadon->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ord Payment') ?></th>
            <td><?= h($hoadon->ord_payment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ord Id') ?></th>
            <td><?= $this->Number->format($hoadon->ord_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($hoadon->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ord Status') ?></th>
            <td><?= $this->Number->format($hoadon->ord_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ord Date') ?></th>
            <td><?= h($hoadon->ord_date) ?></td>
        </tr>
    </table>
</div>
