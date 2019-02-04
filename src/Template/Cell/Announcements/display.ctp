<?php foreach ($announcement as $announce): ?>
    <div class="alert alert-danger" onclick="this.classList.add('hidden');">
        <div class="text-center">
            <h4 class="main-h2 py-3"><i id="fa-danger" class="fa fa-exclamation-circle"></i> <?= h($announce->title) ?>
            </h4>
            <p class="main-p py-3 text-center"><?= strip_tags($announce->text) ?>.</p>
        </div>
    </div>
<?php endforeach; ?>




