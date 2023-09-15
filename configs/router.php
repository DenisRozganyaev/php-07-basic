<?php

switch (getUrl()) {
    case '':
        require PAGE_DIR . '/home.php';
        break;
    case 'register':
        conditionRedirect(isAuth());
        require_once PAGE_DIR . '/auth/register.php';
        break;
    case 'login':
        conditionRedirect(isAuth());
        require_once PAGE_DIR . '/auth/login.php';
        break;
    case 'logout':
        conditionRedirect(!isAuth());
        removeUser();
        redirect();
        break;
    case 'cart':
        require PAGE_DIR . '/cart.php';
        break;



    case 'admin/dashboard':
        conditionRedirect(!isAdmin());
        require ADMIN_PAGE_DIR . '/dashboard.php';
        break;
    case 'admin/products':
        conditionRedirect(!isAdmin());
        require ADMIN_PAGE_DIR . '/products/index.php';
        break;
    case 'admin/products/create':
        conditionRedirect(!isAdmin());
        require ADMIN_PAGE_DIR . '/products/create.php';
        break;
    case (bool)preg_match('/admin\/products\/edit\/(\d+)/', getUrl(), $match):
        conditionRedirect(!isAdmin());
        $id = end($match);
        $product = dbFind(Tables::Products, $id);
        if (empty($product)) {
            notify('404 - Product not found', 'danger');
            redirectBack();
        }

        require ADMIN_PAGE_DIR . '/products/edit.php';
        break;
    default:
        throw new Exception(getUrl() . ' - not found', 404);
}
