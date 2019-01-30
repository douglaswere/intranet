<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionsRole $permissionsRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $permissionsRole->role_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $permissionsRole->role_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Permissions Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissionsRoles form large-9 medium-8 columns content">
    <?= $this->Form->create($permissionsRole) ?>
    <fieldset>
        <legend><?= __('Edit Permissions Role') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
