<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsTag $newsTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $newsTag->news_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $newsTag->news_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List News Tags'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsTags form large-9 medium-8 columns content">
    <?= $this->Form->create($newsTag) ?>
    <fieldset>
        <legend><?= __('Edit News Tag') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
