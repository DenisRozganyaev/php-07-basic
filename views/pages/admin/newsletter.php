<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$subscribers = dbSelect(Tables::Newsletter, 'email', order: 'email');
?>

    <form class="container" action="/" method="POST" style="padding-top: 10em;">
        <input type="hidden" name="type" value="send_mail" />

        <div class="row text-center">
            <div class="col">
                <h3>Newsletter</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <?php if (!empty($subscribers)): ?>
                <div class="mb-3">
                    <label for="subscribers">Subscribers</label>
                    <select name="emails[]" id="subscribers" class="form-control" multiple required>
                        <?php foreach ($subscribers as $subscriber): ?>
                            <option value="<?= $subscriber['email'] ?>" selected><?= $subscriber['email'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-8">
                <h1 class="h3 mb-3 fw-normal">Create a mail</h1>
                <div class="form-floating mt-2">
                    <input type="text" class="form-control" id="floatingInput" name="subject"
                           value="<?= $fields['email'] ?? '' ?>"
                           placeholder="Put your subject"
                           required
                    />
                    <label for="floatingInput">Subject</label>
                </div>
                <div class="form-floating mt-2">
                    <textarea class="form-control" rows="15" name="body" required></textarea>
                    <label for="floatingInput">Body</label>
                </div>
                <button class="btn btn-primary w-100 mt-2 py-2" type="submit">Send email</button>
            </div>
        </div>
    </form>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';
