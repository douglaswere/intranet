<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News[]|\Cake\Collection\CollectionInterface $news
 */

?>

<?php if ($this->fetch('center')): ?>

    <?= $this->fetch('center') ?>

<?php endif ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1> <?= $this->fetch('title') ?></h1>
        </div>
        <div class="col-md-6">
            <?php if ($this->fetch('links')): ?>
                <div class="dropdown links">
                    <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        Actions
                    </a>
                    <div class="dropdown-menu linked" aria-labelledby="dropdownMenuButton">
                        <?= $this->fetch('links') ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?php if ($this->fetch('form')): ?>
<div class="row">
    <div class="justify-content-center d-flex justify-content-center container col-md-12">
        <div class="announcements py-3 col-6 align-items-center">
            <?= $this->fetch('form') ?>

        </div>
    </div>
    </div>
<?php endif ?>


<?php if ($this->fetch('links')): ?>
    <div class="dropdown links">
        <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            Actions
        </a>
        <div class="dropdown-menu linked" aria-labelledby="dropdownMenuButton">
            <?= $this->fetch('links') ?>
        </div>
    </div>
<?php endif ?>
