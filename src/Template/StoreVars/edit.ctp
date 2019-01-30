<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreVar $storeVar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storeVar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storeVar->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Store Vars'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeVars form large-9 medium-8 columns content">
    <?= $this->Form->create($storeVar) ?>
    <fieldset>
        <legend><?= __('Edit Store Var') ?></legend>
        <?php
            echo $this->Form->control('store_id', ['options' => $stores, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('type');
            echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
