<?php if (!empty($_SESSION['notify'])): ?>
    <div id="notify" class="alert alert-<?= $_SESSION['notify']['class'] ?> notification" role="alert"><?= $_SESSION['notify']['text'] ?></div>
    <?php
    unset($_SESSION['notify']);
endif;
