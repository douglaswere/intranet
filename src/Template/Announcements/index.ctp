<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Announcement[]|\Cake\Collection\CollectionInterface $announcements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Announcement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="announcements index large-9 medium-8 columns content">
    <h3><?= __('Announcements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_approved') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_expires') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcements as $announcement): ?>
            <tr>
                <td><?= $this->Number->format($announcement->id) ?></td>
                <td><?= h($announcement->title) ?></td>
                <td><?= $announcement->has('user') ? $this->Html->link($announcement->user->title, ['controller' => 'Users', 'action' => 'view', $announcement->user->id]) : '' ?></td>
                <td><?= $this->Number->format($announcement->priority) ?></td>
                <td><?= h($announcement->date_submitted) ?></td>
                <td><?= h($announcement->date_approved) ?></td>
                <td><?= h($announcement->date_expires) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $announcement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $announcement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $announcement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $announcement->id)]) ?>
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
