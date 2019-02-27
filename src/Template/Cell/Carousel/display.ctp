<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <?php
        $ct = 0;
        $active = '';
        foreach ($feature as $news):
            if ($ct === 0) {
                $active = 'active';
            } else {
                $active = '';
            }
            ?>
            <li data-target="#demo" data-slide-to="<?php $ct; ?>" class="<?php $active; ?>"></li>
        <?php endforeach; ?>
    </ul>
    <div class="carousel-inner">
        <?php
        $ct = 0;
        $active = '';
        foreach ($feature as $news):
            if ($ct === 0) {
                $active = 'active';
            } else {
                $active = '';
            }
            $image = $this->Url->build('/' . 'files/' . $news->files[0]['name']);
            $name = $this->Url->build('/' . 'files/' . $news->files[0]['name']);
            $path = $news->files[0]['path'];
            $style = $news->banner_css;
            $ct++;
            //background-image: linear-gradient(to right, #46696B 50% , #BFDEA3 50%);
            ?>
            <div class="carousel-item <?php echo $active; ?> border-botton-line " style="<?php echo $style; ?>">
                <div class="row">
                    <div class="col-md-7 text-center" >
                        <img src="<?php echo $image; ?>" alt="<?php echo $image; ?>"  height="400px">
                    </div>
                    <div class="col-md-4">
                        <div class="carousel-caption">
                            <h3><?= strip_tags($news->title) ?></h3>
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
                            <p class="blog-post-meta text-center">
                                <?= h($news->date_submitted) ?> by
                                <a href="#"><?= $news->has('user') ? $this->Html->link($news->user->first_name,
                                        ['controller' => 'Users', 'action' => 'view', $news->user->first_name]) : '' ?></a>
                            </p>
                            <h3>
                                <?= $this->Html->link(__('Read full article'), ['action' => 'view', $news->id], ['class' => 'a-h3']) ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
