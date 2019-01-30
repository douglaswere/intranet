<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionGroup $permissionGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permission Group'), ['action' => 'edit', $permissionGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permission Group'), ['action' => 'delete', $permissionGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permission Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissionGroups view large-9 medium-8 columns content">
    <h3><?= h($permissionGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($permissionGroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($permissionGroup->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Permissions') ?></h4>
        <?php if (!empty($permissionGroup->permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Permission Group Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($permissionGroup->permissions as $permissions): ?>
            <tr>
                <td><?= h($permissions->id) ?></td>
                <td><?= h($permissions->name) ?></td>
                <td><?= h($permissions->description) ?></td>
                <td><?= h($permissions->permission_group_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Permissions', 'action' => 'view', $permissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Permissions', 'action' => 'edit', $permissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Permissions', 'action' => 'delete', $permissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
