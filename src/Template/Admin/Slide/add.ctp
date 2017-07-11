<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Slide'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="slide form large-9 medium-8 columns content">
    <?= $this->Form->create($slide) ?>
    <fieldset>
        <legend><?= __('Add Slide') ?></legend>
        <?php
            echo $this->Form->input('sli_name');
            echo $this->Form->input('sli_image');
            echo $this->Form->input('sli_link');
            echo $this->Form->input('sli_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
