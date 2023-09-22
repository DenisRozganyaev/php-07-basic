<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$content = dbSelect(Tables::Content, 'id, name', order: 'id');
?>

    <div class="container" style="padding-top: 10em;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h3>My Orders</h3>
                <table class="table table-striped-columns">
                    <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Edit</th>
                    </thead>
                    <tbody>
                    <?php foreach($content as $block): ?>
                        <tr>
                            <td><?= $block['id'] ?></td>
                            <td><?= $block['name'] ?></td>
                            <td>
                                <a class="btn btn-outline-warning" href="/admin/content/edit/<?= $block['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';
