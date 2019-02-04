<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News[]|\Cake\Collection\CollectionInterface $news
 */
$this->extend('/Common/centerPage')
?>

<?php $this->start('links'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

        <li><?= $this->Html->link(__('Publish Article/news'), ['action' => 'add']) ?></li>

    </ul>
</nav>
<?php $this->end(); ?>

<?php $this->start('center'); ?>

<?php echo $this->cell('Banner'); ?>

<div class="row">
    <div class="col-md-12 blog-main">
        <h3 class="pb-3 mb-4 h3-semi">NEWS & ANNOUNCEMENTS</h3>
        <?php echo $this->cell('Announcements'); ?>

        <?php //echo $this->cell('announcements'); ?>
        <?php foreach ($news as $news): ?>

            <div class="blog-post row">
                <div class="col-md-2">
                    <div class="card mb-4 shadow-sm">
                        <?php
                        $image = $this->Url->build('/' . 'files/' . $news->news_images[0]['name']);
                        ?>
                        <img src="https://drive.google.com/uc?export=view&id=<?php echo $news->news_images['0']['url']; ?>" class="img-fluid" alt="article">
                    </div>
                </div>

                <div class="col-md-8">
                    <h2 class="blog-post-title"><?= h($news->title) ?></h2>
                    <p class="main-p"><?= strip_tags($news->text) ?></p>

                    <h3>
                        <?= $this->Html->link(__('Read more'), ['action' => 'view', $news->id], ['class' => 'a-h3']) ?>

                    </h3>

                </div>
                <div class="col-md-2 d-flex justify-content-center">
                    <p class="blog-post-meta"><?= h($news->date_submitted) ?> by <a
                            href="#"><?= $news->has('user') ? $this->Html->link($news->user->first_name, ['controller' => 'Users', 'action' => 'view', $news->user->first_name]) : '' ?></a>
                    </p>
                </div>

            </div>

            <hr>
        <?php endforeach; ?>



    </div><!-- /.blog-post -->
    <div class="container py-3">
        <div class="text-center py-3">
            <h3>
                <a class="a-h3" href="#">View all announcements</a>
            </h3>
        </div>

        <div class="text-center py-3">
            <div class="pagination">

            </div>
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
        </div>

    </div>

    <?php $this->end(); ?>



