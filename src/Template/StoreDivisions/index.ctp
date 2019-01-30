<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreDivision[]|\Cake\Collection\CollectionInterface $storeDivisions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Store Division'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeDivisions index large-9 medium-8 columns content">
    <h3><?= __('Store Divisions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ar_division_number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storeDivisions as $storeDivision): ?>
            <tr>
                <td><?= $this->Number->format($storeDivision->id) ?></td>
                <td><?= $storeDivision->has('store') ? $this->Html->link($storeDivision->store->name, ['controller' => 'Stores', 'action' => 'view', $storeDivision->store->id]) : '' ?></td>
                <td><?= h($storeDivision->company_code) ?></td>
                <td><?= h($storeDivision->ar_division_number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storeDivision->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storeDivision->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storeDivision->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeDivision->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
