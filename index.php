<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const BASE_DIR = __DIR__;

if (!session_id()) {
    session_start();
}

require_once BASE_DIR . '/vendor/autoload.php';
require_once BASE_DIR . '/configs/constants.php';

try {
    require_once BASE_DIR . '/configs/DB.php';
    require_once APP_DIR . 'index.php';

    if (!empty($_POST)) {
        require_once APP_DIR . 'forms/controller.php';
    } else {
        $commonBlocks = getContent('name IN ("navigation", "footer")');
        require_once BASE_DIR . '/configs/router.php';
    }
} catch (PDOException $exception) {
    notify($exception->getMessage(), 'danger');
    redirectBack();
} catch (Exception $exception) {
    dd($exception->getCode() . ' - "' . $exception->getMessage() . '"');
}
