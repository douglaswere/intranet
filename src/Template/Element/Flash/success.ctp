<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success" onclick="this.classList.add('hidden');"> <i id="fa-success" class="fa fa-exclamation-circle"></i><?= $message ?></div>
