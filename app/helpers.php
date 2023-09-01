<?php

function getUrl(): string
{
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    return explode('?', $uri)[0];
}

function getContent(string $condition = null, bool $isSingle = false): array
{
    $rows = dbSelect(Tables::Content, condition: $condition, isSingle: $isSingle);
    $result = [];

    if (!empty($rows)) {
        foreach ($rows as $row) {
            $result[$row['name']] = json_decode($row['content'], true);
        }
    }

    return $result;
}

function getRequestType(): string
{
    $type = filter_input(INPUT_POST, 'type');
    unset($_POST['type']);

    return htmlspecialchars($type);
}

function redirect(string $path = '/'): void
{
    $url = DOMAIN . $path;
    header("Location: $url");
    exit;
}

function redirectBack(): void
{
    $url = $_SERVER['HTTP_REFERER'];
    header("Location: $url");
    exit;
}

function emptyFields(array $fields, string $sessionKey): bool
{

}
