<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store[]|\Cake\Collection\CollectionInterface $stores
 */
$this->extend('/Common/centerPage');
$this->assign('title','Stores');
?>
<?php $this->start('links'); ?>
        <li><?= $this->Html->link(__('New Store'), ['action' => 'add']) ?></li>
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
<?php $this->end(); ?>
<?php $this->start('table'); ?>
    <table cellpadding="0" cellspacing="0"  id="example">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stores as $store): ?>
            <tr>
                <td><?= $this->Number->format($store->id) ?></td>
                <td><?= h($store->name) ?></td>
                <td><?= h($store->active) ?></td>
                <td><?= $store->has('parent_store') ? $this->Html->link($store->parent_store->name, ['controller' => 'Stores', 'action' => 'view', $store->parent_store->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $store->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $store->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?>
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

<?php $this->end(); ?>
