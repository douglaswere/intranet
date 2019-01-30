<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreReturn[]|\Cake\Collection\CollectionInterface $storeReturns
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Store Return'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeReturns index large-9 medium-8 columns content">
    <h3><?= __('Store Returns') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('return_to_address_code') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storeReturns as $storeReturn): ?>
            <tr>
                <td><?= $this->Number->format($storeReturn->id) ?></td>
                <td><?= $storeReturn->has('store') ? $this->Html->link($storeReturn->store->name, ['controller' => 'Stores', 'action' => 'view', $storeReturn->store->id]) : '' ?></td>
                <td><?= h($storeReturn->company_code) ?></td>
                <td><?= h($storeReturn->return_to_address_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storeReturn->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storeReturn->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storeReturn->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeReturn->id)]) ?>
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
