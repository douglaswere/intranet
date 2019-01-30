<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News[]|\Cake\Collection\CollectionInterface $news
 */
?>

<?php if ($this->fetch('center')):?>

<?= $this->fetch('center')?>

<?php endif ?>

<?php if ($this->fetch('table')):?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

    <?= $this->fetch('table')?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

<?php endif ?>


<?php if ($this->fetch('links')):?>
    <div class="dropdown links">
        <a class="dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actions
        </a>
        <div class="dropdown-menu linked" aria-labelledby="dropdownMenuButton">
            <?= $this->fetch('links')?>
        </div>
    </div>
<?php endif ?>
