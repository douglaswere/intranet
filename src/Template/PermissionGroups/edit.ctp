<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionGroup $permissionGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $permissionGroup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $permissionGroup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Permission Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissionGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($permissionGroup) ?>
    <fieldset>
        <legend><?= __('Edit Permission Group') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
