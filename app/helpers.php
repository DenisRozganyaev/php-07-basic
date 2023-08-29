<?php

function getUrl(): string
{
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    return explode('?', $uri)[0];
}
