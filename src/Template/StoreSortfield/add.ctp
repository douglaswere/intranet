<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreSortfield $storeSortfield
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Store Sortfield'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeSortfield form large-9 medium-8 columns content">
    <?= $this->Form->create($storeSortfield) ?>
    <fieldset>
        <legend><?= __('Add Store Sortfield') ?></legend>
        <?php
            echo $this->Form->control('store_id', ['options' => $stores, 'empty' => true]);
            echo $this->Form->control('sort');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
