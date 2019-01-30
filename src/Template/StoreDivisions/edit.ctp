<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreDivision $storeDivision
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storeDivision->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storeDivision->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Store Divisions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeDivisions form large-9 medium-8 columns content">
    <?= $this->Form->create($storeDivision) ?>
    <fieldset>
        <legend><?= __('Edit Store Division') ?></legend>
        <?php
            echo $this->Form->control('store_id', ['options' => $stores, 'empty' => true]);
            echo $this->Form->control('company_code');
            echo $this->Form->control('ar_division_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
