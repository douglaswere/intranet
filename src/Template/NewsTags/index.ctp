<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsTag[]|\Cake\Collection\CollectionInterface $newsTags
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New News Tag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsTags index large-9 medium-8 columns content">
    <h3><?= __('News Tags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('news_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsTags as $newsTag): ?>
            <tr>
                <td><?= $newsTag->has('news') ? $this->Html->link($newsTag->news->title, ['controller' => 'News', 'action' => 'view', $newsTag->news->id]) : '' ?></td>
                <td><?= $newsTag->has('tag') ? $this->Html->link($newsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $newsTag->tag->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newsTag->news_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsTag->news_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsTag->news_id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsTag->news_id)]) ?>
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
