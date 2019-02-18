<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News[]|\Cake\Collection\CollectionInterface $news
 */
$this->extend('/Common/centerPage')
?>
<?php $this->start('center'); ?>

<?php echo $this->cell('Banner'); ?>

<div class="container">
    <div class="col-md-12 blog-main">
        <div class="row py-2">
            <div class="col-md-8">
                <span class="pb-3 mb-4 h3-semi text-left">NEWS & ANNOUNCEMENTS</span>
            </div>

            <div class="col-md-4">
                 <span
                     class="text-left"><?= $this->Html->link(__('Google Auth'), ['action' => 'googleAuth'],
                         ['class' => 'draft']) ?></span>
                <span
                    class="text-right"><?= $this->Html->link(__('Submit News Article'), ['action' => 'google'],
                        ['class' => 'draft']) ?></span>
            </div>
        </div>
        <?php echo $this->cell('Announcements'); ?>
        <?php //echo $this->cell('announcements'); ?>
        <?php foreach ($news as $news): ?>

            <div class="blog-post row">
                <div class="col-md-2">
                    <div class="card mb-4 shadow-sm">
                        <?php
                        $image = $this->Url->build('/' . 'files/' . $news->news_images[0]['name']);
                        ?>
                        <img
                            src="https://drive.google.com/uc?export=view&id=<?php echo $news->news_images['0']['url']; ?>"
                            class="img-fluid" alt="article">
                    </div>
                </div>

                <div class="col-md-8">
                    <h2 class="blog-post-title"><?= h($news->title) ?></h2>
                    <p class="main-p">
                        <?php

                        $string = strip_tags($news->text);
                        if (strlen($string) > 200) {

                            // truncate string
                            $stringCut = substr($string, 0, 200);
                            $endPoint = strrpos($stringCut, ' ');

                            //if the string doesn't contain any space then it will cut without word basis.
                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                            $string .= '...';
                        }
                        echo $string;
                        ?>

                    </p>

                    <h3>
                        <?= $this->Html->link(__('Read more'), ['action' => 'view', $news->id], ['class' => 'a-h3']) ?>

                    </h3>

                </div>
                <div class="col-md-2 d-flex justify-content-center">
                    <p class="blog-post-meta"><?= h($news->date_submitted) ?> by <a
                            href="#"><?= $news->has('user') ? $this->Html->link($news->user->first_name,
                                ['controller' => 'Users', 'action' => 'view', $news->user->first_name]) : '' ?></a>
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
            <div class="paginator">
                <div class="text-center py-3">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                </div>
                <div class="text-center py-3">
                    <p class="text-center text-capitalize"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
            </div>
        </div>

    </div>

    <?php $this->end(); ?>



