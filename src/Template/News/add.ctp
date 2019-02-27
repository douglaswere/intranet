<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News $news
 */
$this->extend('/Common/centerPage')
?>
<?php $this->start('links') ?>

    <li><<?= $this->Html->link(__('List News'), ['action' => 'index']) ?></li>

    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>

<?php $this->end() ?>

<?php $this->start('center'); ?>
     <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>   <script>
        $(document).ready(function() {
            $('#text').summernote({

                placeholder: 'Add new article',
                tabsize: 2,
                height: 300

            });

        });
    </script>
    <div class="container">
        <div class="row">

            <div class="col-12 content py-3">
                <h3 class="h3-news py-3">News Articles</h3>

                <p class="p-news">You may submit any news articles to be posted on the SCC intranet homepage. Each
                    article submission
                    has
                    to include an image and article title. You may save your submission as a draft and come back at a
                    later
                    date to further edit it at any time. Once your article is submitted it will be sent to the web
                    development team for approval. Please keep all article submissions work appropriate and try to be
                    courteus to others in respect to submitted content.</p>
                <hr>
            </div>
            <div class="col-12 py-2">

                <h2 class="h2-news"><i id="fa-plus" class="fa fa-plus"></i> Submit News Article</h2>

                <p class="p-news">Please use the form below to submit any new articles for publication.</p>

            </div>
            <div class="col-12 container">

                <div class="col-12 add-container">
                    <div class="news box-container">
                        <fieldset>

                            <div class="col-md-6">
                                <?= $this->Form->create($news,['type'=>'file']) ?>
                                <?php
                                echo $this->Form->label('title','Title*',['class' => 'label']);

                                echo $this->Form->control('title', ['label' => false,'class' => 'form-control']);
                                echo $this->Form->label('images','Image*',['class' => 'label']);
                                echo $this->Form->control('image', ['type' => 'file', 'class' => 'form-control','label'=>false ]);
                               echo ' <br>';
                                ?>
                            </div>
                            <div class="col-md-12">
                            <?php
                            echo $this->Form->control('text', ['label' => false, 'rows' => '15', 'cols' => '10']);
                            echo $this->Form->control('feature',['class'=>'form-control']);
                            echo $this->Form->control('tags._ids', ['options' => $tags]);

                            ?>
                            <?php
                            echo $this->Form->button('Submit', ['type' => 'Submit',
                                'class'=>'submit'

                            ]);

                            echo $this->Form->button('Publish', ['type' => 'Submit',
                                'class'=>'publish'
                            ]);

                            echo $this->Form->postButton('Save as Draft', ['controller' => 'News', 'action' => 'draft', 5 ],['escape' => true,
                                'class'=>'draft']);
                            echo $this->Form->button('Cancel', ['type' => 'reset', 'escape' => true,
                                'class'=>'cancel']);
                            ?>

                            <?= $this->Form->end() ?>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="py-2">



                </div>

            </div>
        </div>
    </div>

<?php $this->end(); ?>
