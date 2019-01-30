<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsTag $newsTag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit News Tag'), ['action' => 'edit', $newsTag->news_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete News Tag'), ['action' => 'delete', $newsTag->news_id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsTag->news_id)]) ?> </li>
        <li><?= $this->Html->link(__('List News Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newsTags view large-9 medium-8 columns content">
    <h3><?= h($newsTag->news_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('News') ?></th>
            <td><?= $newsTag->has('news') ? $this->Html->link($newsTag->news->title, ['controller' => 'News', 'action' => 'view', $newsTag->news->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $newsTag->has('tag') ? $this->Html->link($newsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $newsTag->tag->id]) : '' ?></td>
        </tr>
    </table>
</div>
