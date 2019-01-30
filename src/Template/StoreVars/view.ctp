<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreVar $storeVar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store Var'), ['action' => 'edit', $storeVar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store Var'), ['action' => 'delete', $storeVar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeVar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Store Vars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Var'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storeVars view large-9 medium-8 columns content">
    <h3><?= h($storeVar->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $storeVar->has('store') ? $this->Html->link($storeVar->store->name, ['controller' => 'Stores', 'action' => 'view', $storeVar->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($storeVar->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($storeVar->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($storeVar->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storeVar->id) ?></td>
        </tr>
    </table>
</div>
