<?php $footer = $commonBlocks['footer'] ?? []; ?>
<footer id="footer" class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 footer-about">
                <h4><?= $footer['about']['title'] ?? '' ?></h4>
                <p><?= $footer['about']['description'] ?? '' ?></p>
                <div class="copyright"><?= $footer['about']['copyright'] . ' |' ?? '' ?> This template is made with  by <a href="https://colorlib.com" target="_blank">Colorlib</a></div>
            </div>
            <div class="col-12 col-md-5 footer-newsletter">
                <h4><?= $footer['form']['title'] ?? '' ?></h4>
                <form action="" class="w-100">
                    <div class="input-group mb-3">
                        <label for="email"><?= $footer['form']['description'] ?? '' ?></label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-arrow-right-long"></i></button>
                    </div>
                </form>
            </div>
            <?php if ($footer['follow']['socials']): ?>
                <div class="col-12 col-md-2 footer-social">
                    <h4><?= $footer['follow']['title'] ?? '' ?></h4>
                    <p><?= $footer['follow']['description'] ?? '' ?></p>
                    <div class="d-flex align-items-center footer-social-list">
                        <?php foreach ($footer['follow']['socials'] as $social): ?>
                            <a href="<?= $social['href'] ?>">
                                <i class="fa-brands <?= $social['icon'] ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<script src="<?= ASSETS_URI ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
