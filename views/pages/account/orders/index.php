<?php
require_once ACCOUNT_PARTS_DIR . '/header.php';
?>

<div class="container" style="padding-top: 10em;">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>My Orders</h3>
            <table class="table table-striped-columns">
                <thead>
                <th>#</th>
                <th>Created At</th>
                </thead>
                <tbody>
                <?php foreach($orders as $order): ?>
                    <tr>
                        <td><a href="/account/orders/<?= $order['id'] ?>">Order #<?= $order['id'] ?></a></td>
                        <td><?= $order['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once ACCOUNT_PARTS_DIR . '/footer.php';