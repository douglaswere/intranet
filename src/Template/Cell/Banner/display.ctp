<!--
<?php /*if($feature.count() < 1): */?>

    <?php /*foreach ($feature as $news): */?>
        <div class="blog-post row">
            <div class="col-md-2">
                <div class="card mb-4 shadow-sm">
                    <img src="img/news.png" class="img-fluid" alt="article">
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="blog-post-title"><?/*= h($news->title) */?></h2>
                <p class="main-p"><?/*= h($news->text) */?>.</p>
                <?/*= h($news->feature) */?>
                <h3>
                    <?/*= $this->Html->link(__('Read more'), ['action' => 'view', $news->id]) */?>
                    <a class="a-h3" href="#">Read More</a>
                </h3>

            </div>
            <div class="col-md-2 d-flex justify-content-center">
                <p class="blog-post-meta"><?/*= h($news->date_submitted) */?> by <a
                            href="#"><?/*= $news->has('user') ? $this->Html->link($news->user->title, ['controller' => 'Users', 'action' => 'view', $news->user->first_name]) : '' */?></a>
                </p>
            </div>
        </div>
    <?php /*endforeach; */?>

<?php /*else :*/?>



--><?php /*endif; */?>




<div class="container p-3 p-md-5 text-white bg-dark banner"    style=" background-image: url('img/banner.png'); background-repeat:no-repeat;background-size: cover">
    <div class="row">
        <div class="col-md-8 ">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
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
                     <button type="button" class="btn btn-primary btn-lg btn-block btn-block-web"><i id="fa-support" class="fas fa-file"></i> WebDev Ticket</button>
                    <button type="button" class="btn btn-secondary btn-lg btn-block"><i id="fa-support" class="fas fa-file"></i>   IIT Ticket</button>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="text-center">

    <h2 class="main-h2 py-3">HELLO INTRANET</h2>
    <p class="main-p py-3">Below is an example form built entirely with Bootstrap’s form controls. Each required
        form group
        has a validation state that can be triggered by attempting to submit the form without completing it.
        Lorem
        ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor
        sit
        amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque
        penatibus et
        magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate,
        felis
        tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.Lorem ipsum dolor sit amet, consectetur
        adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra
        justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient
        montes,
        nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed
        rhoncus pronin sapien nunc accuan eget.</p>
</div