<?php

require PARTS_DIR . 'header.php';

$content = getContent('name IN ("banner", "about_us", "catalog", "gallery")');
extract($content);

require PARTS_DIR . 'home/banner.php';
require PARTS_DIR . 'home/about-us.php';
require PARTS_DIR . 'home/catalog.php';
require PARTS_DIR . 'home/gallery.php';
require PARTS_DIR . 'home/reviews.php';
require PARTS_DIR . 'home/blog.php';

require PARTS_DIR . 'footer.php';