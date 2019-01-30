<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-danger" onclick="this.classList.add('hidden');"> <i id="fa-danger" class="fa fa-exclamation-circle"></i><?= $message ?></div>
