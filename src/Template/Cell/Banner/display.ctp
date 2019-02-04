<?php foreach ($feature as $news): ?>

    <?php
    $image = $this->Url->build('/' . 'files/' . $news->news_images[0]['name']);

    ?>
    <div class="container-fluid"
         style=" background-image: url('https://drive.google.com/uc?export=view&id=<?php echo $news->news_images['0']['url']; ?>'); background-repeat:no-repeat;background-size: cover">
        <div class="container p-3 p-md-5 text-white ">
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
    <div class="text-center">
    <h2 class="main-h2 py-3"><?= strip_tags($news->title) ?></h2>
        <p class="main-p py-3">
            <?php
            $string = strip_tags($news->text);
            if (strlen($string) > 500) {

                // truncate string
                $stringCut = substr($string, 0, 500);
                $endPoint = strrpos($stringCut, ' ');

                //if the string doesn't contain any space then it will cut without word basis.
                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                $string .= '...';
            }
            echo $string;
            ?>.
        </p>

        <h3>
            <?= $this->Html->link(__('Read full article'), ['action' => 'view', $news->id], ['class' => 'a-h3']) ?>

        </h3>
    </div>
<?php endforeach; ?>




