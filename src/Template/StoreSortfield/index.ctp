<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreSortfield[]|\Cake\Collection\CollectionInterface $storeSortfield
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Store Sortfield'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeSortfield index large-9 medium-8 columns content">
    <h3><?= __('Store Sortfield') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storeSortfield as $storeSortfield): ?>
            <tr>
                <td><?= $this->Number->format($storeSortfield->id) ?></td>
                <td><?= $storeSortfield->has('store') ? $this->Html->link($storeSortfield->store->name, ['controller' => 'Stores', 'action' => 'view', $storeSortfield->store->id]) : '' ?></td>
                <td><?= h($storeSortfield->sort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $storeSortfield->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storeSortfield->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storeSortfield->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeSortfield->id)]) ?>
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
