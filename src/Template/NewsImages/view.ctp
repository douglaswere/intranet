<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Newsimage $newsimage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Newsimage'), ['action' => 'edit', $newsimage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Newsimage'), ['action' => 'delete', $newsimage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsimage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Newsimages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Newsimage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newsimages view large-9 medium-8 columns content">
    <h3><?= h($newsimage->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('News') ?></th>
            <td><?= $newsimage->has('news') ? $this->Html->link($newsimage->news->title, ['controller' => 'News', 'action' => 'view', $newsimage->news->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($newsimage->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tmp Name') ?></th>
            <td><?= h($newsimage->tmp_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= h($newsimage->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width') ?></th>
            <td><?= h($newsimage->width) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Feature') ?></th>
            <td><?= h($newsimage->feature) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($newsimage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $this->Number->format($newsimage->size) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($newsimage->url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Style') ?></h4>
        <?= $this->Text->autoParagraph(h($newsimage->style)); ?>
    </div>
</div>
