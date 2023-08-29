<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const BASE_DIR = __DIR__;

require_once BASE_DIR . '/vendor/autoload.php';

$data = [
    'about' => [
        'title' => 'About Us',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.',
        'copyright' => 'Copyright ©2023 All rights reserved'
    ],
    'form' => [
        'title' => 'Newsletter',
        'description' => 'Stay update with our latest',
    ],
    'follow' => [
        'title' => 'Follow Us',
        'description' => 'Let us be social',
        'socials' => [
            [
                'href' => 'https://facebook.com',
                'icon' => 'fa-facebook-f'
            ],
            [
                'href' => 'https://twitter.com',
                'icon' => 'fa-twitter'
            ],
            [
                'href' => 'https://instagram.com',
                'icon' => 'fa-instagram'
            ],
            [
                'href' => 'https://linkedin.com',
                'icon' => 'fa-linkedin-in'
            ]
        ]
    ]
];

dd(json_encode($data));

require_once BASE_DIR . '/configs/constants.php';

try {
    require_once APP_DIR . 'index.php';

    require_once BASE_DIR . '/configs/router.php';
} catch (Exception $exception) {
    dd($exception->getCode() . ' - "' . $exception->getMessage() . '"');
}
