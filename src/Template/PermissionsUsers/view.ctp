<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionsUser $permissionsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permissions User'), ['action' => 'edit', $permissionsUser->permissions_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permissions User'), ['action' => 'delete', $permissionsUser->permissions_id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionsUser->permissions_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permissions Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissions User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissionsUsers view large-9 medium-8 columns content">
    <h3><?= h($permissionsUser->permissions_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Permission') ?></th>
            <td><?= $permissionsUser->has('permission') ? $this->Html->link($permissionsUser->permission->name, ['controller' => 'Permissions', 'action' => 'view', $permissionsUser->permission->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $permissionsUser->has('user') ? $this->Html->link($permissionsUser->user->title, ['controller' => 'Users', 'action' => 'view', $permissionsUser->user->id]) : '' ?></td>
        </tr>
    </table>
</div>
