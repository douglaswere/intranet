<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresFile $storesFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storesFile->store_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storesFile->store_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storesFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($storesFile) ?>
    <fieldset>
        <legend><?= __('Edit Stores File') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
