<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreIpmap $storeIpmap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store Ipmap'), ['action' => 'edit', $storeIpmap->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store Ipmap'), ['action' => 'delete', $storeIpmap->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storeIpmap->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Store Ipmaps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store Ipmap'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storeIpmaps view large-9 medium-8 columns content">
    <h3><?= h($storeIpmap->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $storeIpmap->has('store') ? $this->Html->link($storeIpmap->store->name, ['controller' => 'Stores', 'action' => 'view', $storeIpmap->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip Address') ?></th>
            <td><?= h($storeIpmap->ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storeIpmap->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Port') ?></th>
            <td><?= $this->Number->format($storeIpmap->port) ?></td>
        </tr>
    </table>
</div>
