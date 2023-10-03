<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$fields = json_decode($block['content'], true);
?>

    <div class="container" style="padding-top: 10em;">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center"><h3>Block: "<?= $block['name'] ?>"</h3></div>
                    <form action="/" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="type" value="edit_content">
                        <input type="hidden" name="block_id" value="<?= $block['id'] ?>">
                        <input type="hidden" name="block_name" value="<?= $block['name'] ?>">

                        <div class="card-body">
                            <?php if (!empty($fields['logo'])): ?>
                                <div class="mb-3">
                                    <p>Current logo: </p>
                                    <img class="img-thumbnail w-50" src="<?= IMAGES_URI . "/$fields[logo]" ?>"/>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label for="logo">Upload new logo</label>
                                <input type="file" class="form-control" name="logo"/>
                            </div>

                            <div class="mb-3">
                                <h5>Links: </h5>
                            </div>

                            <?php $lastKey = array_key_last($fields['links']) ?? 0; ?>
                            <div class="mb-3 col-6 offset-3 links-wrapper" data-last_key="<?= $lastKey ?>">
                                <?php if (!empty($fields['links'])): ?>
                                    <?php foreach ($fields['links'] as $key => $link): ?>
                                    <div class="row mb-3 d-flex align-items-center justify-content-center bg-body-secondary p-2 links-item"
                                    >
                                        <div class="col-9">
                                            <label for="link_text_<?= $key ?>">Title</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="link_text_<?= $key ?>"
                                                   value="<?= $link['title'] ?>"
                                                   name="links[<?= $key ?>][title]"
                                            >
                                            <label for="link_<?= $key ?>">Link</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="link_<?= $key ?>"
                                                   value="<?= $link['href'] ?>"
                                                   name="links[<?= $key ?>][href]"
                                            >
                                        </div>
                                        <div class="col-3 text-center">
                                            <a href="#" class="btn btn-outline-danger remove-link"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <a href="#" class="btn btn-outline-info add-new-link">Add link</a>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';
