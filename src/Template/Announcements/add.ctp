<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement $announcement
 */
$this->extend('/Common/addPage')
?>
<?php $this->start('links') ?>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Announcements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<?php $this->end() ?>
<?php $this->start('form'); ?>
    <?= $this->Form->create($announcement) ?>
    <fieldset>
        <legend><?= __('Add Announcement') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('text');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('priority');

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
<?php $this->end(); ?>

