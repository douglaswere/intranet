<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoreIpmap $storeIpmap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Store Ipmaps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="storeIpmaps form large-9 medium-8 columns content">
    <?= $this->Form->create($storeIpmap) ?>
    <fieldset>
        <legend><?= __('Add Store Ipmap') ?></legend>
        <?php
            echo $this->Form->control('store_id', ['options' => $stores]);
            echo $this->Form->control('ip_address');
            echo $this->Form->control('port');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
