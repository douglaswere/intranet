<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreReturn $storeReturn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $storeReturn->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $storeReturn->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Store Returns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeReturns form large-9 medium-8 columns content">
    <?= $this->Form->create($storeReturn) ?>
    <fieldset>
        <legend><?= __('Edit Store Return') ?></legend>
        <?php
            echo $this->Form->control('store_id', ['options' => $stores, 'empty' => true]);
            echo $this->Form->control('company_code');
            echo $this->Form->control('return_to_address_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
