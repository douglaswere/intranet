<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blob $blob
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $blob->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $blob->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Blobs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="blobs form large-9 medium-8 columns content">
    <?= $this->Form->create($blob) ?>
    <fieldset>
        <legend><?= __('Edit Blob') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
