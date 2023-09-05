<?php if (!empty($_SESSION['notify'])): ?>
    <div class="alert alert-<?= $_SESSION['notify']['class'] ?>" role="alert"><?= $_SESSION['notify']['text'] ?></div>
    <?php
    unset($_SESSION['notify']);
endif;
