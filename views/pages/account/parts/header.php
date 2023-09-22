<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/css/style.css">
</head>
<body class="account-body">
<?php include PARTS_DIR . '/notification.php'; ?>
<header id="navigation">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <?php if (!empty($commonBlocks['navigation']['logo'])): ?>
                <div class="col" id="logo">
                    <a href="/">
                        <img src="<?= IMAGES_URI . '/' . $commonBlocks['navigation']['logo'] ?>"/>
                    </a>
                </div>
            <?php endif; ?>
            <div class="col d-flex justify-content-end">
                <nav class="nav">
                    <a href="/account/orders" class="nav-link">Orders</a>
                    <a href="#" class="nav-link disabled">|</a>
                    <a href="/logout" class="nav-link">Back to Site</a>
                    <a href="/logout" class="nav-link">Log Out</a>
                </nav>
            </div>
        </div>
    </div>
</header>