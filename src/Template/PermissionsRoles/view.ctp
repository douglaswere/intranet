<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionsRole $permissionsRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permissions Role'), ['action' => 'edit', $permissionsRole->role_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permissions Role'), ['action' => 'delete', $permissionsRole->role_id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionsRole->role_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permissions Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permissions Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissionsRoles view large-9 medium-8 columns content">
    <h3><?= h($permissionsRole->role_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $permissionsRole->has('role') ? $this->Html->link($permissionsRole->role->name, ['controller' => 'Roles', 'action' => 'view', $permissionsRole->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permission') ?></th>
            <td><?= $permissionsRole->has('permission') ? $this->Html->link($permissionsRole->permission->name, ['controller' => 'Permissions', 'action' => 'view', $permissionsRole->permission->id]) : '' ?></td>
        </tr>
    </table>
</div>
