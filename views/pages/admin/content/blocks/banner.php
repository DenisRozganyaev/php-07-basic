<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$fields = json_decode($block['content'], true);
?>

    <div class="container" style="padding-top: 10em;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center"><h3>Block: "<?= $block['name'] ?>"</h3></div>
                    <form action="">
                        <div class="card-body"></div>
                        <div class="card-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';
