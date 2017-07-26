<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $khachhang->cus_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $khachhang->cus_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Khachhang'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="khachhang form large-9 medium-8 columns content">
    <?= $this->Form->create($khachhang) ?>
    <fieldset>
        <legend><?= __('Edit Khachhang') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('fullname');
            echo $this->Form->input('email');
            echo $this->Form->input('mobile');
            echo $this->Form->input('address');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
