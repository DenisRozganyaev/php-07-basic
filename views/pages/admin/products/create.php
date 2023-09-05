<?php
require_once ADMIN_PARTS_DIR . '/header.php';
extract(formSessionData(SESSION_KEYS::CREATE_PRODUCT))
?>
<div class="container" style="padding: 10rem 0">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center"><h3>Create Product</h3></div>
                <div class="card-body">
                    <form action="/" method="POST">
                        <input type="hidden" name="type" value="create_product">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                   id="name"
                                   value="<?= $fields['name'] ?? '' ?>"
                            />
                        </div>
                        <?= formError($errors['name'] ?? null) ?>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_main" value="1" role="switch" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Is main product?</label>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5"><?= $fields['description'] ?? '' ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" min="0" step="1" name="quantity" class="form-control"
                                   id="quantity"
                                   value="<?= $fields['quantity'] ?? 1 ?>"
                            />
                        </div>
                        <?= formError($errors['quantity'] ?? null) ?>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" min="0.1" step="0.1" name="price" class="form-control"
                                   id="price"
                                   value="<?= $fields['price'] ?? 0.1 ?>"
                            />
                        </div>
                        <?= formError($errors['price'] ?? null) ?>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';