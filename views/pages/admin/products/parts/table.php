<table class="table table-striped-columns">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($products as $number => $product): ?>
            <tr>
                <td><?= $number + 1 ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td>
                    <form action="/" method="POST">
                        <input type="hidden" name="type" value="remove_product" />
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            <a href="/admin/products/edit/<?= $product['id'] ?>" class="btn btn-info"><i class="fa-solid fa-marker"></i></a>
                        </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
