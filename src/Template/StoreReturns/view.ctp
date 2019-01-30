<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreReturn $storeReturn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store Return'), ['action' => 'edit', $storeReturn->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store Return'), ['action' => 'delete', $storeReturn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeReturn->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Store Returns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Return'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storeReturns view large-9 medium-8 columns content">
    <h3><?= h($storeReturn->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $storeReturn->has('store') ? $this->Html->link($storeReturn->store->name, ['controller' => 'Stores', 'action' => 'view', $storeReturn->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Code') ?></th>
            <td><?= h($storeReturn->company_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Return To Address Code') ?></th>
            <td><?= h($storeReturn->return_to_address_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storeReturn->id) ?></td>
        </tr>
    </table>
</div>
