<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsImage[]|\Cake\Collection\CollectionInterface $newsImages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New News Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsImages index large-9 medium-8 columns content">
    <h3><?= __('News Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('news_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tmp_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('width') ?></th>
                <th scope="col"><?= $this->Paginator->sort('feature') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsImages as $newsImage): ?>
            <tr>
                <td><?= $this->Number->format($newsImage->id) ?></td>
                <td><?= $newsImage->has('news') ? $this->Html->link($newsImage->news->title, ['controller' => 'News', 'action' => 'view', $newsImage->news->id]) : '' ?></td>
                <td><?= h($newsImage->name) ?></td>
                <td><?= $this->Number->format($newsImage->size) ?></td>
                <td><?= h($newsImage->tmp_name) ?></td>
                <td><?= h($newsImage->height) ?></td>
                <td><?= h($newsImage->width) ?></td>
                <td><?= h($newsImage->feature) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newsImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsImage->id)]) ?>
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
