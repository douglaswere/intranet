<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionsUser[]|\Cake\Collection\CollectionInterface $permissionsUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Permissions User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissionsUsers index large-9 medium-8 columns content">
    <h3><?= __('Permissions Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('permissions_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissionsUsers as $permissionsUser): ?>
            <tr>
                <td><?= $permissionsUser->has('permission') ? $this->Html->link($permissionsUser->permission->name, ['controller' => 'Permissions', 'action' => 'view', $permissionsUser->permission->id]) : '' ?></td>
                <td><?= $permissionsUser->has('user') ? $this->Html->link($permissionsUser->user->title, ['controller' => 'Users', 'action' => 'view', $permissionsUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permissionsUser->permissions_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permissionsUser->permissions_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permissionsUser->permissions_id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionsUser->permissions_id)]) ?>
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
