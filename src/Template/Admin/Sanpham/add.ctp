<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sanpham'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Danhmuc'), ['controller' => 'Danhmuc', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sanpham form large-9 medium-8 columns content">
    <?= $this->Form->create($sanpham) ?>
    <fieldset>
        <legend><?= __('Add Sanpham') ?></legend>
        <?php
            echo $this->Form->input('cat_id', ['options' => $danhmuc]);
            echo $this->Form->input('pro_name');
            echo $this->Form->input('pro_price');
            echo $this->Form->input('pro_discount');
            echo $this->Form->input('pro_image');
            echo $this->Form->input('pro_description');
            echo $this->Form->input('pro_quantity');
            echo $this->Form->input('pro_count_buy');
            echo $this->Form->input('pro_view');
            echo $this->Form->input('pro_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
