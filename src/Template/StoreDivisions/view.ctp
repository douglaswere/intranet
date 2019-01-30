<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreDivision $storeDivision
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store Division'), ['action' => 'edit', $storeDivision->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store Division'), ['action' => 'delete', $storeDivision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeDivision->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Store Divisions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Division'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storeDivisions view large-9 medium-8 columns content">
    <h3><?= h($storeDivision->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $storeDivision->has('store') ? $this->Html->link($storeDivision->store->name, ['controller' => 'Stores', 'action' => 'view', $storeDivision->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Code') ?></th>
            <td><?= h($storeDivision->company_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ar Division Number') ?></th>
            <td><?= h($storeDivision->ar_division_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storeDivision->id) ?></td>
        </tr>
    </table>
</div>
