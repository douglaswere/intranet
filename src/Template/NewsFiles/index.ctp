<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsFile[]|\Cake\Collection\CollectionInterface $newsFiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New News File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsFiles index large-9 medium-8 columns content">
    <h3><?= __('News Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('news_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsFiles as $newsFile): ?>
            <tr>
                <td><?= $newsFile->has('news') ? $this->Html->link($newsFile->news->title, ['controller' => 'News', 'action' => 'view', $newsFile->news->id]) : '' ?></td>
                <td><?= $newsFile->has('file') ? $this->Html->link($newsFile->file->name, ['controller' => 'Files', 'action' => 'view', $newsFile->file->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newsFile->news_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsFile->news_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsFile->news_id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsFile->news_id)]) ?>
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
