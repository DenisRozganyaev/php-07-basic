<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9 col-xl-6 banner-content">
                <p><?= $content['banner']['title'] ?? '' ?></p>
                <h3><?= $content['banner']['subtitle'] ?? '' ?></h3>
                <?php if ($content['banner']['link']): ?>
                    <a href="<?= $content['banner']['link']['href'] ?>"
                       class="btn btn-outline-primary banner-button"
                    ><?= $content['banner']['link']['title'] ?></a>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
