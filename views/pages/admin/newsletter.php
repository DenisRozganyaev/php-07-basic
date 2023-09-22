<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$subscribers = dbSelect(Tables::Newsletter, 'email', order: 'email');
?>

    <form class="container" style="padding-top: 10em;">
        <div class="row text-center">
            <div class="col">
                <h3>Newsletter</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <?php if (!empty($subscribers)): ?>
                <div class="mb-3">
                    
                </div>
                <div class="mb-3">
                    <label for="subscribers">Subscribers</label>
                    <select name="emails[]" id="subscribers" class="form-control" multiple>
                        <?php foreach ($subscribers as $subscriber): ?>
                            <option value="<?= $subscriber['email'] ?>" selected><?= $subscriber['email'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-8">
            </div>
        </div>
    </form>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';
