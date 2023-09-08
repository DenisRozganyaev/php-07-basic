<?php
require_once ADMIN_PARTS_DIR . '/header.php';
?>
<div class="container" style="padding-top: 10em;">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>Main Products</h3>
            <?php showMainProductsTable(); ?>

            <br>
            <hr>
            <br>

            <h3>Additional Products</h3>
            <?php showAdditionalProductsTable(); ?>
        </div>
    </div>
</div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';
