<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Newsimage $newsimage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Newsimages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsimages form large-9 medium-8 columns content">
    <?= $this->Form->create($newsimage) ?>
    <fieldset>
        <legend><?= __('Add Newsimage') ?></legend>
        <?php
            echo $this->Form->control('news_id', ['options' => $news]);
            echo $this->Form->control('name');
            echo $this->Form->control('size');
            echo $this->Form->control('tmp_name');
            echo $this->Form->control('height');
            echo $this->Form->control('width');
            echo $this->Form->control('feature');
            echo $this->Form->control('url');
            echo $this->Form->control('style');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
