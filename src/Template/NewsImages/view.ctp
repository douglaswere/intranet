<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsImage $newsImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit News Image'), ['action' => 'edit', $newsImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete News Image'), ['action' => 'delete', $newsImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List News Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newsImages view large-9 medium-8 columns content">
    <h3><?= h($newsImage->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('News') ?></th>
            <td><?= $newsImage->has('news') ? $this->Html->link($newsImage->news->title, ['controller' => 'News', 'action' => 'view', $newsImage->news->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($newsImage->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tmp Name') ?></th>
            <td><?= h($newsImage->tmp_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= h($newsImage->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width') ?></th>
            <td><?= h($newsImage->width) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Feature') ?></th>
            <td><?= h($newsImage->feature) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($newsImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $this->Number->format($newsImage->size) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($newsImage->url)); ?>
    </div>
</div>
