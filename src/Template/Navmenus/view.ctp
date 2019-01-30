<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Navmenu $navmenu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Navmenu'), ['action' => 'edit', $navmenu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Navmenu'), ['action' => 'delete', $navmenu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $navmenu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Navmenus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Navmenu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Navmenus'), ['controller' => 'Navmenus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Navmenu'), ['controller' => 'Navmenus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="navmenus view large-9 medium-8 columns content">
    <h3><?= h($navmenu->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($navmenu->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= h($navmenu->destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Htmlid') ?></th>
            <td><?= h($navmenu->htmlid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $navmenu->has('store') ? $this->Html->link($navmenu->store->name, ['controller' => 'Stores', 'action' => 'view', $navmenu->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($navmenu->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Navmenu Id') ?></th>
            <td><?= $this->Number->format($navmenu->navmenu_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sort') ?></th>
            <td><?= $this->Number->format($navmenu->sort) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Navmenus') ?></h4>
        <?php if (!empty($navmenu->navmenus)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Destination') ?></th>
                <th scope="col"><?= __('Htmlid') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Navmenu Id') ?></th>
                <th scope="col"><?= __('Sort') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($navmenu->navmenus as $navmenus): ?>
            <tr>
                <td><?= h($navmenus->id) ?></td>
                <td><?= h($navmenus->title) ?></td>
                <td><?= h($navmenus->destination) ?></td>
                <td><?= h($navmenus->htmlid) ?></td>
                <td><?= h($navmenus->store_id) ?></td>
                <td><?= h($navmenus->navmenu_id) ?></td>
                <td><?= h($navmenus->sort) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Navmenus', 'action' => 'view', $navmenus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Navmenus', 'action' => 'edit', $navmenus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Navmenus', 'action' => 'delete', $navmenus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $navmenus->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
