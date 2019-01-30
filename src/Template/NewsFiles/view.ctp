<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsFile $newsFile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit News File'), ['action' => 'edit', $newsFile->news_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete News File'), ['action' => 'delete', $newsFile->news_id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsFile->news_id)]) ?> </li>
        <li><?= $this->Html->link(__('List News Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newsFiles view large-9 medium-8 columns content">
    <h3><?= h($newsFile->news_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('News') ?></th>
            <td><?= $newsFile->has('news') ? $this->Html->link($newsFile->news->title, ['controller' => 'News', 'action' => 'view', $newsFile->news->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $newsFile->has('file') ? $this->Html->link($newsFile->file->name, ['controller' => 'Files', 'action' => 'view', $newsFile->file->id]) : '' ?></td>
        </tr>
    </table>
</div>
