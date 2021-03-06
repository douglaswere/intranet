<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserLogin $userLogin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Logins'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userLogins form large-9 medium-8 columns content">
    <?= $this->Form->create($userLogin) ?>
    <fieldset>
        <legend><?= __('Add User Login') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('ip_address');
            echo $this->Form->control('browser');
            echo $this->Form->control('resolution');
            echo $this->Form->control('login_code');
            echo $this->Form->control('login_token');
            echo $this->Form->control('login_token_expires', ['empty' => true]);
            echo $this->Form->control('login_remember_me');
            echo $this->Form->control('login_remember_me_expires', ['empty' => true]);
            echo $this->Form->control('login_success', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
