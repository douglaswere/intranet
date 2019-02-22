<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News[]|\Cake\Collection\CollectionInterface $news
 */
$this->extend('/Common/centerPage');
$this->assign('title','News');
?>
<?php $this->start('links'); ?>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New News'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
<?php $this->end(); ?>


    <?php $this->start('table'); ?>

    <table cellpadding="0" cellspacing="0" id="example" class=" table-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('feature') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date_submitted') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date_modified') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date_approved') ?></th>
            <th scope="col"><?= $this->Paginator->sort('date_expires') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($news as $news): ?>
            <tr>
                <td>
                    <?php
                    //$image = $this->Url->build('/' . 'files/' . $news->news_images['0']['name']);
                    $image = "https://drive.google.com/file/d/1_UzqCvORabWYalzR_uITMBRF-FEOmJfG/view";
                   // echo $news->news_images[0]["url"];
                    ?>
                    <img width="100px" src="https://drive.google.com/uc?export=view&id=<?php echo $news->news_images['0']['url']; ?>" height="50px" alt="<?php echo $news->news_images['0']['url']; ?>"></td>
                <td><?= $this->Number->format($news->id) ?></td>
                <td><?= h($news->title) ?></td>
                <td><?= $news->has('user') ? $this->Html->link($news->user->title, ['controller' => 'Users', 'action' => 'view', $news->user->id]) : '' ?></td>
                <td><?= h($news->feature) ?></td>
                <td><?= h($news->date_submitted) ?></td>
                <td><?= h($news->date_modified) ?></td>
                <td><?= h($news->date_approved) ?></td>
                <td><?= h($news->date_expires) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $news->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $news->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

<?php $this->end(); ?>

