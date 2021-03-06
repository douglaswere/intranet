<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserLogin[]|\Cake\Collection\CollectionInterface $userLogins
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Login'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userLogins index large-9 medium-8 columns content">
    <h3><?= __('User Logins') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('browser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resolution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_token_expires') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_remember_me') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_remember_me_expires') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login_success') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userLogins as $userLogin): ?>
            <tr>
                <td><?= $this->Number->format($userLogin->id) ?></td>
                <td><?= $userLogin->has('user') ? $this->Html->link($userLogin->user->title, ['controller' => 'Users', 'action' => 'view', $userLogin->user->id]) : '' ?></td>
                <td><?= h($userLogin->ip_address) ?></td>
                <td><?= h($userLogin->browser) ?></td>
                <td><?= h($userLogin->resolution) ?></td>
                <td><?= h($userLogin->login_code) ?></td>
                <td><?= h($userLogin->login_token) ?></td>
                <td><?= h($userLogin->login_token_expires) ?></td>
                <td><?= h($userLogin->login_remember_me) ?></td>
                <td><?= h($userLogin->login_remember_me_expires) ?></td>
                <td><?= h($userLogin->login_success) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userLogin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userLogin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userLogin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLogin->id)]) ?>
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
