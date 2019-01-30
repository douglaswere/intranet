<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserLogin $userLogin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Login'), ['action' => 'edit', $userLogin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Login'), ['action' => 'delete', $userLogin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLogin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Logins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Login'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userLogins view large-9 medium-8 columns content">
    <h3><?= h($userLogin->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userLogin->has('user') ? $this->Html->link($userLogin->user->title, ['controller' => 'Users', 'action' => 'view', $userLogin->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip Address') ?></th>
            <td><?= h($userLogin->ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Browser') ?></th>
            <td><?= h($userLogin->browser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resolution') ?></th>
            <td><?= h($userLogin->resolution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login Code') ?></th>
            <td><?= h($userLogin->login_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login Token') ?></th>
            <td><?= h($userLogin->login_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login Remember Me') ?></th>
            <td><?= h($userLogin->login_remember_me) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userLogin->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login Token Expires') ?></th>
            <td><?= h($userLogin->login_token_expires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login Remember Me Expires') ?></th>
            <td><?= h($userLogin->login_remember_me_expires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login Success') ?></th>
            <td><?= h($userLogin->login_success) ?></td>
        </tr>
    </table>
</div>
