<?php
require_once ACCOUNT_PARTS_DIR . '/header.php';
?>

    <div class="container" style="padding-top: 10em;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h3>Orders #<?= $order['id'] ?></h3>
                <table class="table table-striped-columns">
                    <thead>
                    <th>Name</th>
                    <th>Value</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Total</td>
                        <td><?= $order['total'] ?></td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td><?= $order['created_at'] ?></td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <h4>Products:</h4>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $number => $item):
                        if (!is_array($item)) continue;
                        $parentNumber = $number + 1;
                        ?>
                        <tr>
                            <td><?= $parentNumber ?></td>
                            <td><?= $item['name'] ?></td>
                            <td>$<?= $item['single_price'] ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>$<?= ($item['single_price'] * $item['quantity']) ?></td>
                        </tr>
                        <?php
                        $additions = json_decode($item['additions'], true);
                        if (!empty($additions)):
                            foreach ($additions as $subNumber => $addition):
                                ?>
                                <tr>
                                    <td>-</td>
                                    <td><?= $addition['name'] ?></td>
                                    <td>$<?= $addition['price'] ?></td>
                                    <td><?= $addition['quantity'] ?></td>
                                    <td>$<?= $addition['total'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
require_once ACCOUNT_PARTS_DIR . '/footer.php';