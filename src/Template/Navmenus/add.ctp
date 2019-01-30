<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Navmenu $navmenu
 */
$this->extend('/Common/centerPage')
?>
<?php $this->start('links') ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('List Navmenus'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Navmenus'), ['controller' => 'Navmenus', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Navmenu'), ['controller' => 'Navmenus', 'action' => 'add']) ?></li>
        </ul>
    </nav>
<?php $this->end() ?>

<?php $this->start('center'); ?>
    <div class="container">
        <div class="row">

            <div class="navmenus form box-container ">
                <?= $this->Form->create($navmenu) ?>
                <fieldset>
                    <legend><?= __('Add Navmenu') ?></legend>
                    <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('destination');
                    echo $this->Form->control('htmlid');
                    echo $this->Form->control('store_id', ['options' => $stores]);
                    echo $this->Form->control('navmenu_id', ['options' => $parentmenu]);
                    echo $this->Form->control('sort');
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<?php $this->end(); ?>