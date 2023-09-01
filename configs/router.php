<?php

switch(getUrl()) {
    case '':
        require PAGE_DIR . '/home.php';
        break;
    case 'register':
        require_once PAGE_DIR . '/auth/register.php';
        break;
    case 'login':
        require_once PAGE_DIR . '/auth/login.php';
        break;
    default:
        throw new Exception(getUrl() . ' - not found', 404);
}
