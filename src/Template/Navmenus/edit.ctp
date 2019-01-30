<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Navmenu $navmenu
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $navmenu->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $navmenu->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Navmenus'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Navmenus'), ['controller' => 'Navmenus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Navmenu'), ['controller' => 'Navmenus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="navmenus form large-9 medium-8 columns content">
    <?= $this->Form->create($navmenu) ?>
    <fieldset>
        <legend><?= __('Edit Navmenu') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('destination');
            echo $this->Form->control('htmlid');
            echo $this->Form->control('store_id', ['options' => $stores]);
        echo $this->Form->control('navmenu_id' ,['options' => $parentmenu]);
            echo $this->Form->control('sort');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
