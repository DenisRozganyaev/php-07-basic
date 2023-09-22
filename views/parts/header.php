<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coffee shop</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/css/style.css">
</head>
<body>
<?php include_once PARTS_DIR . 'notification.php' ?>
<section id="navigation" class="fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="d-flex flex-wrap justify-content-center py-3">
                    <?php if ($commonBlocks['navigation']['logo']): ?>
                        <a href="/"
                           class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                            <img src="<?= IMAGES_URI ?>/<?= $commonBlocks['navigation']['logo'] ?>" width="30" alt="Logo">
                        </a>
                    <?php endif; ?>

                    <ul class="nav nav-pills">
                        <?php if ($commonBlocks['navigation']['links']): ?>
                            <?php foreach ($commonBlocks['navigation']['links'] as $link): ?>
                                <li class="nav-item">
                                    <a href="<?= $link['href'] ?>" class="nav-link"
                                       aria-current="page"><?= $link['title'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="/cart" class="nav-link"
                               aria-current="page"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>

                        <?php if (!isAuth()): ?>
                            <li class="nav-item">
                                <a href="/login" class="nav-link" aria-current="page">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link disabled">|</span>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link" aria-current="page">Sign Up</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <span class="nav-link disabled">|</span>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                   aria-expanded="false">User Actions</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/account">Account</a></li>
                                    <?php if (isAdmin()): ?>
                                        <li><a href="/admin/dashboard" class="dropdown-item">Admin panel</a></li>
                                    <?php endif; ?>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </header>
            </div>
        </div>
    </div>
</section>
