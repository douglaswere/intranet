<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blob $blob
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Blob'), ['action' => 'edit', $blob->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Blob'), ['action' => 'delete', $blob->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blob->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Blobs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blob'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="blobs view large-9 medium-8 columns content">
    <h3><?= h($blob->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($blob->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($blob->files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Blob Id') ?></th>
                <th scope="col"><?= __('Mime Type') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Width') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('Date Accessed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($blob->files as $files): ?>
            <tr>
                <td><?= h($files->id) ?></td>
                <td><?= h($files->blob_id) ?></td>
                <td><?= h($files->mime_type) ?></td>
                <td><?= h($files->name) ?></td>
                <td><?= h($files->size) ?></td>
                <td><?= h($files->width) ?></td>
                <td><?= h($files->height) ?></td>
                <td><?= h($files->date_created) ?></td>
                <td><?= h($files->date_accessed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
