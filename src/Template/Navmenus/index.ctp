<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Navmenu[]|\Cake\Collection\CollectionInterface $navmenus
 */
$this->extend('/Common/centerPage')
?>



<?php $this->start('links'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Navmenu'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<?php $this->end(); ?>
<?php $this->start('table'); ?>

<div class="container ">
    <div class="row ">
    <h3><?= __('Navmenus') ?></h3>
    <table cellpadding="0" cellspacing="0" id="example">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('htmlid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('navmenu_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($navmenus as $navmenu): ?>
            <tr>
                <td><?= $this->Number->format($navmenu->id) ?></td>
                <td><?= h($navmenu->title) ?></td>
                <td><?= h($navmenu->destination) ?></td>
                <td><?= h($navmenu->htmlid) ?></td>
                <td><?= $navmenu->has('store') ? $this->Html->link($navmenu->store->name, ['controller' => 'Stores', 'action' => 'view', $navmenu->store->id]) : '' ?></td>
                <td><?= $this->Number->format($navmenu->navmenu_id) ?></td>
                <td><?= $this->Number->format($navmenu->sort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $navmenu->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $navmenu->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $navmenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $navmenu->id)]) ?>
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
</div>

<?php $this->end(); ?>
