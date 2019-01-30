<!doctype html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= 'Intranet' ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('form.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('mine.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
<body>
<div class="container">
    <div class="col-md-12">
        <div class="row blog-header ">
            <div class="col-md-12  py-3">
                <div class="float-right">
                    <form id="search-form" name="search-form">
                        <input id="filter" class="search-input" type="text" placeholder="Search" />
                        <i id="filtersubmit" class="fa fa-search"></i>

                    </form>
                </div>
            </div>
            <div class="col-md-12  text-center flex-nowrap justify-content-between align-items-center">
                <span class="small" href="#">SCCIT </span><span class="bold"> INTRANET</span>
            </div>
            <div class="col-md-12 ">
                <div class="float-right">
                    <i id="fa-lock" class="fa fa-lock"></i>  <a href="#" class="separator-right"> Login</a>
                    <i id="fa-support" class="fa fa-question-circle"></i>  <a href="#"> Support</a> |
                </div>
            </div>
            <?= $this->cell('Menu'); ?>
        </div>
    </div>
</div>
<main role="main" class="container">

    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>
    <?= $this->element('footer'); ?>
</main><!-- /.container -->
</body>
</html>
