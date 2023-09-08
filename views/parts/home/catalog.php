<?php
$products = getProducts();
if (!empty($products)):
    $products = array_chunk($products, 3);
?>
<section id="catalog" class="section-gap">
    <div class="container">
        <div class="row title-row">
            <div class="col-12">
                <h1>What kind of Coffee we serve for you</h1>
                <p>Who are in extremely love with eco friendly system.</p>
            </div>
        </div>
        <?php foreach($products as $row): ?>
            <div class="row">
                <?php foreach ($row as $product): ?>
                    <div class="col-12 col-md-4 catalog-item"
                         data-bs-toggle="modal"
                         data-bs-target="#buyProduct"
                         data-id="<?= $product['id'] ?>"
                         data-qty="<?= $product['quantity'] ?>"
                         data-name="<?= $product['name'] ?>"
                         data-price="<?= $product['price'] ?>"
                    >
                        <div class="catalog-item-body">
                            <div class="d-flex justify-content-between catalog-item-title">
                                <h4><?= $product['name'] ?></h4>
                                <p class="price float-right">$<?= $product['price'] ?></p>
                            </div>
                            <p><?= $product['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php
endif;
