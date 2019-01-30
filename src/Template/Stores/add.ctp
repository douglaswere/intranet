<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Navmenus'), ['controller' => 'Navmenus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Navmenu'), ['controller' => 'Navmenus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Store Divisions'), ['controller' => 'StoreDivisions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store Division'), ['controller' => 'StoreDivisions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Store Ipmaps'), ['controller' => 'StoreIpmaps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store Ipmap'), ['controller' => 'StoreIpmaps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Store Returns'), ['controller' => 'StoreReturns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store Return'), ['controller' => 'StoreReturns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Store Sortfield'), ['controller' => 'StoreSortfield', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store Sortfield'), ['controller' => 'StoreSortfield', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Store Vars'), ['controller' => 'StoreVars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store Var'), ['controller' => 'StoreVars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stores form large-9 medium-8 columns content">
    <?= $this->Form->create($store) ?>
    <fieldset>
        <legend><?= __('Add Store') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active');
            echo $this->Form->control('parent_id', ['options' => $parentStores, 'empty' => true]);
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
