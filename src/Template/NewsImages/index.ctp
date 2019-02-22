<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Newsimage[]|\Cake\Collection\CollectionInterface $newsimages
 */
$this->extend('/Common/centerPage');
$this->assign('title','News Images');
?>
<?php $this->start('links') ?>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Newsimage'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
<?php $this->end() ?>
<?php $this->start('table'); ?>
    <table cellpadding="0" cellspacing="0" id="example" class=" table-responsive" >
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
            <?php foreach ($newsimages as $newsimage): ?>
            <tr>
                <td><?= $this->Number->format($newsimage->id) ?></td>
                <td><?= $newsimage->has('news') ? $this->Html->link($newsimage->news->title, ['controller' => 'News', 'action' => 'view', $newsimage->news->id]) : '' ?></td>
                <td><?= h($newsimage->name) ?></td>
                <td><?= $this->Number->format($newsimage->size) ?></td>
                <td><?= h($newsimage->tmp_name) ?></td>
                <td><?= h($newsimage->height) ?></td>
                <td><?= h($newsimage->width) ?></td>
                <td><?= h($newsimage->feature) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newsimage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsimage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsimage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsimage->id)]) ?>
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
<?php $this->end(); ?>
