<?php foreach ($announcement as $announce): ?>
    <?php
    $priority = $announce->priority;
    switch ($priority) {
        case 0:
            $alert = 'alert-danger';
            $fa = 'exclamation-triangle';
            break;
        case 1:
            $alert = 'alert-warning';
            $fa = 'exclamation-circle';
            break;
        case 2:
            $alert = 'alert-success';
            $fa = 'exclamation';
            break;
        case 3:
            $alert = 'alert-danger';
            $fa = 'exclamation-triangle';
            break;
        default:
            $alert = 'alert-info';
            $fa = 'exclamation';
    }

    ?>

    <div class="alert <?= $alert ?>" onclick="this.classList.add('hidden');">
        <div class="text-center">
            <i class="fas fa-<?= $fa ?>"></i>
        </div>
        <div class="text-center">
            <h2 class="blog-post-title text-capitalize"> <?= h($announce->title) ?>  </h2>
            <p class="text-center"><?= strip_tags($announce->text) ?>.</p>

        </div>
        <div class="text-center">
            <p class="text-center" style="text-decoration:underline"> <?= $announce->date_submitted ?></p>
        </div>
    </div>
<?php endforeach; ?>




