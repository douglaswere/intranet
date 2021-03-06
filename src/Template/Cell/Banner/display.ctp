<?php foreach ($feature as $news): ?>

    <?php
    $image = $this->Url->build('/' . 'files/' . $news->files[0]['name']);
    $path = $news->files[0]['path'];
    $style = $news->banner_css;
    //background-image: linear-gradient(to right, #46696B 50% , #BFDEA3 50%);
    ?>
    <div class="container-fluid" style="<?php echo $style; ?>">
        <div class="container py-lg-5 py-5 text-white border-botton-line"
             style=" background-image: url('https://drive.google.com/uc?export=view&id=<?php echo $path; ?>');background-repeat: no-repeat; background-size: contain;">
            <div class="row">
                <div class="col-md-8 ">
                    <h1 class="display-4 font-italic"></h1>
                </div>
                <div class="col-md-4 py-3" style="background: #1b1e21">
                    <div class="row">
                        <div class="col-md-12 ">
                            <h3 class="py-3">Got Questions?</h3>
                            <p style="text-align: left">If you have any inquiries or require assistance please
                                open up a ticket by clicking one of the links below.
                            </p>
                        </div>
                        <div class="col-md-12 ">
                            <button type="button" class="btn btn-primary btn-lg btn-block btn-block-web"><i
                                    id="fa-support" class="fas fa-file"></i> WebDev Ticket
                            </button>
                            <button type="button" class="btn btn-secondary btn-lg btn-block"><i id="fa-support"
                                                                                                class="fas fa-file"></i>
                                IIT Ticket
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" container text-center">
        <h2 class="main-h2 py-3"><?= strip_tags($news->title) ?></h2>
        <p class="blog-post-meta text-center">
            <?= h($news->date_submitted) ?> by
            <a href="#"><?= $news->has('user') ? $this->Html->link($news->user->first_name,
                    ['controller' => 'Users', 'action' => 'view', $news->user->first_name]) : '' ?></a>
        </p>
        <p class="container main-p py-3">
            <?php
            echo $this->Text->truncate(
                $news->text,
                2000,
                [
                    'ellipsis' => '...',
                    'exact' => false
                ]
            );
            ?>

        </p>

        <h3>
            <?= $this->Html->link(__('Read full article'), ['action' => 'view', $news->id], ['class' => 'a-h3']) ?>

        </h3>
    </div>
<?php endforeach; ?>




