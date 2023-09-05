<?php

function updateSessionFields(SESSION_KEYS $key, array $fields): void
{
    flushSessionByKey($key);
    $_SESSION[$key->value]['fields'] = $fields;
}

function flushSessionByKey(SESSION_KEYS $key): void
{
    unset($_SESSION[$key->value]);
}

function formSessionData(SESSION_KEYS $key): array
{
    $fields = $_SESSION[$key->value]['fields'] ?? [];
    $errors = $_SESSION[$key->value]['errors'] ?? [];
    $error = $_SESSION[$key->value]['error'] ?? '';

    if (!empty($_SESSION[$key->value])) {
        unset($_SESSION[$key->value]);
    }

    return compact('fields', 'errors', 'error');
}

function authUser(int $id, bool $isAdmin = false): void
{
    $_SESSION['user'] = compact('id', 'isAdmin');
}

function removeUser(): void
{
    unset($_SESSION['user']);
}

function isAuth(): bool
{
    return !empty($_SESSION['user']);
}

function isAdmin(): bool
{
    return isAuth() ? $_SESSION['user']['isAdmin'] : false;
}

function userId(): bool
{
    return $_SESSION['user']['id'];
}

function notify(string $text, string $class = 'success')
{
    $_SESSION['notify'] = compact('text', 'class');
}
