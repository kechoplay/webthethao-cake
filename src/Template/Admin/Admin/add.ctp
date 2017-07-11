<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Admin'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="admin form large-9 medium-8 columns content">
    <?= $this->Form->create($admin) ?>
    <fieldset>
        <legend><?= __('Add Admin') ?></legend>
        <?php
            echo $this->Form->input('user');
            echo $this->Form->input('pass');
            echo $this->Form->input('fullname');
            echo $this->Form->input('email');
            echo $this->Form->input('level');
            echo $this->Form->input('status');
            echo $this->Form->input('created_at');
            echo $this->Form->input('last_access');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
