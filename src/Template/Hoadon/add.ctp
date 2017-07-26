<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Hoadon'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Khachhang'), ['controller' => 'Khachhang', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Khachhang'), ['controller' => 'Khachhang', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hoadon form large-9 medium-8 columns content">
    <?= $this->Form->create($hoadon) ?>
    <fieldset>
        <legend><?= __('Add Hoadon') ?></legend>
        <?php
            echo $this->Form->input('cus_id', ['options' => $khachhang]);
            echo $this->Form->input('name');
            echo $this->Form->input('mobile');
            echo $this->Form->input('address');
            echo $this->Form->input('total');
            echo $this->Form->input('ord_date');
            echo $this->Form->input('ord_payment');
            echo $this->Form->input('ord_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
