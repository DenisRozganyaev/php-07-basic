<?php $additions = getProducts(false); ?>
<div class="modal" id="buyProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="/" method="POST" id="buy-form">
                <input type="hidden" name="type" value="add_to_cart">
                <input type="hidden" name="product_id" id="productIdField"/> <!-- Put value via JS -->

                <div class="modal-header">
                    <h5 class="modal-title">Buy product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row product-row__header">
                            <h6 class="col-5"><b>Product name</b></h6>
                            <h6 class="col-2"><b>Single Price</b></h6>
                            <h6 class="col-3"><b>Quantity</b></h6>
                            <h6 class="col-2"><b>Total</b></h6>
                        </div>
                        <div class="row product-row">
                            <div class="col-5 product-name"></div>
                            <div class="col-2 product-price"></div>
                            <div class="col-3 form-group product-quantity">
                                <input type="number" name="quantity" class="quantity-field form-control" min="1"
                                       value="1"/>
                            </div>
                            <div class="col-2 product-total"></div>
                        </div>
                        <div class="row pt-3">
                            <hr>
                            <h5>Additional products:</h5>
                            <?php foreach ($additions as $addition): ?>
                                <div class="col-4 additional-item">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label"
                                               for="addition-<?= $addition['id'] ?>"><?= $addition['name'] ?></label>
                                        <input class="form-check-input additional-toggle"
                                               type="checkbox"
                                               role="switch"
                                               name="additions[]"
                                               value="<?= $addition['id'] ?>"
                                               id="addition-<?= $addition['id'] ?>">
                                    </div>
                                    <div class="input-group mt-1 mb-3">
                                        <span class="input-group-text additional-price">
                                            $<span class="price"><?= $addition['price'] ?></span>
                                        </span>
                                        <input type="number"
                                               class="form-control additional-qty additional-qty-<?= $addition['id'] ?>"
                                               name="additions_qty[]"
                                               max="<?= $addition['quantity'] ?>"
                                               disabled
                                        />
                                        <span class="input-group-text additional-total"></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <h4 class="final">Total: <span class="total"></span></h4>
                    <button type="submit" class="btn btn-primary">Add to <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>