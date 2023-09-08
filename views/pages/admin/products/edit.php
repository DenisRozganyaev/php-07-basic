<?php
require_once ADMIN_PARTS_DIR . '/header.php';
extract(formSessionData(SESSION_KEYS::EDIT_PRODUCT))
?>
<div class="container" style="padding: 10rem 0">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center"><h3>Edit Product</h3></div>
                <div class="card-body">
                    <form action="/" method="POST">
                        <input type="hidden" name="type" value="edit_product">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                   id="name"
                                   value="<?= $fields['name'] ?? $product['name'] ?>"
                            />
                        </div>
                        <?= formError($errors['name'] ?? null) ?>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                   name="is_main"
                                   value="1"
                                   role="switch"
                                   id="flexSwitchCheckChecked"
                                   <?= $product['is_main'] ? 'checked' : '' ?>
                            />
                            <label class="form-check-label" for="flexSwitchCheckChecked">Is main product?</label>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5"><?= $fields['description'] ?? $product['description'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" min="0" step="1" name="quantity" class="form-control"
                                   id="quantity"
                                   value="<?= $fields['quantity'] ?? $product['quantity'] ?>"
                            />
                        </div>
                        <?= formError($errors['quantity'] ?? null) ?>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" min="0.1" step="0.1" name="price" class="form-control"
                                   id="price"
                                   value="<?= $fields['price'] ?? $product['price'] ?>"
                            />
                        </div>
                        <?= formError($errors['price'] ?? null) ?>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';