<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreVar[]|\Cake\Collection\CollectionInterface $storeVars
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Store Var'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeVars index large-9 medium-8 columns content">
    <h3><?= __('Store Vars') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storeVars as $storeVar): ?>
            <tr>
                <td><?= $this->Number->format($storeVar->id) ?></td>
                <td><?= $storeVar->has('store') ? $this->Html->link($storeVar->store->name, ['controller' => 'Stores', 'action' => 'view', $storeVar->store->id]) : '' ?></td>
                <td><?= h($storeVar->name) ?></td>
                <td><?= h($storeVar->type) ?></td>
                <td><?= h($storeVar->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storeVar->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storeVar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storeVar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeVar->id)]) ?>
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
