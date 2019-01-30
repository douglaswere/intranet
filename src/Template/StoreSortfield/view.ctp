<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreSortfield $storeSortfield
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store Sortfield'), ['action' => 'edit', $storeSortfield->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store Sortfield'), ['action' => 'delete', $storeSortfield->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeSortfield->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Store Sortfield'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Sortfield'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storeSortfield view large-9 medium-8 columns content">
    <h3><?= h($storeSortfield->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $storeSortfield->has('store') ? $this->Html->link($storeSortfield->store->name, ['controller' => 'Stores', 'action' => 'view', $storeSortfield->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sort') ?></th>
            <td><?= h($storeSortfield->sort) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storeSortfield->id) ?></td>
        </tr>
    </table>
</div>
