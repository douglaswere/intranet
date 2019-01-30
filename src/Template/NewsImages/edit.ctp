<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsImage $newsImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $newsImage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $newsImage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List News Images'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsImages form large-9 medium-8 columns content">
    <?= $this->Form->create($newsImage) ?>
    <fieldset>
        <legend><?= __('Edit News Image') ?></legend>
        <?php
            echo $this->Form->control('news_id', ['options' => $news]);
            echo $this->Form->control('name');
            echo $this->Form->control('size');
            echo $this->Form->control('tmp_name');
            echo $this->Form->control('height');
            echo $this->Form->control('width');
            echo $this->Form->control('feature');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
