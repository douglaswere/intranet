<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresFile $storesFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stores File'), ['action' => 'edit', $storesFile->store_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stores File'), ['action' => 'delete', $storesFile->store_id], ['confirm' => __('Are you sure you want to delete # {0}?', $storesFile->store_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stores File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storesFiles view large-9 medium-8 columns content">
    <h3><?= h($storesFile->store_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $storesFile->has('store') ? $this->Html->link($storesFile->store->name, ['controller' => 'Stores', 'action' => 'view', $storesFile->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $storesFile->has('file') ? $this->Html->link($storesFile->file->name, ['controller' => 'Files', 'action' => 'view', $storesFile->file->id]) : '' ?></td>
        </tr>
    </table>
</div>
