<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Newsimage $newsimage
 */
$this->extend('/Common/addPage');
$this->assign('title','Edit');
?>
<?php $this->start('links'); ?>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $newsimage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $newsimage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Newsimages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->start('form') ?>
    <?= $this->Form->create($newsimage) ?>
    <fieldset>
        <legend><?= __('Edit Newsimage') ?></legend>
        <?php
            echo $this->Form->control('news_id', ['options' => $news]);
            echo $this->Form->control('name');
            echo $this->Form->control('size');
            echo $this->Form->control('tmp_name');
            echo $this->Form->control('height');
            echo $this->Form->control('width');
            echo $this->Form->control('feature');
            echo $this->Form->control('url');
            echo $this->Form->control('style');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['type' => 'Submit',
        'class'=>'submit'

    ]) ?>
    <?= $this->Form->end() ?>
<?php $this->end(); ?>
